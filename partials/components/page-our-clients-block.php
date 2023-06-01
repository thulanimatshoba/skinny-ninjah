<?php
$our_clients = carbon_get_the_post_meta('our_clients');
?>

<div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true">
    <?php
    echo '<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">';
    if ($our_clients) {
        foreach ($our_clients as $clients) : ?>
            <li>
                <figure class="clients-thumbnail uk-float-left" uk-img="loading: eager">
                    <?= wp_get_attachment_image($clients['client_logo'], 'featured-square'); ?>
                </figure>
            </li>
        <?php endforeach;
    }
    echo '</ul>';
    ?>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
