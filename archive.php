<?php
/**
 * The template for displaying archive pages.
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
		
		if ( have_posts() ) : ?>

			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

		

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

