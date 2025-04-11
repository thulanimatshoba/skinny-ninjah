<?php
/**
 * Skinny Ninjah functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skinny_Ninjah
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

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

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options' );
function crb_attach_post_options() {
    Container::make( 'post_meta', __( 'Section Options' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'about-us-page.php' )
        ->add_fields( array(
            Field::make( 'complex', 'crb_sections', 'Sections' )
                // Our first group will be a simple rich text field
                ->add_fields( 'text', 'Text', array(
                    Field::make( 'rich_text', 'text', 'Text' ),
                ) )

                // Second group will be a list of files for users to download
                ->add_fields( 'file_list', 'File List', array(
                    Field::make( 'complex', 'files', 'Files' )
                        ->add_fields( array(
                            Field::make( 'file', 'file', 'File' ),
                        ) ),
                ) )

                // Third group will be a list of manually selected posts
                // used as a simple curated "Related posts" listing
                ->add_fields( 'related_posts', 'Related Posts', array(
                    Field::make( 'association', 'posts', 'Posts' )
                        ->set_types( array(
                            array(
                                'type' => 'post',
                                'post_type' => 'post',
                            ),
                        ) ),
                ) ),
        ) );
}

// Add the PDF download link to the checkout page
function custom_checkout_add_pdf_link() {
    echo '<p><a href="' . esc_url( home_url( '/download-invoice/' ) ) . '" target="_blank">Download PDF Invoice</a></p>';
}
add_action( 'woocommerce_review_order_before_submit', 'custom_checkout_add_pdf_link' );

add_filter('woocommerce_thankyou_order_received_text', 'wpo_wcpdf_thank_you_link', 10, 2);
function wpo_wcpdf_thank_you_link( $text, $order ) {
    if ( is_user_logged_in() ) {
        $pdf_url = wp_nonce_url( admin_url( 'admin-ajax.php?action=generate_wpo_wcpdf&template_type=invoice&order_ids=' . $order->id . '&my-account'), 'generate_wpo_wcpdf' );
        $text .= '<p><a href="'.esc_attr($pdf_url).'">Download a printable invoice / payment confirmation (PDF format)</a></p>';
    }
    return $text;
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
