<?php
/**
 * Replace 10 service images with more accurate, service-specific photos.
 * Run: php scripts/replace-service-photos.php
 */

$outputDir = dirname(__DIR__) . '/public/images/services';

/** Service-specific photos — each URL chosen to match the exact service */
$replacements = [
    // Makeup artist applying makeup during bridal trial session
    'bridal-trial.jpg' => 'https://images.pexels.com/photos/3289446/pexels-photo-3289446.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Bride with complete traditional bridal makeup and jewelry
    'full-bridal-makeup.jpg' => 'https://images.pexels.com/photos/3014853/pexels-photo-3014853.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Engagement couple — engagement makeup / ring ceremony look
    'engagement-makeup.jpg' => 'https://images.pexels.com/photos/2469665/pexels-photo-2469665.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Makeup artist consulting client with brushes and palette
    'makeup-consultation.jpg' => 'https://images.pexels.com/photos/3739411/pexels-photo-3739411.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Technician applying eyelash extensions close-up
    'eyelash-extension.jpg' => 'https://images.pexels.com/photos/7858770/pexels-photo-7858770.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Classic pedicure — foot care in nail salon
    'classic-pedicure.jpg' => 'https://images.pexels.com/photos/5240682/pexels-photo-5240682.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Gel polish pedicure with glossy finished toes
    'gel-pedicure.jpg' => 'https://images.pexels.com/photos/3997985/pexels-photo-3997985.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Luxury spa pedicure with foot soak
    'spa-pedicure.jpg' => 'https://images.pexels.com/photos/3865514/pexels-photo-3865514.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Colorful custom nail art designs on hands
    'nail-art-design.jpg' => 'https://images.pexels.com/photos/3997987/pexels-photo-3997987.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Manicure and pedicure combo — hands and feet nail care
    'full-set-manicure-pedicure.jpg' => 'https://images.pexels.com/photos/3997988/pexels-photo-3997988.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
];

function downloadImage(string $url): ?string
{
    $context = stream_context_create([
        'http' => ['timeout' => 90, 'header' => "User-Agent: Mozilla/5.0\r\n"],
    ]);
    $data = @file_get_contents($url, false, $context);

    return ($data && strlen($data) > 5000) ? $data : null;
}

function optimizeAndSave(string $binary, string $destPath, int $targetW = 800, int $targetH = 560): bool
{
    $src = @imagecreatefromstring($binary);
    if (! $src) {
        return false;
    }

    $srcW = imagesx($src);
    $srcH = imagesy($src);
    $srcRatio = $srcW / $srcH;
    $targetRatio = $targetW / $targetH;

    if ($srcRatio > $targetRatio) {
        $cropH = $srcH;
        $cropW = (int) ($srcH * $targetRatio);
        $srcX = (int) (($srcW - $cropW) / 2);
        $srcY = 0;
    } else {
        $cropW = $srcW;
        $cropH = (int) ($srcW / $targetRatio);
        $srcX = 0;
        $srcY = (int) (($srcH - $cropH) / 2);
    }

    $dst = imagecreatetruecolor($targetW, $targetH);
    imagecopyresampled($dst, $src, 0, 0, $srcX, $srcY, $targetW, $targetH, $cropW, $cropH);
    imagefilter($dst, IMG_FILTER_COLORIZE, 5, 2, 1);

    $ok = imagejpeg($dst, $destPath, 84);
    imagedestroy($src);
    imagedestroy($dst);

    return $ok;
}

$ok = 0;
foreach ($replacements as $filename => $url) {
    echo "Replacing {$filename}... ";
    $binary = downloadImage($url);
    if (! $binary || ! optimizeAndSave($binary, $outputDir . '/' . $filename)) {
        echo "FAILED\n";
        continue;
    }
    echo 'OK (' . round(filesize($outputDir . '/' . $filename) / 1024) . " KB)\n";
    $ok++;
}

echo "\nReplaced {$ok}/" . count($replacements) . " images.\n";
exit($ok < count($replacements) ? 1 : 0);
