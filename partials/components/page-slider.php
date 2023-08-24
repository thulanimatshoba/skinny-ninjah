<?php
    $homepage_slides = carbon_get_the_post_meta('skinny_ninjah_slider');
 ?>

<div class="uk-position-relative" uk-slideshow="ratio: 6:3; animation: fade; autoplay: true; autoplay-interval: 5000">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
        <ul class="uk-slideshow-items">
            <?php
                foreach ($homepage_slides as $slides) :
                    $image =  wp_get_attachment_image( $slides['slider_image'], 'featured-big' );
                    $video = $slides['slider_video'];
                    $heading = $slides['slider_name'];
                    $show_slider_heading = $slides['show_slider_heading'];
                    $heading_color = $slides['slider_title_color'];
                    $description = $slides['slider_description'];
                    $show_slider_description = $slides['show_slider_description'];
                    $show_slider_link = $slides['show_slider_link'];
                    $description_color = $slides['slider_desc_color'];
                    $slider_button_1 = $slides['slider_link_label_1'];
                    $button_link_1 = $slides['slider_link_1'];
                    $slider_button_2 = $slides['slider_link_label_2'];
                    $button_link_2 = $slides['slider_link_2'];
                    ?>
                <li>
                    <div class="slider-image">
                        <?php if ($video) { ?>
                            <video src="<?= $video; ?>" autoplay controls playsinline uk-cover></video>
                        <?php } else {
                            echo $image;
                        } ?>

                    </div>
                    <div class="slider-caption uk-position-small uk-position-center uk-overlay" uk-scrollspy="cls: uk-animation-slide-bottom-medium; target: .slide-item; delay: 600; repeat: true">
                        <?php if ($heading) { ?>
                            <h2 class="slide-item" style="color: <?= $heading_color;?>;">
                                <?= $heading ?>
                            </h2>
                        <?php }

                        if ($show_slider_description == 'yes'){ ?>
                            <p class="uk-width-1-1@m uk-margin-auto description slide-item" style="color: <?= $description_color;?>;">
                                <?= $description ?>
                            </p>
                        <?php }


                        if ($show_slider_link == 'yes') { ?>
                            <a class="uk-button uk-button-primary slide-item" href="<?= $button_link_1 ?>">
                                <?= $slider_button_1 ?>
                            </a>
                        <?php }

                        if ($show_slider_link == 'yes') { ?>
                            <a class="uk-button uk-button-primary slide-item" href="<?= $button_link_2 ?>">
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
