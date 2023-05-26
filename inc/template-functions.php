<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Skinny_Ninjah
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function skinny_ninjah_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'skinny_ninjah_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function skinny_ninjah_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'skinny_ninjah_pingback_header' );

//Track Post Views
if ( !function_exists('get_article_views' )) :
    function get_article_views($postID)
    {
        $count_key = 'article_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if ($count == '') {
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return 0;
        }
        return $count;
    }
endif;

/**
 * Track Article Views
 */
if ( !function_exists('update_article_views' )) :
    function update_article_views( $postID )
    {
        if ( !current_user_can('administrator' )) {
            $user_ip = $_SERVER['REMOTE_ADDR']; //retrieve the current IP address of the visitor
            $key = $user_ip . 'x' . $postID; //combine post ID & IP to form unique key
            $value = [ $user_ip, $postID ]; // store post ID & IP as separate values (see note)
            $visited = get_transient( $key ); //get transient and store in variable

            //check to see if the Post ID/IP ($key) address is currently stored as a transient
            if ( false === ( $visited ) ) {
                //store the unique key, Post ID & IP address for 12 hours if it does not exist
                set_transient( $key, $value, 60 * 60 * 12 );

                // now run post views function
                $count_key = 'article_views_count';
                $count = get_post_meta( $postID, $count_key, true );
                if ( $count == '' ) {
                    $count = 0;
                    delete_post_meta( $postID, $count_key );
                    add_post_meta( $postID, $count_key, '0' );
                } else {
                    $count++;
                    update_post_meta( $postID, $count_key, $count );
                }
            }
        }
    }
endif;