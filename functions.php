<?php
/**
 * Path to Atomic docs
 */
define('ATOMIC', __DIR__ . '/components/');
/**
 * Path to Atomic organism directory
 */
define('ATOMIC_ORGANISM', ATOMIC . 'organisms');
/**
 * Path to Atomic molecule directory
 */
define('ATOMIC_MOLECULES', ATOMIC . 'molecules');
/**
 * Path to Atomic atom directory
 */
define('ATOMIC_ATOM', ATOMIC . 'atoms');
/**
 * Path to Atomic sidebars directory
 */
define('ATOMIC_SIDEBARS', ATOMIC . 'sidebars');
/**
 * Path to Atomic sidebars directory
 */
define('ATOMIC_PAGE', ATOMIC . 'pages');

define('TEMPLATE_PATH', get_template_directory());


function theme_js()
{
    wp_register_script('site', get_template_directory_uri() . '/js/min/site.min.js', array('jquery'), '', true);

    wp_enqueue_script('site');
}

add_action('wp_enqueue_scripts', 'theme_js');

function parent_blocks()
{
    wp_register_style('parent_wp_admin_css', get_template_directory_uri() . '/css/gutenberg.css', false, '1.0.0');
    wp_enqueue_style('parent_wp_admin_css');
}

add_action('admin_enqueue_scripts', 'parent_blocks');







add_theme_support( 'align-wide' );


//Register support for custom menu
add_theme_support('menus');

//Register support for widgets
add_theme_support('widgets');


add_theme_support('title-tag');


add_theme_support('post-thumbnails');

/**
 * Custom var_dump
 *
 * @param mixed takes N args
 */
function v() {
    if (function_exists('xdebug_get_code_coverage')) {
        foreach (func_get_args() as $arg) {
            var_dump($arg);
        }
    }
    else {
        foreach (func_get_args() as $arg) {
            echo '<pre>';
            var_dump($arg);
            echo '</pre>' . "\n";
        }
    }
}

/**
 * Custom print_r
 *
 * @param mixed takes N args
 */
function p() {
    foreach (func_get_args() as $arg) {
        echo '<pre>';
        print_r($arg);
        echo '</pre>' . "\n";
    }
}

/**
 * Quick debug output
 *
 * @param mixed takes N args
 */
function d() {
    foreach (func_get_args() as $arg) {
        echo '<pre>';
        echo(!is_string($arg) ? var_export($arg) : $arg);
        echo '</pre>' . "\n";
    }
}

/**
 * Give a variable to be accessed globally
 *
 * @param $name The name of the variable (how it will also be "retrieved"
 * @param $value The value to be assigned
 */
if (!function_exists('give')) {
    function give($name, $value)
    {
        $GLOBALS[$name] = $value;
        if ($value === null) {
            unset($GLOBALS[$name]);
        }
    }
}
/**
 * Receive a value of a variable previously set using give();
 *
 * @param $name The name of the variable to be retrieved
 * @param $default The default value to return if index is not set
 *
 * @return mixed|null returns the value of the variable called, else null if it is not set
 */
if (!function_exists('receive')) {
    function receive($name, $default = null)
    {
        return (isset($GLOBALS[$name]) ? $GLOBALS[$name] : $default);
    }
}

require_once('dropit_walker.php');


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Logos',
        'menu_title' => 'Logos',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Social Media',
        'menu_title' => 'Social Media',
        'parent_slug' => 'theme-general-settings',
    ));

}


add_action('admin_bar_menu', 'toolbar_link_to_atomic_docs', 999);

function toolbar_link_to_atomic_docs($wp_admin_bar)
{
    $theme = get_option('stylesheet');
    $args = array(
        'id' => 'atomic_docs',
        'title' => 'Atomic Docs',
        'href' => '/wp-content/themes/' . $theme . '/atomic-core',
        'meta' => array(
            'class' => 'my-toolbar-page',
            'target' => 'atomic-docs',
        ),
    );
    $wp_admin_bar->add_node($args);
}


//include 'json_sync_acf_fields.php';

include 'block-registry/blocks-registry.php';




include TEMPLATE_PATH.'/global-ui/typography.php';
include TEMPLATE_PATH.'/includes/acf-helpers.php';


/**
 * @param null $acf_field
 * @param null $property
 * @param null $propertyType
 * @param null $suffix
 * @param null $raw
 * @return bool|string
 */

function build_style($acf_field = null, $property = null, $propertyType = null, $suffix = null, $raw=null) {

    if($raw == true) {
        $field = $acf_field;
    }
    else {
        $field = get_field($acf_field);
    }


    if ($field) {

        if($propertyType == 'image') {
            $rule = $property.': url("'.$field.'");';
            return  $rule;
        }
        else {
            $rule = $property.': '.$field .$suffix. ';';
            return  $rule;
        }

    }
    else {
        return false;
    }
}


/**
 * Returns the content for global ui elements such as the footer and header
 *
 * @param $args
 * @return bool
 */
function query_global_ui($args) {

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            the_content();
        }
        wp_reset_postdata();
        return true;
    }
    else {
        wp_reset_postdata();
        return false;
    }

}


/**
 * @param null $acf_field
 * @param null $preFix
 * @return bool|string
 */
function class_builder($acf_field=null, $preFix=null ) {
    $field = get_field($acf_field);
    if ($field) {
        $class = $preFix.'-'.$field;
        return $class;
    }
    else {
        return false;
    }
}



// Add to the body_class function
function condensed_body_class($classes) {
    global $post;

    // add a class for the name of the page - later might want to remove the auto generated pageid class which isn't very useful
    if( is_page()) {
        $pn = $post->post_name;
        $classes[] = "page_".$pn;
    }

    // add a class for the parent page name
    if ( is_page() && $post->post_parent ) {
        $post_parent = get_post($post->post_parent);
        $parentSlug = $post_parent->post_name;
        $classes[] = "parent_".$parentSlug;
    }

    // add class for the name of the custom template used (if any)
    $temp = get_page_template();
    if ( $temp != null ) {
        $path = pathinfo($temp);
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace(".php", "", $tmp);
        $classes[] = "template_".$tn;
    }

    return $classes;

}

add_filter('body_class', 'condensed_body_class');


























