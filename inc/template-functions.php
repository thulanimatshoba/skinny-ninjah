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
    $read_more = '&hellip; <a class="read-more-link" href="' . get_the_permalink() . '">Read more</a>';
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

/*
*register form by redpishi.com
*[register role="subscriber"] role: shop_manager | customer | subscriber | contributor | author | editor | administrator
*/
function red_registration_form($atts) {
    $atts = shortcode_atts( array(
        'role' => 'subscriber',
    ), $atts, 'register' );

    $role_number = $atts["role"];
    if ($role_number == "shop_manager" ) { $reg_form_role = (int) filter_var(AUTH_KEY, FILTER_SANITIZE_NUMBER_INT); }  elseif ($role_number == "customer" ) { $reg_form_role = (int) filter_var(SECURE_AUTH_KEY, FILTER_SANITIZE_NUMBER_INT); } elseif ($role_number == "contributor" ) { $reg_form_role = (int) filter_var(NONCE_KEY, FILTER_SANITIZE_NUMBER_INT); } elseif ($role_number == "author" ) { $reg_form_role = (int) filter_var(AUTH_SALT, FILTER_SANITIZE_NUMBER_INT); } elseif ($role_number == "editor" ) { $reg_form_role = (int) filter_var(SECURE_AUTH_SALT, FILTER_SANITIZE_NUMBER_INT); }   elseif ($role_number == "administrator" ) { $reg_form_role = (int) filter_var(LOGGED_IN_SALT, FILTER_SANITIZE_NUMBER_INT); } else { $reg_form_role = 1001; }

    if(!is_user_logged_in()) {
        $registration_enabled = get_option('users_can_register');
        if($registration_enabled) {
            $output = red_registration_fields($reg_form_role);
        } else {
            $output = __('<p>User registration is not enabled</p>');
        }
        return $output;
    }  $output = __('<p>You already have an account on this site, so there is no need to register again.</p>');
    return $output;
}
add_shortcode('register', 'red_registration_form');

function red_registration_fields($reg_form_role) {	?>
    <?php
    ob_start();
    ?>
    <form id="red_registration_form" class="red_form" action="" method="POST">
        <?php red_register_messages();	 ?>
        <p>
            <label for="red_user_login"><?php _e('Username'); ?></label>
            <input name="red_user_login" id="red_user_login" class="red_input" placeholder="Username" type="text"/>
        </p>
        <p>
            <label for="red_user_email"><?php _e('Email'); ?></label>
            <input name="red_user_email" id="red_user_email" class="red_input" placeholder="Email" type="email"/>
        </p>
        <p>
            <label for="red_user_first"><?php _e('First Name'); ?></label>
            <input name="red_user_first" id="red_user_first" type="text" placeholder="First Name" class="red_input" />
        </p>
        <p>
            <label for="red_user_last"><?php _e('Last Name'); ?></label>
            <input name="red_user_last" id="red_user_last" type="text" placeholder="Last Name" class="red_input"/>
        </p>
        <p>
            <label for="password"><?php _e('Password'); ?></label>
            <input name="red_user_pass" id="password" class="red_input" placeholder="Password" type="password"/>
        </p>
        <p>
            <label for="password_again"><?php _e('Password'); ?></label>
            <input name="red_user_pass_confirm" id="password_again" placeholder="Password Again" class="red_input" type="password"/>
        </p>
        <p>
            <input type="hidden" name="red_csrf" value="<?php echo wp_create_nonce('red-csrf'); ?>"/>
            <input type="hidden" name="red_role" value="<?php echo $reg_form_role; ?>"/>
            <input type="submit" value="<?php _e('Register Now'); ?>"/>
        </p>

    </form>  <style>
        .red_form {
            width: 450px!important;
            max-width: 95%!important;
            padding: 30px 20px;
            box-shadow: 0px 0px 20px 0px #00000012, 0px 50px 40px -50px #00000038;
        }
        .red_errors {
            color: #ee0000;
            margin-bottom: 12px;
            width: 450px!important;
            max-width: 95%!important;
        }
        .red_form label::after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
    <?php
    return ob_get_clean();
}
function red_add_new_user() {
    if (isset( $_POST["red_user_login"] ) && wp_verify_nonce($_POST['red_csrf'], 'red-csrf')) {
        $user_login		= sanitize_user($_POST["red_user_login"]);
        $user_email		= sanitize_email($_POST["red_user_email"]);
        $user_first 	    = sanitize_text_field( $_POST["red_user_first"] );
        $user_last	 	= sanitize_text_field( $_POST["red_user_last"] );
        $user_pass		= $_POST["red_user_pass"];
        $pass_confirm 	= $_POST["red_user_pass_confirm"];
        $red_role 		= sanitize_text_field( $_POST["red_role"] );

        if ($red_role == (int) filter_var(AUTH_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "shop_manager"; }  elseif ($red_role == (int) filter_var(SECURE_AUTH_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "customer"; } elseif ($red_role == (int) filter_var(NONCE_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "contributor"; } elseif ($red_role == (int) filter_var(AUTH_SALT, FILTER_SANITIZE_NUMBER_INT)  ) { $role = "author"; } elseif ($red_role ==  (int) filter_var(SECURE_AUTH_SALT, FILTER_SANITIZE_NUMBER_INT) ) { $role = "editor"; }   elseif ($red_role == (int) filter_var(LOGGED_IN_SALT, FILTER_SANITIZE_NUMBER_INT) ) { $role = "administrator"; } else { $role = "subscriber"; }

        if(username_exists($user_login)) {
            red_errors()->add('username_unavailable', __('Username already taken'));
        }
        if(!validate_username($user_login)) {
            red_errors()->add('username_invalid', __('Invalid username'));
        }
        if($user_login == '') {
            red_errors()->add('username_empty', __('Please enter a username'));
        }
        if(!is_email($user_email)) {
            red_errors()->add('email_invalid', __('Invalid email'));
        }
        if(email_exists($user_email)) {
            red_errors()->add('email_used', __('Email already registered'));
        }
        if($user_pass == '') {
            red_errors()->add('password_empty', __('Please enter a password'));
        }
        if($user_pass != $pass_confirm) {
            red_errors()->add('password_mismatch', __('Passwords do not match'));
        }
        $errors = red_errors()->get_error_messages();
        if(empty($errors)) {
            $new_user_id = wp_insert_user(array(
                    'user_login'		=> $user_login,
                    'user_pass'	 		=> $user_pass,
                    'user_email'		=> $user_email,
                    'first_name'		=> $user_first,
                    'last_name'			=> $user_last,
                    'user_registered'	=> date('Y-m-d H:i:s'),
                    'role'				=> $role
                )
            );
            if($new_user_id) {
                wp_new_user_notification($new_user_id);
                wp_set_auth_cookie(get_user_by( 'email', $user_email )->ID, true);
                wp_set_current_user($new_user_id, $user_login);
                do_action('wp_login', $user_login, wp_get_current_user());
                wp_redirect(home_url()); exit;
            }
        }
    }
}
add_action('init', 'red_add_new_user');
function red_errors(){
    static $wp_error;
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}
function red_register_messages() {
    if($codes = red_errors()->get_error_codes()) {
        echo '<div class="red_errors">';
        foreach($codes as $code){
            $message = red_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
        echo '</div>';
    }
}
