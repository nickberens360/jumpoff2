<!-- components/blocks/block-social.php -->

<?php

$name = "block-social";

$id = $name.'-'. $block['id'];
$className = $name;
?>



<?php include TEMPLATE_PATH.'/block-parts/opening.php'; ?>
        <div class="block-social__links">
            <?php if( have_rows('social_links', 'option') ): ?>
                <?php  while ( have_rows('social_links', 'option') ) : the_row(); ?>
                    <a style="color: <?php the_sub_field('icons_color')?>;" href="<?php the_sub_field('link')?>" target="_blank"><?php the_sub_field('icon')?></a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="block-social__footer">
            <?php the_field('social_footer'); ?>
        </div>
<?php include TEMPLATE_PATH.'/block-parts/closing.php'; ?>

<?php include TEMPLATE_PATH.'/block-parts/settings.php'; ?>

