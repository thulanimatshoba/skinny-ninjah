<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php get_template_part( 'partials/components/breadcrumbs' ); ?>
		<header class="entry-header">
			<div class="uk-container">
				<?php
				single_cat_title('<h1 class="entry-title uk-text-center uk-padding">', '</h1>');
				the_archive_description('<div class="archive-description uk-text-muted uk-text-small">', '</div>');
				?>
			</div>
		</header><!-- .page-header -->

		<div class="uk-container">
			<?php get_template_part('template-parts/articles/content', 'category'); ?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
