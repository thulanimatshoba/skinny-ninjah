<?php

$blog_title = carbon_get_theme_option( 'blog_title' );
$blog_posts_number = 4;
?>

<!--<h2 class="widget-title uk-text-center uk-padding-small uk-margin-large-bottom">--><?php //_e($blog_title ); ?><!-- </h2>-->
<h2 class="uk-text-center uk-margin-large-bottom">Our Latest Articles</h2>

<div uk-slider="autoplay: false; autoplay-interval: 9000">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-scrollspy="cls: uk-animation-scale-up; target: .blog-item; delay: 600; repeat: false">
        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-grid">
            <?php
            if (is_page()) {
                $cat = get_cat_ID('Latest News'); //use page title to get a category ID
                $posts = get_posts("cat=$cat&showposts=$blog_posts_number");

                if ($posts) {
                    foreach ($posts as $post) :
                        setup_postdata($post); ?>
                        <li class="blog-item">
                            <div class="article-story-header">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                                        the_post_thumbnail('featured-thumb',  array('class' => 'skinny-thumb'));
                                    } else {
                                        skinny_ninjah_placeholder_image();
                                    } ?>
                                </a>

                                <div class="uk-meta">
                                    <span class="uk-float-left uk-margin-small-right"><?= get_the_date('d. M. Y'); ?></span>
                                    <span class="uk-margin-small-right "><i class="fa fa-eye"></i>
                                        <?php $views = get_article_views(get_the_ID());
                                        if (get_article_views(get_the_ID()) == 1) {
                                            printf(__('%d View', 'skinny_ninjah'), $views);
                                        } else {
                                            printf(__('%d views', 'skinny_ninjah'), $views);
                                        }
                                        ?></span>
                                    <span class="post-comments"><i class="fa fa-comments"> <?php comments_number(0, 1, '%'); ?></i></span>
                                </div>
                            </div>

                            <div class="article-story-content">
                                <?php if (strlen(the_title('', '', FALSE)) > 16) {
                                    $title_short = substr(the_title('', '', FALSE), 0, 16);
                                    preg_match('/^(.*)\s/s', $title_short, $matches);
                                    if ($matches[1]) $title_short = $matches[1];
                                    $title_short = $title_short . ' ...';
                                } else {
                                    $title_short = the_title('', '', FALSE);
                                } ?>

                                <a class="the-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <h4 class="uk-margin-remove-bottom"><?php the_title(); ?></h4>
                                </a>
                                <span class="uk-margin-small-top uk-display-block">
                                    <?= wp_trim_excerpt(); ?>
                                </span>
                            </div>
                        </li>
                    <?php endforeach;

                    wp_reset_postdata();
                }
            }
            ?>
        </ul>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>
