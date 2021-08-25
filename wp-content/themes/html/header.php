<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php wp_head(); ?> 
      <!-- Bootstrap CSSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    

    <!-- Font Awesome CSSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link href="<?php bloginfo('template_url');?>/css/custom.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url');?>/css/responsive.css" rel="stylesheet">
    

    <title>Mgear</title>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>



<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/jquery.js'; ?>">
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/jquery-ui.min.js'; ?>">
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/bootstrap.js'; ?>">
</script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/bootstrap.css'; ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

     </head>   

  <body <?php body_class(); ?>>
 <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark" >
       <div class="container">
        	 
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
        <!--  <nav id="navbar" class="navbar" > -->
       <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
      	<?php 
        wp_nav_menu(
        array(
          'menu'           => 'menu',
           // 'ul_class'=>'menu',
          
          'container' => '',
       
          )
            );?>
        <a href="<?php echo get_site_url();?>" class="logo mr-auto" ><?php 
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
						?></a>

		<?php wp_nav_menu(
        array(
          'menu'           => 'menu-2',
          // 'ul_class'=>'menu',
          
          'container' => ''
        
          )
            );

      ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </div>
    <!--   </div> -->

      </nav>      
    </header>


   