<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mishie
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="padding-top: 20px; padding-bottom: 70px;">
<div class="container-fluid">
  <div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mishie' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
    <div class="row">
      <div class="col-md-3">
      <img src="http://mishiewp2/wp-content/uploads/2016/11/logo.jpg" class="img-responsive" alt="logo">
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <p class="tel"><a href="09078606152"><strong>Tel 0564-●●-●●●●</strong></a></p>
        <p class="inquiry"><img src="http://mishiewp2/wp-content/uploads/2016/11/inquiry2.png" class="img-responsive img-rounded" alt="inquiry"></p>
        <p class="eigyo"><strong>営業時間：10：00～20:00　定休日火曜日</strong></p>
      </div>
    </div>
    <div class="jumbotron hero-1">    
	  <div class="row">
	    <div class="col-md-6">
<?php 
			if ( is_front_page() || is_home() ) : ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php else : ?>
				<p class="site-title"><?php bloginfo( 'name' ); ?></p> 
                <?php
			endif; 
			?>        
        </div>
	    <div class="col-md-6">
         <?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php
			endif; ?>      
          
        </div>
      </div> 
    </div>
    
		

		<nav id="site-navigation" class="navbar navbar-default navbar-custom" role="navigation">
          <div class="container-fluid">
           
			  <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mishie' ); ?></button>
			 
           <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false,  'menu_class' => '"nav navbar-nav','menu_id' => 'primary-menu' ) ); ?>
          </div>
		</nav><!-- #site-navigation -->
        <div  class="breadcrumb">
		<?php mishie_breadcrumb(); ?>
	</div><!-- /header-bottom -->
	</header><!-- #masthead -->

	
