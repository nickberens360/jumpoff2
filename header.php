<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,700&display=swap" rel="stylesheet">

    <?php if (is_singular('global_ui')) {
        echo '<meta name="robots" content="noindex,nofollow">';
    } ?>


    <!--<script src="https://kit.fontawesome.com/c189e31f6d.js" crossorigin="anonymous"></script>-->


    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php include 'atomic-head.php'; ?>
    <?php wp_head(); ?>


    <style>
        <?php
        if(function_exists('global_ui_heading_styles')){
             global_ui_heading_styles(false);
        }
        if(function_exists('global_ui_body_styles')){
             global_ui_body_styles(false);
        }
        ?>
    </style>


    <!--<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/060ffb420f783dd77bad86ce2/1061b5f80a5c43eed57a6ef5c.js");</script>-->


</head>
<body <?php body_class(); ?>>

<?php
if (!is_tax('ui_type')) {
    query_global_ui(
        array(
            'post_type' => 'global_ui',
            'ui_type' => 'header',
            'meta_key' => 'make_active',
            'meta_value' => true
        )
    );
}
?>




























