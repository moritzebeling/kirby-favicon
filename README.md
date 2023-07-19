# Kirby Favicon Plugin

This plugin will solve all your favicon worries :)

## Installation

```bash
composer require moritzebeling/kirby-favicon
```

Or download/clone this repo into `site/plugins` of your Kirby project.

## 🙃 Minimal setup

1. Inside `assets/favicon` add `favicon.png`

The icon should be square, min `180x180px`, but why don’t you just do `1024x1024px` :)

## 😎 Recommended setup

2. Also add a `favicon.svg`
3. Inside your HTML `<head>` element, include the `favicon` snippet:

```php
<?php snippet('favicon') ?>
```

If you want to use transparency in your favicon, you should additionally add an app icon.
The mask icon will be used in the MacBook Pro Touch Bar, so it should be simple and with transparent background.

If your website has a changing background color, you should set `color` to false, otherwise I recommend to set it to you primary background color.

## 🤓 Full configuration

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
        'color' => '#ffffff',
        
        // for minimal html output
        'minimalist' => false,
        
        // the following will ony be show when 'extended' is set to true
        'extended' => false,

        'manifest' => [
            'icon' => 'assets/favicon/android-icon.png', // fallback to favicon.png
            'background_color' => '#ffffff',
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

## 🤨 What will it do?

It will automatically serve the following routes:

- `favicon.ico`
- `apple-touch-icon.png` and all its versions like
    - `apple-touch-icon-precomposed.png`
    - `apple-touch-icon-167.png`
    - `apple-touch-icon-167-precomposed.png`
    - and whatever Safari feels like requesting
- `manifest.json`
- `browserconfig.xml`

Per default, the favicon snippet will print the following HTML:

```html
<link rel="icon" type="image/svg+xml" href="/media/.../favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/media/.../favicon-32x.png">
<link rel="icon" type="image/png" sizes="96x96" href="/media/.../favicon-96x.png">
<link rel="icon" type="image/png" sizes="16x16" href="/media/.../favicon-16x.png">
<link rel="alternate icon" type="image/png" href="/media/.../favicon-180x.png">
<link rel="apple-touch-icon" type="image/png" href="/media/.../favicon-180x.png">
<link rel="apple-touch-icon" type="image/png" sizes="167x167" href="/media/.../favicon-167x.png">
<link rel="apple-touch-icon" type="image/png" sizes="152x152" href="/media/.../favicon-152x.png">
<meta name="theme-color" content="#0000ff">
<link rel="mask-icon" href="/media/.../favicon.svg" color="#0000ff">
```

All sizes can be adjusted through the plugin settings.
When `minimalist` is set to `true`, all sizes are removed:

```html
<link rel="icon" type="image/svg+xml" href="/media/.../favicon.svg">
<link rel="alternate icon" type="image/png" href="/media/.../favicon-180x.png">
<link rel="apple-touch-icon" type="image/png" href="/media/.../favicon-180x.png">
<meta name="theme-color" content="#0000ff">
<link rel="mask-icon" href="/media/.../favicon.svg" color="#0000ff">
```

When `extended` option is `true`, the following is added:

```html
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-config" content="/browserconfig.xml">
<meta name="msapplication-TileColor" content="#0000ff">
<meta name="msapplication-TileImage" content="/media/.../favicon-144x.png">
```

## Panel Favicon

https://getkirby.com/docs/reference/system/options/panel#custom-panel-favicon

## Research

This solution is an intersection of what many existing Favion generators provide. You can have a look on my research in the repo wiki: https://github.com/moritzebeling/kirby-favicon/wiki

## Development

1. Install a fresh Kirby StarterKit
2. `cd site/plugins`
3. `git clone` this repo

Roadmap
- [ ] Make favicon changable from panel

## ☕️ Support

If you like this plugin, I would be glad if you would invite me for a coffee via [PayPal](http://more.moritzebeling.com/support)
If you have any ideas for further development or stumble upon any problems, please open an issue or PR. Thank you!

## Warranty

This plugin is work in progress and comes without any warranty. Use at your own risk.