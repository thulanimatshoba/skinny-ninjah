<?php
/**
 * Template Name: About Us Page
 *
 * This is the template that displays the about us page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

get_header(); ?>

<main id="primary" class="site-main">
	<?php get_template_part( 'partials/components/breadcrumbs' );
		while ( have_posts() ) :
			the_post();
			get_template_part('template-parts/pages/content-about', 'us');
		endwhile; // End of the loop.
	?>
</main><!-- #main -->

<?php
get_footer();
