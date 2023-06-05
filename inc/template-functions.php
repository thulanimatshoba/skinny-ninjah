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

/**
 * Related Articles
 *
 * @param array $args
 * @return
 *@global object $post
 */
function skinny_ninjah_related_posts( array $args = [] ): void
{
    global $post;
    // default args
    $args = wp_parse_args( $args, [
        'post_id' => !empty( $post ) ? $post->ID : '',
        'taxonomy' => 'category',
        'limit' => 3,
        'post_type' => !empty( $post ) ? $post->post_type : 'post',
        'orderby' => 'date',
        'order' => 'DESC'
    ]);
    // check taxonomy
    if ( !taxonomy_exists( $args['taxonomy'] ) ) {
        return;
    }
    // post taxonomies
    $taxonomies = wp_get_post_terms( $args['post_id'], $args['taxonomy'], ['fields' => 'ids'] );

    if ( empty( $taxonomies ) ) {
        return;
    }

    // query
    $related_posts = get_posts([
        'post__not_in' => (array) $args['post_id'],
        'post_type' => $args['post_type'],
        'tax_query' => [
            [
                'taxonomy' => $args['taxonomy'],
                'field' => 'term_id',
                'terms' => $taxonomies
            ],
        ],
        'posts_per_page' => $args['limit'],
        'orderby' => $args['orderby'],
        'order' => $args['order']
    ]);

    include( locate_template('related-articles-template.php', false, false) );

    wp_reset_postdata();
}

add_filter('comment_form_default_fields', 'remove_website_field_on_comments');
function remove_website_field_on_comments( $fields )
{
    if( isset( $fields['url'] ) )
        unset( $fields['url']);
    return $fields;
}

/**
 * @param $limit
 * This is a filter to show a limited number of words that i title can show
 */
function skinny_ninjah_title($limit)
{
    global $post;

    $title = get_the_title($post->ID);
    if (strlen($title) > $limit) {
        $title = substr($title, 0, $limit) . '...';
    }

    echo $title;
}

function skinny_ninjah_excerpt_length($length)
{
    return 100;
}
add_filter('excerpt_length', 'skinny_ninjah_excerpt_length', 999);


/**
 * @param $text
 * @return bool|string
 * Trimmed Excerpt
 */
function tm_length_excerpt($text)
{
    if (is_admin()) {
        return $text;
    }
    $read_more = '&hellip; <a class="skinny-ninjah-button read-more-link uk-button uk-button-default" href="' . get_the_permalink() . '">Read more</a>';
    // Fetch the post content directly
    $text = get_the_content();
    // Clear out shortcodes
    $text = strip_shortcodes($text);
    // Get the first 140 characteres
    $text = substr($text, 0, 180);
    // Add a read more tag
    $text .= $read_more;
    return $text;
}
// Leave priority at default of 10 to allow further filtering
add_filter('wp_trim_excerpt', 'tm_length_excerpt', 10, 1);

/**
 * @param $mimes
 * @return mixed
 *  This allows you to upload SVG's
 */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

