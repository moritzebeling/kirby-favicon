# Kirby Favicon

This plugin will solve all your favicon worries.

Minimal setup is just one `.png` file, and it will serve all requests to
- `favicon.ico`
- `apple-touch-icon.png` (or any variants of it)
- `manifest.json`
- `browserconfig.xml`

You can also include a snippet into your HTML `<head>` to provide more favicon versions.

## Installation

```
composer require moritzebeling/kirby-favicon
```

Or download/clone this repo into `site/plugins` of your Kirby project.

## Setup

1. Inside `assets/favicon` add the following two files:
    - `favicon.png` (required, square, min 180x180px, but why don’t you just do 1024x1024px :)
    - `favicon.svg` (nice to have, you could even adjust to light/dark mode)

2. Inside your HTML `<head>` element, include the `favicon` snippet:

```php
<?php snippet('favicon') ?>
```

For further control you could also add specific app icons for Apple, Android and Windows, just have a look at the available options below.

## Options

```php
return [
    'moritzebeling.kirby-favicon' => [
        'favicon' => [
            'png' => 'assets/favicon/favicon.png', // required
            'ico' => 'assets/favicon/favicon.ico', // fallback to favicon.png
            'svg' => 'assets/favicon/favicon.svg',
            'sizes' => [ 32, 96, 16, 180 ],
        ],
        'app' => [
            'icon' => 'assets/favicon/app-icon.png', // fallback to favicon.png
            'sizes' => [ 180, 167, 152 ]
        ],
        'mask' => 'assets/favicon/mask.svg', // fallback to favicon.svg
        'color' => '#0000ff',
        
        'extended' => false,
        // the following will ony be show when 'extended' is set to true
        'manifest' => [
            'icon' => 'assets/favicon/android-icon.png', // fallback to favicon.png
            'background_color' => '#000000',
            'sizes' => [
                36 => 0.75,
                48 => 1.0,
                72 => 1.5,
                96 => 2.0,
                144 => 3.0,
                192 => 4.0,
                512 => false
            ],
            // other entries can be added here
        ],
        'browserconfig' => [
            'icon' => 'assets/favicon/ms-tile.png', // fallback to favicon.png
            'sizes' => [ 70, 150, 310 ]
        ],
    ]
];
```

## manifest.json

You can add other values according to the [specification](https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/manifest.json).