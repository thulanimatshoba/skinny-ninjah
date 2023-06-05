<?php

/**
 * Created by PhpStorm.
 * User: thulani-matshoba
 */
?>

<div class="uk-child-width-expand@s" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > .category-article; delay: 500; repeat: false">
    <?php
    $cat_id = get_query_var('cat') ? get_query_var('cat') : get_the_category()[0]->term_id;
    $c = 0;

    $args = [
        'order' => 'DESC',
        'orderby' => 'date',
        'cat' => $cat_id
    ];

    $category = new WP_Query($args);

    if ($category->have_posts()) {
        while ($category->have_posts()) {
            $category->the_post();
            $c++;
    ?>

        <div id="post-<?php echo get_the_ID(); ?>" <?php post_class('category-article uk-width-1-3@m uk-width-1-2@s'); ?>>
            <div class="post-thumbnail uk-position-relative">
                <a href="<?php the_permalink(); ?>">
                    <?php (has_post_thumbnail() ? the_post_thumbnail('featured-featured uk-position-relative uk-position-z-index') : '<img src="' . get_stylesheet_directory() . '/images/ninjah.png" />'); ?>
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
                    <?php echo tm_length_excerpt('180'); ?>
                </div>

            </div>
            <?php if (is_active_sidebar('secondary-sidebar')) {
                $post_counter = (!isset($post_counter)) ? 1 : ++$post_counter;
                $tf_dfp_config_count = 2; //Make configurable
                if ($post_counter === $tf_dfp_config_count) {
                    dynamic_sidebar('secondary-sidebar');
                }
            } ?>
        </div>

        <?php }
    wp_reset_postdata();?>
</div>
<div class="uk-padding uk-padding-remove-left uk-padding-remove-right">
    <?php the_posts_navigation(); ?>
</div>
<?php } else {
        echo "<div class='uk-width-medium-1-1 no-posts-found'>";
        echo "<p>" . __('No posts found.', 'skinny-ninjah') . "</p>";
        echo "</div>";
    }
