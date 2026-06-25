<?php
/**
 * Replace engagement-makeup.jpg with elegant engagement makeup portrait.
 * Run: php scripts/update-engagement-makeup.php
 */

$url = 'https://images.pexels.com/photos/2469665/pexels-photo-2469665.jpeg?auto=compress&cs=tinysrgb&w=1200&h=840&fit=crop';
$dest = dirname(__DIR__) . '/public/images/services/engagement-makeup.jpg';

$ctx = stream_context_create(['http' => ['header' => 'User-Agent: Mozilla/5.0', 'timeout' => 90]]);
$bin = file_get_contents($url, false, $ctx);

if (! $bin || strlen($bin) < 5000) {
    fwrite(STDERR, "Download failed.\n");
    exit(1);
}

$src = imagecreatefromstring($bin);
$w = 800;
$h = 560;
$sw = imagesx($src);
$sh = imagesy($src);
$r = $sw / $sh;
$tr = $w / $h;

// Bias crop slightly toward top (face) for engagement makeup focus
if ($r > $tr) {
    $ch = $sh;
    $cw = (int) ($sh * $tr);
    $sx = (int) (($sw - $cw) / 2);
    $sy = 0;
} else {
    $cw = $sw;
    $ch = (int) ($sw / $tr);
    $sx = 0;
    $sy = (int) (($sh - $ch) * 0.15);
}

$dst = imagecreatetruecolor($w, $h);
imagecopyresampled($dst, $src, 0, 0, $sx, $sy, $w, $h, $cw, $ch);
imagefilter($dst, IMG_FILTER_COLORIZE, 5, 2, 1);
imagejpeg($dst, $dest, 84);
imagedestroy($src);
imagedestroy($dst);

echo 'engagement-makeup.jpg updated: ' . round(filesize($dest) / 1024) . " KB\n";
