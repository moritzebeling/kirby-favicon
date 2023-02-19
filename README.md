# Kirby Favicon

## Options

```php
return [
    'moritzebeling.kirby-favicon' => [
        'color' => '#0000ff',
        'extended' => true,
        'favicon' => [
            'png' => 'assets/favicon/favicon.png', // required
            'ico' => 'assets/favicon/favicon.ico',
            'svg' => 'assets/favicon/favicon.svg',
            'sizes' => [ 32, 96, 16, 180 ],
        ],
        'mask' => 'assets/favicon/mask.svg',
        'app' => [
            'icon' => 'assets/favicon/app-icon.png',
            'sizes' => [ 180, 167, 152 ]
        ],
        'manifest' => [
            'icon' => 'assets/favicon/android-icon.png',
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
            'icon' => 'assets/favicon/ms-tile.png',
            'sizes' => [
                70,
                150,
                310
            ]
        ],
    ]
];
```

## favicon.ico

If you don’t provide a specific icon at `/favicon.ico` or `assets/favicon/favicon.ico`, it will fall back to the `png` version.

## apple-touch-icon

Will fall back to the `png` favicon if provided.

## mask-icon for Safari pinned tabs

Will fall back to the `svg` version if provided.

## manifest.json

If you don’t provide a specific icon at `assets/favicon/android-icon.png`, it will fall back to the `png` version. You can add other values according to the [specification](https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/manifest.json).

## browserconfig.xml

If you don’t provide a specific icon at `assets/favicon/ms-tile.png`, it will fall back to the `png` version.