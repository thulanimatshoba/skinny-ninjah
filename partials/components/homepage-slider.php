<?php
    $homepage_slides = carbon_get_the_post_meta('skinny_ninjah_slider');
    $slider_title = carbon_get_the_post_meta('skinny_ninjah_slider_name');
    $slider_description = carbon_get_the_post_meta('skinny_ninjah_slider_description');
    $slider_link_1 = carbon_get_the_post_meta('skinny_ninjah_slider_link_1');
    $slider_link_2 = carbon_get_the_post_meta('skinny_ninjah_slider_link_2');
 ?>

<div class="uk-position-relative" uk-slideshow="ratio: 6:3; animation: fade; autoplay: true; autoplay-interval: 5000">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
        <ul class="uk-slideshow-items">
        <!-- <li><video src="https://yootheme.com/site/images/media/yootheme-pro.mp4" autoplay loop playsinline uk-cover></video></li> -->
            <?php
            foreach ($homepage_slides as $slides) : ?>
                <li>
                    <?php
                        $image =  wp_get_attachment_image( $slides['skinny_ninjah_slider_image'], 'featured-big' );
                        $heading = $slides['skinny_ninjah_slider_name'];
                        $description = $slides['skinny_ninjah_slider_description'];
                        $slider_button_1 = $slides['skinny_ninjah_slider_link_label_1'];
                        $button_link_1 = $slides['skinny_ninjah_slider_link_1'];
                        $slider_button_2 = $slides['skinny_ninjah_slider_link_label_2'];
                        $button_link_2 = $slides['skinny_ninjah_slider_link_2'];
                    ?>
                    <div class="slider-image">
                        <?= $image; ?>
                    </div>
                    <div class="slider-caption uk-width-1-1 uk-position-small uk-position-center uk-overlay uk-transition-slide-bottom">
                        <?php if ($heading) { ?>
                            <h2 class="uk-transition-slide-left">
                                <?= $heading ?>
                            </h2>
                        <?php }

                        if ($description) { ?>
                            <p class="description uk-transition-slide-right">
                                <?= $description ?>
                            </p>
                        <?php }

                        if ($slider_button_1) { ?>
                            <a class="uk-button uk-button-secondary uk-transition-slide-left-medium" href="<?= $button_link_1 ?>">
                                <?= $slider_button_1 ?>
                            </a>
                        <?php }

                        if ($slider_button_2) { ?>
                            <a class="uk-button uk-button-primary uk-transition-slide-right-medium" href="<?= $button_link_2 ?>">
                                <?= $slider_button_2 ?>
                            </a>
                        <?php } ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

    </div>
    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin uk-width-1-1 uk-position-absolute uk-position-bottom"></ul>
    
</div>
