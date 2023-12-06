<?php
// ---------------------------------------------------
// Load custom WordPress nav walker.   -
// --------------------------------------------------
if ( ! class_exists( 'mywptheme_navwalker' )) {
    require_once(get_template_directory() . '/inc/mywptheme_navwalker.php');
}



// ---------------------------------------------------
// Scripts section    -
// --------------------------------------------------
function mywptheme_scripts()
{
// ---------------------------------------------------
// load Bootstrap css, theme  css conditionally    -
// --------------------------------------------------

    if (!is_admin()) {
        wp_enqueue_style('mywptheme-style', get_template_directory_uri().'/style.css', array(), '1.0', false);
        //load Bootstrap Css
        wp_enqueue_style('mywptheme-bootstrap', get_template_directory_uri().'/inc/assets/css/bootstrap.css');
        // load theme styles
        wp_enqueue_style('mywptheme-style-main', get_template_directory_uri().'/inc/assets/css/mywptheme.css', array(),
            '1.0', false);
    }


// ---------------------------------------------------
// load Bootstrap Jquery, Theme Jquery conditionally    -
// --------------------------------------------------

    if (!is_admin()) {

        wp_enqueue_script('mywptheme-jquery-js', get_template_directory_uri().'/inc/assets/js/bootstrap.js', array());

        wp_enqueue_script('mywptheme-bootstrap-js', get_template_directory_uri().'/inc/assets/jquery.js', array());


    }
}

add_action('wp_enqueue_scripts', 'mywptheme_scripts');


// ---------------------------------------------------
// Menu  section    -
// --------------------------------------------------

function mywptheme_setup()
{
    register_nav_menus(array('primary' => ('primary')));
}

add_action('after_setup_theme', 'mywptheme_setup');
