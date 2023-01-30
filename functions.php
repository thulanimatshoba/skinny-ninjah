<?php
/**
 * Skinny Ninjah functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skinny_Ninjah
 */

if ( ! defined( 'SKINNY_NINJAH_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'SKINNY_NINJAH_VERSION', '1.0.0' );
}

/**
 * Assets.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Filters.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Post Meta.
 */
require get_template_directory() . '/inc/post-meta.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
