<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Response;

Kirby::plugin('moritzebeling/kirby-favicon',[

    'options' => [
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
    ],

    'snippets' => [
        'favicon' => __DIR__ . '/snippets/favicon.php',
        'favicon/browserconfig' => __DIR__ . '/snippets/browserconfig.php',
    ],

    'routes' => [
        [
            'pattern' => 'favicon.ico',
            'action'  => function () {

                $ico = asset( option('moritzebeling.kirby-favicon.favicon.ico') );
                if( $ico->exists() ){
                    return new Response($ico->read(), 'image/x-icon');
                }

                $png = asset( option('moritzebeling.kirby-favicon.favicon.png') );
                if( $png->exists() ){
                    $png = $png->resize( 32 );
                    return new Response($png->read(), 'image/png');
                }
                
            }
        ],
        [
            'pattern' => [
                'apple-touch-icon.png',
                'apple-touch-icon-precomposed.png',
                'apple-touch-icon-(:num).png',
                'apple-touch-icon-(:num)-precomposed.png',
            ],
            'action'  => function ( $size = 180 ) {

                $allowed = [ 16, 32, 48, 58, 80, 120, 128, 152, 157, 167, 180, 192, 196 ];

                if( !in_array( $size, $allowed ) ){
                    go('/apple-touch-icon-precomposed.png');
                }

                $icon = asset( option('moritzebeling.kirby-favicon.app.icon') );
                $icon = $icon->exists() ? $icon : asset( option('moritzebeling.kirby-favicon.favicon.png') );

                if( $icon->exists() ){
                    $icon = $icon->resize( $size );
                    return new Response($icon->read(), 'image/png');
                }
                
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