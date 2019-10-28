<!-- components/blocks/block-testimonial.php -->

<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
//var_dump($block['keywords'][0]);

$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 295;



?>

<?php include( locate_template( '/block-parts/opening.php', false, false ) ); ?>

    <blockquote class="testimonial-blockquote">
        <span class="testimonial-text"><?= $text; ?> </span>
        <span class="testimonial-author"><?= $author; ?></span>
        <span class="testimonial-role"><?= $role; ?></span>
    </blockquote>
    <div class="testimonial-image">
        <?= wp_get_attachment_image( $image, 'full' ); ?>
    </div>
<?php include( locate_template( '/block-parts/settings.php', false, false ) ); ?>

<?php include( locate_template( '/block-parts/closing.php', false, false ) ); ?>