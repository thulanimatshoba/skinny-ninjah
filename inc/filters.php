<?php
if (!function_exists('skinny_ninjah_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skinny_ninjah_setup() {
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Skinny Ninjah, use a find and replace
        * to change 'skinny-ninjah' to the name of your theme in all the template files.
        */
    load_theme_textdomain( 'skinny-ninjah', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support( 'title-tag' );

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support( 'post-thumbnails' );

    /**
     * Thumbnail  Custom Sizes
     */
    add_image_size('featured-thumb', 450, 340, ['center', 'center']);
    add_image_size('featured-square', 300, 300, ['center', 'center']);
    add_image_size('featured-featured', 1240, 660, ['center', 'center']);
    add_image_size('portfolio-square', 480, 365, ['center', 'center']);
    add_image_size('featured-big', 1600, 780, ['center', 'center']);

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        [
            'header' => esc_html__( 'Header Menu', 'skinny-ninjah' ),
            'footer' => esc_html__( 'Footer Menu', 'skinny-ninjah' ),
            'off-canvas' => esc_html__( 'Off Canvas Menu', 'skinny-ninjah' ),
        ]
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'skinny_ninjah_custom_background_args',
            [
                'default-color' => 'ffffff',
                'default-image' => '',
            ]
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]
    );
}
endif;
add_action( 'after_setup_theme', 'skinny_ninjah_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skinny_ninjah_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'skinny_ninjah_content_width', 640 );
}
add_action( 'after_setup_theme', 'skinny_ninjah_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skinny_ninjah_widgets_init() {
    register_sidebar(
        [
            'name'          => esc_html__( 'Sidebar', 'skinny-ninjah' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'skinny-ninjah' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
    register_sidebar(
        [
            'name'          => esc_html__( 'Footer One', 'skinny-ninjah' ),
            'id'            => 'footer-one',
            'description'   => esc_html__( 'Add widgets here.', 'skinny-ninjah' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Two', 'skinny-ninjah' ),
            'id'            => 'footer-two',
            'description'   => esc_html__( 'Add widgets here.', 'skinny-ninjah' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Three', 'skinny-ninjah' ),
            'id'            => 'footer-three',
            'description'   => esc_html__( 'Add widgets here.', 'skinny-ninjah' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Four', 'skinny-ninjah' ),
            'id'            => 'footer-four',
            'description'   => esc_html__( 'Add widgets here.', 'skinny-ninjah' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
}
add_action( 'widgets_init', 'skinny_ninjah_widgets_init' );
