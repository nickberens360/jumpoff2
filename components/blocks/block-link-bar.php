<!-- components/blocks/block-link-bar.php -->

<?php
$name = "block-linkBar";
$id = $name.'-'. $block['id'];

?>


<!--<nav class='greedy'>
    <ul id="<?/*= $id */?> class='links block-linkBar'>
        <?php /*if( have_rows('link_bar_links') ): */?>
            <?php /* while ( have_rows('link_bar_links') ) : the_row(); */?>
                <?php
/*                $link = get_sub_field('link');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    */?>
                    <li><a href="<?php /*echo esc_url($link_url); */?>" target="<?php /*echo esc_attr($link_target); */?>"><?php /*echo esc_html($link_title); */?></a></li>
                <?php /*endif; */?>
            <?php /*endwhile; */?>
        <?php /*endif; */?>
    </ul>
    <button>MENU</button>
    <ul class='hidden-links hidden'></ul>
</nav>-->



<nav class="greedy">
<ul id="<?= $id ?>" class="block-linkBar links">
    <?php if( have_rows('link_bar_links') ): ?>
        <?php  while ( have_rows('link_bar_links') ) : the_row(); ?>
            <?php
            $link = get_sub_field('link');
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <li><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></li>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>
    <button>MORE</button>
    <ul class='hidden-links hidden'></ul>
</nav>


<style>
    #<?= $id ?> {
    <?= build_style('link_bar_background_color', 'background-color', false); ?>
    }
</style>