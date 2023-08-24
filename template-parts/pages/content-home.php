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

        <!-- todo: move this into its own component -->
        <div class="company-values">
            <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid uk-scrollspy="cls: uk-animation-slide-left-medium; target: .company-values-block; delay: 600; repeat: false">
                <div class="company-values-block">
                    <div class="uk-card uk-card-default uk-card-body">
                        <h3 class="uk-card-title">Our Values</h3>
                        <p>Sed molestie mattis lacus in facilisis. Fusce mi diam, aliquet ac dictum eget, eleifend quis elit. Nullam bibendum purus mi,
                            eget viverra ligula fringilla sed. Quisque at consequat massa. Sed luctus commodo nunc mollis tincidunt.</p>
                    </div>
                </div>
                <div class="company-values-block">
                    <div class="uk-card uk-card-primary uk-card-body">
                        <h3 class="uk-card-title">Our Philosophy</h3>
                        <p>Sed molestie mattis lacus in facilisis. Fusce mi diam, aliquet ac dictum eget, eleifend quis elit. Nullam bibendum purus mi,
                            eget viverra ligula fringilla sed. Quisque at consequat massa. Sed luctus commodo nunc mollis tincidunt.</p>
                    </div>
                </div>
                <div class="company-values-block">
                    <div class="uk-card uk-card-secondary uk-card-body">
                        <h3 class="uk-card-title">Our Mission</h3>
                        <p>Sed molestie mattis lacus in facilisis. Fusce mi diam, aliquet ac dictum eget, eleifend quis elit. Nullam bibendum purus mi,
                            eget viverra ligula fringilla sed. Quisque at consequat massa. Sed luctus commodo nunc mollis tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="our-services">
            <div class="uk-container uk-padding-large uk-padding-remove-bottom">
                <?php get_template_part('partials/components/homepage-services', 'block'); ?>
            </div>
        </div>

        <div class="our-team">
            <div class="uk-container uk-padding-large">
                <?= get_template_part('partials/components/homepage-team', 'block'); ?>
            </div>
        </div>

        <?php if ($info_blocks) { ?>
            <div class="info-block uk-position-relative">
                <div class="svg-border border-top-svg uk-position-absolute uk-width">
                    <?php get_template_part('partials/svg/top-border', 'svg'); ?>
                </div>
                <div class="uk-container uk-padding-large">
                    <?= get_template_part('partials/components/page-info', 'block'); ?>
                </div>
                <div class="svg-border border-bottom-svg uk-position-absolute uk-width">
                    <?php get_template_part('partials/svg/top-border', 'svg'); ?>
                </div>
            </div>
        <?php } ?>

        <div class="latest-news">
            <div class="uk-container uk-padding">
                <?php get_template_part('partials/components/latest', 'articles'); ?>
            </div>
        </div>

        <div class="testimonials uk-height uk-background-cover uk-overflow-hidden uk-light" uk-parallax="bgy: -200" style="background-image: url('/wp-content/themes/skinny-ninjah/images/black-bg.jpeg'); background-size: cover; position: relative;">
            <div class="skinny-ninjah-overlay"></div>
            <div class="uk-margin-auto uk-margin-auto-vertical">
                <div class="uk-container uk-padding-small uk-margin-large-bottom uk-margin-medium-top">
                    <?php get_template_part('partials/components/homepage-testimonials'); ?>
                </div>
            </div>
        </div>

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
