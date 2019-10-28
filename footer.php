
<?php
if (!is_tax('ui_type')) {
    query_global_ui(array(
        'post_type' => 'global_ui',
        'ui_type' => 'footer',
        'meta_key' => 'make_active',
        'meta_value' => true
    ));
}
?>



<?php wp_footer(); ?>


  </body>
</html>