<?php /* Template Name: HomePage Html */ ?>
<?php get_header();?>


 <section class="cartTemplate mt-100">
      <div class="container"> 
        <div class="outerCircle"></div>       
        <div class="row">          
          <div class="col-md-24 col-lg-8">
            <div class="cartLeft">
              <div class="pageTitle mb-4">
                <h2>Your Cart</h2>
              </div>
              <div class="productListing">
              	<?php
        $count_args = array(
          'post_type'    => 'product',
          'category' => 'html-product',
          'posts_per_page'    => 2
        );
        $count_posts = new WP_Query($count_args);
        
        while ($count_posts->have_posts()) {
          $count_posts->the_post();
          $id=$count_posts->post->ID;
        ?>
                <ul>
                  <li>
                    <div class="itemImage"><?php $featured_img_url = get_the_post_thumbnail_url($id, 'full');  ?>
          <img src="<?php echo $featured_img_url; ?>" alt="1000X1000"></div>
                    <div class="itemDesc">
                        <div class="itemDescTop">
                          <div class="productName">
                            <h3><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h3>
                            <p><?php  the_content(); ?></p>
                          </div>
                          <div class="productPrice">$ <?php  the_field('_regular_price'); ?></div>                        
                        </div>
                        <div class="itemDescBottom">
                             <div class="btnQuantity"> 
                               <label class="quantityLabel" for="">Quantity:</label>
                               <span class="quantityUnit">1</span>
                               <button type="button" class="btn btn-secondary rounded-0 me-2"><i class="fas fa-minus"></i></button>
                               <button type="button" class="btn btn-secondary rounded-0"><i class="fas fa-plus"></i></button>
                             </div>  
                             <div class="btnRemove mt-3"> <button type="button" class="btn btn-secondary rounded-0">Remove</button> </div>  
                        </div>                      
                    </div>
              
                  </li>                  
                </ul>

                  <?php 
          }
				  wp_reset_query(); 
        ?>

              </div>
            </div>
          </div>
          <div class="col-md-24 col-lg-4">
            <div class="cartRight">
              <h3>Summary</h3>
              <div class="coupenCode mt-3 mb-3 text-end">
                <input type="text" class="form-control rounded-0" placeholder="Enter coupon code" />
                <button type="button" class="btn btn-danger mt-3 rounded-0">Apply</button>
              </div>
              <div class="priceSummery mt-5">
                <ul>
                  <li><p>Subtotal</p><span>$50.00</span></li>
                  <li><p>Estimated Shipping</p><span>$10.00</span></li>
                  <li><p>Tax</p><span>$5.00</span></li>
                  <li><p>TOTAL</p><span>$65.00</span></li>
                </ul>
              </div>
              <div class="checkoutBox text-center mt-70">
                <button type="button" class="btn btn-danger mt-2 rounded-0 text-uppercase">Checkout</button>
                <div class="separatorText text-uppercase mt-3 mb-3">or</div>
                <button type="button" class="btn btn-light mt-2 rounded-0"><img src="./images/paypal.png" alt="logo"/></button>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </section>


