<!-- components/blocks/block-typography.php -->
<?php
//include TEMPLATE_PATH.'/global-ui/typography.php';

?>

<div class="block-typography">
    <p class="block-typography__body" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores, ducimus eligendi enim eum facilis hic incidunt iure maiores molestias nihil odit optio perspiciatis porro quae quas quisquam ut vel!</p>
</div>

<div>
    <?php if( have_rows('heading_styles') ): ?>
        <?php  while ( have_rows('heading_styles') ) : the_row();
            $headingItem = get_sub_field_object('heading_item');
            $value = $headingItem['value'];
            $label = $headingItem['choices'][ $value ];
        ?>
           <<?= $value ?> class="<?= $value ?>"><?= $label; ?></<?= $value ?>>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, dicta facere harum, illum in ipsam itaque labore, maxime minus obcaecati officiis porro quia saepe sapiente sunt suscipit tenetur! Ad, culpa.</p>

        <?php endwhile; ?>
    <?php endif; ?>
</div>



<style>
    <?= global_ui_body_styles(true); ?>
    <?= global_ui_heading_styles(true); ?>
</style>

