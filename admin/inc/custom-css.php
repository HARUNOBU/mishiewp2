<?php
/**
 * Custom CSS
 * @package   Chocolat
 * @copyright Copyright (c) 2014 Mignon Style
 * @license   GNU General Public License v2.0
 * @since     Chocolat 1.1.6
 */

/**
 * ------------------------------------------------------------
 * 1.1 - Featured image sneak or no sneak
 * ------------------------------------------------------------
 */

if ( ! function_exists( 'mishie_featured_sneak_js' ) ) :
function mishie_featured_sneak_js() {
	$options = mishie_get_option();
	$featured_sneak_js = false;

	if ( ! empty( $options['featured_position'] ) && ( $options['featured_position'] != 'center' ) ) {
		if ( ! empty( $options['featured_sneak'] ) && ( $options['featured_sneak'] == 'sneak' ) ) {
			$featured_sneak_js = true;
		}
	}
	return $featured_sneak_js;
}
endif;

/**
 * ------------------------------------------------------------
 * 1.2 - Featured image position and sneak option
 * ------------------------------------------------------------
 */

if ( ! function_exists( 'mishie_featured_image' ) ) :
function mishie_featured_image() {
	// PC only
	if ( mishie_is_mobile() ) return;
	$options = mishie_get_option();

	if ( ! empty( $options['featured_position'] ) && ( $options['featured_position'] != 'center' ) ) {
		// featured position right or left
		$featured_position = ( $options['featured_position'] == 'right' ) ? 'right' : 'left';
		$entry_thumbnail = "\t" . 'text-align: ' . $featured_position . ';' . "\n";

		echo '<style type="text/css">' . "\n";
		if ( ! empty( $entry_thumbnail ) ) {
			echo 'section .entry-thumbnail {' . "\n";
			echo esc_attr( $entry_thumbnail );
			echo '}' . "\n";
		}
		echo '</style>' . "\n";
	}
}
endif;
add_action( 'wp_head', 'mishie_featured_image' );

/**
 * ------------------------------------------------------------
 * 2.1 - Featured image sneak or no sneak of home page
 * ------------------------------------------------------------
 */

if ( ! function_exists( 'mishie_featured_sneak_home_js' ) ) :
function mishie_featured_sneak_home_js() {
	$options = mishie_get_option();
	$featured_sneak_home_js = false;

	if ( ! empty( $options['featured_home_position'] ) && ( $options['featured_home_position'] != 'center' ) ) {
		if ( ! empty( $options['featured_home_sneak'] ) && ( $options['featured_home_sneak'] == 'sneak' ) ) {
			$featured_sneak_home_js = true;
		}
	}
	return $featured_sneak_home_js;
}
endif;

/**
 * ------------------------------------------------------------
 * 2.2 - Featured image position and sneak option of home page
 * ------------------------------------------------------------
 */

if ( ! function_exists( 'mishie_featured_home' ) ) :
function mishie_featured_home() {
	// PC only
	if ( mishie_is_mobile() ) return;
	$options = mishie_get_option();

	if ( empty( $options['show_featured_home'] ) ) return;

	if ( ! empty( $options['featured_home_position'] ) && ( $options['featured_home_position'] != 'center' ) ) {
		$featured_home_position = ( $options['featured_home_position'] == 'right' ) ? 'right' : 'left';
		$entry_home_thumbnail = "\t" . 'text-align: ' . $featured_home_position . ';' . "\n";

		echo '<style type="text/css">' . "\n";
		if ( ! empty( $entry_home_thumbnail ) ) {
			echo 'section .entry-thumbnail.home-thumbnail {' . "\n";
			echo esc_attr( $entry_home_thumbnail );
			echo '}' . "\n";
		}
		echo '</style>' . "\n";
	}
}
endif;
add_action( 'wp_head', 'mishie_featured_home' );

/**
 * ------------------------------------------------------------
 * 3.1 - Add Custom CSS
 * ------------------------------------------------------------
 */

if ( ! function_exists( 'mishie_custom_css' ) ) :
function mishie_custom_css() {
	$options = mishie_get_option();

	if ( ! empty( $options['custom_css'] ) ) {
		echo '<style type="text/css">';
		echo "\n" . wp_kses_stripslashes( $options['custom_css'] ) . "\n";
		echo '</style>' . "\n";
	}
}
endif;
add_action( 'wp_head', 'mishie_custom_css' );