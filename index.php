<?php

use Kirby\Cms\App as Kirby;
use Kirby\Filesystem\F;
use Kirby\Cms\Response;

Kirby::plugin('moritzebeling/kirby-favicon',[

    'options' => [
        'color' => '#0000ff',
        'favicon' => [
            'png' => 'assets/favicon/favicon.png', // required
            'ico' => 'assets/favicon/favicon.ico',
            'svg' => 'assets/favicon/favicon.svg',
            'sizes' => [ 32, 96, 16 ],
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
    ],

    'snippets' => [
        'favicon/browserconfig' => __DIR__ . '/snippets/browserconfig.php',
    ],

    'routes' => [
        [
            'pattern' => 'favicon.ico',
            'action'  => function () {
                $dir = kirby()->option('moritzebeling.kirby-favicon.directory');
                $file = F::exists( $dir . '/favicon.ico' ) ? $dir . '/favicon.ico' : $dir . '/favicon.png';
            }
        ],
        [
            'pattern' => 'manifest.json',
            'action'  => function () {

                $icons = [
                    option('moritzebeling.kirby-favicon.manifest.icon'),
                    option('moritzebeling.kirby-favicon.favicon.png')
                ];
                foreach( $icons as $i ){
                    $icon = asset( $i );
                    if( $icon->exists() ) break;
                }

                $json = array_merge([
                    'name' => (string)kirby()->site()->title(),
                    'theme_color' => option('moritzebeling.kirby-favicon.color'),
                    'display' => 'standalone',
                    'icons' => []
                ],option('moritzebeling.kirby-favicon.manifest', []));

                $sizes = $icon->exists() ? option('moritzebeling.kirby-favicon.manifest.sizes', []) : [];

                foreach( $sizes as $size => $density ){
                    $json['icons'][] = [
                        'src' => $icon->resize($size)->url(),
                        'sizes' => $size . 'x' . $size,
                        'type' => 'image/png',
                        'density' => $density ? $density : null
                    ];
                }

                unset( $json['icon'] );
                unset( $json['sizes'] );

                return $json;
            }
        ],
        [
            'pattern' => 'browserconfig.xml',
            'action'  => function () {

                $icons = [
                    option('moritzebeling.kirby-favicon.browserconfig.icon'),
                    option('moritzebeling.kirby-favicon.favicon.png')
                ];
                foreach( $icons as $i ){
                    $icon = asset( $i );
                    if( $icon->exists() ) break;
                }

                $xml = snippet('favicon/browserconfig', [
                    'sizes' => $icon->exists() ? option('moritzebeling.kirby-favicon.browserconfig.sizes', []) : [],
                    'icon' => $icon,
                    'color' => option('moritzebeling.kirby-favicon.color'),
                ], true);

                return new Response($xml, 'application/xml');
            }
        ]
    ]

]);