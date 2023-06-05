<?php
/**
 * Template part for displaying page content in home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

$info_blocks = carbon_get_the_post_meta('page_info_block');
$our_clients = carbon_get_the_post_meta('our_clients');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('home-section'); ?>>
    <header class="entry-header">
        <div class="uk-container">
            <h1 itemprop="headline" title="<?php the_title(); ?>" class="entry-title uk-text-center uk-padding-small uk-hidden"><?php the_title(); ?></h1>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="uk-container">
            <?php //skinny_ninjah_post_thumbnail();

            the_content();

            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'skinny-ninjah'),
                'after'  => '</div>',
            ]);
            ?>
        </div>

        <?php if ($info_blocks) { ?>
            <div class="info-block uk-position-relative uk-padding-large" uk-scrollspy="cls: uk-animation-scale-up; target: .uk-slider-items; delay: 300; repeat: false">
                <div class="uk-container">
                    <?= get_template_part('partials/components/page-info', 'block'); ?>
                </div>
            </div>
        <?php } ?>

        <?php if ($our_clients) : ?>
            <div class="our-clients">
                <div class="uk-container uk-padding">
                    <?php get_template_part('partials/components/page-our-clients', 'block'); ?>
                </div>
            </div>
        <?php endif; ?>

    </div><!-- .entry-content -->

    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <div class="uk-container">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'skinny-ninjah'),
                            [
                                'span' => [
                                    'class' => [],
                                ],
                            ]
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </div>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
