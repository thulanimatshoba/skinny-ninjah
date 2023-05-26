<?php
/**
 * Template Name: Skinny Ninjah Article
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Skinny_Ninjah
 */

get_header();
?>
    <div class="content-area skinny-ninjah-article">
        <div class="breadcrumbs">
            <div class="uk-container uk-padding-small">
                <?php get_template_part( 'partials/components/breadcrumbs' ); ?>
            </div>
        </div>
        <main id="primary" class="site-main">
            <?php
            while (have_posts()) :
            the_post();
            update_article_views(get_the_ID());
            get_template_part('template-parts/articles/skinny-ninjah-article', 'content'); ?>

            <div class="uk-container">
                <?php
                the_post_navigation();
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                endwhile; // End of the loop.
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();