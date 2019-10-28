<?php
acf_form_head();
get_header();


?>


<?php
$args = array(
    'post_type' => 'global_ui',
    'ui_type' => $term,
    'orderby' => 'menu_order title',
    'order' => 'ASC'
);
$query = new WP_Query($args);
?>
<?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post() ?>

        <div class="globalBox">
            <div class="globalBox__content">
                <p class="globalBox__name"><?php the_title() ?></p>
                <?php acf_form(); ?>
            </div>
                <?php the_content() ?>


        </div>

    <?php endwhile ?>
<?php endif ?>
<?php wp_reset_postdata(); ?>


<?php
get_footer();
?>


