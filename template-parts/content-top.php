<?php
/**
 * The Content-top template
 * @package   mishie
 * @copyright Copyright (c) 2014 Mignon Style
 * @license   GNU General Public License v2.0
 * @since     mishie 1.0
 */
?>
<?php if ( is_search() || is_archive() ) : ?>
<header id="content-header">
	<div id="content-top">
		<h1 class="page-title">
		<?php
		$cpt = get_post_type_object( get_post_type() );
		$taxonomy_names = get_post_taxonomies();
		$taxonomy_names = ( ! empty( $taxonomy_names ) ) ? $taxonomy_names[0] : '';

		if ( ! empty( $cpt ) && is_post_type_archive( $cpt ) ) {
			printf( __( 'Post Type : %s', 'mishie' ), esc_html( $cpt -> label ) );
		} elseif ( ! empty( $taxonomy_names ) && is_tax( $taxonomy_names ) ) {
			$query_tax = get_queried_object();
			printf( __( 'Category : %s', 'mishie' ), esc_html( $query_tax -> name ) );
		} elseif ( is_search() ) {
			printf( __( 'Search Results of "%s"', 'mishie' ), '<span class="search-str">' . get_search_query() . '</span>' );
		} elseif ( is_category() ) {
			printf( __( 'Category : %s', 'mishie' ), single_cat_title( '' , false ) );
		} elseif ( is_tag() ) {
			printf( __( 'Tag : %s', 'mishie' ), single_tag_title( '' , false ) );
		} elseif ( is_year() ) {
			the_time( __( 'Y', 'mishie' ) );
		} elseif ( is_month() ) {
			the_time( __( 'F Y', 'mishie' ) );
		} elseif ( is_day() ) {
			the_time( __( 'F j, Y', 'mishie' ) );
		} elseif ( is_author() ) {
			printf( __( 'Author : %s', 'mishie' ), get_the_author() );
		} else {
			_e( 'Archives', 'mishie' );
		}
		?>
		</h1>
		<p><?php printf( __( '%d posts', 'mishie' ), absint( $wp_query->found_posts ) ); ?></p>
	</div><!-- /content-top -->
</header><!-- /content-header -->
<?php endif; ?>