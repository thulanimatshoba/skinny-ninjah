<?php
    $post_id = get_the_ID();
    $author_id   = get_the_author_meta( 'ID' );
    $author_meta = get_mapped_user_meta( $author_id );
    $author_name = get_the_author();
    $is_sponsor    = has_term( 'sponsor', 'flag', $post_id );

    $get_video_url          = get_post_custom_values( 'video-article', $post_id );
    $get_post_thumbnail_url = get_the_post_thumbnail_url();

    $photo_caption     = '';
    $photo_description = '';
    $thumbnail_id      = get_post_thumbnail_id();
    if ( $thumbnail_id ) {
        $thumbnail_post    = get_post( $thumbnail_id );
        $photo_caption     = $thumbnail_post->post_excerpt;
        $photo_description = $thumbnail_post->post_content;
    }

    // split the article body into it's constituent paragraphs
    $content = apply_filters('the_content', get_the_content(sprintf(
        wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'skinny-ninjah'),
            [
                'span' => [
                    'class' => [],
                ],
            ]
        ),
        wp_kses_post(get_the_title())
    )));
    $content = explode("</p>", $content);
    $count = count($content);
