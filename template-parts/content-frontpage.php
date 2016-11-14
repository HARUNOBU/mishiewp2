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
        <?php
        if ( is_single() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
		elseif ( is_home() || is_front_page() ) :         
        else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php mishie_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
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

<section> 
    <?php
if ( ! is_attachment() ) {
    
    mishie_new_post_list( 'news' );
	mishie_new_archive_list( 'news' );
    ///mishie_ad_widget_medium_bottom( 'center' );
}

?>
</section>

