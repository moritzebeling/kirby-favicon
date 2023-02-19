# Kirby Favicon

## Setup

1. Install plugin
2. Add `favicon.png` and `favicon.svg` inside `/assets/favicon/`

For `favicon.png` use a filesize of at least `180x180px`, but if you can, just do `1024x1024px` and you‘re good for every case.

For further control you could also add a specific app icons for Apple or Android, just have a look at the options.

## Options

```php
return [
    'moritzebeling.kirby-favicon' => [
        'color' => '#0000ff',
        'extended' => false,
        'favicon' => [
            'png' => 'assets/favicon/favicon.png', // required
            'ico' => 'assets/favicon/favicon.ico', // fallback: favicon.png
            'svg' => 'assets/favicon/favicon.svg',
            'sizes' => [ 32, 96, 16, 180 ],
        ],
        'mask' => 'assets/favicon/mask.svg', // fallback: favicon.svg
        'app' => [
            'icon' => 'assets/favicon/app-icon.png', // fallback: favicon.png
            'sizes' => [ 180, 167, 152 ]
        ],
        'manifest' => [
            'icon' => 'assets/favicon/android-icon.png', // fallback: favicon.png
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
            'icon' => 'assets/favicon/ms-tile.png', // fallback: favicon.png
            'sizes' => [ 70, 150, 310 ]
        ],
    ]
];
```

## manifest.json

You can add other values according to the [specification](https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/manifest.json).