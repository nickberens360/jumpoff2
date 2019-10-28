<!-- components/blocks/block-footer-small.php -->

<div class="block-footer-small">
    <?php the_field('footer_small_content'); ?>
</div>

<style>
    .block-footer-small {
         <?= acf_build_style('footer_small_background_color', 'background-color', false); ?>
    }
</style>

