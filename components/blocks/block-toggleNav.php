<!-- components/blocks/block-toggleNav.php -->
<?php

$id =  $block['id'];

$navId = get_field('toggle_nav_menu_select');
$menu_object = wp_get_nav_menu_object( $navId );
$menuSlug = $menu_object->slug;

$useSocial = get_field('add_social_media');


?>

<div class="header-toggleNav" data-position="fixed-absolute">


    <a href="<?= get_home_url() ?>" class="header-toggleNav__logo"><img src="<?php the_field('logo_one', 'option'); ?>"></a>

    <div id="<?= $id ?>" class="block-toggleNav">
    <div class="toggleMenuWrap">
        <a href="#" class="toggleMenu__trigger js-toggleMenu-trigger"><i class="fas fa-bars"></i></a>

        <?php if ($useSocial) { ?>
        <div class="block-toggleNav-social">
            <h3 class="block-toggleNav-social__heading">Spread the word</h3>
            <div class="block-toggleNav-social__inner">
            <?php if( have_rows('social_links', 'option') ): ?>
                <?php  while ( have_rows('social_links', 'option') ) : the_row(); ?>
                    <a style="color: <?php the_sub_field('icons_color')?>;" href="<?php the_sub_field('link')?>" target="_blank"><?php the_sub_field('icon')?></a>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
        <?php } ?>


        <?php
        wp_nav_menu( array(
                'menu'              => $menuSlug,
                'depth'             => 2,
                'container'         => '',
                'menu_class'        => 'toggleNav grid-row',
                'fallback_cb'       => 'Clean_Walker_Nav::fallback',
                'walker'            => new Clean_Walker_Nav())
        );
        ?>
    </div>
</div>

</div>



<style>

    #<?= $id ?> .toggleMenu__trigger {
        <?= acf_build_style('toggle_nav_trigger_color', 'color', false); ?>
        <?= acf_build_style('nav_trigger_font_size', 'font-size', 'px'); ?>
    }

    #<?= $id ?> .toggleMenuWrap {
        <?= acf_build_style('toggle_nav_background_color', 'background-color', false); ?>
    }

    #<?= $id ?>.block-toggleNav:after {
        <?= acf_build_style('toggle_nav_overlay_color', 'background-color', false); ?>
    }

    #<?= $id ?> .toggleMenuWrap ul a {
        <?= acf_build_style('toggle_nav_link_color', 'color', false); ?>
    }

    #<?= $id ?> .toggleMenuWrap ul a:hover {
        <?= acf_build_style('toggle_nav_link_hover_color', 'color', false); ?>
    }

    #<?= $id ?> .toggleMenuWrap ul a {
        <?= acf_build_style('toggle_nav_link_font_size', 'font-size', 'px'); ?>
    }


</style>



