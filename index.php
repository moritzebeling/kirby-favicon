<?php

use Kirby\Cms\App as Kirby;
use Kirby\Filesystem\F;
use Kirby\Cms\Response;

Kirby::plugin('moritzebeling/kirby-favicon',[

    'options' => [
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
            'pattern' => 'browserconfig.xml',
            'action'  => function () {

                $icon = asset( option('moritzebeling.kirby-favicon.icons.ms-tile') );
                $icon = $icon->exists() ? $icon : asset( option('moritzebeling.kirby-favicon.icons.png') );

                $content = snippet('favicon/browserconfig', [
                    'sizes' => $icon->exists() ? [
                        70,
                        150,
                        310
                    ] : [],
                    'icon' => $icon,
                    'color' => option('moritzebeling.kirby-favicon.color'),
                ], true);

                return new Response($content, 'application/xml');
            }
        ]
    ]

]);