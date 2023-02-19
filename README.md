# Kirby Favicon

## Options

```php
return [
    'moritzebeling.kirby-favicon' => [
        'icons' => [
            'png' => 'assets/favicon/favicon.png', // required
            'ico' => 'assets/favicon/favicon.ico',
            'svg' => 'assets/favicon/favicon.svg',
            'app-icon' => 'assets/favicon/app-icon.png',
            'ms-tile' => 'assets/favicon/ms-tile.png',
        ],
        'sizes' => [
            32,
            96,
            16
        ],
        'color' => '#0000ff',
        'background' => '#000000',
    ]
];
```

## browserconfig.xml

If you don’t provide a specific icon at `assets/favicon/ms-tile.png`, it will fall back to the `png` version.