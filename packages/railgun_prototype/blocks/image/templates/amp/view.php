<?php defined('C5_EXECUTE') or die("Access Denied.");

if (is_object($f) && $f->getFileID()) {
    if ($maxWidth > 0 || $maxHeight > 0) {
        $crop = false;

        $im = Core::make('helper/image');
        $thumb = $im->getThumbnail($f, $maxWidth, $maxHeight, $crop);

        $tag = new \HtmlObject\Image();
        $tag->src($thumb->src)->width($thumb->width)->height($thumb->height);
    } else {
        $image = Core::make('html/image', [$f]);
        $tag = $image->getTag();
    }

    $tag->addClass('ccm-image-block img-responsive bID-'.$bID);
    if ($altText) {
        $tag->alt(h($altText));
    } else {
        $tag->alt('');
    }

    if ($title) {
        $tag->title(h($title));
    }

    //if ($linkURL) {
    //    echo '<a href="'.$linkURL.'">';
    //}

    //echo $tag;

    //if ($linkURL) {
    //    echo '</a>';
    //}
} elseif ($c->isEditMode()) {
    ?>
    <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Image Block.') ?></div>
    <?php
}
    //Get file by id
    $img = File::getByID($fID);
    $src = $img->getVersion()->getRelativePath();
    $width = $maxWidth;
    $height = $maxHeight;
    ?>
    <noscript>
    <img src="<?php echo $src; ?>" width="<?php echo $width;?>" height="<?php echo $height?>"></img>
    </noscript>
    <amp-img src="<?php echo $src; ?>" width="<?php echo $width;?>" height="<?php echo $height?>" layout="responsive"></amp-img>

<?php if (is_object($foS)): ?>

<?php
endif;
