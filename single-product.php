<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     Skinny_Ninjah
 * @version     1.6.4
 */

get_header();
?>

<?php get_template_part('partials/components/breadcrumbs'); ?>
<main id="primary" class="site-main">
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

<?php
get_footer();
