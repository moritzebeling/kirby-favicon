<?php

$minimalist = $minimalist ?? option('moritzebeling.kirby-favicon.minimalist', false);
$extended = $extended ?? option('moritzebeling.kirby-favicon.extended', false);

$svg = asset( option('moritzebeling.kirby-favicon.favicon.svg') );
$png = asset( option('moritzebeling.kirby-favicon.favicon.png') );
$app = asset( option('moritzebeling.kirby-favicon.app.icon') );
$mask = asset( option('moritzebeling.kirby-favicon.mask') );
$color = option('moritzebeling.kirby-favicon.color');

$tags = $tags ?? [];

/* svg */

if( $svg->exists() ){
    $url = $svg->mediaUrl();
    $tags[] = "<link rel='icon' type='image/svg+xml' href='$url'>";
}
    
/* png */

if( $png->exists() ){

    foreach( option('moritzebeling.kirby-favicon.favicon.sizes', []) as $size ){
        if( $minimalist || $size === 180 ){ continue; }
        $url = $png->resize( $size )->url();
        $s = $size . 'x' . $size;
        $tags[] = "<link rel='icon' type='image/png' sizes='$s' href='$url'>";
    }

    $url = $png->resize( 180 )->url();
    $tags[] = "<link rel='alternate icon' type='image/png' href='$url'>";

}

/* apple touch icon */

$app = $app->exists() ? $app : $svg;
if( $app->exists() ){

    $url = $png->resize( 180 )->url();
    $tags[] = "<link rel='apple-touch-icon' type='image/png' href='$url'>";
    
    foreach( option('moritzebeling.kirby-favicon.app.sizes', []) as $size ){
        if( $minimalist || $size === 180 ){ continue; }
        $url = $png->resize( $size )->url();
        $s = $size . 'x' . $size;
        $tags[] = "<link rel='apple-touch-icon' type='image/png' sizes='$s' href='$url'>";
    }

}

/* theme color */

if( $color ){
    $tags[] = "<meta name='theme-color' content='$color'>";
}

/* safari pinned tab */

$mask = $mask->exists() ? $mask : $svg;
if( $mask->exists() ){
    $url = $mask->mediaUrl();
    $c = $color ?? '#ffffff';
    $tags[] = "<link rel='mask-icon' href='$url' color='$c'>";
}

/*
extended
    manifest.json
    browserconfig.xml
*/

if( $extended ){

    $tags[] = "<link rel='manifest' href='/manifest.json'>";
    $tags[] = "<meta name='msapplication-config' content='/browserconfig.xml'>";

    if( $color ){
        $tags[] = "<meta name='msapplication-TileColor' content='$color'>";
    }

    $tile = asset( option('moritzebeling.kirby-favicon.browserconfig.icon') );
    $tile = $tile->exists() ? $tile : $png;

    if( $tile->exists() ){
        $url = $tile->resize( 144 )->url();
        $tags[] = "<meta name='msapplication-TileImage' content='$url'>";
    }

}

echo implode('',$tags);