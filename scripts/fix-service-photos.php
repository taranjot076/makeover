<?php
/** Re-download failed service images with alternate Pexels sources */

$outputDir = dirname(__DIR__) . '/public/images/services';

$fixes = [
    'bridal-trial.jpg' => 'https://images.pexels.com/photos/265906/pexels-photo-265906.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'full-bridal-makeup.jpg' => 'https://images.pexels.com/photos/2109843/pexels-photo-2109843.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'mehendi-makeup.jpg' => 'https://images.pexels.com/photos/1444442/pexels-photo-1444442.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'classic-pedicure.jpg' => 'https://images.pexels.com/photos/775009/pexels-photo-775009.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'full-set-manicure-pedicure.jpg' => 'https://images.pexels.com/photos/3997984/pexels-photo-3997984.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'spa-pedicure.jpg' => 'https://images.pexels.com/photos/3865676/pexels-photo-3865676.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
    'makeup-consultation.jpg' => 'https://images.pexels.com/photos/3373736/pexels-photo-3373736.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop',
];

function downloadImage(string $url): ?string
{
    $context = stream_context_create([
        'http' => ['timeout' => 90, 'header' => "User-Agent: Mozilla/5.0\r\n"],
    ]);
    $data = @file_get_contents($url, false, $context);

    return ($data && strlen($data) > 2000) ? $data : null;
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

foreach ($fixes as $filename => $url) {
    echo "Fix {$filename}... ";
    $binary = downloadImage($url);
    if ($binary && optimizeAndSave($binary, $outputDir . '/' . $filename)) {
        echo 'OK (' . round(filesize($outputDir . '/' . $filename) / 1024) . " KB)\n";
    } else {
        echo "FAILED\n";
    }
}
