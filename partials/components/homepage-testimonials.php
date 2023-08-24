<?php
    $testimonials_section_title = carbon_get_the_post_meta('testimonials_section_title');
    $testimonials_description = carbon_get_the_post_meta('testimonials_section_description');
    $testimonials_slides = carbon_get_the_post_meta('testimonials');

if ($testimonials_section_title) : ?>
    <h2 class="uk-text-center uk-padding uk-padding-remove-bottom uk-position-relative">
        <?= esc_html($testimonials_section_title); ?>
    </h2>
<?php endif;

if ($testimonials_description) : ?>
    <p class="uk-text-center section-description uk-margin-medium-bottom uk-position-relative uk-margin-auto uk-width-1-2@m">
        <?= esc_html($testimonials_description); ?>
    </p>
<?php endif; ?>

<div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 9000">
    <div class="uk-slider-items uk-child-width-1-1">
        <?php
            foreach ($testimonials_slides as $testimonials) : ?>
                <div class="testimonials-list uk-text-center">
                    <div class="testimonial-blurb uk-padding-small uk-margin-auto uk-width-3-4@m">
                        <p class="description uk-text-medium"><?= $testimonials['testimonial'] ?></p>
                    </div>

                    <div class="testimonial-bottom-deck uk-padding-small">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-small-bottom"><?= $testimonials['name'] ?></h4>
                            <span class="uk-text-muted uk-text-small uk-display-block uk-text-uppercase position">
                                <?= $testimonials['position'] ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>
