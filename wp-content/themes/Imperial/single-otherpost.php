<?php /* Template Name: Custome post Page */ ?>

<?php wp_head() ;
 ?>
<?php ?>

<section>
<div class="container wow fadeInUp">
        <div class="row">
        
          <div class="col-md-12">
            <h3 class="section-title"><?php the_title() ?></h3>
            <div class="section-title-divider"></div>
        
          </div>
        </div>
        <?php
        $count_args = array(
          'post_type'=>'otherpost',
          'post_per_page'    => 3
        );
        $count_posts = new WP_Query($count_args);?>

        <div class="row">
        <?php if($count_posts->have_posts()): ?>
            <?php while($count_posts->have_posts() ): $count_posts->the_post(); ?>
          <div class="col-md-3">
            <div class="member">
              <div class="pic"><?php $featured_img_url = get_the_post_thumbnail_url($id, 'full');  ?>
                    <img src="<?php echo $featured_img_url; ?>" alt=""></div>
              <h4><?php the_title()?></h4>
              <span><?php the_content()?></span>
              
            </div>
          </div>

          <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <?php endif; ?>

         
        </div>
      </div>
</section>


    <?php get_footer();?>