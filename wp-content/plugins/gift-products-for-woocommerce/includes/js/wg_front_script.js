jQuery(document).ready(function() {
    jQuery('body').on('click', '.ocwg_gift_btn', function() {

        if (jQuery(".ocwg_gift_div").length > 0) {
            jQuery('html, body').animate({scrollTop: jQuery('.ocwg_gift_div').offset().top - 100}, 'fast');
        } else {
            jQuery('body').addClass("ocwg_body_gift");
            jQuery('#ocwg_gifts_popup').css('display', 'block');
            jQuery('.ocwg_gifts_popup_overlay').css("display", "block");
        }
        
        return false;
    });

    jQuery('body').on('click', '.ocwg_gifts_popup_close', function() {
        jQuery("#ocwg_gifts_popup").css("display", "none");
        jQuery('.ocwg_gifts_popup_overlay').css("display", "none");
        jQuery('body').removeClass("ocwg_body_gift");
    });

    jQuery('body').on('click', '.ocwg_gifts_popup_overlay', function() {
        jQuery("#ocwg_gifts_popup").css("display", "none");
        jQuery('.ocwg_gifts_popup_overlay').css("display", "none");
        jQuery('body').removeClass("ocwg_body_gift");
    });
     if(OCWGWdata.showslider_autoplay_or_not == "yes"){

        var slider_true = true;

    }else{
        var slider_true = false;
    }


    setInterval(function() {
        jQuery('.wg_gift_slider').owlCarousel({
            loop:false,
            margin:10,
            nav:true,
            dots: true,
            autoplay:slider_true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:OCWGWdata.showslider_item_mobile
                },
                600:{
                    items:OCWGWdata.showslider_item_tablet
                },
                1000:{
                    items:OCWGWdata.showslider_item_desktop
                }
            }
        })
    }, 1000);

    setInterval(function() {
        jQuery('.wg_gift_slider_pp').owlCarousel({
            loop:false,
            margin:10,
            nav:true,
            dots: true,
            autoplay:slider_true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:OCWGWdata.showslider_item_mobile
                },
                600:{
                    items:OCWGWdata.showslider_item_tablet
                },
                1000:{
                    items:OCWGWdata.showslider_item_desktop
                }
            }
        })
    }, 1000);
    
});