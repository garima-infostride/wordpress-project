<?php /* Template Name: HomePage */ ?>




  <main id="main">

   <!-- ======= Hero Section ======= -->
   <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
        <a href="<?php echo get_site_url();?>" class=""><?php 
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
						?></a>
          <!-- <img class="" src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="Imperial"> -->
        </div>

        <h1>Welcome to Imperial studios</h1>
        <h2>We create <span class="typed" data-typed-items="beautiful graphics, functional websites, working mobile apps"></span></h2>
        <div class="actions">
          <a href="#about" class="btn-get-started">Get Strated</a>
          <a href="#services" class="btn-services">Our Services</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <?php get_header() ?>

    <!-- ======= About Section ======= -->
    <section id="about">
      
      <div class="container wow fadeInUp">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title"><?php the_field('heading');?></h3>
            <div class="section-title-divider"></div>
            <p class="section-description"><?php the_field('desc');?></p>
          </div>
        </div>
      </div>
      <div class="container about-container wow fadeInUp">
        <div class="row">
        

          <div class="col-lg-6 about-img">
            <img src="<?php the_field('image'); ?>" alt="">
          </div>

          <div class="col-md-6 about-content">
          
            <h2 class="about-title"><?php the_field('heading-2'); ?></h2>
            <?php if (have_rows('about-repeater')) :
        while (have_rows('about-repeater')) : the_row(); ?>
            <p class="about-text">
            <?php the_sub_field('about-para-1') ?></br>
            <?php the_sub_field('about-para-2') ?></br>
            <?php the_sub_field('about-para-3') ?></br>
            </p>
            <?php endwhile;?>
        <?php endif;?> 
            
          </div>
          
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container wow fadeInUp">
        <div class="row">
        
          <div class="col-md-12">
            <h3 class="section-title"><?php  the_field('serviceheading') ?></h3>
            <div class="section-title-divider"></div>
            <p class="section-description"><?php  the_field('servicedesc') ?></p>
          </div>
        </div>

        <div class="row">
        <?php if (have_rows('section')) :
        while (have_rows('section')) : the_row(); ?>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><?php  the_sub_field('icon') ?></i></div>
            <h4 class="service-title"><a href=""><?php  the_sub_field('ser-heading-1') ?></a></h4>
            <p class="service-description"><?php  the_sub_field('ser-para-1') ?></p>
          </div>
         
          <?php endwhile;?>
        <?php endif;?> 
        </div>
      </div>
    </section><!-- End Services Section -->

    


<!-- slider section -->
<section id="slider">
<div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php the_field('slider_hading')?></h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><?php the_field('slider_description')?></p>
        </div>
    </div>
<div class="owl-slider">

<div id="carousel" class="owl-carousel">
<?php
        $count_args = array(
          'post_type'    => 'product',
          'category' => 'product',
          'posts_per_page'    => 10
        );
        $count_posts = new WP_Query($count_args);
        
        while ($count_posts->have_posts()) {
          $count_posts->the_post();
          $id=$count_posts->post->ID;
        ?>

        <div class="item">
        <?php $featured_img_url = get_the_post_thumbnail_url($id, 'full');  ?>
          <img src="<?php echo $featured_img_url; ?>" alt="1000X1000">
          <div class="mhn-text">
					<h4><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h4>
					<p><?php  the_content(); ?></p>
          <div class="social">
          <?php echo do_shortcode('[add_to_cart id = '.$id.']'); ?>
          </div>
         
				</div>
        </div>
        <?php 
          }
				  wp_reset_query(); 
        ?>
</div>
</div>
</section>
<!-- end slider section -->

<!-- ======= Testimonials Section ======= -->
    <section id="testimonials">
      <div class="container wow fadeInUp">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title"><?php  the_field('t-heading') ?></h3>
            <div class="section-title-divider"></div>
            <p class="section-description"><?php  the_field('t-desc') ?></p>
          </div>
        </div>
        <?php $counter=1; ?>
        <?php if (have_rows('t-section')) :
        while (have_rows('t-section')) : the_row(); ?>
        <?php if(($counter)%2!=0):?>
        <div class="row">
          
          <div class="col-md-3">
          
            <div class="profile">
              <div class="pic"><img src="<?php  the_sub_field('t-image') ?>" alt=""></div>
              <h4><?php  the_sub_field('t-name') ?></h4>
              <span><?php  the_sub_field('t-sub-name') ?></span>     
            </div>
          </div>
          <div class="col-md-9">
            
            <div class="quote">
              <b><img src="<?php the_sub_field('quoute-left') ?>" alt=""></b> <?php  the_sub_field('t-para') ?> <small><img src="<?php the_sub_field('quote-right') ?>" alt=""></small>
            </div>
          </div>
          <?php else : ?> 
            <div class="row">
          <div class="col-md-9">
            <div class="quote">
              <b><img src="<?php the_sub_field('quoute-left') ?>" alt=""></b> <?php  the_sub_field('t-para') ?><small><img src="<?php  the_sub_field('quote-right') ?>" alt=""></small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="profile">
              <div class="pic"><img src="<?php  the_sub_field('t-image') ?>" alt=""></div>
              <h4><?php  the_sub_field('t-name') ?></h4>
              <span><?php  the_sub_field('t-sub-name') ?></span>
            </div>
          </div>
        </div> 
          
          <?php endif; ?>
    
        </div>
          <?php $counter++ ?>
          <?php endwhile;?>
        <?php endif;?> 
        </div>

      </div>
    </section><!-- End Testimonials Section -->

<!-- ======= Team Section ======= -->
<section id="team">
      <div class="container wow fadeInUp">
        <div class="row">
        
          <div class="col-md-12">
            <h3 class="section-title"><?php the_field('team-heading') ?></h3>
            <div class="section-title-divider"></div>
            <p class="section-description"><?php the_field('team-desc') ?></p>
          </div>
        </div>
        
        <div class="row">
        <?php if (have_rows('team-repeater')) :
        while (have_rows('team-repeater')) : the_row(); ?>
          <div class="col-md-3">
            <div class="member">
              <div class="pic"><img src="<?php the_sub_field('team-image') ?>" alt=""></div>
              <h4><?php the_sub_field('team-member-name') ?></h4>
              <span><?php the_sub_field('team-working-area') ?>r</span>
              <div class="social">
                <a href=""><?php the_sub_field('twitter') ?></i></a>
                <a href=""><?php the_sub_field('facebook') ?></i></a>
                <a href=""><?php the_sub_field('insta') ?></i></a>
                <a href=""><?php the_sub_field('linkedin') ?></i></a>
              </div>
            </div>
          </div>

          
          <?php endwhile;?>
        <?php endif;?> 
        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title"><?php the_field('contact-heading')?></h3>
            <div class="section-title-divider"></div>
            <p class="section-description"><?php the_field('contact-desc')?></p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
              <?php the_field('address-icon')?>
              <p><?php the_field('contact-address')?></p>
              </div>

              <div>
              <?php the_field('email-icon')?>
              <p><?php the_field('contact-email')?></p>
              </div>

              <div>
              <?php the_field('number-icon')?>
             <p> <?php the_field('contact-number')?></p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <?php echo do_shortcode('[contact-form-7 id="59" title="Contact form 1"]');?> 
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Contact Section -->

</main>

  <?php wp_footer(); ?>
  <?php get_footer() ?>
