<?php

function wb_block_category( $categories ) {

        $wisnet_blocks = array_merge(
            $categories,
            array(
                array(
                    'slug' => 'wisnet',
                    'title' => __( 'wisnet Blocks', 'wisnet-blocks' ),
                )
            ),
            array(
                array(
                    'slug' => 'wisnet-footer',
                    'title' => __( 'wisnet Footers', 'wisnet-footer' ),
                )
            ),
            array(
                array(
                    'slug' => 'wisnet-global-ui',
                    'title' => __( 'wisnet Global UI', 'wisnet-global-ui' ),
                )
            ),
            array(
                array(
                    'slug' => 'wisnet-navigation',
                    'title' => __( 'wisnet Headers', 'wisnet-navigation' ),
                )
            ),
            array(
                array(
                    'slug' => 'wisnet-banners',
                    'title' => __( 'wisnet Banner', 'wisnet-banners' ),
                )
            )

        );


    return $wisnet_blocks;
}
add_filter( 'block_categories', 'wb_block_category', 10, 2);






const iconArgs = array(
    'background' => '#f1f2f3',
    'foreground' => '#f37121',
    'src' => 'screenoptions',
);


function register_acf_block_types()  {

    // register a small footer block.
    acf_register_block_type(array(
        'name'              => 'footer-small',
        'title'             => __('Footer Small'),
        'description'       => __('A basic small footer'),
        'render_template'   => 'components/blocks/block-footer-small.php',
        'category'          => 'wisnet-footer',
        'icon' => iconArgs,
        'keywords'          => array( 'footer', 'footer small' ),
    ));

    acf_register_block_type(array(
        'name'              => 'block-header-bar',
        'title'             => __('Header Bar'),
        'description'       => __('A basic header bar'),
        'render_template'   => 'components/blocks/block-header-bar.php',
        'category'          => 'wisnet-navigation',
        'icon' => iconArgs,
        'keywords'          => array( 'Header', 'Basic header bar' ),
    ));



    acf_register_block_type(array(
        'name'              => 'block-toggleNav',
        'title'             => __('Toggle Nav'),
        'description'       => __('Nav is hidden by default'),
        'render_template'   => 'components/blocks/block-toggleNav.php',
        'category'          => 'wisnet-navigation',
        'icon' => iconArgs,
        'keywords'          => array( 'Navigation', 'Toggle', 'Nav' ),
        'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/block-toggleNav/block-toggleNav.js'
    ));

    // register a dynamic typing banner block.
    acf_register_block_type(array(
        'name'              => 'dynamic-type',
        'title'             => __('Dynamic Typing Block'),
        'description'       => __('Banner with large background image and dynamic typing effect.'),
        'render_template'   => 'components/blocks/block-dynamic-type.php',
        'category'          => 'wisnet-banners',
        'icon' => iconArgs,
        'keywords'          => array( 'banner', 'typing', 'type' ),
    ));

    // register a social media typing banner block.
    acf_register_block_type(array(
        'name'              => 'social-media',
        'title'             => __('Social Media Block'),
        'description'       => __('Social media icons with heading and content.'),
        'render_template'   => 'components/blocks/block-social.php',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Social Media'),
    ));


    acf_register_block_type(array(
        'name'              => 'block-recent-posts',
        'title'             => __('Recent Posts'),
        'description'       => __('Recent Posts.'),
        'render_template'   => 'components/blocks/block-recent-posts',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Recent Posts'),
    ));



    acf_register_block_type(array(
        'name'              => 'call-out',
        'title'             => __('Call Out Block'),
        'description'       => __('Simple callout block.'),
        'render_template'   => 'components/blocks/block-call-out.php',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Content', 'Call out', 'Callout'),
    ));

    acf_register_block_type(array(
        'name'              => 'mailchimp',
        'title'             => __('Mailchimp Form'),
        'description'       => __('Add a Mailchimp form with a title.'),
        'render_template'   => 'components/blocks/block-mailchimp.php',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Sign up', 'Mailchimp', 'Form'),
    ));

    acf_register_block_type(array(
        'name'              => 'imagerow',
        'title'             => __('Image Row'),
        'description'       => __('Simple row of images witha heading.'),
        'render_template'   => 'components/blocks/block-image-row.php',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Image', 'Image Row'),
    ));

    acf_register_block_type(array(
        'name'              => 'stats',
        'title'             => __('Stat Block'),
        'description'       => __('Block with stats and description.'),
        'render_template'   => 'components/blocks/block-stats.php',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Stats', 'Statistics'),
    ));

    acf_register_block_type(array(
        'name'              => 'typography',
        'title'             => __('Typography'),
        'description'       => __('Chose the body and heading typography.'),
        'render_template'   => 'components/blocks/block-typography.php',
        'category'          => 'wisnet-global-ui',
        'icon' => iconArgs,
        'keywords'          => array( 'Fonts', 'Google Fonts'),
    ));

    acf_register_block_type(array(
        'name'              => 'block-link-bar',
        'title'             => __('Link Bar'),
        'description'       => __('A list of links.'),
        'render_template'   => 'components/blocks/block-link-bar.php',
        'category'          => 'wisnet',
        'icon' => iconArgs,
        'keywords'          => array( 'Links', 'Navigation'),
        'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/block-link-bar/block-link-bar.js'
    ));

    acf_register_block_type(array(
        'name'              => 'block-banner',
        'title'             => __('Banner'),
        'description'       => __('Banner with solid color or image options.'),
        'render_template'   => 'components/blocks/block-banner.php',
        'category'          => 'wisnet-banners',
        'icon' => iconArgs,
        'keywords'          => array( 'Banner'),
    ));








}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}