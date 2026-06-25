<?php

/**
 * Site Configuration — Glamour by Lovepreet
 *
 * Edit this file to update business info, social links, gallery, and testimonials
 * without touching page templates or controllers.
 */

return [

    'name' => 'Glamour by Lovepreet',
    'tagline' => 'Bridal Makeup, Nail Art & Personalized Beauty Treatments',
    'owner' => 'Lovepreet Kaur',
    'owner_title' => 'Lead Makeup Artist & Founder',
    'city' => 'Ludhiana',
    'state' => 'Punjab',
    'country' => 'India',
    'address' => 'Ludhiana, Punjab, India',
    'email' => env('ADMIN_EMAIL', 'info@makeoverbylovepreet.com'),
    'phone' => env('PHONE_CALL', '+91 5555555555'),
    'whatsapp' => env('PHONE_WHATSAPP', '+91 5555555555'),

    'seo' => [
        'default_description' => 'Glamour by Lovepreet — premium bridal makeup, nail art, and personalized beauty treatments in Ludhiana, Punjab. Book your appointment with Lovepreet Kaur today.',
        'keywords' => 'bridal makeup Ludhiana, makeup artist Punjab, nail art Ludhiana, beauty salon Ludhiana, Lovepreet Kaur makeup, wedding makeup Punjab, party makeup Ludhiana',
        'og_image' => 'images/og-cover.jpg',
    ],

    'social' => [
        'instagram' => 'https://instagram.com/glamour_by_lovepreet',
        'facebook' => 'https://facebook.com/makeoverbylovepreet',
        'whatsapp' => 'https://wa.me/919876543210',
        'youtube' => '',
    ],

    'hours' => [
        ['days' => 'Monday - Friday', 'time' => '9:00 AM - 7:00 PM'],
        ['days' => 'Saturday', 'time' => '9:00 AM - 6:00 PM'],
        ['days' => 'Sunday', 'time' => '10:00 AM - 4:00 PM'],
    ],

    'stats' => [
        ['value' => '200+', 'label' => 'Happy Clients'],
        ['value' => '3+', 'label' => 'Years Experience'],
        ['value' => '50+', 'label' => 'Services'],
        ['value' => '99%', 'label' => 'Satisfaction Rate'],
    ],

    'testimonials' => [
        [
            'name' => 'Simran K.',
            'service' => 'Bridal Makeup',
            'text' => 'Lovepreet made me feel like a princess on my wedding day. The makeup lasted all night and looked stunning in every photo!',
            'rating' => 5,
        ],
        [
            'name' => 'Priya S.',
            'service' => 'Nail Art',
            'text' => 'Beautiful nail art designs and such a relaxing experience. I always get compliments on my nails after visiting.',
            'rating' => 5,
        ],
        [
            'name' => 'Neha M.',
            'service' => 'Party Makeup',
            'text' => 'Professional, friendly, and incredibly talented. My party look was exactly what I wanted — glamorous yet natural.',
            'rating' => 5,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gallery — add, remove, or reorder items here
    |--------------------------------------------------------------------------
    | type: image | video | audio
    | For images: place files in public/images/gallery/
    | For videos: use YouTube/Vimeo embed URL or local path in public/videos/
    | For audio: place files in public/audio/
    */
    'gallery' => [
        [
            'type' => 'image',
            'title' => 'Bridal Glow',
            'category' => 'bridal',
            'src' => 'images/gallery/bridal-1.jpg',
            'alt' => 'Bridal makeup by Lovepreet Kaur',
        ],
        [
            'type' => 'image',
            'title' => 'Elegant Bride',
            'category' => 'bridal',
            'src' => 'images/gallery/bridal-2.jpg',
            'alt' => 'Wedding day bridal look Ludhiana',
        ],
        [
            'type' => 'image',
            'title' => 'Nail Art Design',
            'category' => 'nails',
            'src' => 'images/gallery/nails-1.jpg',
            'alt' => 'Custom nail art design',
        ],
        [
            'type' => 'image',
            'title' => 'Gel Manicure',
            'category' => 'nails',
            'src' => 'images/gallery/nails-2.jpg',
            'alt' => 'Gel manicure nail art',
        ],
        [
            'type' => 'image',
            'title' => 'Party Glam',
            'category' => 'beauty',
            'src' => 'images/gallery/beauty-1.jpg',
            'alt' => 'Party makeup look',
        ],
        [
            'type' => 'image',
            'title' => 'Natural Beauty',
            'category' => 'beauty',
            'src' => 'images/gallery/beauty-2.jpg',
            'alt' => 'Natural makeup transformation',
        ],
        [
            'type' => 'video',
            'title' => 'Bridal Transformation',
            'category' => 'bridal',
            'src' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'thumbnail' => 'images/gallery/video-thumb-1.jpg',
            'alt' => 'Bridal makeup transformation video',
        ],
    ],

];
