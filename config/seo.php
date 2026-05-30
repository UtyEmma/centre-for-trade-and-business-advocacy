<?php

use App\Models\SeoMetadata;

return [
    'model' => SeoMetadata::class,

    'site_name' => env('APP_NAME'),

    'sitemap' => env('SEO_SITEMAP'),

    'canonical_link' => true,

    'robots' => [
        'default' => 'max-snippet:-1,max-image-preview:large,max-video-preview:-1',
        'force_default' => false,
    ],

    'favicon' => '/assets/img/logo/favicon.png',

    'title' => [
        'infer_title_from_url' => true,
        'suffix' => ' | '.env('APP_NAME', 'Laravel'),
        'homepage_title' => env('APP_NAME', 'Laravel'),
    ],

    'description' => [
        'fallback' => env('SEO_DESCRIPTION'),
    ],

    'image' => [
        'fallback' => env('SEO_IMAGE', '/assets/img/logo/logo.png'),
    ],

    'author' => [
        'fallback' => env('APP_NAME'),
    ],

    'twitter' => [
        '@username' => env('SEO_TWITTER_USERNAME'),
    ],
];
