 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php dynamic_sidebar('footer'); ?>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script> -->

  <!-- Template Main JS File -->
  <!-- <script src="assets/js/main.js"></script> -->
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/main.js"></script>
  <?php wp_footer(); ?>

</body>

</html>



<!-- 
<!-- add_action('woocommerce_single_product_summary', 'woocommerce_total_product_price', 31);
function woocommerce_total_product_price()
{
 global $woocommerce, $product;
 // let's setup our divs
 // echo sprintf('<div id="product_total_price" style="margin-bottom:20px;display:none">%s %s</div>', __('New Total:', 'woocommerce'), '<span class="price">'.$product->get_price().'</span>');?>
 <script>
 jQuery(function($){
 var price = <?php echo $product->get_price(); ?>;
 
 currency = '<?php echo get_woocommerce_currency_symbol(); ?>';
 
 $('#custom').change(function(){
 if (!(this.value == '')) {
 // <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span></ins>
 var product_total = price +10;
 // $('#product_total_price .price').html( currency + product_total.toFixed(2));
 $('ins .woocommerce-Price-amount bdi').html(currency+product_total.toFixed(2));
 }
 else{
 $('ins .woocommerce-Price-amount bdi').html(currency+price.toFixed(2));
 }
 
 });
 });
 </script>
 <?php
}
?> --> -->


// add_action( 'wp', 'custom' ); 

// function custom() { ?>
//   <script type="text/javascript" >
//       function myFunction(){
//         // alert("clicked");
//       const originalPrice =jQuery('p.price .woocommerce-Price-amount.amount bdi').text();
//       console.log(parseInt(originalPrice));   

//       const totalPrice = parseInt(originalPrice + 10);
//       console.log(totalPrice);
        
//       }

//   </script> <?php
// }