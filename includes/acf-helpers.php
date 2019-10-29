<?php

/**
 * @param null $postType
 * @param null $postName
 * @param null $blockName
 * @return mixed
 */
function get_acf_block($postType=null, $postName=null, $blockName=null) {

    $args = array(
        'post_type' => $postType,
        'name' => $postName
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $blockContent = get_the_content();
        }

    }
    wp_reset_postdata();

    $blocks  = parse_blocks($blockContent);
    $collect = array();


    foreach($blocks as $block){


        acf_setup_meta( $block['attrs']['data'], $block['attrs']['id'], true );

        $fields = get_fields();

        $collect[$block['attrs']['id']] = $fields;

        $blockId = $block['attrs']['id'];

        acf_reset_meta( $blockId );

    }
    return $collect[$blockId][$blockName];
}

add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths = array(get_template_directory() . '/acf-json');

    if (is_child_theme()) {
        $paths[] = get_stylesheet_directory() . '/acf-json';
    }

    return $paths;
});


/**
 * @param null $content
 * @param null $blockName
 * @return bool
 */
function block_exists($content=null, $blockName=null ) {

    $blocks  = parse_blocks($content);

    foreach($blocks as $block){
        acf_setup_meta( $block['attrs']['data'], $block['attrs']['id'], true );

        if ('acf/'.$blockName == $block["blockName"]) {
            /*acf_reset_meta( $block['attrs']['id'] );*/
            return true;
        }
        else {
            /*acf_reset_meta( $block['attrs']['id'] );*/
            return false;
        }

    }
}

function get_video_id($field) {
    $video = get_field( $field );

    preg_match('/src="(.+?)"/', $video, $matches_url );
    $src = $matches_url[1];

    preg_match('/embed(.*?)?feature/', $src, $matches_id );
    $id = $matches_id[1];
    $id = str_replace( str_split( '?/' ), '', $id );

    return $id;
}
