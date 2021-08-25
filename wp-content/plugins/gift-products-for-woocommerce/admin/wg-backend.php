<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCWG_menu')) {

   	class OCWG_menu {

      	protected static $instance;

      	function OCWG_create_menu() {
			add_menu_page('Woocommerce Gift', 'Woo Gift', 'manage_options', 'free_gift', array($this, 'OCWG_free_contain'));
		}
			

		function OCWG_free_contain() {
         	?>
	         	<div class="ocwg_container">
	         		<div class="ocwg_ratesup_notice_main">
	         			<div class="ocwg_rateus_notice">
				        	<div class="ocwg_rtusnoti_left">
				        		<h3>Rate Us</h3>
								<label>If you like our plugin, </label>
								<a target="_blank" href="https://wordpress.org/support/plugin/gift-products-for-woocommerce/reviews/?filter=5#new-post">
									<label>Please vote us</label>
								</a>
								<label>, so we can contribute more features for you.</label>
				        	</div>
							<div class="ocwg_rtusnoti_right">
								<img src="<?php echo OCWG_PLUGIN_DIR; ?>/includes/images/review.png" class="ocscw_review_icon">
							</div>
						</div>
				        <div class="ocwg_support_notice">
							<div class="ocwg_rtusnoti_left">
								<h3>Having Issues?</h3>
								<label>You can contact us at</label>
								<a target="_blank" href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress">
									<label>Our Support Forum</label>
								</a>
							</div>
							<div class="ocwg_rtusnoti_right">
								<img src="<?php echo OCWG_PLUGIN_DIR; ?>/includes/images/support.png" class="ocscw_review_icon">
							</div>
						</div>
	         		</div>
					<div class="ocwg_donate_main">
					   <img src="<?php echo OCWG_PLUGIN_DIR; ?>/includes/images/coffee.svg">
					   <h3>Buy me a Coffee !</h3>
					   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
					   <div class="ocwg_donate_form">
					      <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
					   </div>
					</div>
	         		<form method="post">
	         			<?php wp_nonce_field( 'OCWG_meta_save', 'OCWG_meta_save_nounce' ); ?>
		            	<ul class="tabs">
		               		<li class="tab-link current" data-tab="tab-default">
		                  		<?php echo __( 'Gift Rules', OCWG_DOMAIN ); ?>
		               		</li>
		               		<li class="tab-link" data-tab="tab-general">
		                  		<?php echo __( 'Other Settings', OCWG_DOMAIN ); ?>
		               		</li>
		            	</ul>
		            	<div id="tab-default" class="tab-content current">
		               		<div class="ocwg_attribute_div">
			            		<h2 class="ocwg_des_head"><?php _e( 'General Settings', 'woocommerce' ); ?></h2>
			            		<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Enable Plugin', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="checkbox" name="wg_gift_enable" value="enable" <?php if(get_option('wg_gift_enable', 'enable') == 'enable' ) { echo 'checked'; } ?>>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Gift Products Display Type', 'woocommerce' ); ?>
			                  		</div>
			                  		<div class="ocwg_input_div ocwg_radio">
			                     		<input type="radio" name="wg_gift_prod_display" value="after_cart_table" <?php if(get_option('wg_gift_prod_display', 'after_cart_table') == 'after_cart_table' ) { echo 'checked'; } ?>>
			                     		<label>After Cart Table</label>
			                     		<input type="radio" name="wg_gift_prod_display" value="popup" <?php if(get_option('wg_gift_prod_display', 'after_cart_table') == 'popup' ) { echo 'checked'; } ?>>
			                     		<label>Popup</label>
			                  		</div>
			                  	</div>

			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Enable Gift Products on Checkout Page', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="checkbox" name="wg_ckout_enable" value="enable" <?php if(get_option('wg_ckout_enable', 'disable') == 'enable' ) { echo 'checked'; } ?>>
			                  		</div>
			                  	</div>



			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Gift Products Display Type Checkout Page', 'woocommerce' ); ?>
			                  		</div>
			                  		<div class="ocwg_input_div ocwg_radio">
			                     		<input type="radio" name="wg_gift_prod_display_ckout" value="slider" <?php if(get_option('wg_gift_prod_display_ckout', 'slider') == 'slider' ) { echo 'checked'; } ?>>Slider
			                     		<input type="radio" name="wg_gift_prod_display_ckout" value="popup" <?php if(get_option('wg_gift_prod_display_ckout', 'slider') == 'popup' ) { echo 'checked'; } ?>>Popup
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Gift Block Title', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php $wg_gift_title = get_option('wg_gift_title', 'Select Your Gift'); ?>
			                     		<input type="text" name="wg_gift_title" value="<?php echo $wg_gift_title; ?>">
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Gift Block Title Font Size', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php $wg_gift_title_font_size = get_option('wg_gift_title_font_size', '24'); ?>
			                     		<input type="number" name="wg_gift_title_font_size" value="<?php echo $wg_gift_title_font_size; ?>">
			                     		<span>(font size is in px, just enter number)</span>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Gift Product Text for Gift Products in Cart', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="text" name="wg_gift_prod_txt_in_cart" value="Gift Product" disabled>
			                     		<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Remove Gift Products from Cart if Rule does not Pass', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php $wg_gift_remove_gift_items = get_option('wg_gift_remove_gift_items', 'enable'); ?>
			                     		<input type="checkbox" name="wg_gift_remove_gift_items" value="enable" <?php if($wg_gift_remove_gift_items == 'enable') { echo 'checked'; } ?>>
			                  		</div>
			                  	</div>
		               		</div>
		               		<div class="ocwg_attribute_div">
		               			<h2 class="ocwg_des_head"><?php _e( 'Select Gift Rule', 'woocommerce' ); ?></h2>
		                  		<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Gift Rules', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div ocwg_radio">
			                  			<?php $wg_gift_rule = get_option('wg_gift_rule', 'custom'); ?>
			                     		<input type="radio" name="wg_gift_rule" value="custom" class="wg_gift_rule" <?php if( $wg_gift_rule == 'custom' ) { echo 'checked'; } ?>>
			                     		<label>Products Rule</label>
			                     		<input type="radio" name="wg_gift_rule" value="price" class="wg_gift_rule" <?php if( $wg_gift_rule == 'price' ) { echo 'checked'; } ?>>
			                     		<label>Cart Price Rule</label>
			                  			<input type="radio" name="wg_gift_rule" value="category" class="wg_gift_rule" <?php if( $wg_gift_rule == 'category' ) { echo 'checked'; } ?> disabled>
			                  			<label>Category Rule</label>
			                  			<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                  		</div>
		                  		</div>
		               		</div>   
		               		<div class="ocwg_attribute_div">
		                  		<div class="ocwg_child_div wg_custom_rule" style="<?php if( $wg_gift_rule == 'custom' ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
			                     	<h2 class="ocwg_des_head"><?php _e( 'Products Rules', 'woocommerce' ); ?></h2>
			                     	<div class="ocwg_grp_main">
				                        <div class="ocwg_label_div"><?php _e( 'Add Your Product', 'woocommerce' ); ?></div>
				                        <div class="ocwg_input_div">
				                           	<select id="wg_select_product" name="wg_select2[]" multiple="multiple" style="width:60%;">
					                           	<?php 
					                           		$productsa = get_option('wg_combo');
					                           		if(!empty($productsa)) {
					                           			foreach ($productsa as $value) {
						                              		$productc = wc_get_product( $value );
						                              		if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
						                                 		$title = $productc->get_name();
							                                 	?>
							                                 		<option value="<?php echo $value; ?>" selected="selected"><?php echo $title; ?></option>
							                                 	<?php   
						                              		}
						                           		}
					                           		}
					                           	?>
				                           </select> 
				                        </div>
				                    </div>      
			                  	</div>

			                  	<div class="ocwg_child_div wg_category_rule" style="<?php if( $wg_gift_rule == 'category' ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
			                     	<h2 class="ocwg_des_head"><?php _e( 'Category Rules', 'woocommerce' ); ?></h2>
			                     	<div class="ocwg_grp_main">
				                        <div class="ocwg_label_div"><?php _e( 'Categories', 'woocommerce' ); ?></div>
				                        <div class="ocwg_input_div">

				                           	<select id="wg_select_cats" name="wg_cats_select2[]" multiple="multiple" style="width:60%;">
					                           	<?php

					                           		$appended_terms = get_option('wg_cats_select2');

					                           		if( !empty($appended_terms) ) {
										                foreach( $appended_terms as $term_id ) {
										                    $term_name = get_term( $term_id )->name;
										                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
										                    echo '<option value="' . $term_id . '" selected="selected">' . $term_name . '</option>';
										                }
										            }
					                           	?>
				                           </select>
				                        </div>
				                    </div>
			                  	</div>

			                  	<div class="ocwg_child_div wg_price_rule" style="<?php if( $wg_gift_rule == 'price' ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
			                     	<h2 class="ocwg_des_head"><?php _e( 'Price Rules', 'woocommerce' ); ?></h2>
			                     	<div class="ocwg_grp_main">
			                     		<?php $wg_price = get_option('wg_price'); ?>
			                        	<div class="ocwg_label_div"><?php _e( 'Minimun Cart Total', 'woocommerce' ); ?></div>
				                        <div class="ocwg_input_div">
				                           	<input type="number" min="0" name="wg_price" value="<?php echo $wg_price; ?>">
				                        </div>
			                     	</div>
			                  	</div>

							</div>    
							<div class="ocwg_attribute_div">
								<h2 class="ocwg_des_head"><?php _e( 'Cart Qty Rules', 'woocommerce' ); ?></h2>
	                        	<div class="ocwg_grp_main">
		                        	<div class="ocwg_label_div"><?php _e( 'Min Products In Cart', 'woocommerce' ); ?></div>
			                        <div class="ocwg_input_div">
			                        	<?php $wg_min_cart_qty = get_option('wg_min_cart_qty', '1'); ?>
			                           	<input type="number" min="1" name="wg_min_cart_qty" value="<?php if(empty($wg_min_cart_qty)) { echo "1"; }else{ echo $wg_min_cart_qty; } ?>">
			                        </div>
			                    </div>
			                    <div class="ocwg_grp_main">
			                    	<div class="ocwg_label_div"><?php _e( 'Min Qty In Cart', 'woocommerce' ); ?></div>
			                        <div class="ocwg_input_div">
			                           	<input type="number" min="1" name="wg_min_qty_cart_qty" value="1" disabled>
			                           	<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                        </div>
			                    </div>
	                     	</div>
	                     	<div class="ocwg_attribute_div">
								<h2 class="ocwg_des_head"><?php _e( 'Additional Rules', 'woocommerce' ); ?></h2>
	                        	<div class="ocwg_grp_main">
		                        	<div class="ocwg_label_div"><?php _e( 'Allow Gifts only to Logged in Users', 'woocommerce' ); ?></div>
			                        <div class="ocwg_input_div">
			                        	<?php $wg_allow_only_logged_in = get_option('wg_allow_only_logged_in'); ?>
			                        	<input type="checkbox" name="wg_allow_only_logged_in" value="enable" <?php if($wg_allow_only_logged_in == 'enable') { echo 'checked'; } ?>>
			                        </div>
			                    </div>
	                     	</div>
							<div class="ocwg_attribute_div">
								<h2 class="ocwg_des_head"><?php _e( 'Gift Products', 'woocommerce' ); ?></h2>
	                        	<div class="ocwg_grp_main">
		                        	<div class="ocwg_label_div"><?php _e( 'Add Your Gift Product', 'woocommerce' ); ?></div>
			                        <div class="ocwg_input_div">
			                           	<select id="wg_select_gift_product" name="wg_gift_select2[]" multiple="multiple" style="width:60%;">
			                              	<?php 
			                              		$productsa = get_option('wg_gift_combo');
			                              		if(!empty($productsa)) {
			                              			foreach ($productsa as $value) {
				                                 		$productc = wc_get_product( $value );
			                             				$title = $productc->get_name();
			                                    		?>
			                                    			<option value="<?php echo $value; ?>" selected="selected"><?php echo $title; ?></option>
			                                    		<?php
				                              		}
			                              		}
			                              	?>
			                           </select> 
			                        </div>
			                    </div>
			                    <div class="ocwg_grp_main">
			                    	<div class="ocwg_label_div"><?php _e( 'Maximum Gift Products Allowed', 'woocommerce' ); ?></div>
			                        <div class="ocwg_input_div">
			                        	<?php $wg_maximum_gift = get_option('wg_maximum_gift', '1'); ?>
			                           	<input type="number" min="1" name="wg_maximum_gift" value="<?php echo $wg_maximum_gift; ?>">
			                        </div>
			                    </div>
			                    <div class="ocwg_grp_main">
			                    	<div class="ocwg_label_div"><?php _e( 'Gift Product add to cart button text', 'woocommerce' ); ?></div>
			                        <div class="ocwg_input_div">
			                        	<?php $wg_add_to_cart_text = get_option('wg_add_to_cart_text', 'Add To Cart'); ?>
			                           	<input type="text" name="wg_add_to_cart_text" value="<?php echo $wg_add_to_cart_text; ?>">
			                        </div>
			                    </div>
	                     	</div>
			            </div>
			            <div id="tab-general" class="tab-content">
		               		<div class="ocwg_attribute_div">
		               			<h2 class="ocwg_des_head"><?php _e( 'Gift Motivation Settings', 'woocommerce' ); ?></h2>
		               			<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Enable Motivation Message', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php $wg_mtvtion_msg_enable = get_option('wg_mtvtion_msg_enable', 'enable'); ?>
			                  			<input type="checkbox" name="wg_mtvtion_msg_enable" value="enable" <?php if($wg_mtvtion_msg_enable == 'enable') { echo 'checked'; } ?>>
			                  		</div>
			                  	</div>
		               			<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Motivation Message for Products Rule', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php

			                  			$wg_prodrule_mtvtion_msg_def = "You will be eligible for free gift if you will have any {minprod} products and min qty {minqty} of below products in your cart.";

			                  			$wg_prodrule_mtvtion_msg = get_option('wg_prodrule_mtvtion_msg', $wg_prodrule_mtvtion_msg_def);

			                  			?>
			                     		<input type="text" class="ocwg_elimsg" name="wg_prodrule_mtvtion_msg" value="<?php echo $wg_prodrule_mtvtion_msg; ?>">
			                     		<span class="ocwg_desc">Use tag <strong>{minprod}</strong> for Min Products in Cart rule and use tag <strong>{minqty}</strong> for Min Qty in Cart rule.</span>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Motivation Message for Categories Rule', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php

			                  			$wg_catrule_mtvtion_msg_def = "You will be eligible for free gift if you will have any {minprod} products and min qty {minqty} from these categories {categories} in your cart.";

			                  			?>
			                     		<input type="text" class="ocwg_elimsg" name="wg_catrule_mtvtion_msg" value="<?php echo $wg_catrule_mtvtion_msg_def; ?>" disabled>
			                     		<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Motivation Message for Price Rule', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php

			                  			$wg_pricerule_mtvtion_msg_def = "You will be eligible for free gift if you will have cart total {carttotal} and {minprod} products and min qty {minqty} in your cart.";

			                  			?>
			                     		<input type="text" class="ocwg_elimsg" name="wg_pricerule_mtvtion_msg" value="<?php echo $wg_pricerule_mtvtion_msg_def; ?>" disabled>
			                     		<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Motivation Message Text Font Size', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="number" name="wg_mtvtion_msg_font_size" value="<?php echo get_option('wg_mtvtion_msg_font_size', '22'); ?>">
			                     		<span>(font size is in px, just enter number)</span>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Motivation Message Text Font Color', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<?php
			                     		$wg_mtvtion_msg_font_color = get_option('wg_mtvtion_msg_font_color', '#4CAF50');
			                     		?>
			                     		<input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $wg_mtvtion_msg_font_color; ?>" name="wg_mtvtion_msg_font_color" value="<?php echo $wg_mtvtion_msg_font_color; ?>"/>
			                  		</div>
			                  	</div>
		               		</div>
		               		<div class="ocwg_attribute_div">
		               			<h2 class="ocwg_des_head"><?php _e( 'Gift Eligiblity Settings', 'woocommerce' ); ?></h2>
		               			<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Eligiblity Message on Cart Page', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php $wg_eligiblity_message = get_option('wg_eligiblity_message', 'You are eligible for free gift, You can add {allowed_gifts} gift to your cart.'); ?>
			                     		<input type="text" class="ocwg_elimsg" name="wg_eligiblity_message" value="<?php echo $wg_eligiblity_message; ?>">
			                     		<span class="ocwg_desc">Use tag <strong>{allowed_gifts}</strong> to add number of allowed gift products.</span>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
			                  		<div class="ocwg_label_div"><?php _e( 'Eligiblity Message Background Color', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                  			<?php $wg_eligiblity_msg_bg_color = get_option('wg_eligiblity_msg_bg_color', '#829356'); ?>
			                  			<input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $wg_eligiblity_msg_bg_color; ?>" name="wg_eligiblity_msg_bg_color" value="<?php echo $wg_eligiblity_msg_bg_color; ?>"/>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Eligiblity Button Text', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="text" name="wg_eligiblity_btn_text" value="Get Your Gift" disabled>
			                     		<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Eligiblity Button Font Size', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="number" name="wg_eligiblity_btn_font_size" value="18" disabled>
			                     		<label class="ocwg_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/gift-products-for-woocommerce-pro/" target="_blank">link</a></label>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Eligiblity Button Padding', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<input type="text" name="wg_eligiblity_btn_padding" value="<?php echo get_option('wg_eligiblity_btn_padding', '8px 12px'); ?>">
			                     		<span>Insert value in px (eg. 8px 12px)</span>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Eligiblity Button Font Color', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<?php
			                     		$wg_eligiblity_btn_font_color = get_option('wg_eligiblity_btn_font_color', '#ffffff');
			                     		?>
			                     		<input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $wg_eligiblity_btn_font_color; ?>" name="wg_eligiblity_btn_font_color" value="<?php echo $wg_eligiblity_btn_font_color; ?>"/>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Eligiblity Button Background Color', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<?php
			                     		$wg_eligiblity_btn_bg_color = get_option('wg_eligiblity_btn_bg_color', '#000000');
			                     		?>
			                     		<input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $wg_eligiblity_btn_bg_color; ?>" name="wg_eligiblity_btn_bg_color" value="<?php echo $wg_eligiblity_btn_bg_color; ?>"/>
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Number of item show in Slider', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     		<?php
			                     		$showslider_item_desktop = get_option('showslider_item_desktop', '5');
			                     		$showslider_item_tablet = get_option('showslider_item_tablet', '3');
			                     		$showslider_item_mobile = get_option('showslider_item_mobile', '1');
			                     		?>
			                     		<input type="number"  name="showslider_item_desktop" value="<?php echo $showslider_item_desktop; ?>"/>In desktop
			                     		<input type="number"  name="showslider_item_tablet" value="<?php echo $showslider_item_tablet; ?>"/>In tablet
			                     		<input type="number"  name="showslider_item_mobile" value="<?php echo $showslider_item_mobile; ?>"/>In Mobile
			                  		</div>
			                  	</div>
			                  	<div class="ocwg_grp_main">
		                  			<div class="ocwg_label_div"><?php _e( 'Slider Setting', 'woocommerce' ); ?></div>
			                  		<div class="ocwg_input_div">
			                     	
			                     		<?php $showslider_autoplay_or_not = get_option('showslider_autoplay_or_not'); ?>
			                        	<input type="checkbox" name="showslider_autoplay_or_not" value="yes" <?php if($showslider_autoplay_or_not == 'yes') { echo 'checked'; } ?>><?php _e( 'AutoPlay Slider', 'woocommerce' ); ?>
			                     		
			                  		</div>
			                  	</div>
		               		</div>


			            </div>
			            <input type="hidden" name="action" value="wg_save_option">
                		<input type="submit" value="Save changes" name="submit" class="button-primary" id="ocwg_btn_space">
	        		</form>
	         	</div>  	
         	<?php
		}


		function OCWG_product_ajax() {
      
            $return = array();
            $post_types = array( 'product','product_variation');
           
         
            $search_results = new WP_Query( array( 
                's'=> $_GET['q'],
                'post_status' => 'publish',
                'post_type' => $post_types,
                'posts_per_page' => -1,
                'meta_query' => array(
                                    array(
                                        'key' => '_stock_status',
                                        'value' => 'instock',
                                        'compare' => '=',
                                    )
                                )
                ) );
             

            if( $search_results->have_posts() ) :
               while( $search_results->have_posts() ) : $search_results->the_post();   
                  $productc = wc_get_product( $search_results->post->ID );
                  if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                     $title = $search_results->post->post_title;
                     $price = $productc->get_price_html();
                     $return[] = array( $search_results->post->ID, $title, $price);   
                  }
               endwhile;
            endif;
            echo json_encode( $return );
            die;
      	}


      	function recursive_sanitize_text_field($array) {
      		
      		if(!empty($array)) {
	         	foreach ( $array as $key => $value ) {
	            	if ( is_array( $value ) ) {
	               		$value = $this->recursive_sanitize_text_field($value);
	            	}else{
	              		$value = sanitize_text_field( $value );
	            	}
	         	}
	        }
         	return $array;
      	}


      	function OCWG_save_options(){
        	if( current_user_can('administrator') ) {
          		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'wg_save_option') {
            		if(!isset( $_POST['OCWG_meta_save_nounce'] ) || !wp_verify_nonce( $_POST['OCWG_meta_save_nounce'], 'OCWG_meta_save' ) ) {

                		print 'Sorry, your nonce did not verify.';
                		exit;

            		} else {

               			$wg_gift_rule = sanitize_text_field( $_REQUEST['wg_gift_rule'] );
			            update_option('wg_gift_rule', $wg_gift_rule, 'yes');


			            /*---custom rules---*/
			            if(!empty($_REQUEST['wg_select2'])) {
			            	$wg_combo = $this->recursive_sanitize_text_field( $_REQUEST['wg_select2'] );
			            	update_option('wg_combo', $wg_combo, 'yes');
			            } else {
			            	update_option('wg_combo', '', 'yes');
			            }
			           	
			           	if(!empty($_REQUEST['wg_gift_select2'])) {
			           		$wg_gift_combo = $this->recursive_sanitize_text_field( $_REQUEST['wg_gift_select2'] );
			            	update_option('wg_gift_combo', $wg_gift_combo, 'yes');	
			           	} else {
			           		update_option('wg_gift_combo', '', 'yes');
			           	}

			           	$wg_add_to_cart_text = sanitize_text_field( $_REQUEST['wg_add_to_cart_text'] );
			            update_option('wg_add_to_cart_text', $wg_add_to_cart_text, 'yes');

			           	$showslider_item_desktop = sanitize_text_field( $_REQUEST['showslider_item_desktop'] );
			            update_option('showslider_item_desktop', $showslider_item_desktop, 'yes');

			            $showslider_item_tablet = sanitize_text_field( $_REQUEST['showslider_item_tablet'] );
			            update_option('showslider_item_tablet', $showslider_item_tablet, 'yes');

			            $showslider_item_mobile = sanitize_text_field( $_REQUEST['showslider_item_mobile'] );
			            update_option('showslider_item_mobile', $showslider_item_mobile, 'yes');

			            if(isset($_REQUEST['showslider_autoplay_or_not']) && $_REQUEST['showslider_autoplay_or_not'] == 'yes' ) {
			             	$showslider_autoplay_or_not = 'yes';
			            } else {
			             	$showslider_autoplay_or_not = 'no';
			            }
			            
			            update_option('showslider_autoplay_or_not', $showslider_autoplay_or_not, 'yes');
			            


			            /*---price rules---*/
			            $wg_price = sanitize_text_field( $_REQUEST['wg_price'] );
			            update_option('wg_price', $wg_price, 'yes');

			            if(!empty($_REQUEST['wg_cats_select2'])) {
			            	$wg_cats_select2 = $this->recursive_sanitize_text_field( $_REQUEST['wg_cats_select2'] );
				        	update_option('wg_cats_select2', $wg_cats_select2, 'yes');
			            } else {
			            	update_option('wg_cats_select2', '', 'yes');
			            }

			            $wg_min_cart_qty = sanitize_text_field( $_REQUEST['wg_min_cart_qty'] );
			            update_option('wg_min_cart_qty', $wg_min_cart_qty, 'yes');		            

			            if(isset($_REQUEST['wg_allow_only_logged_in']) && $_REQUEST['wg_allow_only_logged_in'] == 'enable' ) {
			             	$wg_allow_only_logged_in = 'enable';
			            } else {
			             	$wg_allow_only_logged_in = 'disable'; 
			            }

			            update_option('wg_allow_only_logged_in', $wg_allow_only_logged_in, 'yes');

			            $wg_maximum_gift = sanitize_text_field( $_REQUEST['wg_maximum_gift'] );
			            update_option('wg_maximum_gift', $wg_maximum_gift, 'yes');

			            if(isset($_REQUEST['wg_gift_enable']) && $_REQUEST['wg_gift_enable'] == 'enable' ) {
			             	$wg_gift_enable = 'enable';
			            } else {
			             	$wg_gift_enable = 'disable';
			            }

			            update_option('wg_gift_enable', $wg_gift_enable, 'yes');

			            if(isset($_REQUEST['wg_ckout_enable']) && $_REQUEST['wg_ckout_enable'] == 'enable' ) {
			             	$wg_ckout_enable = 'enable';
			            } else {
			             	$wg_ckout_enable = 'disable';
			            }

			            update_option('wg_ckout_enable', $wg_ckout_enable, 'yes');

			            $wg_gift_prod_display = sanitize_text_field( $_REQUEST['wg_gift_prod_display'] );

			            update_option('wg_gift_prod_display', $wg_gift_prod_display, 'yes');

			            $wg_gift_prod_display_ckout = sanitize_text_field( $_REQUEST['wg_gift_prod_display_ckout'] );

			            update_option('wg_gift_prod_display_ckout', $wg_gift_prod_display_ckout, 'yes');

			            $wg_gift_title = sanitize_text_field( $_REQUEST['wg_gift_title'] );
			            update_option('wg_gift_title', $wg_gift_title, 'yes');

			            $wg_gift_title_font_size = sanitize_text_field( $_REQUEST['wg_gift_title_font_size'] );
			            update_option('wg_gift_title_font_size', $wg_gift_title_font_size, 'yes');

			            if(isset($_REQUEST['wg_gift_remove_gift_items']) && $_REQUEST['wg_gift_remove_gift_items'] == 'enable' ) {
			             	$wg_gift_remove_gift_items = 'enable';
			            } else {
			             	$wg_gift_remove_gift_items = 'disable';
			            }

			            update_option('wg_gift_remove_gift_items', $wg_gift_remove_gift_items, 'yes');
			            
			            if(isset($_REQUEST['wg_mtvtion_msg_enable']) && $_REQUEST['wg_mtvtion_msg_enable'] == 'enable' ) {
			             	$wg_mtvtion_msg_enable = 'enable';
			            } else {
			             	$wg_mtvtion_msg_enable = 'disable';
			            }

			            update_option('wg_mtvtion_msg_enable', $wg_mtvtion_msg_enable, 'yes');

			            $wg_prodrule_mtvtion_msg = sanitize_text_field( $_REQUEST['wg_prodrule_mtvtion_msg'] );
			            update_option('wg_prodrule_mtvtion_msg', $wg_prodrule_mtvtion_msg, 'yes');

			            $wg_mtvtion_msg_font_color = sanitize_text_field( $_REQUEST['wg_mtvtion_msg_font_color'] );
			            update_option('wg_mtvtion_msg_font_color', $wg_mtvtion_msg_font_color, 'yes');

			            $wg_mtvtion_msg_font_size = sanitize_text_field( $_REQUEST['wg_mtvtion_msg_font_size'] );
			            update_option('wg_mtvtion_msg_font_size', $wg_mtvtion_msg_font_size, 'yes');

			            $wg_eligiblity_btn_padding = sanitize_text_field( $_REQUEST['wg_eligiblity_btn_padding'] );
			            update_option('wg_eligiblity_btn_padding', $wg_eligiblity_btn_padding, 'yes');

			            update_option('wg_eligiblity_message', sanitize_text_field( $_REQUEST['wg_eligiblity_message']), 'yes');

			            update_option('wg_eligiblity_msg_bg_color', sanitize_text_field( $_REQUEST['wg_eligiblity_msg_bg_color']), 'yes');

			            $wg_eligiblity_btn_bg_color = sanitize_text_field( $_REQUEST['wg_eligiblity_btn_bg_color'] );
			            update_option('wg_eligiblity_btn_bg_color', $wg_eligiblity_btn_bg_color, 'yes');

			            $wg_eligiblity_btn_font_color = sanitize_text_field( $_REQUEST['wg_eligiblity_btn_font_color'] );
			            update_option('wg_eligiblity_btn_font_color', $wg_eligiblity_btn_font_color, 'yes');
            		}
          		}
        	}	
      	}

      	function OCWG_cats_ajax() {

            $return = array();

            $product_categories = get_terms( 'product_cat', $cat_args );

            if( !empty($product_categories) ){
                foreach ($product_categories as $key => $category) {
                    $category->term_id;
                    $title = ( mb_strlen( $category->name ) > 50 ) ? mb_substr( $category->name, 0, 49 ) . '...' : $category->name;
                    $return[] = array( $category->term_id, $title );
                }
            }

            echo json_encode( $return );
            die;
        }

      	function init() {
      		add_action('admin_menu', array($this, 'OCWG_create_menu'));
         	add_action( 'wp_ajax_nopriv_wg_product_ajax',array($this, 'OCWG_product_ajax') );
         	add_action( 'wp_ajax_wg_product_ajax', array($this, 'OCWG_product_ajax') );
         	add_action( 'wp_ajax_nopriv_wg_cats_ajax',array($this, 'OCWG_cats_ajax') );
         	add_action( 'wp_ajax_wg_cats_ajax', array($this, 'OCWG_cats_ajax') );
         	add_action( 'init',  array($this, 'OCWG_save_options'));
      	}

      	public static function instance() {
         	if (!isset(self::$instance)) {
            	self::$instance = new self();
            	self::$instance->init();
         	}
         	return self::$instance;
      	}

   	}
   	OCWG_menu::instance();
}