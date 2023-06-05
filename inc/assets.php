<?php

/**
 * Enqueue scripts and styles.
 */
function skinny_ninjah_scripts() {
    wp_enqueue_style( 'skinny-ninjah-style', get_stylesheet_uri(), array(), SKINNY_NINJAH_VERSION );
    wp_style_add_data( 'skinny-ninjah-style', 'rtl', 'replace' );

    wp_enqueue_script( 'skinny-ninjah-navigation', get_template_directory_uri() . '/js/navigation.js', array(), SKINNY_NINJAH_VERSION, true );
    wp_enqueue_script( 'skinny-ninjah', get_template_directory_uri() . '/js/skinny-ninjah.js', array(), SKINNY_NINJAH_VERSION, true );
    //wp_enqueue_script( 'loadmore', get_template_directory_uri() . '/js/loadmore.js', array(), SKINNY_NINJAH_VERSION, true );

    //UIKit
    wp_enqueue_style( 'uikit', '//cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css' );
    wp_enqueue_script( 'uikit', '//cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit.min.js', array( 'jquery' ), '3.16.17', true );
    wp_enqueue_script( 'uikit-icons', '//cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit-icons.min.js', array( 'jquery' ), '3.16.17', true );

    //Font Awesome
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'skinny_ninjah_scripts' );
