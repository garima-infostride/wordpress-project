<?php 

function fetch_scripts(){

    //stylesheets
    wp_enqueue_style('main_style', get_stylesheet_uri());
    wp_enqueue_style('animate.min.css', get_template_directory_uri().'/assets/vendor/animate.css/animate.min.css');
    wp_enqueue_style('aos.css', get_template_directory_uri().'/assets/vendor/aos/aos.css');
    wp_enqueue_style('bootstrap.min.css', get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons.css', get_template_directory_uri().'/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('glightbox.min.css', get_template_directory_uri().'/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('swiper-bundle.min.css', get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.css');
    
    wp_enqueue_style('style.css', get_template_directory_uri().'/assets/css/style.css');

    // Vendor JS Files
    wp_enqueue_script('aos.js',get_template_directory_uri().'/assets/vendor/aos/aos.js',array(),'1.1', true);
    wp_enqueue_script('bootstrap.bundle.min.js',get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',array(),'1.1', true);
    wp_enqueue_script('glightbox.min.js',get_template_directory_uri().'/assets/vendor/glightbox/js/glightbox.min.js',array(),'1.1', true);
    wp_enqueue_script('isotope.pkgd.min.js',get_template_directory_uri().'/assets/vendor/isotope-layout/isotope.pkgd.min.js',array(),'1.1', true);
    
    wp_enqueue_script('validate.js',get_template_directory_uri().'/assets/vendor/php-email-form/validate.js',array(),'1.1', true);    
    wp_enqueue_script('swiper-bundle.min.js',get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.js',array(),'1.1', true);
    
    wp_enqueue_script('typed.min.js',get_template_directory_uri().'/assets/vendor/typed.js/typed.min.js',array(),'1.1', true);
  
    //Template Main JS File
    wp_enqueue_script('main.js',get_template_directory_uri().'/assets/js/main.js',array(),'1.1', true);

    //javascripts
    // wp_enqueue_script('main.js',get_template_directory_uri().'/assets/js/main.js',array(),'1.1', true);
    // wp_enqueue_script('swiper-bundle.min.js',get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.js',array(),'1.1', true);
    // wp_enqueue_script('aos.js',get_template_directory_uri().'/assets/vendor/aos/aos.js',array(),'1.1', true);
    // wp_enqueue_script('validate.js',get_template_directory_uri().'/assets/vendor/php-email-form/validate.js',array(),'1.1', true);
    // wp_enqueue_script('purecounter.js',get_template_directory_uri().'/assets/vendor/purecounter/purecounter.js',array(),'1.1', true);
    // wp_enqueue_script('swiper-bundle.min.js',get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.js',array(),'1.1', true);
}

add_action('wp_enqueue_scripts','fetch_scripts');

function register_my_menus() {   
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );


 /* ADD theme support for logo */
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup');

  function profotech_register_sidebar(){
    //Footer Sidebar 1 will created
    
      register_sidebar(array(
        'name' => __('footer-1', 'theme_name'),
        'id' => 'footer',
        'before_widget' =>'<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      ));
      
    }

     add_action("widgets_init","profotech_register_sidebar");


 /**starts first otherpost function */
function my_custom_post_otherpost() {
  $labels = array(
    'name'               => _x( 'otherposts', 'post type general name' ),
    'singular_name'      => _x( 'otherpost', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New otherpost' ),
    'edit_item'          => __( 'Edit otherpost' ),
    'new_item'           => __( 'New otherpost' ),
    'all_items'          => __( 'All otherposts' ),
    'view_item'          => __( 'View otherpost' ),
    'search_items'       => __( 'Search otherposts' ),
    'not_found'          => __( 'No otherposts found' ),
    'not_found_in_trash' => __( 'No otherposts found in the Trash' ), 
    'menu_name'          => 'otherposts'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our otherposts and otherpost specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'otherpost', $args ); 
}
add_action( 'init', 'my_custom_post_otherpost' );
 /**end first otherpost function */
     
function customtheme_add_woocommerce_support()
{
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );



add_action( 'wp_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
    var page=2;
    var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";

      jQuery('#load').click(function(){

      var data = {
        'action': 'my_action',
        'page': page
      };

      jQuery.post(ajaxurl, data, function(response) {
        jQuery('#post').append(response)
        page++;
      });
    });
	});
	</script> <?php
}

add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {
	
  $count_args = array(
    'category' => 'courses',
    'paged'    => $_POST['page'],
  );
  $count_posts = new WP_Query($count_args);?>
  <?php if($count_posts->have_posts()): ?>
        <?php while($count_posts->have_posts()): $count_posts->the_post(); ?>
        
          <div class="col-md-4">
            <div class="member">
              <div class="pic">
              <?php $featured_img_url = get_the_post_thumbnail_url($id, 'full');  ?>
                 <img src="<?php echo $featured_img_url; ?>" alt="1000X1000">
              </div>
              <h4><?php the_title()?></h4>
              <span><?php the_content()?></span>                                                                                                                                                                                     
            </div>
          </div>

        <?php endwhile; ?>
          <?php wp_reset_query(); ?>
          <?php else: ?>
            <p><?php echo '<script>alert("No More Post.....")</script>'; ?>
                 <?php endif; 


	wp_die(); // this is required to terminate immediately and return a proper response
}

//add_action( 'after_setup_theme', 'yourtheme_setup' );
 
// function yourtheme_setup() {
//     add_theme_support( 'wc-product-gallery-zoom' );
//     add_theme_support( 'wc-product-gallery-lightbox' );
//     add_theme_support( 'wc-product-gallery-slider' );
// }






add_action( 'template_redirect', 'add_gift_if_id_in_cart' );
 
function add_gift_if_id_in_cart() {
 
   if ( is_admin() ) return;
   if ( WC()->cart->is_empty() ) return;
 
   $product_bought_id = 135;
   $product_gifted_id = 139;
 
   // see if product id in cart
   $product_bought_cart_id = WC()->cart->generate_cart_id( $product_bought_id );
   $product_bought_in_cart = WC()->cart->find_product_in_cart( $product_bought_cart_id );
 
   // see if gift id in cart
   $product_gifted_cart_id = WC()->cart->generate_cart_id( $product_gifted_id );
   $product_gifted_in_cart = WC()->cart->find_product_in_cart( $product_gifted_cart_id );
 
   // if not in cart remove gift, else add gift
   if ( ! $product_bought_in_cart ) {
      if ( $product_gifted_in_cart ) WC()->cart->remove_cart_item( $product_gifted_in_cart );
   } else {
      if ( ! $product_gifted_in_cart ) WC()->cart->add_to_cart( $product_gifted_id );
   }
}







function cfwc_create_custom_field() {
$args = array(
'id' => 'custom_text_field_title',
'label' => __( 'Custom Text Field Title', 'cfwc' ),
'class' => 'cfwc-custom-field',
'desc_tip' => true,
'description' => __( 'Enter the title of your custom text field.', 'ctwc' ),
);
woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field' );


//saving the custom field
function cfwc_save_custom_field( $post_id ) {
$product = wc_get_product( $post_id );
$title = isset( $_POST['custom_text_field_title'] ) ? $_POST['custom_text_field_title'] : '';
$product->update_meta_data( 'custom_text_field_title', sanitize_text_field( $title ) );
$product->save();
}
add_action( 'woocommerce_process_product_meta', 'cfwc_save_custom_field' );

//display 
function cfwc_display_custom_field() {
global $post;
// Check for the custom field value
$product = wc_get_product( $post->ID );
$title = $product->get_meta( 'custom_text_field_title' );
if( $title ) {
// Only display our field if we've got a value for the field title
printf(
'<div class="cfwc-custom-field-wrapper"><label for="custom_field">%s</label><input type="text" id="custom_field" class="custom_fielld" value=""></div>',
esc_html( $title )
);
}
}
add_action( 'woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field' );



//Add the text field as item data to the cart object
function cfwc_add_custom_field_item_data( $cart_item_data, $product_id, $variation_id, $quantity ) {
if( ! empty( $_POST['custom_field'] ) ) {
// Add the item data
$cart_item_data['title_field'] = $_POST['custom_field'];
$product = wc_get_product( $product_id ); // Expanded function
$price = $product->get_price(); // Expanded function
$cart_item_data['total_price'] = $price + 10; // Expanded function
}
return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'cfwc_add_custom_field_item_data', 10, 4 );



//Update the price in the cart
function cfwc_before_calculate_totals( $cart_obj ) {
if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
return;
}
// Iterate through each cart item
foreach( $cart_obj->get_cart() as $key=>$value ) {
if( isset( $value['total_price'] ) ) {
$price = $value['total_price'];
$value['data']->set_price( ( $price ) );
}
}
}
add_action( 'woocommerce_before_calculate_totals', 'cfwc_before_calculate_totals', 10, 1 );

//Display the custom field value in the cart
function cfwc_cart_item_name( $name, $cart_item, $cart_item_key ) {
if( isset( $cart_item['title_field'] ) ) {
$name .= sprintf(
'<p>%s</p>',
esc_html( $cart_item['title_field'] )
);
}
return $name;
}
add_filter( 'woocommerce_cart_item_name', 'cfwc_cart_item_name', 10, 3 );


add_action('woocommerce_single_product_summary', 'woocommerce_total_product_price', 128);
function woocommerce_total_product_price()
{
 global $woocommerce, $product;
 ?>
 <script>
 jQuery(function($){
 var price = <?php echo $product->get_price(); ?>;
 
 currency = '<?php echo get_woocommerce_currency_symbol(); ?>';
 console.log(price);
 console.log(currency);
 $('#custom_field').change(function(){
  
 if (!(this.value == '')) {
 
 var product_total = price +10;

 console.log(product_total)
 
 $('p.price .woocommerce-Price-amount bdi').html(currency+product_total.toFixed(2));
 }
 else{
 $('ins .woocommerce-Price-amount bdi').html(currency+price.toFixed(2));
 }
 
 });
 });
 </script>
 <?php
}
?> 