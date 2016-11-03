<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mishie
 */

?>

	

	<footer id="colophon" class="site-footer" role="contentinfo">
     <?php wp_nav_menu( array( 'theme_location' => 'scondry', 'container' => false,  'menu_class' => 'footer-nav clearfix','menu_id' => 'scondry-menu' ) ); ?>
		<div class="site-info">
        	<div class="inner clearfix">
       			<div class="row">
          			<div class="col-md-4">
            			<p class="footer-logo"><img src="http://mishiewp2/wp-content/uploads/2016/11/logo2.jpg" alt="Mishie" /></p>
          			</div>
          			<div class="col-md-8"> 
          				<p class="copyright"><?php mishie_footer_copyright(); ?><br />
            　				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mishie' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'mishie' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'mishie' ), 'mishie', '<a href="http://harupuress/mishie/" rel="designer">otaharunobu</a>' ); ?>
            			</p>
          
          			</div>
              
        		</div>
      		</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
  </div><!-- #page -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
