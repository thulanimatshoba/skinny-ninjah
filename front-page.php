<?php
/**
 * Template Name: Home Page
 *
 * This is the template that the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

/* Homepage Slider */
$homepage_slider = carbon_get_the_post_meta('skinny_ninjah_slider');

get_header();
?>

<?php if ($homepage_slider) : ?>
    <div class="home-slider uk-text-center">
        <?php get_template_part('partials/components/homepage-slider') ?>
    </div>
    <div class="skinny-ninjah-overlay"></div>

<?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php while (have_posts()) :
                the_post();
                get_template_part('template-parts/pages/content', 'home');
            endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_template_part('partials/components/social-media');
get_footer();
