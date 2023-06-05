<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Skinny_Ninjah
 */

get_header();
?>

<?php get_template_part('partials/components/breadcrumbs'); ?>
<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		update_article_views(get_the_ID());
		//get_template_part( 'template-parts/content', get_post_type() );
		get_template_part( 'template-parts/articles/content', 'article' ); ?>

		<div class="uk-container">
			<?php
			the_post_navigation(
				[
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'skinny-ninjah' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'skinny-ninjah' ) . '</span> <span class="nav-title">%title</span>',
				]
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; ?>
		</div>

</main><!-- #main -->

<?php
get_footer();
