<?php if ( !empty( $related_posts ) ) { ?>
    <div class="related-posts">
        <div class="uk-container uk-margin-top">
            <h3 class="widget-title"><?php _e('Related Articles', 'skinny-ninjah'); ?></h3>

            <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
                <?php
                foreach ( $related_posts as $post ) {
                    setup_postdata( $post );
                    ?>
                    <div class="related-block">
                        <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="related-thumbnail">
                                    <?php echo get_the_post_thumbnail(null,
                                        'featured-thumb',
                                        [
                                            'alt' => the_title_attribute(['echo' => false])
                                        ]); ?>
                                </div>
                            <?php } ?>
                            <h4 class="uk-margin-remove-top uk-margin-remove-bottom"><?php the_title(); ?></h4>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
}