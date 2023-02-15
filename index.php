<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('moritzebeling/kirby-favicon',[

    'options' => [
        'directory' => 'assets/favicon',
        'sizes' => [
            16,
            32,
            48,
            64,
            96,
            128,
            144,
            180,
            192,
            256,
            512,
            1024
        ],
        'color' => '#0000ff',
        'background' => '#000000',
    ]

]);