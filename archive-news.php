<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mishie
 */

get_header(); ?>
<div class="row">
    <div class="col-md-3">
    <?php get_sidebar(); ?>
    </div>
    <div class="col-md-9">
		<div id="content" class="site-content">
			<div id="primary" class="content-area">
				<article id="main" class="site-main" role="main">

		<?php
			
		if ( ! is_404() && have_posts() ) {
			$options = mishie_get_option();
			if ( ! empty( $options['show_archives_posts'] ) ) {
				get_template_part( 'template-parts/content', 'top' );
			}
			if  (  is_archive() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'archive'  );
				}
				the_posts_navigation();
			}else{
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content');
				}
			}
				
		} else {
			get_template_part( 'content', 'none' );
		} ?>
			
		</article><!-- #main -->
			</div><!-- #primary -->
    	</div><!-- #content -->
    </div>    
</div>
<?php
get_footer();