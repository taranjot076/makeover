<?php

if (! function_exists('my_asset')) {
    function my_asset(string $path): string
    {
        if (env('APP_ENV') === 'production') {
            return asset("public/$path");
        }

        return asset($path);
    }
}

if (! function_exists('site')) {
    function site(?string $key = null, mixed $default = null): mixed
    {
        $config = config('site');

        if ($key === null) {
            return $config;
        }

        return data_get($config, $key, $default);
    }
}

if (! function_exists('service_image')) {
    function service_image(array $service, string $category): string
    {
        $filename = $service['image'] ?? 'default.jpg';
        $path = public_path("images/services/{$filename}");

        if (file_exists($path)) {
            return my_asset("images/services/{$filename}");
        }

        return my_asset('images/services/full-face-makeup.jpg');
    }
}

if (! function_exists('gallery_image')) {
    function gallery_image(array $item): string
    {
        if (($item['type'] ?? 'image') === 'video') {
            $thumb = $item['thumbnail'] ?? '';
            if ($thumb && file_exists(public_path($thumb))) {
                return my_asset($thumb);
            }
        }

        $src = $item['src'] ?? '';
        if ($src && file_exists(public_path($src))) {
            return my_asset($src);
        }

        return my_asset('images/gallery/bridal-1.jpg');
    }
}

if (! function_exists('format_price')) {
    function format_price(int|float $price): string
    {
        return '₹' . number_format($price, 0, '.', ',');
    }
}
