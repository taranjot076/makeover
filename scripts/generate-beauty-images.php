<?php
/**
 * Generates unique professional beauty service & gallery images.
 * Run: php scripts/generate-beauty-images.php
 */

$baseDir = dirname(__DIR__);
$servicesDir = $baseDir . '/public/images/services';
$galleryDir = $baseDir . '/public/images/gallery';

foreach ([$servicesDir, $galleryDir] as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

if (! extension_loaded('gd')) {
    fwrite(STDERR, "GD extension required.\n");
    exit(1);
}

/** @return array<int, array<string, mixed>> */
function serviceVisualProfiles(): array
{
    return [
        'bridal-trial' => ['c1' => [245, 220, 225], 'c2' => [210, 170, 185], 'c3' => [180, 130, 150], 'accent' => [201, 168, 124], 'motif' => 'mirror', 'category' => 'bridal'],
        'full-bridal-makeup' => ['c1' => [255, 235, 220], 'c2' => [220, 180, 160], 'c3' => [160, 100, 110], 'accent' => [212, 175, 55], 'motif' => 'crown', 'category' => 'bridal'],
        'hair-makeup-combo' => ['c1' => [250, 228, 235], 'c2' => [200, 165, 185], 'c3' => [140, 95, 120], 'accent' => [201, 168, 124], 'motif' => 'hairbrush', 'category' => 'bridal'],
        'bridal-party-makeup' => ['c1' => [252, 230, 238], 'c2' => [225, 190, 205], 'c3' => [175, 130, 155], 'accent' => [183, 110, 121], 'motif' => 'group', 'category' => 'bridal'],
        'engagement-makeup' => ['c1' => [255, 240, 230], 'c2' => [235, 200, 180], 'c3' => [190, 150, 130], 'accent' => [201, 168, 124], 'motif' => 'ring', 'category' => 'bridal'],
        'mehendi-makeup' => ['c1' => [255, 245, 225], 'c2' => [230, 200, 160], 'c3' => [180, 140, 90], 'accent' => [160, 100, 60], 'motif' => 'henna', 'category' => 'bridal'],
        'reception-makeup' => ['c1' => [240, 225, 245], 'c2' => [190, 160, 200], 'c3' => [120, 80, 120], 'accent' => [212, 175, 55], 'motif' => 'sparkle', 'category' => 'bridal'],

        'classic-manicure' => ['c1' => [255, 245, 248], 'c2' => [235, 210, 220], 'c3' => [200, 170, 185], 'accent' => [183, 110, 121], 'motif' => 'nails', 'category' => 'nails'],
        'gel-manicure' => ['c1' => [240, 248, 255], 'c2' => [200, 220, 240], 'c3' => [150, 180, 210], 'accent' => [100, 160, 200], 'motif' => 'gelshine', 'category' => 'nails'],
        'classic-pedicure' => ['c1' => [250, 242, 235], 'c2' => [220, 195, 175], 'c3' => [180, 150, 130], 'accent' => [183, 110, 121], 'motif' => 'footspa', 'category' => 'nails'],
        'gel-pedicure' => ['c1' => [235, 245, 250], 'c2' => [190, 215, 230], 'c3' => [140, 175, 200], 'accent' => [100, 150, 190], 'motif' => 'toes', 'category' => 'nails'],
        'full-set-manicure-pedicure' => ['c1' => [255, 248, 240], 'c2' => [230, 210, 195], 'c3' => [190, 165, 150], 'accent' => [201, 168, 124], 'motif' => 'duo', 'category' => 'nails'],
        'nail-art-design' => ['c1' => [255, 235, 245], 'c2' => [240, 190, 215], 'c3' => [200, 140, 175], 'accent' => [220, 80, 140], 'motif' => 'art', 'category' => 'nails'],
        'french-manicure' => ['c1' => [255, 255, 252], 'c2' => [245, 240, 235], 'c3' => [220, 210, 205], 'accent' => [240, 230, 220], 'motif' => 'french', 'category' => 'nails'],
        'spa-pedicure' => ['c1' => [240, 250, 245], 'c2' => [195, 225, 210], 'c3' => [140, 185, 165], 'accent' => [100, 160, 130], 'motif' => 'leaf', 'category' => 'nails'],
        'nail-extension' => ['c1' => [248, 240, 255], 'c2' => [215, 195, 235], 'c3' => [170, 145, 200], 'accent' => [140, 100, 180], 'motif' => 'extension', 'category' => 'nails'],

        'full-face-makeup' => ['c1' => [255, 240, 242], 'c2' => [235, 200, 205], 'c3' => [190, 150, 160], 'accent' => [183, 110, 121], 'motif' => 'face', 'category' => 'beauty'],
        'party-makeup' => ['c1' => [250, 230, 255], 'c2' => [210, 170, 230], 'c3' => [150, 100, 170], 'accent' => [212, 175, 55], 'motif' => 'glam', 'category' => 'beauty'],
        'natural-makeup' => ['c1' => [255, 250, 245], 'c2' => [240, 225, 210], 'c3' => [210, 190, 170], 'accent' => [190, 160, 140], 'motif' => 'natural', 'category' => 'beauty'],
        'hair-styling' => ['c1' => [245, 235, 225], 'c2' => [210, 185, 165], 'c3' => [170, 140, 115], 'accent' => [201, 168, 124], 'motif' => 'curls', 'category' => 'beauty'],
        'eyebrow-threading' => ['c1' => [255, 248, 245], 'c2' => [230, 215, 205], 'c3' => [190, 170, 155], 'accent' => [120, 90, 75], 'motif' => 'brow', 'category' => 'beauty'],
        'facial-treatment' => ['c1' => [240, 252, 248], 'c2' => [195, 230, 215], 'c3' => [140, 195, 170], 'accent' => [100, 170, 140], 'motif' => 'mask', 'category' => 'beauty'],
        'hair-color' => ['c1' => [255, 235, 220], 'c2' => [220, 170, 140], 'c3' => [160, 110, 80], 'accent' => [180, 100, 60], 'motif' => 'color', 'category' => 'beauty'],
        'haircut-styling' => ['c1' => [248, 242, 238], 'c2' => [215, 200, 190], 'c3' => [175, 155, 145], 'accent' => [140, 110, 100], 'motif' => 'scissors', 'category' => 'beauty'],
        'hair-spa' => ['c1' => [235, 245, 250], 'c2' => [190, 215, 230], 'c3' => [140, 175, 200], 'accent' => [100, 150, 185], 'motif' => 'droplet', 'category' => 'beauty'],
        'eyebrow-tinting' => ['c1' => [250, 242, 235], 'c2' => [215, 190, 170], 'c3' => [170, 140, 120], 'accent' => [130, 90, 70], 'motif' => 'tint', 'category' => 'beauty'],
        'eyelash-extension' => ['c1' => [255, 245, 250], 'c2' => [230, 210, 225], 'c3' => [190, 165, 185], 'accent' => [80, 60, 70], 'motif' => 'lashes', 'category' => 'beauty'],
        'makeup-consultation' => ['c1' => [255, 252, 245], 'c2' => [235, 225, 210], 'c3' => [200, 185, 165], 'accent' => [201, 168, 124], 'motif' => 'palette', 'category' => 'beauty'],
    ];
}

/** @return array<string, array<string, mixed>> */
function galleryVisualProfiles(): array
{
    return [
        'bridal-1' => ['c1' => [255, 228, 225], 'c2' => [200, 150, 160], 'c3' => [120, 60, 80], 'accent' => [212, 175, 55], 'motif' => 'bridalportrait', 'label' => 'Bridal Glow'],
        'bridal-2' => ['c1' => [250, 235, 240], 'c2' => [210, 170, 185], 'c3' => [140, 90, 110], 'accent' => [201, 168, 124], 'motif' => 'elegantbride', 'label' => 'Elegant Bride'],
        'nails-1' => ['c1' => [255, 240, 248], 'c2' => [230, 180, 210], 'c3' => [180, 120, 160], 'accent' => [220, 60, 120], 'motif' => 'nailart', 'label' => 'Nail Art'],
        'nails-2' => ['c1' => [240, 248, 255], 'c2' => [190, 210, 235], 'c3' => [130, 160, 200], 'accent' => [100, 180, 220], 'motif' => 'gelnails', 'label' => 'Gel Manicure'],
        'beauty-1' => ['c1' => [255, 235, 250], 'c2' => [210, 160, 210], 'c3' => [140, 80, 140], 'accent' => [212, 175, 55], 'motif' => 'partyglam', 'label' => 'Party Glam'],
        'beauty-2' => ['c1' => [255, 250, 245], 'c2' => [235, 220, 205], 'c3' => [200, 180, 160], 'accent' => [190, 160, 140], 'motif' => 'naturalbeauty', 'label' => 'Natural Beauty'],
        'video-thumb-1' => ['c1' => [45, 27, 36], 'c2' => [74, 44, 58], 'c3' => [120, 70, 90], 'accent' => [201, 168, 124], 'motif' => 'video', 'label' => 'Bridal Video'],
    ];
}

function allocateColor($img, array $rgb): int
{
    return imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
}

function drawGradient(GdImage $img, int $w, int $h, array $c1, array $c2, array $c3): void
{
    for ($y = 0; $y < $h; $y++) {
        $ratio = $y / $h;
        if ($ratio < 0.5) {
            $t = $ratio * 2;
            $r = (int) ($c1[0] + ($c2[0] - $c1[0]) * $t);
            $g = (int) ($c1[1] + ($c2[1] - $c1[1]) * $t);
            $b = (int) ($c1[2] + ($c2[2] - $c1[2]) * $t);
        } else {
            $t = ($ratio - 0.5) * 2;
            $r = (int) ($c2[0] + ($c3[0] - $c2[0]) * $t);
            $g = (int) ($c2[1] + ($c3[1] - $c2[1]) * $t);
            $b = (int) ($c2[2] + ($c3[2] - $c2[2]) * $t);
        }
        $col = imagecolorallocate($img, $r, $g, $b);
        imageline($img, 0, $y, $w, $y, $col);
    }
}

function drawSoftBokeh(GdImage $img, int $w, int $h, int $seed): void
{
    mt_srand($seed);
    for ($i = 0; $i < 18; $i++) {
        $cx = mt_rand((int) ($w * 0.05), (int) ($w * 0.95));
        $cy = mt_rand((int) ($h * 0.05), (int) ($h * 0.95));
        $radius = mt_rand((int) ($w * 0.04), (int) ($w * 0.18));
        $alpha = mt_rand(100, 118);
        $col = imagecolorallocatealpha($img, 255, 255, 255, $alpha);
        imagefilledellipse($img, $cx, $cy, $radius * 2, $radius * 2, $col);
    }
}

function drawMotif(GdImage $img, string $motif, int $w, int $h, int $accent, int $seed): void
{
    mt_srand($seed + 1000);
    $cx = (int) ($w * 0.5);
    $cy = (int) ($h * 0.45);

    switch ($motif) {
        case 'mirror':
            imagefilledellipse($img, $cx, $cy, (int) ($w * 0.35), (int) ($h * 0.45), $accent);
            imagefilledellipse($img, $cx, $cy, (int) ($w * 0.28), (int) ($h * 0.36), imagecolorallocatealpha($img, 255, 255, 255, 30));
            break;
        case 'crown':
            $pts = [$cx - 80, $cy + 40, $cx - 60, $cy - 50, $cx - 30, $cy + 10, $cx, $cy - 70, $cx + 30, $cy + 10, $cx + 60, $cy - 50, $cx + 80, $cy + 40];
            imagefilledpolygon($img, $pts, $accent);
            break;
        case 'hairbrush':
            imagefilledrectangle($img, $cx - 15, $cy - 90, $cx + 15, $cy + 60, $accent);
            for ($i = 0; $i < 8; $i++) {
                imageline($img, $cx - 40 + $i * 12, $cy + 60, $cx - 40 + $i * 12, $cy + 100, $accent);
            }
            break;
        case 'group':
            imagefilledellipse($img, $cx - 60, $cy, 70, 70, $accent);
            imagefilledellipse($img, $cx, $cy - 20, 80, 80, $accent);
            imagefilledellipse($img, $cx + 65, $cy, 70, 70, $accent);
            break;
        case 'ring':
            imageellipse($img, $cx, $cy, 100, 100, $accent);
            imageellipse($img, $cx, $cy, 70, 70, $accent);
            imagefilledellipse($img, $cx - 30, $cy - 40, 20, 20, $accent);
            break;
        case 'henna':
            for ($i = 0; $i < 12; $i++) {
                $angle = $i * 30;
                $x = $cx + (int) (cos(deg2rad($angle)) * 70);
                $y = $cy + (int) (sin(deg2rad($angle)) * 70);
                imagefilledellipse($img, $x, $y, 25, 25, $accent);
            }
            imagefilledellipse($img, $cx, $cy, 40, 40, $accent);
            break;
        case 'sparkle':
            for ($i = 0; $i < 6; $i++) {
                $x = $cx + mt_rand(-120, 120);
                $y = $cy + mt_rand(-80, 80);
                imageline($img, $x - 15, $y, $x + 15, $y, $accent);
                imageline($img, $x, $y - 15, $x, $y + 15, $accent);
            }
            break;
        case 'nails':
            for ($i = 0; $i < 5; $i++) {
                imagefilledellipse($img, $cx - 80 + $i * 40, $cy, 28, 50, $accent);
            }
            break;
        case 'gelshine':
            imagefilledellipse($img, $cx, $cy, 120, 80, $accent);
            imagefilledellipse($img, $cx - 30, $cy - 20, 30, 20, imagecolorallocatealpha($img, 255, 255, 255, 60));
            break;
        case 'footspa':
            imagefilledellipse($img, $cx, $cy + 20, 140, 70, $accent);
            imagefilledellipse($img, $cx, $cy - 30, 90, 50, $accent);
            break;
        case 'toes':
            for ($i = 0; $i < 5; $i++) {
                imagefilledellipse($img, $cx - 60 + $i * 30, $cy + 30, 22, 30, $accent);
            }
            break;
        case 'duo':
            imagefilledellipse($img, $cx - 50, $cy - 20, 60, 40, $accent);
            imagefilledellipse($img, $cx + 50, $cy + 30, 70, 45, $accent);
            break;
        case 'art':
            for ($i = 0; $i < 5; $i++) {
                $colors = [$accent, imagecolorallocate($img, 220, 80, 140), imagecolorallocate($img, 100, 160, 200)];
                imagefilledellipse($img, $cx - 70 + $i * 35, $cy, 25, 45, $colors[$i % 3]);
            }
            break;
        case 'french':
            for ($i = 0; $i < 5; $i++) {
                imagefilledellipse($img, $cx - 80 + $i * 40, $cy, 28, 50, $accent);
                imagefilledellipse($img, $cx - 80 + $i * 40, $cy - 30, 28, 18, imagecolorallocate($img, 255, 255, 255));
            }
            break;
        case 'leaf':
            imagefilledellipse($img, $cx, $cy, 100, 60, $accent);
            imageline($img, $cx, $cy - 40, $cx, $cy + 40, imagecolorallocate($img, 255, 255, 255));
            break;
        case 'extension':
            for ($i = 0; $i < 4; $i++) {
                imagefilledellipse($img, $cx - 50 + $i * 35, $cy - 20, 22, 80, $accent);
            }
            break;
        case 'face':
            imagefilledellipse($img, $cx, $cy, 110, 130, $accent);
            imagefilledellipse($img, $cx - 25, $cy - 20, 12, 8, imagecolorallocate($img, 60, 40, 50));
            imagefilledellipse($img, $cx + 25, $cy - 20, 12, 8, imagecolorallocate($img, 60, 40, 50));
            break;
        case 'glam':
            imagefilledellipse($img, $cx, $cy, 100, 120, $accent);
            for ($i = 0; $i < 8; $i++) {
                imagefilledellipse($img, $cx + mt_rand(-90, 90), $cy + mt_rand(-70, 70), 8, 8, imagecolorallocate($img, 255, 255, 255));
            }
            break;
        case 'natural':
            imagefilledellipse($img, $cx, $cy, 100, 120, $accent);
            imagearc($img, $cx, $cy + 15, 40, 20, 0, 180, imagecolorallocate($img, 180, 140, 120));
            break;
        case 'curls':
            for ($i = 0; $i < 5; $i++) {
                imagearc($img, $cx - 60 + $i * 30, $cy, 30, 60, 0, 180, $accent);
            }
            break;
        case 'brow':
            imagefilledellipse($img, $cx - 40, $cy, 60, 15, $accent);
            imagefilledellipse($img, $cx + 40, $cy, 60, 15, $accent);
            break;
        case 'mask':
            imagefilledellipse($img, $cx, $cy, 130, 100, $accent);
            imagefilledellipse($img, $cx, $cy + 10, 100, 60, imagecolorallocatealpha($img, 255, 255, 255, 50));
            break;
        case 'color':
            for ($i = 0; $i < 6; $i++) {
                imagefilledrectangle($img, $cx - 75 + $i * 25, $cy - 40, $cx - 55 + $i * 25, $cy + 40, imagecolorallocate($img, 160 + $i * 15, 100 + $i * 10, 60 + $i * 8));
            }
            break;
        case 'scissors':
            imageline($img, $cx - 50, $cy - 50, $cx + 50, $cy + 50, $accent);
            imageline($img, $cx - 50, $cy + 50, $cx + 50, $cy - 50, $accent);
            imagefilledellipse($img, $cx - 40, $cy - 40, 20, 20, $accent);
            imagefilledellipse($img, $cx + 40, $cy + 40, 20, 20, $accent);
            break;
        case 'droplet':
            $pts = [$cx, $cy - 60, $cx + 45, $cy + 20, $cx, $cy + 60, $cx - 45, $cy + 20];
            imagefilledpolygon($img, $pts, $accent);
            break;
        case 'tint':
            imagefilledellipse($img, $cx - 45, $cy, 70, 18, $accent);
            imagefilledellipse($img, $cx + 45, $cy, 70, 18, imagecolorallocate($img, 100, 70, 55));
            break;
        case 'lashes':
            for ($i = 0; $i < 7; $i++) {
                imageline($img, $cx - 60 + $i * 20, $cy + 20, $cx - 55 + $i * 20, $cy - 40 - ($i % 2) * 15, $accent);
            }
            break;
        case 'palette':
            imagefilledellipse($img, $cx, $cy, 100, 80, $accent);
            $swatches = [[-30, -15, 200, 100, 120], [10, -20, 220, 150, 160], [30, 10, 180, 120, 100], [-10, 25, 150, 100, 140]];
            foreach ($swatches as $s) {
                imagefilledellipse($img, $cx + $s[0], $cy + $s[1], 18, 18, imagecolorallocate($img, $s[2], $s[3], $s[4]));
            }
            break;
        case 'bridalportrait':
            imagefilledellipse($img, $cx, $cy - 20, 90, 100, $accent);
            imagefilledellipse($img, $cx, $cy + 80, 140, 100, imagecolorallocatealpha($img, 255, 255, 255, 40));
            break;
        case 'elegantbride':
            imagefilledellipse($img, $cx, $cy, 100, 110, $accent);
            $veil = [$cx - 100, $cy - 30, $cx + 100, $cy - 30, $cx + 80, $cy + 120, $cx - 80, $cy + 120];
            imagefilledpolygon($img, $veil, imagecolorallocatealpha($img, 255, 255, 255, 50));
            break;
        case 'nailart':
            for ($i = 0; $i < 5; $i++) {
                imagefilledellipse($img, $cx - 70 + $i * 35, $cy, 26, 48, $accent);
                imagefilledellipse($img, $cx - 70 + $i * 35, $cy - 15, 10, 10, imagecolorallocate($img, 220, 60, 120));
            }
            break;
        case 'gelnails':
            for ($i = 0; $i < 5; $i++) {
                imagefilledellipse($img, $cx - 70 + $i * 35, $cy, 26, 48, $accent);
                imagefilledellipse($img, $cx - 70 + $i * 35, $cy - 25, 20, 10, imagecolorallocatealpha($img, 255, 255, 255, 70));
            }
            break;
        case 'partyglam':
            imagefilledellipse($img, $cx, $cy, 95, 110, $accent);
            for ($i = 0; $i < 12; $i++) {
                imagefilledellipse($img, $cx + mt_rand(-100, 100), $cy + mt_rand(-80, 80), 6, 6, imagecolorallocate($img, 255, 220, 100));
            }
            break;
        case 'naturalbeauty':
            imagefilledellipse($img, $cx, $cy, 90, 105, $accent);
            imagearc($img, $cx, $cy + 20, 35, 18, 0, 180, imagecolorallocate($img, 200, 170, 150));
            break;
        case 'video':
            $tri = [$cx - 25, $cy - 35, $cx - 25, $cy + 35, $cx + 40, $cy];
            imagefilledpolygon($img, $tri, $accent);
            imageellipse($img, $cx, $cy, 100, 100, $accent);
            break;
    }
}

function drawVignette(GdImage $img, int $w, int $h): void
{
    for ($i = 0; $i < 40; $i++) {
        $alpha = min(127, 8 + $i * 2);
        $col = imagecolorallocatealpha($img, 30, 15, 25, $alpha);
        imagerectangle($img, $i, $i, $w - $i, $h - $i, $col);
    }
}

function generateImage(string $path, array $profile, int $w, int $h, bool $withBrand = false): void
{
    $img = imagecreatetruecolor($w, $h);
    imagealphablending($img, true);

    drawGradient($img, $w, $h, $profile['c1'], $profile['c2'], $profile['c3']);

    $seed = crc32(basename($path, '.jpg'));
    drawSoftBokeh($img, $w, $h, $seed);

    $accent = allocateColor($img, $profile['accent']);
    $accentSoft = imagecolorallocatealpha($img, $profile['accent'][0], $profile['accent'][1], $profile['accent'][2], 60);

    imagefilledellipse($img, (int) ($w * 0.75), (int) ($h * 0.25), (int) ($w * 0.35), (int) ($w * 0.35), $accentSoft);
    imagefilledellipse($img, (int) ($w * 0.2), (int) ($h * 0.7), (int) ($w * 0.25), (int) ($w * 0.25), $accentSoft);

    drawMotif($img, $profile['motif'], $w, $h, $accent, $seed);
    drawVignette($img, $w, $h);

    if ($withBrand) {
        $white = imagecolorallocatealpha($img, 255, 255, 255, 20);
        imagefilledrectangle($img, 0, $h - 36, $w, $h, $white);
        $textColor = imagecolorallocate($img, 255, 255, 255);
        imagestring($img, 3, 12, $h - 26, 'Glamour by Lovepreets', $textColor);
    }

    imagejpeg($img, $path, 92);
    imagedestroy($img);
}

$profiles = serviceVisualProfiles();
$serviceFiles = [
    'bridal-trial' => 'bridal-trial.jpg',
    'full-bridal-makeup' => 'full-bridal-makeup.jpg',
    'hair-makeup-combo' => 'hair-makeup-combo.jpg',
    'bridal-party-makeup' => 'bridal-party-makeup.jpg',
    'engagement-makeup' => 'engagement-makeup.jpg',
    'mehendi-makeup' => 'mehendi-makeup.jpg',
    'reception-makeup' => 'reception-makeup.jpg',
    'classic-manicure' => 'classic-manicure.jpg',
    'gel-manicure' => 'gel-manicure.jpg',
    'classic-pedicure' => 'classic-pedicure.jpg',
    'gel-pedicure' => 'gel-pedicure.jpg',
    'full-set-manicure-pedicure' => 'full-set-manicure-pedicure.jpg',
    'nail-art-design' => 'nail-art-design.jpg',
    'french-manicure' => 'french-manicure.jpg',
    'spa-pedicure' => 'spa-pedicure.jpg',
    'nail-extension' => 'nail-extension.jpg',
    'full-face-makeup' => 'full-face-makeup.jpg',
    'party-makeup' => 'party-makeup.jpg',
    'natural-makeup' => 'natural-makeup.jpg',
    'hair-styling' => 'hair-styling.jpg',
    'eyebrow-threading' => 'eyebrow-threading.jpg',
    'facial-treatment' => 'facial-treatment.jpg',
    'hair-color' => 'hair-color.jpg',
    'haircut-styling' => 'haircut-styling.jpg',
    'hair-spa' => 'hair-spa.jpg',
    'eyebrow-tinting' => 'eyebrow-tinting.jpg',
    'eyelash-extension' => 'eyelash-extension.jpg',
    'makeup-consultation' => 'makeup-consultation.jpg',
];

$count = 0;
foreach ($serviceFiles as $key => $filename) {
    if (! isset($profiles[$key])) {
        continue;
    }
    generateImage($servicesDir . '/' . $filename, $profiles[$key], 800, 560, true);
    $count++;
    echo "Service: {$filename}\n";
}

$galleryProfiles = galleryVisualProfiles();
foreach ($galleryProfiles as $key => $profile) {
    generateImage($galleryDir . '/' . $key . '.jpg', $profile, 1200, 900, false);
    echo "Gallery: {$key}.jpg\n";
}

echo "\nGenerated {$count} service images and " . count($galleryProfiles) . " gallery images.\n";
