<?php
/**
 * Template Name: Contact Us Page
 *
 * This is the template that displays the contact us pages by default.
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
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>

	<div class="our-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14343.685469891698!2d28.0112724!3d-26.0033931!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9571501e71125d%3A0xd981fe5787ad6f39!2sTKDS!5e0!3m2!1sen!2sza!4v1692903032225!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</main><!-- #main -->

<?php
get_footer();
