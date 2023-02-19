<?php

use Kirby\Cms\App as Kirby;
use Kirby\Filesystem\F;

Kirby::plugin('moritzebeling/kirby-favicon',[

    'options' => [
        'sizes' => [
            32,
            96,
            16
        ],
        'color' => '#0000ff',
        'background' => '#000000',
    ],

    'routes' => [
        [
            'pattern' => 'favicon.ico',
            'action'  => function () {
                $dir = kirby()->option('moritzebeling.kirby-favicon.directory');
                $file = F::exists( $dir . '/favicon.ico' ) ? $dir . '/favicon.ico' : $dir . '/favicon.png';
            }
        ]
    ]

]);