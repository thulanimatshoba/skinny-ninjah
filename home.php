<?php

/**
 * Template Name: Blog Page
 *
 * This is the template that displays the front page by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

get_header(); ?>

    <main id="primary" class="site-main">
        <?php get_template_part( 'partials/components/breadcrumbs' ); ?>

        <header class="entry-header">
            <div class="uk-container">
                <h1 itemprop="headline" title="Blog" class="entry-title uk-text-center uk-padding">
                    <?php _e('Blog', 'skinny-ninjah'); ?>
                </h1>
            </div>
        </header><!-- .entry-header -->

        <div class="uk-container">
            <div class="uk-child-width-expand@s" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > .category-article; delay: 500; repeat: false">
                <?php
                    $c = 0;
                    if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        $c++; ?>

                    <div id="post-<?php echo get_the_ID(); ?>" <?php ($c === 1 ? post_class('category-article uk-width-2-3@s featured-post') : post_class('category-article uk-width-1-3@s')); ?>>
                        <div class="post-thumbnail uk-position-relative">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_custom_thumbnail(
                                        get_the_ID(),
                                        'featured-thumbnail',
                                        [
                                            'sizes' => '(max-width: 650px) 650px, 100vw',
                                            'class' => 'featured-featured uk-position-relative uk-position-z-index',
                                        ]
                                    );
                                } else {
                                    ?>
                                    <img src="https://via.placeholder.com/510x340" class="uk-position-relative uk-position-z-index" alt="Card image cap">
                                    <?php
                                }
                                ?>
                                <?php //( has_post_thumbnail() ? the_post_thumbnail('featured-featured uk-position-relative uk-position-z-index') : '<img src="' . get_stylesheet_directory() . '/images/ninjah.png" />'); ?>
                            </a>

                            <div class="uk-article-meta post-date">
                                <i class="fab fa-accessible-icon"></i>&nbsp;&nbsp;<?php the_time('d. M. Y') ?>
                            </div>
                        </div>

                        <div class="uk-post-content">
                            <h3 class="uk-margin-small-top">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php skinny_ninjah_title(60); ?>
                                </a>
                            </h3>

                            <div class="cat-excerpt">
                                <?php echo tm_length_excerpt('30'); ?>
                            </div>

                        </div>
                        <?php if (is_active_sidebar('secondary-sidebar')) {
                            $post_counter = (!isset($post_counter) || $post_counter === null) ? 1 : ++$post_counter;
                            $tf_dfp_config_count = 2; //Make configurable
                            if ($post_counter === $tf_dfp_config_count) {
                                dynamic_sidebar('secondary-sidebar');
                            }
                        } ?>
                    </div>
                    <?php
                }
                wp_reset_postdata(); ?>
            </div>
            <div class="uk-padding uk-padding-remove-left">
                <?php the_posts_navigation(); ?>
            </div>
        </div>
        <?php
        } else {
            echo "<div class='uk-width-medium-1-1 no-posts-found'>";
            echo "<p>" . __('No posts found.', 'skinny-ninjah') . "</p>";
            echo "</div>";
        } ?>
    </main><!-- #main -->

<?php
get_footer();
