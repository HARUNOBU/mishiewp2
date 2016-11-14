<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-post">
		<div class="entry-edit clearfix">
			<?php edit_post_link( __( 'Edit', 'mishie' ), '<span class="post-edit">', '</span>' ); ?>
		</div>
		<header class="entry-header">
			<div class="entry-headermiddle clearfix">
			<?php  mishie_entry_dates();?> 
			<div class="entry-title">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> 
			</div>
			</div>
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php  mishie_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->



		<div class="entry-content">
			<?php
			if ( has_post_thumbnail() && ! post_password_required() ) :
			$options = mishie_get_option();
			$thumbnail_name = ( ! empty( $options['show_featured_home'] ) && ! is_singular() ) ? 'home-post-thumbnail' : 'single-post-thumbnail';
			$thumbnail_class = ( ! empty( $options['show_featured_home'] ) && ! is_singular() ) ? ' home-thumbnail' : '';
		?>
			<div class="entry-thumbnail<?php echo esc_attr( $thumbnail_class ); ?> thumbnail">
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( $thumbnail_name ); ?>
				</a>
			</div>
			<?php endif; /* /has_post_thumbnail() && ! post_password_required() */ ?>
			<?php
     		if( has_excerpt() ){
          		the_excerpt(sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_s' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				));
          		echo '<a href="';
          		the_permalink();
          		echo '">続きを読む</a>';
     		} else {
          		the_excerpt(sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_s' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			));
     	}

			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	

		</div><!-- /post-content -->
	</div>

	
</section><!-- #post-## -->