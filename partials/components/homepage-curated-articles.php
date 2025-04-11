<?php
$sections = carbon_get_the_post_meta('crb_sections'); ?>

<div class="section-related-posts">
    <h2>Related posts:</h2>
    <div uk-slider="autoplay: false; autoplay-interval: 9000">
        <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-scrollspy="cls: uk-animation-scale-up; target: .blog-item; delay: 600; repeat: false">
            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-grid">
                <?php foreach ($sections as $section) {
                    foreach ($section['posts'] as $post_item) :
                        setup_postdata($post_item) ?>
                        <li class="blog-item">
                            <a href="<?php echo get_the_permalink($post_item['id']); ?>">
                                <?php
                                echo get_the_title($post_item['id']);
                                echo get_the_post_thumbnail($post_item['id'], 'featured-thumb'); ?>
                                <div class="uk-meta">
                                    <span class="uk-float-left uk-margin-small-right"><?= get_the_date('d. M. Y'); ?></span>
                                    <span class="uk-margin-small-right "><i class="fa fa-eye"></i>
                                        <?php $views = get_article_views(get_the_ID());
                                        if (get_article_views(get_the_ID()) == 1) {
                                            printf(__('%d View', 'skinny_ninjah'), $views);
                                        } else {
                                            printf(__('%d views', 'skinny_ninjah'), $views);
                                        }
                                        ?>
                                    </span>
                                    <span class="post-comments">
                                        <i class="fa fa-comments">
                                            <?php comments_number(0, 1, '%'); ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>
<?php
                    break;
                }
?>