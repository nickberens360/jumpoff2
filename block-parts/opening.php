<?php

$heading_align = get_field('heading_align');
$intro_align = get_field('intro_align');

$inner_align_class = null;
$heading_align_class = null;
$intro_align_class = null;

if (!empty($inner_align)) {
    $inner_align_class = 'block__inner-' . $inner_align;
}
if (!empty($heading_align)) {
    $heading_align_class = 'block__heading-' . $heading_align;
}
if (!empty($intro_align)) {
    $intro_align_class = 'block__intro-' . $intro_align;
}


?>

<section class="block <?= esc_attr($className); ?>" id="<?= esc_attr($id); ?>">


    <div class="block__inner">
        <?php if (get_field('heading_text')) { ?>
            <h2 class="block__heading <?= $heading_align_class ?>"><?php the_field('heading_text'); ?></h2>
        <?php } ?>
        <?php if (get_field('intro_content')) { ?>
            <div class="block__intro <?= $intro_align_class ?>"><?php the_field('intro_content'); ?></div>
        <?php } ?>
