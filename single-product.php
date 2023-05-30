<?php

/**
 * The template for displaying all single products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Skinny_Ninjah
 */

get_header();
?>

    <div id="primary" class="content-area">
        <div class="breadcrumbs">
            <div class="uk-container uk-padding-small">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs" class="">','</p>');
                } ?>
            </div>
        </div>
        <main id="main" class="site-main">

            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content-single-product');
                ?>
                <div class="uk-container">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif; ?>

                </div>
            <?php

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
