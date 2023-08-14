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
get_header();
$homepage_slider = carbon_get_the_post_meta('skinny_ninjah_slider');

if ($homepage_slider) { ?>
    <div class="home-slider uk-text-center">
        <?php get_template_part('partials/components/page-slider') ?>
    </div>
<?php } ?>

    <main id="primary" class="site-main uk-position-relative">
        <div class="waves-top-shape uk-width-1-1 uk-position-absolute" data-negative="false">
            <?php get_template_part('partials/components/wave', 'svg') ?>
        </div>
        
        <?php while (have_posts()) :
            the_post();
            get_template_part('template-parts/pages/content', 'home');
        endwhile; ?>
    </main><!-- #main -->
<?php
get_footer();
