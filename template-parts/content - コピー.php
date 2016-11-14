<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mishie
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	

		
		<div class="entry-meta">
			<?php mishie_posted_on(); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mishie' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mishie' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</section><!-- #post-## -->
