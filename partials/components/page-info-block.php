<?php
    $info_blocks = carbon_get_the_post_meta('page_info_block');
?>

<div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true">
    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m" uk-grid>
    <?php if ($info_blocks) foreach ($info_blocks as $info_block) { ?>
        <li class="uk-text-center info-block-list">
            <div class="list-container">
                <i class="fa <?= $info_block['info_block_icon']?>"></i>
                <h4 class="uk-text-success uk-text-bold uk-text-large uk-margin">
                    <?= $info_block['info_block_title']?>
                </h4>
                <span class="uk-text-muted uk-text-small uk-display-block uk-text-uppercase position">
                    <?= $info_block['info_block_description'] ?>
                </span>
            </div>
        </li>
    <?php } ?>
    </ul>
    ?>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
