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



// ---------------------------------------------
// remove WooCommerce css style when is unnecessary     -
// source: https://crunchify.com/how-to-stop-loading-woocommerce-js-javascript-and-css-files-on-all-wordpress-postspages/
// ---------------------------------------------


add_action('wp_enqueue_scripts', 'mywptheme_disable_woocommerce_loading_css_js');

function mywptheme_disable_woocommerce_loading_css_js()
{

    // Check if WooCommerce plugin is active
    if (function_exists('is_woocommerce')) {

        // Check if it's any of WooCommerce page
        if (!is_woocommerce() && !is_cart() && !is_checkout()) {

            ## Dequeue WooCommerce styles
            wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-smallscreen');

            ## Dequeue WooCommerce scripts
            wp_dequeue_script('wc-cart-fragments');
            wp_dequeue_script('woocommerce');
            wp_dequeue_script('wc-add-to-cart');

        }
    }
}

// ---------------------------------------------------
// Menu  section    -
// --------------------------------------------------

function mywptheme_setup()
{
    register_nav_menus(array('primary' => ('primary')));//rejestracja menu
    add_theme_support('post-thumbnails');//właczenie ikon miniatur
}

add_action('after_setup_theme', 'mywptheme_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package wptheme
 */
function mywptheme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mywptheme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'mywptheme' ),
        'before_widget' => '<div style="style="padding:15px;" id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'mywptheme' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'mywptheme' ),
        'before_widget' => '<div style="padding:15px;" id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'mywptheme' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wptheme' ),
        'before_widget' => '<div style="padding:15px;" id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'mywptheme' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wptheme' ),
        'before_widget' => '<div style="padding:15px;" id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mywptheme_widgets_init' );

/**
 * Create hyperlink to standard post archive
 */


function mywptheme_display_archive_link()
{//https://developer.wordpress.org/reference/functions/wp_get_archives/
    $args = array(
        'type' => 'monthly',
        'limit' => '',
        'format' => '',
        'before' => '<li class="list-group-item">',
        'after' => '</li>',
        'show_post_count' => false,
        'echo' => 1,
        'order' => 'DESC'
    );
    wp_get_archives($args);
}



require_once get_template_directory().'/inc/woocommerce.php';
