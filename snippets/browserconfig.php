<?= '<?xml version="1.0" encoding="utf-8"?>'; ?>
<browserconfig>
    <msapplication>
        <tile>
            <?php foreach( $sizes as $size ):
                $i = $icon->resize($size);
                ?>
                <square<?= $size ?>x<?= $size ?>logo src="<?= $i->url() ?>" />
            <?php endforeach; ?>
            <TileColor><?= $color ?></TileColor>
        </tile>
    </msapplication>
</browserconfig>