<!-- components/blocks/block-header-bar.php -->

<?php
$id =  $block['id'];

$navId = get_field('header_bar_menu');
$menu_object = wp_get_nav_menu_object( $navId );
$menuSlug = $menu_object->slug;

?>

<div id="<?= $id ?>" class="block-header-bar">
    <div class="block-header-bar__logo">
        <a href="<?= get_home_url() ?>"><img src="<?php the_field('logo_one', 'option'); ?>"></a>
    </div>



    <div class="block-header-bar__nav">
        <?php
        wp_nav_menu( array(
                'menu'              => $menuSlug,
                'depth'             => 2,
                'container'         => '',
                'menu_class'        => 'nav-row grid-row',
                'fallback_cb'       => 'Clean_Walker_Nav::fallback',
                'walker'            => new Clean_Walker_Nav())
        );
        ?>
        <a href="#" class="block-header-bar__trigger js-headerBar-trigger"><i class="fas fa-bars"></i></a>
    </div>

    <!--<a href="#" class="block-header-bar__trigger js-headerBar-trigger"><i class="fas fa-bars"></i></a>-->

</div>

<style>
    #<?= $id ?> {
    <?= build_style('header_bar_background_color', 'background-color', false); ?>
    }
</style>