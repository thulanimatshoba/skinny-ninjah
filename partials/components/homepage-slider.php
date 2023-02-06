<?php
$homepage_slides = carbon_get_the_post_meta('skinny_ninjah_slider');
$slider_title = carbon_get_the_post_meta('skinny_ninjah_slider_name');
$slider_description = carbon_get_the_post_meta('skinny_ninjah_slider_description');
$slider_link_1 = carbon_get_the_post_meta('skinny_ninjah_slider_link_1');
$slider_link_2 = carbon_get_the_post_meta('skinny_ninjah_slider_link_2');
 ?>


<div uk-slider="autoplay: false; autoplay-interval: 9000" uk-slideshow="animation: push">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
        <div class="uk-slider-items uk-width-1-1">
            <?php
            foreach ($homepage_slides as $slides) : ?>
                <div class="slider-item">
                    <?php
                    $image =  wp_get_attachment_image($slides['skinny_ninjah_slider_image'], 'featured-big'); ?>
                    <div class="slider-image">
                        <?= $image; ?>
                        <div class="skinny-ninjah-overlay"></div>
                    </div>
                    <div class="slider-caption uk-width-1-1 uk-position-small uk-position-center uk-overlay uk-transition-slide-bottom">
                        <h2 class="uk-transition-slide-left"><?= $slides['skinny_ninjah_slider_name'] ?></h2>
                        <p class="description uk-transition-slide-right"><?= $slides['skinny_ninjah_slider_description'] ?> </p>

                        <a class="uk-button uk-button-secondary uk-transition-slide-left-medium" href="<?= $slides['skinny_ninjah_slider_link_1'] ?>">
                            <?= $slides['skinny_ninjah_slider_link_label_1'] ?>
                        </a>

                        <a class="uk-button uk-button-primary uk-transition-slide-right-medium" href="<?= $slides['skinny_ninjah_slider_link_2'] ?>">
                            <?= $slides['skinny_ninjah_slider_link_label_2'] ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

