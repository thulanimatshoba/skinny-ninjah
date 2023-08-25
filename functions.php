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
	define( 'SKINNY_NINJAH_VERSION', '1.0.1' );
}

require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/filters.php';
require get_template_directory() . '/inc/post-meta.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
