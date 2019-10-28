<!-- components/blocks/block-banner.php -->

<?php

$id = $block['id'];
$heading = get_field('banner_heading') ?: get_the_title() ?: 'Placeholder';
$term = get_queried_object();



if (!empty($term->name)) {
    $heading = $term->name;
}



$subHeading = get_field('banner_sub_heading');
$bgSelected = get_field('select_solid_color_or_image_for_the_background');
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>



<div id="<?= $id ?>" class="banner <?= class_builder('banner_text_color', 'banner') ?> <?= $align_class ?>">
    <div class="banner__inner">
        <h1 class="banner__heading"><?= $heading ?></h1>
        <div class="banner__sub"><?= $subHeading ?></div>

        <?php if (have_rows('banner_buttons')): ?>
            <div class="btnRow">
                <?php while (have_rows('banner_buttons')) : the_row(); ?>
                    <?php
                    $link = get_sub_field('button');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="btns btns-1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>


    </div>
</div>

<style>
  #<?= $id ?>.banner {
  <?= acf_build_style('banner_height', 'height', false, 'vh'); ?>
  <?php if ($bgSelected == 'color') { ?>
  <?= acf_build_style('banner_background_color', 'background-color', false, false); ?>
  <?php } ?>
  <?php if ($bgSelected == 'image') { ?>
  <?= acf_build_style('banner_background_image', 'background-image', 'image', false); ?>
  <?= acf_build_style('banner_background_size', 'background-size', false, false); ?>
  <?= acf_build_style('banner_background_position', 'background-position', false, false); ?>
  <?php } ?>}

  <?php if(get_field('banner_background_overlay')) { ?>
  #<?= $id ?>.banner::after {
   <?= acf_build_style('banner_background_overlay', 'background', false, false); ?>
   }
  <?php } ?>

  <?php if(get_field('banner_custom_color')) { ?>
  #<?= $id ?>.banner .banner__heading, #<?= $id ?>.banner .banner__sub   {
   <?= acf_build_style('banner_custom_color', 'color', false, false); ?>
   }
  <?php } ?>


</style>
