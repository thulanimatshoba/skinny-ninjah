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
<?php } ?>

<main id="primary" class="site-main">
	<?php get_template_part( 'partials/components/breadcrumbs' );

		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
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
get_footer();
