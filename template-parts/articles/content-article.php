<?php
/**
 * Template part for displaying skinny ninjah articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skinny_Ninjah
 */
require_once 'article-info.php';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(( ( $is_sponsor ) ? 'sponsored' : '' )); ?>>
    <div class="titles uk-padding-remove-left uk-padding-remove-right uk-padding-remove-bottom uk-padding-small">
        <div class="uk-container uk-container-small">
            <?php
            get_custom_label($post_id, 'post', $is_sponsor);
            the_title('<h1 class="skinny-ninjah-article-title uk-margin-bottom uk-margin-small-top">', '</h1>');
            ?>
        </div>
    </div>
    <div class="uk-container">
        <?php
        if ( ! empty( $get_video_url[0] ) ) {
            ?>
            <video class="article-header hidden-xs" controls>
                <source src="<?php echo $get_video_url; ?>" type="video/mp4">
            </video>
            <?php
            if ( $get_post_thumbnail_url ) {
                echo '<img src="' . $get_post_thumbnail_url . '"class="img-responsive article-header-image visible-xs">';
            }
        } elseif ( $get_post_thumbnail_url ) {
            $featured_image = wp_get_attachment_image_src( $thumbnail_id, 'extra_large' );
            echo '<img src="' . $featured_image[0] . '" class="featured-thumb img-responsive article-header-image">';
        }

        if ( ! empty( $photo_caption ) ) {
            ?>
            <span class="image-caption uk-margin-small-bottom">
               <i class="fa fa-camera" aria-hidden="true"></i>
                <?php
                echo '<span class="uk-text-muted uk-text-small">' . $photo_caption . '</span>';
                echo ( ( ! empty( $photo_description ) && $photo_description != $photo_caption ) ? ' ' . $photo_description : '' );
                ?>
            </span>
        <?php } ?>
    </div>

    <header class="entry-header">
        <div class="uk-container uk-container-small">
            <?php
            if ('post' === get_post_type()) :
                ?>
                <div class="entry-meta">
                    <?php
                    echo get_avatar($author_id, 40);
                    skinny_ninjah_posted_by();
                    skinny_ninjah_posted_on();
                    ?>
                    <span class="post-comments uk-text-muted uk-text-small uk-float-right">
                        <a href="#comments" class="uk-text-muted">
                            <i class="fa fa-comments">
                                <span>
                                <?php comments_number(0, 1, '%'); ?>
                                </span>
                            </i>
                        </a>

                        <i class="fa fa-eye"></i>
                            <?php $views = get_article_views(get_the_ID());
                                if (get_article_views(get_the_ID()) == 1) {
                                    printf(__('%d View', 'skinny_ninjah'), $views);
                                } else {
                                    printf(__('%d views', 'skinny_ninjah'), $views);
                                }
                            ?>
                    </span>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="uk-container uk-container-small">
            <h4 class="article-excerpt">
                <?= strip_tags(get_the_excerpt(), '<p>'); ?>
            </h4>
            <?php
            for ($i = 0; $i < $count; $i++) {
                echo $content[ $i ];
                if ( strpos( $content[ $i ], '<p>') !== false ) {
                    echo "</p>";
                }
                if ( $i == 2 ) {
                    // insert this after the 3rd paragraph video after the 4th para
                    echo '<!--Placeholder for 4th paragraph video -->';
                    echo '<div id="fourth-par-video" style="position: relative; display: block; max-width: 100%;">"' . ( $is_sponsor ) ? '<div class="sponsored uk-text-center">sponsored</div>' : '' . '<h3>You Know the vibes</h3></div>';
                }
            }

            wp_link_pages(
                [
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'skinny-ninjah'),
                    'after'  => '</div>',
                ]
            );
            ?>
        </div>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="uk-container uk-container-small uk-padding-small">
            <hr>
            <?php skinny_ninjah_entry_footer(); ?>
            <hr>
            <?php skinny_ninjah_related_posts(); ?>
        </div>
    </footer><!-- .entry-footer -->
    <hr>
</article><!-- #post-<?php the_ID(); ?> -->
