<?php
    $our_services_title = carbon_get_the_post_meta('our_services_section_title');
    $our_services_description = carbon_get_the_post_meta('our_services_section_description');
    $our_services_image = carbon_get_the_post_meta('our_service_side_image');
    $our_services = carbon_get_the_post_meta('our_services');
?>

<h2 class="uk-text-center">
    <?= $our_services_title ?>
</h2>
<p class="uk-text-center uk-width-1-2@m uk-margin-auto uk">
    <?= $our_services_description ?>
</p>

<div class="uk-padding uk-padding-remove-bottom uk-padding-remove-left uk-padding-remove-right uk-grid uk-child-width-expand@s" uk-grid uk-scrollspy="cls: uk-animation-slide-left-medium; target: .side-image; delay: 600; repeat: false">
    <div class="side-image uk-text-right">
        <img src="<?= $our_services_image; ?>" width="361" alt="" />
    </div>
    <ul class="uk-list" uk-scrollspy="cls: uk-animation-slide-bottom; target: .service-blocks; delay: 300; repeat: false">
        <?php if ($our_services) {
            foreach ($our_services as $service) : ?>
                <li class="service-blocks uk-margin-medium-bottom uk-margin-remove-top">
                    <h3 class="uk-margin-small-bottom"><?= $service['service_name'] ?></h3>
                    <span><?= $our_services_description ?></span>
                </li>
            <?php endforeach;
        } ?>
    </ul>
</div>

