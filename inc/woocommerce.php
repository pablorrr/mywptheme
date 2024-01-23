<?php
/**
 * Add WooCommerce support
 * */

/**
 *
 * Add custom CSS
 *  Taken from: https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 * Enqueue your own stylesheet
 */
function wp_enqueue_woocommerce_style()
{
    wp_register_style('css-woocommerce', get_template_directory_uri() . '/inc/assets/css/woocommerce.css');

    if (class_exists('woocommerce') && (is_woocommerce())) {
        wp_enqueue_style('css-woocommerce');
    }
}


add_action('wp_enqueue_scripts', 'wp_enqueue_woocommerce_style');

add_action('after_setup_theme', 'wptheme_woocommerce_support');

if (!function_exists('wptheme_woocommerce_support')) {
    /**
     * Declares WooCommerce theme support.
     */
    function wptheme_woocommerce_support()
    {
        add_theme_support('woocommerce');

        // Add New Woocommerce 3.0.0 Product Gallery support
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-slider');

    }
}


function wptheme_add_link_shop()
{

    if (!is_cart()) {
        echo '<a style="font-size:1.2em;" 
									href="' . esc_url(wc_get_page_permalink('cart')) . '" >' . __('Go to Cart page', 'wptheme') . '
								<i class="fa fa-shopping-cart"></i></a>';
    }
    if (!is_shop()) {
        echo '<a style="font-size:1.2em;"  
								href="' . esc_url(wc_get_page_permalink('shop')) . '" >' . __('Go to Shop page', 'wptheme') . '
								<i class="fa fa-shopping-bag"></i></a>';
    }

}

/*
 * Display shop link in product page with icon
 *
 */
add_action('woocommerce_after_single_product', 'wp_theme_display_shop_page_link', 5);

function wp_theme_display_shop_page_link()
{

    echo '<a style="font-size:1.2em;"  
								href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '" >Go to Shop page
								<i class="fa fa-shopping-bag"></i></a>';
}



/**
 * Dodaj ikonki WC
 */
if (!function_exists('is_plugin_active'))
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');

if (class_exists('woocommerce') && is_plugin_active('woocommerce/woocommerce.php')) {

    function my_wp_theme_font_awsome()
    {
        wp_enqueue_script('wptheme-fontawesome', get_template_directory_uri() . '/inc/assets/js/fontawesome/fontawesome-all.min.js', array());
        //fontawesome-V4
        wp_enqueue_script('wptheme-fontawesome-v4', get_template_directory_uri() . '/inc/assets/js/fontawesome/fa-v4-shims.min.js', array());
    }

    add_action('wp_enqueue_scripts','my_wp_theme_font_awsome');

    add_filter('wp_nav_menu_items', 'wptheme_custom_menu_item', 10, 2);


    add_filter('wp_nav_menu_items', 'wptheme_custom_menu_item', 10, 2);
    function wptheme_custom_menu_item($items, $args)
    {
        if ($args->theme_location == 'primary') {
            $items .= '<li class="nav-item menu-item">
                            <a  href="' . esc_url(wc_get_page_permalink('shop')) . '" >shop
                              <i class="fa fa-shopping-bag"></i>
                               </a>
                               </li>  
                             <li class="nav-item menu-item">
                            <a  href="'.esc_url(wc_get_page_permalink('cart')) .'" >cart
                                <i class="fa fa-shopping-cart"></i>
                                </a>
                                </li>
                       
                     
						 <li class="nav-item menu-item">
                            <a  href="'.esc_url(wc_get_page_permalink('myaccount')) .'" >account
                                 <i class="fa fa-user"></i>
                                </a>
                                 </li>
                                 	 <li class="nav-item menu-item">
                            <a  href="'.esc_url(wc_get_page_permalink('checkout')) .'" >checkout
                                 <i class="fa fa-user"></i>
                                </a>
                                 </li>';
        }
        return $items;
    }
}



 
