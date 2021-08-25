<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCWG_front')) {

    class OCWG_front {

        protected static $instance;
       
        function OCWG_frontdesign() {
            global $post, $woocommerce;

            if($this->OCWG_gift_cart_rule_pass() == TRUE) {
                $this->OCWG_free_item_slider( $post->ID );
            }
        }

        function OCWG_frontdesign_checkout() {
            global $post, $woocommerce;

            if($this->OCWG_gift_cart_rule_pass() == TRUE) {
                $this->OCWG_free_item_slider_checkout( $post->ID );
            }
        }

        function OCWG_gift_eligibility_message() {
            
            global $post, $woocommerce;

            $wg_eligiblity_msg_bg_color = get_option('wg_eligiblity_msg_bg_color', '#829356');
            $wg_eligiblity_btn_text = get_option('wg_eligiblity_btn_text', 'Get Your Gift');
            $wg_eligiblity_btn_font_size = get_option('wg_eligiblity_btn_font_size', '18');
            $wg_eligiblity_btn_padding = get_option('wg_eligiblity_btn_padding', '8px 12px');
            $wg_eligiblity_btn_font_color = get_option('wg_eligiblity_btn_font_color', '#ffffff');
            $wg_eligiblity_btn_bg_color = get_option('wg_eligiblity_btn_bg_color', '#000000');

            $wg_eligiblity_message = get_option('wg_eligiblity_message', 'You are eligible for free gift, You can add {allowed_gifts} gift to your cart.');

            $wg_maximum_gift = get_option('wg_maximum_gift', '1');

            $wg_eligiblity_message_final = str_replace("{allowed_gifts}", $wg_maximum_gift, $wg_eligiblity_message);

            ob_start();

            ?>
            <div class="ocwg_elgbmsg_main" style="background-color: <?php echo $wg_eligiblity_msg_bg_color; ?>">
                <div class="ocwg_elgbmsg_txt">
                    <p><?php echo __( $wg_eligiblity_message_final, OCWG_DOMAIN );?></p>
                </div>
                <div class="ocwg_elgbmsg_link">
                    <a href="#" class="ocwg_gift_btn" style="background-color: <?php echo  $wg_eligiblity_btn_bg_color; ?>; color: <?php echo  $wg_eligiblity_btn_font_color; ?>; padding: <?php echo  $wg_eligiblity_btn_padding; ?>; font-size: <?php echo  $wg_eligiblity_btn_font_size; ?>px; font-weight: bold;"><?php echo $wg_eligiblity_btn_text; ?></a>
                </div>
            </div>
            <?php

            $ocwg_elgbmsg_cont = ob_get_clean();

            $wg_mtvtion_msg_enable = get_option('wg_mtvtion_msg_enable', 'enable');

            if($wg_mtvtion_msg_enable == 'enable') {

                if($this->OCWG_gift_cart_rule_pass() == FALSE) {

                	$wg_gift_rule = get_option('wg_gift_rule');
                	$wg_mtvtion_msg_font_size = get_option('wg_mtvtion_msg_font_size', '22');
                	$wg_mtvtion_msg_font_color = get_option('wg_mtvtion_msg_font_color', '#4CAF50');

                    if($wg_gift_rule == 'custom') {
                        $wg_gift_parents = get_option('wg_combo');
                        
                        if(!empty($wg_gift_parents )) {
                            $wg_gfpar_str = implode(", ",$wg_gift_parents);

                            $wg_prodrule_mtvtion_msg_def = "You will be eligible for free gift if you will have any {minprod} products and min qty {minqty} of below products in your cart.";

                            $wg_prodrule_mtvtion_msg = get_option('wg_prodrule_mtvtion_msg', $wg_prodrule_mtvtion_msg_def);

                            $wg_min_cart_qty = get_option('wg_min_cart_qty', '1');
                            $wg_min_qty_cart_qty = get_option('wg_min_qty_cart_qty', '1');

                            $wg_prodrule_mtvtion_msg_final = str_replace("{minprod}", $wg_min_cart_qty, $wg_prodrule_mtvtion_msg);
                            $wg_prodrule_mtvtion_msg_final = str_replace("{minqty}", $wg_min_qty_cart_qty, $wg_prodrule_mtvtion_msg_final);

                            ?>
                            <div class="ocwg_giftcrpr_main">
                                <p class="ocwg_giftcrpr_msg" style="font-size: <?php echo $wg_mtvtion_msg_font_size; ?>px; color: <?php echo $wg_mtvtion_msg_font_color; ?>;"><?php echo __( $wg_prodrule_mtvtion_msg_final, OCWG_DOMAIN );?></p>
                                <?php echo do_shortcode('[products ids="'.$wg_gfpar_str.'" columns="4"]'); ?>
                            </div>
                            <?php
                        }

                    } elseif($wg_gift_rule == 'category') {

                        $wg_catrule_mtvtion_msg_def = "You will be eligible for free gift if you will have any {minprod} products and min qty {minqty} from these categories {categories} in your cart.";

                        $wg_catrule_mtvtion_msg = get_option('wg_catrule_mtvtion_msg', $wg_catrule_mtvtion_msg_def);

                        $appended_terms = get_option('wg_cats_select2');
                        $wg_min_cart_qty = get_option('wg_min_cart_qty', '1');
                        $wg_min_qty_cart_qty = get_option('wg_min_qty_cart_qty', '1');

                        if(!empty($appended_terms)) {
   
                            $cat_list = array();

                            foreach ($appended_terms as $key => $value) {
                               
                                $term = get_term_by( 'id', $value, 'product_cat' );
                                $term_link = get_term_link( $term->slug, 'product_cat' );
                                $cat_list[] = "<a href='".$term_link."' target='_blank'>".$term->name."</a>";
                            }

                            $cat_list = implode(', ', $cat_list);

                            $wg_catrule_mtvtion_msg_final = str_replace("{categories}", $cat_list, $wg_catrule_mtvtion_msg);
                            $wg_catrule_mtvtion_msg_final = str_replace("{minprod}", $wg_min_cart_qty, $wg_catrule_mtvtion_msg_final);
                            $wg_catrule_mtvtion_msg_final = str_replace("{minqty}", $wg_min_qty_cart_qty, $wg_catrule_mtvtion_msg_final);
                            ?>
                            <div class="ocwg_giftcrpr_main">
                                <p class="ocwg_giftcrpr_msg" style="font-size: <?php echo $wg_mtvtion_msg_font_size; ?>px; color: <?php echo $wg_mtvtion_msg_font_color; ?>;"><?php echo __( $wg_catrule_mtvtion_msg_final, OCWG_DOMAIN );?></p>
                            </div>
                            <?php
                        }
                        
                    } elseif($wg_gift_rule == 'price') {
                        $wg_pricerule_mtvtion_msg_def = "You will be eligible for free gift if you will have cart total {carttotal} and {minprod} products and min qty {minqty} in your cart.";
                        $wg_pricerule_mtvtion_msg = get_option('wg_pricerule_mtvtion_msg', $wg_pricerule_mtvtion_msg_def);

                        $wg_price = get_option('wg_price');

                        if($wg_price != '') {

	                        $wg_min_cart_qty = get_option('wg_min_cart_qty', '1');
	                        $wg_min_qty_cart_qty = get_option('wg_min_qty_cart_qty', '1');

	                        $wg_pricerule_mtvtion_msg_final = str_replace("{carttotal}", wc_price($wg_price), $wg_pricerule_mtvtion_msg);
	                        $wg_pricerule_mtvtion_msg_final = str_replace("{minprod}", $wg_min_cart_qty, $wg_pricerule_mtvtion_msg_final);
	                        $wg_pricerule_mtvtion_msg_final = str_replace("{minqty}", $wg_min_qty_cart_qty, $wg_pricerule_mtvtion_msg_final);

	                        ?>
	                        <div class="ocwg_giftcrpr_main">
	                            <p class="ocwg_giftcrpr_msg" style="font-size: <?php echo $wg_mtvtion_msg_font_size; ?>px; color: <?php echo $wg_mtvtion_msg_font_color; ?>;"><?php echo __( $wg_pricerule_mtvtion_msg_final, OCWG_DOMAIN );?></p>
	                        </div>
                        	<?php
                    	}
                    }
                }
            }

            if($this->OCWG_gift_cart_rule_pass() == TRUE) {
                echo $ocwg_elgbmsg_cont;
            }
        }


        function OCWG_gift_cart_rule_pass() {
            
            global $post, $woocommerce;

            $rule_passed = FALSE;

            $wg_gift_rule = get_option( 'wg_gift_rule' );
            $wg_gift_combo = get_option( 'wg_gift_combo' );
            $wg_min_cart_qty = get_option( 'wg_min_cart_qty', '1' );
            $wg_maximum_gift = get_option( 'wg_maximum_gift', '1' );
            $wg_min_qty_cart_qty = get_option( 'wg_min_qty_cart_qty',  '1' );
            $prod_line_count = count(WC()->cart->get_cart());
            $cart_total_qty_count = WC()->cart->get_cart_contents_count();

            if($wg_gift_rule == "custom") {
                
                $wg_combo = get_option( 'wg_combo' );
                $combo_rule_qty = 0;
                $prod_line = 0;
                $cart_product = array();

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }

                    if(in_array($pid, $wg_combo)) {
                        $combo_rule_qty += $cart_item['quantity'];
                        $prod_line += 1;
                    }
                
                }
                
                if($wg_min_qty_cart_qty <= $combo_rule_qty && $wg_min_cart_qty <= $prod_line) {
                    $rule_passed = TRUE;
                }
            }


            if($wg_gift_rule == "price") {
                
                $wg_price = get_option( 'wg_price' );
                $cart_total = 0;
                $pline = 0;
                $pqty = 0;

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }

                    if(!in_array($pid, $wg_gift_combo)) {
                        $cart_total += $cart_item['line_subtotal'];
                    }
                }
                
                if($wg_price <= $cart_total && $prod_line_count >= $wg_min_cart_qty && $cart_total_qty_count >= $wg_min_qty_cart_qty) {
                    $rule_passed = TRUE;
                }
            }


            if($wg_gift_rule == "category") {
                
                $wg_cat = get_option( 'wg_cats_select2' );
                $cart_total_qty_count = 0;
                $prod_line_count = 0;

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }
                    
                    if(!in_array($pid, $wg_gift_combo)) {
                        $terms = get_the_terms ( $cart_item['product_id'], 'product_cat' );

                        if(!empty($terms)) {
                            foreach ($terms as $key => $value) {
                                if (in_array($value->term_id, $wg_cat)) {
                                    $cart_total_qty_count += $cart_item['quantity'];
                                    $prod_line_count += 1;
                                }
                            }    
                        }
                    }
                }

                if($wg_min_cart_qty <= $prod_line_count && $wg_min_qty_cart_qty <= $cart_total_qty_count) {
                    $rule_passed = TRUE;
                }
            }

            return $rule_passed;
        }


        function OCWG_free_item_slider($post_id) {

            $gift_pro = get_option( 'wg_gift_combo' );
            $cart_products = array();
            $wg_gift_disable = 'false';
            
            foreach( WC()->cart->get_cart() as $cart_item ) {

                $product_id = $cart_item['product_id'];
                $product = wc_get_product( $product_id );

                if($product->get_type() == 'variable') {
                    $cart_products[] = $product_id;
                    $cart_products[] = $cart_item['variation_id'];
                } else {
                    $cart_products[] = $product_id;
                }
            }

            $final_gift_array = array_diff ( $gift_pro , $cart_products );

            $wg_maximum_gift = get_option('wg_maximum_gift', 1);
            $gifts_in_cart = count($gift_pro) - count($final_gift_array);

            if($gifts_in_cart >= $wg_maximum_gift) {
                $wg_gift_disable = 'true';
            }

            if(get_option('wg_gift_prod_display', 'after_cart_table') == 'after_cart_table') {
                ?>
                <div class="wg_gift ocwg_gift_div">
                    <p style="font-size: <?php echo get_option( 'wg_gift_title_font_size', '24' ); ?>px;"><?php echo get_option( 'wg_gift_title', 'Select Your Gift' ); ?></p>
                    <div class="wg_gift_slider owl-carousel owl-theme">
                        <?php
                            if(!empty($final_gift_array)) {
                                foreach ($final_gift_array as $value) {
                                    $productc = wc_get_product( $value );
                                    $title = $productc->get_name();
                                    ?>
                                        <div class="item wg_gift_product <?php if($wg_gift_disable == 'true') { echo 'ocwg_disable'; } ?>">
                                            <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                                <div><?php echo $productc->get_image(); ?></div>
                                                <div class="wg_title"><?php echo $title; ?></div>
                                                <div class="wg_gift_atc_btn">
                                                    <a href="<?php echo home_url(); ?>?action=ocwg_giftred&redpage=cart&ocwg_prod=<?php echo $value; ?>" class="single_add_to_cart_button button alt"><?php _e( get_option('wg_add_to_cart_text', 'Add to cart') , 'woocommerce' ); ?></a>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div id="ocwg_gifts_popup" class="ocwg_gifts_popup_main">
                    <div class="ocwg_gifts_popup_overlay"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                          <span class="ocwg_gifts_popup_close">
                          	<svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg">
			                    <path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/>
			                </svg>
                          </span>
                        </div>
                        <div class="modal-body">
                            <div class="wg_gift">
                                <p style="font-size: <?php echo get_option( 'wg_gift_title_font_size', '24' ); ?>px;"><?php echo get_option( 'wg_gift_title', 'Select Your Gift' ); ?></p>
                                <div class="wg_gift_slider_pp owl-carousel owl-theme">
                                    <?php
                                        if(!empty($final_gift_array)) {
                                            foreach ($final_gift_array as $value) {
                                                $productc = wc_get_product( $value );
                                                $title = $productc->get_name();
                                                ?>
                                                    <div class="item wg_gift_product <?php if($wg_gift_disable == 'true') { echo 'ocwg_disable'; } ?>">
                                                        <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                                            <div><?php echo $productc->get_image(); ?></div>
                                                            <div class="wg_title"><?php echo $title; ?></div>
                                                            <div class="wg_gift_atc_btn">
                                                                <a href="<?php echo home_url(); ?>?action=ocwg_giftred&redpage=cart&ocwg_prod=<?php echo $value; ?>" class="single_add_to_cart_button button alt"><?php _e( get_option('wg_add_to_cart_text', 'Add to cart') , 'woocommerce' ); ?></a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }

            ?>
            <?php
        }


        function OCWG_free_item_slider_checkout($post_id) {

            $gift_pro = get_option( 'wg_gift_combo' );
            $cart_products = array();
            $wg_gift_disable = 'false';
            
            foreach( WC()->cart->get_cart() as $cart_item ) {

                $product_id = $cart_item['product_id'];
                $product = wc_get_product( $product_id );

                if($product->get_type() == 'variable') {
                    $cart_products[] = $product_id;
                    $cart_products[] = $cart_item['variation_id'];
                } else {
                    $cart_products[] = $product_id;
                }
            }

            $final_gift_array = array_diff ( $gift_pro , $cart_products );

            $wg_maximum_gift = get_option('wg_maximum_gift', 1);
            $gifts_in_cart = count($gift_pro) - count($final_gift_array);

            if($gifts_in_cart >= $wg_maximum_gift) {
                $wg_gift_disable = 'true';
            }

            if(get_option('wg_gift_prod_display_ckout', 'slider') == 'slider') {
                ?>
                <div class="wg_gift ocwg_gift_div">
                    <p style="font-size: <?php echo get_option( 'wg_gift_title_font_size', '24' ); ?>px;"><?php echo get_option( 'wg_gift_title', 'Select Your Gift' ); ?></p>
                    <div class="wg_gift_slider owl-carousel owl-theme">
                        <?php
                            foreach ($final_gift_array as $value) {
                                $productc = wc_get_product( $value );
                                $title = $productc->get_name();
                                ?>
                                    <div class="item wg_gift_product <?php if($wg_gift_disable == 'true') { echo 'ocwg_disable'; } ?>">
                                        <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                            <div><?php echo $productc->get_image(); ?></div>
                                            <div class="wg_title"><?php echo $title; ?></div>
                                            <div class="wg_gift_atc_btn">
                                                <a href="<?php echo home_url(); ?>?action=ocwg_giftred&redpage=checkout&ocwg_prod=<?php echo $value; ?>" class="single_add_to_cart_button button alt"><?php _e( get_option('wg_add_to_cart_text', 'Add to cart') , 'woocommerce' ); ?></a>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div id="ocwg_gifts_popup" class="ocwg_gifts_popup_main">
                    <div class="ocwg_gifts_popup_overlay"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                          <span class="ocwg_gifts_popup_close">
                            <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg">
                                <path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/>
                            </svg>
                          </span>
                        </div>
                        <div class="modal-body">
                            <div class="wg_gift">
                                <p style="font-size: <?php echo get_option( 'wg_gift_title_font_size', '24' ); ?>px;"><?php echo get_option( 'wg_gift_title', 'Select Your Gift' ); ?></p>
                                <div class="wg_gift_slider_pp owl-carousel owl-theme">
                                    <?php
                                        foreach ($final_gift_array as $value) {
                                            $productc = wc_get_product( $value );
                                            $title = $productc->get_name();
                                            ?>
                                                <div class="item wg_gift_product <?php if($wg_gift_disable == 'true') { echo 'ocwg_disable'; } ?>">
                                                    <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                                        <div><?php echo $productc->get_image(); ?></div>
                                                        <div class="wg_title"><?php echo $title; ?></div>
                                                        <div class="wg_gift_atc_btn">
                                                            <a href="<?php echo home_url(); ?>?action=ocwg_giftred&redpage=checkout&ocwg_prod=<?php echo $value; ?>" class="single_add_to_cart_button button alt"><?php _e( get_option('wg_add_to_cart_text', 'Add to cart') , 'woocommerce' ); ?></a>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }

            ?>
            <?php
        }


        function OCWG_add_custom_price( $cart_object ) { 
            
            if ( is_admin() && ! defined( 'DOING_AJAX' ) )
            return;

            if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
            return;

            global $post, $woocommerce;

            $this->OCWG_setdefault_isgift_key($cart_object);

           	$wg_gift_rule = get_option( 'wg_gift_rule' );
            $wg_gift_combo = get_option( 'wg_gift_combo');
            $wg_min_cart_qty = get_option( 'wg_min_cart_qty', '1' );
            $wg_maximum_gift = get_option( 'wg_maximum_gift', '1' );
            $wg_min_qty_cart_qty = get_option( 'wg_min_qty_cart_qty',  '1' );
            $prod_line_count = count(WC()->cart->get_cart());
            $cart_total_qty_count = WC()->cart->get_cart_contents_count();
            
            if($wg_gift_rule == "custom") {

                $wg_combo = get_option( 'wg_combo' );
                $combo_rule_qty = 0;
                $prod_line = 0;
                $cart_product = array();


                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }

                    if(in_array($pid, $wg_combo)) {
                        $combo_rule_qty += $cart_item['quantity'];
                        $prod_line += 1;
                    }

                }
                
                if($wg_min_qty_cart_qty <= $combo_rule_qty && $wg_min_cart_qty <= $prod_line) {
                    $this->OCWG_setfree_product($cart_object, $wg_gift_combo, $wg_maximum_gift);
                }
            }


            if($wg_gift_rule == "price") {
                $wg_price = get_option( 'wg_price' );
                $cart_total = 0;
                $pline = 0;
                $pqty = 0;

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }

                    if(!in_array($pid, $wg_gift_combo)) {
                        $cart_total += $cart_item['line_subtotal'];
                    }
                }
                

                if($wg_price <= $cart_total && $prod_line_count >= $wg_min_cart_qty && $cart_total_qty_count >= $wg_min_qty_cart_qty) {
                    $this->OCWG_setfree_product($cart_object, $wg_gift_combo, $wg_maximum_gift);
                    add_action( 'woocommerce_before_calculate_totals', array($this, 'OCWG_add_custom_price' ));
                }
            }


            if($wg_gift_rule == "category") {
               
                $wg_cat = get_option( 'wg_cats_select2' );
                $cart_total_qty_count = 0;
                $prod_line_count = 0;

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }
                    
                    if(!in_array($pid, $wg_gift_combo)) {
                        $terms = get_the_terms ( $cart_item['product_id'], 'product_cat' );

                        foreach ($terms as $key => $value) {
                            if (in_array($value->term_id, $wg_cat)) {
                                $cart_total_qty_count += $cart_item['quantity'];
                                $prod_line_count += 1;
                            }
                        }

                    }
                }

                if($wg_min_cart_qty <= $prod_line_count && $wg_min_qty_cart_qty <= $cart_total_qty_count) {
                    $this->OCWG_setfree_product($cart_object, $wg_gift_combo, $wg_maximum_gift);
                }
            }

        }


        function OCWG_setdefault_isgift_key($cart_object) {
            global $woocommerce;

            foreach ( $cart_object->cart_contents as $key => $value ) {

                if(isset($value['isgift']) && $value['isgift'] == 'yes') {
                    $woocommerce->cart->cart_contents[$key]['isgift'] = 'no';
                }

                $wg_gift_remove_gift_items = get_option('wg_gift_remove_gift_items', 'enable');

                if($wg_gift_remove_gift_items == 'enable') {
                    if(isset($value['isgift']) && $value['isgift'] == 'no') {
                        WC()->cart->remove_cart_item( $key );
                    }
                }

            }

        }


        function OCWG_setfree_product($cart_object, $wg_gift_combo, $wg_maximum_gift) {
            global $woocommerce;

            $custom_price = 0;
            $new_qty = 1;
            $d_qty = 0;

            foreach ( $cart_object->cart_contents as $key => $value ) {

                if($d_qty < $wg_maximum_gift) {
                    if($value['variation_id'] != 0) {
                        if(in_array($value['variation_id'], $wg_gift_combo)) {
                            $value['data']->price = $custom_price;
                            $value['data']->set_price($custom_price);  
                            $cart_object->set_quantity( $key, $new_qty );
                            $d_qty = $d_qty + 1;

                            $woocommerce->cart->cart_contents[$key]['isgift'] = 'yes';

                        } elseif (in_array($value['product_id'], $wg_gift_combo)) {
                        	$value['data']->price = $custom_price;
                            $value['data']->set_price($custom_price);
                            $cart_object->set_quantity( $key, $new_qty );
                            $d_qty = $d_qty + 1;

                            $woocommerce->cart->cart_contents[$key]['isgift'] = 'yes';
                        }
                    } else {
                        if(in_array($value['product_id'], $wg_gift_combo)) {
                            $value['data']->price = $custom_price;
                            $value['data']->set_price($custom_price);
                            $cart_object->set_quantity( $key, $new_qty );
                            $d_qty = $d_qty + 1;

                            $woocommerce->cart->cart_contents[$key]['isgift'] = 'yes';
                        }
                    }
                }

            }
            WC()->cart->set_session();
        }


        function OCWG_gift_item_name( $item_name, $item ) {

            if ( isset( $item['isgift'] ) && $item['isgift'] == 'yes' ) {

                $wg_gift_prod_txt_in_cart = get_option('wg_gift_prod_txt_in_cart', 'Gift Product');

                $ocwg_gift_text = esc_html__( '('.$wg_gift_prod_txt_in_cart.')', 'ocwg' );
                
                if ( strpos( $item_name, '</a>' ) !== false ) {
                    $name = sprintf( $ocwg_gift_text, '<a href="' . get_permalink( $item['product_id'] ) . '">' . get_the_title( $item['product_id'] ) . '</a>' );
                } else {
                    $name = sprintf( $ocwg_gift_text, get_the_title( $item['product_id'] ) );
                }

                $item_name .= ' <span class="ocwg_item_name">' . apply_filters( 'ocwg_item_name', $name, $item ) . '</span>';
            }

            return $item_name;
        }

        
        function OCWG_init_action() {
            if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'ocwg_giftred' && isset($_REQUEST['ocwg_prod']) && $_REQUEST['ocwg_prod'] !='') {

                $prod_id = $_REQUEST['ocwg_prod'];
                $redpage = $_REQUEST['redpage'];
                $product = wc_get_product( $prod_id );

                $prod_type = $product->get_type();

                if($prod_type == 'simple') {
                	WC()->cart->add_to_cart( $prod_id );
                }
                
                if($prod_type == 'simple') {
                	WC()->cart->add_to_cart( $prod_id );
					if($redpage == 'cart') {
                        wp_safe_redirect( wc_get_cart_url() );    
                    } elseif ($redpage == 'checkout') {
                        wp_safe_redirect( wc_get_checkout_url() );
                    }
					exit;
                } else {
                	$url = get_permalink( $prod_id );
                	wp_redirect( $url );
					exit;
                }
            }
        }

        function OCWG_gift_cart_item_price_custom_label( $price, $cart_item, $cart_item_key ) {
            
            $free_label = '<span class="amount">' . __('Free') . '</span>';

            if(isset($cart_item['isgift']) && $cart_item['isgift'] == 'yes') {
                return $free_label;
            } else {
                return $price;
            }
        }


        function OCWG_gift_order_item_price_custom_label( $subtotal, $item, $order ) {
            if($item->get_meta('_isgift') == 'Yes') {
                $free_label = '<span class="amount">' . __('Free') . '</span>';
                return $free_label;
            } else {
                return $subtotal;
            }
        }

        function OCWG_gift_order_item_meta ( $item_id, $cart_item, $cart_item_key ) {
            if ( isset( $cart_item[ 'isgift' ] ) && $cart_item[ 'isgift' ] == 'yes' ) {
                wc_add_order_item_meta( $item_id, '_isgift',  'Yes');
            }
        }

        function OCWG_gift_before_order_itemmeta( $item_id, $item, $_product ){
            $isgift = wc_get_order_item_meta( $item_id, '_isgift', true );

            if($isgift == 'Yes') {
                $wg_gift_prod_txt_in_cart = get_option('wg_gift_prod_txt_in_cart', 'Gift Product');
                echo "<strong><em>".$wg_gift_prod_txt_in_cart."</em></strong>";
            }
        }

        function OCWG_gift_hidden_order_itemmeta($arr) {
            $arr[] = '_isgift';
            return $arr;
        }

        function OCWG_gift_cart_item_quantity( $product_quantity, $cart_item_key, $cart_item ) {
            if( is_cart() ) {
                if ( isset( $cart_item[ 'isgift' ] ) && $cart_item[ 'isgift' ] == 'yes' ) {

                    $product_quantity = sprintf( '<div class="quantity"><input type="number" class="input-text qty text" name="cart[%1$s][qty]" value="%2$s" title="Qty" size="4" inputmode="numeric" disabled></div>', $cart_item_key, $cart_item['quantity'] );
                }
            }
            return $product_quantity;
        }


        function init() {

            if(get_option('wg_gift_enable', 'enable') == 'enable') {
                
                if(get_option('wg_allow_only_logged_in') == 'enable') {
                    if(is_user_logged_in()) {

                        add_action( 'woocommerce_after_cart_table', array($this, 'OCWG_frontdesign' ));
                        add_action( 'woocommerce_before_calculate_totals', array($this, 'OCWG_add_custom_price' ));
                        add_action( 'wp', array($this, 'OCWG_init_action' ));
                        add_action('woocommerce_before_cart_table', array($this, 'OCWG_gift_eligibility_message' ));
                        
                        if(get_option('wg_ckout_enable') == 'enable') {
                            add_action('woocommerce_before_checkout_form', array($this, 'OCWG_gift_eligibility_message' ));
                            add_action('woocommerce_before_checkout_form', array($this, 'OCWG_frontdesign_checkout' ));
                        }
                        
                        add_filter( 'woocommerce_cart_item_name', array( $this, 'OCWG_gift_item_name' ), 10, 2 );
                        // Cart items displayed prices and line item subtotal
                        add_filter( 'woocommerce_cart_item_subtotal', array( $this, 'OCWG_gift_cart_item_price_custom_label'), 20, 3 );
                        add_filter( 'woocommerce_cart_item_price', array( $this, 'OCWG_gift_cart_item_price_custom_label'), 20, 3 );
                        // Order items displayed prices (and also email notifications)
                        add_filter( 'woocommerce_order_formatted_line_subtotal', array( $this, 'OCWG_gift_order_item_price_custom_label'), 20, 3 );
                        add_action( 'woocommerce_add_order_item_meta', array( $this, 'OCWG_gift_order_item_meta') , 10, 3 );
                        add_action( 'woocommerce_before_order_itemmeta', array( $this, 'OCWG_gift_before_order_itemmeta'), 10, 3 );
                        add_filter('woocommerce_hidden_order_itemmeta', array( $this, 'OCWG_gift_hidden_order_itemmeta'), 10, 1);
                        add_filter( 'woocommerce_cart_item_quantity', array( $this, 'OCWG_gift_cart_item_quantity'), 10, 3 );
                    }
                } else {
                    add_action( 'woocommerce_after_cart_table', array($this, 'OCWG_frontdesign' ));
                    add_action( 'woocommerce_before_calculate_totals', array($this, 'OCWG_add_custom_price' ));
                    add_action( 'wp', array($this, 'OCWG_init_action' ));
                    add_action('woocommerce_before_cart_table',array($this, 'OCWG_gift_eligibility_message' ));
                    
                    if(get_option('wg_ckout_enable') == 'enable') {
                        add_action('woocommerce_before_checkout_form', array($this, 'OCWG_gift_eligibility_message' ));
                        add_action('woocommerce_before_checkout_form', array($this, 'OCWG_frontdesign_checkout' ));
                    }

                    add_filter( 'woocommerce_cart_item_name', array( $this, 'OCWG_gift_item_name' ), 10, 2 );
                    // Cart items displayed prices and line item subtotal
                    add_filter( 'woocommerce_cart_item_subtotal', array( $this, 'OCWG_gift_cart_item_price_custom_label'), 20, 3 );
                    add_filter( 'woocommerce_cart_item_price', array( $this, 'OCWG_gift_cart_item_price_custom_label'), 20, 3 );
                    // Order items displayed prices (and also email notifications)
                    add_filter( 'woocommerce_order_formatted_line_subtotal', array( $this, 'OCWG_gift_order_item_price_custom_label'), 20, 3 );
                    add_action( 'woocommerce_add_order_item_meta', array( $this, 'OCWG_gift_order_item_meta') , 10, 3 );
                    add_action( 'woocommerce_before_order_itemmeta', array( $this, 'OCWG_gift_before_order_itemmeta'), 10, 3 );
                    add_filter('woocommerce_hidden_order_itemmeta', array( $this, 'OCWG_gift_hidden_order_itemmeta'), 10, 1);
                    add_filter( 'woocommerce_cart_item_quantity', array( $this, 'OCWG_gift_cart_item_quantity'), 10, 3 );
                }
            }
        }

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }

    }
    OCWG_front::instance();
}