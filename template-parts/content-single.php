<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mishie
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mishie' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</section><!-- #post-## -->
if ( ! is_attachment() ) {
	
		comments_template();
	}