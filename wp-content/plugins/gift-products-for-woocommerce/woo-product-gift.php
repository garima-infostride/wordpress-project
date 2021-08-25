<?php
/**
*Plugin Name: Gift Products For Woocommerce
*Description: This plugin allows create product gift.
* Version: 1.0
* Author: Ocean Infotech
* Author URI: https://www.xeeshop.com
* Copyright: 2019
*/

if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('OCWG_PLUGIN_NAME')) {
  define('OCWG_PLUGIN_NAME', 'Woocommerce Gift Product');
}
if (!defined('OCWG_PLUGIN_VERSION')) {
  define('OCWG_PLUGIN_VERSION', '1.0.0');
}
if (!defined('OCWG_PLUGIN_FILE')) {
  define('OCWG_PLUGIN_FILE', __FILE__);
}
if (!defined('OCWG_PLUGIN_DIR')) {
  define('OCWG_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('OCWG_DOMAIN')) {
  define('OCWG_DOMAIN', 'ocwg');
}
if (!defined('OCWG_BASE_NAME')) {
    define('OCWG_BASE_NAME', plugin_basename(OCWG_PLUGIN_FILE));
}

if (!class_exists('OCWG')) {

  	class OCWG {

	    protected static $OCWG_instance;
	    /**
	   	* Constructor.
	   	*
	   	* @version 3.2.3
	   	*/
	    function __construct() {
	        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	        //check plugin activted or not
	        add_action('admin_init', array($this, 'OCWG_check_plugin_state'));
	    }

	    function OCWG_check_plugin_state() {
	      	if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
	        	set_transient( get_current_user_id() . 'ocwgerror', 'message' );
	      	}
	    }

	    function init() {
	      	add_action( 'admin_notices', array($this, 'OCWG_show_notice'));
	      	add_action( 'admin_enqueue_scripts', array($this, 'OCWG_load_admin'));
	      	add_action( 'wp_enqueue_scripts',  array($this, 'OCWG_load_front'));
	      	add_filter( 'plugin_row_meta', array( $this, 'OCWG_plugin_row_meta' ), 10, 2 );
	    }

	    function OCWG_plugin_row_meta( $links, $file ) {
            if ( OCWG_BASE_NAME === $file ) {
                $row_meta = array(
                    'rating'    =>  '<a href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress" target="_blank">Support</a> |<a href="https://wordpress.org/support/plugin/gift-products-for-woocommerce/reviews/?filter=5#new-post" target="_blank"><img src="'.OCWG_PLUGIN_DIR.'/includes/images/star.png" class="ocwg_rating_div"></a>',
                );

                return array_merge( $links, $row_meta );
            }
            return (array) $links;
      	}

	    function OCWG_show_notice() {
	        if ( get_transient( get_current_user_id() . 'ocwgerror' ) ) {

	          	deactivate_plugins( plugin_basename( __FILE__ ) );

	          	delete_transient( get_current_user_id() . 'ocwgerror' );

	          	echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
	        }
	    }


	    //Add JS and CSS on Backend
	    function OCWG_load_admin() {
	      	wp_enqueue_style( 'OCWG_admin_style', OCWG_PLUGIN_DIR . '/includes/css/wg_admin_style.css', false, '1.0.0' );
	      	wp_enqueue_script( 'OCWG_admin_script', OCWG_PLUGIN_DIR . '/includes/js/wg_admin_script.js', array( 'jquery', 'select2') );
	      	wp_localize_script( 'ajaxloadpost', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	      	wp_enqueue_style( 'woocommerce_admin_styles-css', WP_PLUGIN_URL. '/woocommerce/assets/css/admin.css',false,'1.0',"all");
	      	wp_enqueue_style( 'wp-color-picker' );
        	wp_enqueue_script( 'wp-color-picker-alpha', OCWG_PLUGIN_DIR . '/includes/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
	    }

	    function OCWG_load_front() {
		    wp_enqueue_style( 'OCWG_front_style', OCWG_PLUGIN_DIR . '/includes/css/wg_front_style.css', false, '1.0.0' );
		    wp_enqueue_style( 'OCWG_owl-min', OCWG_PLUGIN_DIR . '/includes/js/owlcarousel/assets/owl.carousel.min.css' );
	        wp_enqueue_style( 'OCWG_owl-theme', OCWG_PLUGIN_DIR . '/includes/js/owlcarousel/assets/owl.theme.default.min.css');
	        wp_enqueue_script( 'OCWG_owl', OCWG_PLUGIN_DIR . '/includes/js/owlcarousel/owl.carousel.js' );
	        wp_enqueue_script( 'OCWG_front_script', OCWG_PLUGIN_DIR . '/includes/js/wg_front_script.js',array("jquery") );

       	 	$showslider_item_desktop = get_option( 'showslider_item_desktop', '5' );
          $showslider_item_tablet = get_option( 'showslider_item_tablet', '3' );
          $showslider_item_mobile = get_option( 'showslider_item_mobile', '1' );
         	$showslider_autoplay_or_not = get_option('showslider_autoplay_or_not'); 

         	wp_localize_script( 'OCWG_front_script', 'OCWGWdata', 
         								array(
         										'ocwg_ajax_url' => admin_url('admin-ajax.php'),
         										'showslider_item_desktop' => $showslider_item_desktop,
				                    'showslider_item_tablet'=>$showslider_item_tablet,
				                    'showslider_item_mobile' =>$showslider_item_mobile,
				                    'showslider_autoplay_or_not' => $showslider_autoplay_or_not,
         								)
         	);

	    }

	    //Load all includes files
	    function includes() {
		    include_once('admin/wg-backend.php');
		    include_once('front/wg-frontend.php');
	    }

	    //Plugin Rating
	    public static function OCWG_do_activation() {
	      	set_transient('wg-first-rating', true, MONTH_IN_SECONDS);
	    }

	    public static function OCWG_instance() {
	      	if (!isset(self::$OCWG_instance)) {
	        	self::$OCWG_instance = new self();
	        	self::$OCWG_instance->init();
	        	self::$OCWG_instance->includes();
	      	}
	      	return self::$OCWG_instance;
	    }
  	}
  	add_action('plugins_loaded', array('OCWG', 'OCWG_instance'));
  	register_activation_hook(OCWG_PLUGIN_FILE, array('OCWG', 'OCWG_do_activation'));
}