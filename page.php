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
		if ( have_posts() ) :

			

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'page' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</article><!-- #main -->
			</div><!-- #primary -->
    	</div><!-- #content -->
    </div>
    
</div>
<?php
get_footer();

