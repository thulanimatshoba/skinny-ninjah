<?php

/**
 * Enqueue scripts and styles.
 */
function skinny_ninjah_scripts() {
    wp_enqueue_style( 'skinny-ninjah-style', get_stylesheet_uri(), array(), SKINNY_NINJAH_VERSION );
    wp_style_add_data( 'skinny-ninjah-style', 'rtl', 'replace' );

    wp_enqueue_script( 'skinny-ninjah-navigation', get_template_directory_uri() . '/js/navigation.js', array(), SKINNY_NINJAH_VERSION, true );

    //UIKit
    wp_enqueue_style( 'uikit', '//cdnjs.cloudflare.com/ajax/libs/uikit/3.15.22/css/uikit.min.css' );
    wp_enqueue_script( 'uikit', '//cdnjs.cloudflare.com/ajax/libs/uikit/3.15.22/js/uikit.min.js', array( 'jquery' ), '3.15.22', true );
    wp_enqueue_script( 'uikit-icons', '//cdnjs.cloudflare.com/ajax/libs/uikit/3.15.22/js/uikit-icons.min.js', array( 'jquery' ), '3.15.22', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'skinny_ninjah_scripts' );

