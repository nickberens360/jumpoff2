<!-- components/blocks/block-image-row.php -->
<?php

$name = "block-image-row";
$id = $name.'-'. $block['id'];
$className = $name;


?>


<?php include( locate_template( '/block-parts/opening.php', false, false ) ); ?>

        <div class="imgRow">

            <?php if (have_rows('images')): ?>
                <?php while (have_rows('images')) : the_row();

                    $img = get_sub_field('image');
                    $imgSrc = $img["sizes"]["medium"];
                    $link = get_sub_field('link');
                    if ($link) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        $open = '<a href="' . $link_url . '" class="imgRow__img" target="' . $link_target . '">';
                        $close = '</a>';
                    } else {
                        $open = '<div class="imgRow__img">';
                        $close = '</div>';
                    }
                    ?>
                    <div class="imgRow__item">
                        <?= $open ?>
                        <img src="<?= $imgSrc ?>">
                        <?= $close ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

<?php include( locate_template( '/block-parts/closing.php', false, false ) ); ?>

<?php include( locate_template( '/block-parts/settings.php', false, false ) ); ?>

<style>
    #<?= $id ?> .imgRow__item {
         <?= acf_build_style('images_width', 'max-width', 'px'); ?>
    }
</style>

