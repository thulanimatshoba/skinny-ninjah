<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

get_header();

$page_slider = carbon_get_the_post_meta('skinny_ninjah_slider');
$info_blocks = carbon_get_the_post_meta('page_info_block');
$portfolio_blocks = carbon_get_the_post_meta('page_portfolio_block');

if ($page_slider) { ?>
	<div class="home-slider uk-text-center">
		<?php get_template_part('partials/components/page-slider') ?>
	</div>
<?php } else { ?>
	<div>
		<img src="<?= $placeholder; ?>" width="100%">
	</div>
<?php } ?>


	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php if ($portfolio_blocks) { ?>
			<div id="portfolio">
				<div class="uk-container">
					<?php get_template_part('partials/components/page-portfolio', 'block'); ?>
				</div>
			</div>
		<?php }

		if ($info_blocks) { ?>
			<div class="info-block uk-position-relative uk-padding-large" uk-scrollspy="cls: uk-animation-scale-up; target: .uk-slider-items; delay: 300; repeat: false">
				<div class="uk-container">
					<?= get_template_part('partials/components/page-info', 'block'); ?>
				</div>
			</div>
		<?php } ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
