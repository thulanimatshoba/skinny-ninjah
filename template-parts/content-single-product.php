<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */

?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php echo get_the_ID(); ?>" <?php post_class('uk-article'); ?>>

    <div class="entry-content">
        <div class="uk-container">
            <div uk-grid>
                <div class="uk-width-3-4@s">
                    <div class="page-content">
                        <?php
                        the_content(sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'skinny-ninjah'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ));

                        the_post_navigation();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'skinny-ninjah'),
                            'after' => '</div>',
                        ));
                        ?>
                    </div><!-- .page-content -->
                </div>
                <div class="uk-margin-top uk-width-1-4@s">
                    <div class="article-sidebar" uk-sticky="end: !.entry-content; offset: 80">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->