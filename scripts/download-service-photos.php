<?php
/**
 * Downloads unique professional demo photos for each service (Unsplash/Pexels),
 * crops to 800x560, optimizes JPEG, saves to public/images/services/.
 *
 * Run: php scripts/download-service-photos.php
 */

$baseDir = dirname(__DIR__);
$outputDir = $baseDir . '/public/images/services';

if (! is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

if (! extension_loaded('gd')) {
    fwrite(STDERR, "GD extension required.\n");
    exit(1);
}

/** 28 unique photos — real people/models, beauty salon themed */
$servicePhotos = [
    // Bridal makeup (7)
    'bridal-trial.jpg'            => 'https://images.pexels.com/photos/3289446/pexels-photo-3289446.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'full-bridal-makeup.jpg'      => 'https://images.pexels.com/photos/3014853/pexels-photo-3014853.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'hair-makeup-combo.jpg'       => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1200&h=840&q=90',
    'bridal-party-makeup.jpg'     => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1200&h=840&q=90',
    'engagement-makeup.jpg'       => 'https://images.pexels.com/photos/2469665/pexels-photo-2469665.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'mehendi-makeup.jpg'          => 'https://images.pexels.com/photos/1444442/pexels-photo-1444442.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'reception-makeup.jpg'        => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=1200&h=840&q=90',

    // Nail services (9)
    'classic-manicure.jpg'        => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=1200&h=840&q=90',
    'gel-manicure.jpg'            => 'https://images.unsplash.com/photo-1632345031435-8727f6897d53?auto=format&fit=crop&w=1200&h=840&q=90',
    'classic-pedicure.jpg'        => 'https://images.pexels.com/photos/5240682/pexels-photo-5240682.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'gel-pedicure.jpg'            => 'https://images.pexels.com/photos/3997985/pexels-photo-3997985.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'full-set-manicure-pedicure.jpg' => 'https://images.pexels.com/photos/3997988/pexels-photo-3997988.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'nail-art-design.jpg'         => 'https://images.pexels.com/photos/3997987/pexels-photo-3997987.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'french-manicure.jpg'         => 'https://images.pexels.com/photos/3997982/pexels-photo-3997982.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'spa-pedicure.jpg'            => 'https://images.pexels.com/photos/3865514/pexels-photo-3865514.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'nail-extension.jpg'          => 'https://images.pexels.com/photos/3997379/pexels-photo-3997379.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',

    // Beauty treatments (12)
    'full-face-makeup.jpg'        => 'https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?auto=format&fit=crop&w=1200&h=840&q=90',
    'party-makeup.jpg'            => 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=1200&h=840&q=90',
    'natural-makeup.jpg'          => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=1200&h=840&q=90',
    'hair-styling.jpg'            => 'https://images.pexels.com/photos/3993449/pexels-photo-3993449.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'eyebrow-threading.jpg'       => 'https://images.pexels.com/photos/5069432/pexels-photo-5069432.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'facial-treatment.jpg'        => 'https://images.pexels.com/photos/5069433/pexels-photo-5069433.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'hair-color.jpg'              => 'https://images.pexels.com/photos/3738349/pexels-photo-3738349.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'haircut-styling.jpg'         => 'https://images.pexels.com/photos/3992866/pexels-photo-3992866.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'hair-spa.jpg'                => 'https://images.pexels.com/photos/3738365/pexels-photo-3738365.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'eyebrow-tinting.jpg'         => 'https://images.pexels.com/photos/5069434/pexels-photo-5069434.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'eyelash-extension.jpg'       => 'https://images.pexels.com/photos/7858770/pexels-photo-7858770.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'makeup-consultation.jpg'     => 'https://images.pexels.com/photos/3739411/pexels-photo-3739411.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
];

function downloadImage(string $url): ?string
{
    $context = stream_context_create([
        'http' => [
            'timeout' => 90,
            'header' => "User-Agent: Mozilla/5.0 (compatible; MakeoverByLovepreet/1.0)\r\n",
        ],
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
        ],
    ]);

    $data = @file_get_contents($url, false, $context);

    if ($data === false || strlen($data) < 2000) {
        return null;
    }

    return $data;
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
    imagefilter($dst, IMG_FILTER_COLORIZE, 6, 3, 1);

    $ok = imagejpeg($dst, $destPath, 82);

    imagedestroy($src);
    imagedestroy($dst);

    return $ok;
}

function photoId(string $url): string
{
    if (preg_match('/photo-(\d+)-/', $url, $m)) {
        return 'unsplash-' . $m[1];
    }
    if (preg_match('/photos\/(\d+)/', $url, $m)) {
        return 'pexels-' . $m[1];
    }

    return md5($url);
}

$success = 0;
$failed = [];

foreach ($servicePhotos as $filename => $url) {
    $dest = $outputDir . '/' . $filename;
    echo "Downloading {$filename}... ";

    $binary = downloadImage($url);
    if ($binary === null) {
        echo "FAILED (download)\n";
        $failed[] = $filename;
        continue;
    }

    if (! optimizeAndSave($binary, $dest)) {
        echo "FAILED (process)\n";
        $failed[] = $filename;
        continue;
    }

    echo 'OK (' . round(filesize($dest) / 1024) . " KB)\n";
    $success++;
}

$ids = array_map('photoId', array_values($servicePhotos));
$unique = count(array_unique($ids));

echo "\nSaved {$success}/" . count($servicePhotos) . " images to public/images/services/\n";
echo "Unique source photos: {$unique}/" . count($servicePhotos) . "\n";

if ($failed) {
    echo 'Failed: ' . implode(', ', $failed) . "\n";
    exit(1);
}

if ($unique < count($servicePhotos)) {
    fwrite(STDERR, "WARNING: duplicate source photos detected.\n");
    exit(1);
}

echo "All service images ready.\n";
