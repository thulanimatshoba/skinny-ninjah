<?php
    $team_title = carbon_get_the_post_meta('our_team_title');
    $team_section_description = carbon_get_the_post_meta('team_section_description');
    $teams_slides = carbon_get_the_post_meta('skinny_ninjah_team');


if ($team_title) : ?>
    <h2 class="uk-text-center"><?php echo __($team_title); ?></h2>
<?php endif;

if ($team_section_description) : ?>
    <p class="uk-text-center section-description uk-margin-auto uk-width-1-2@m">
        <?php echo esc_html($team_section_description); ?>
    </p>
<?php endif; ?>

<div class="uk-position-relative uk-visible-toggle uk-padding uk-padding-remove-bottom uk-padding-remove-left uk-padding-remove-right" tabindex="-1" uk-slider="autoplay: true" uk-scrollspy="cls: uk-animation-scale-up; target: .team-list; delay: 300; repeat: false">
    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m" uk-grid>
        <?php if ($teams_slides) {
            foreach ($teams_slides as $team) {?>
                <li class="uk-text-center team-list">
                    <figure class="team-thumb uk-margin-small-bottom">
                        <?= wp_get_attachment_image($team['team_member_image'], 'featured-square');?>
                    </figure>
                    <h4 class="uk-text-bold uk-margin-small-top uk-margin-small-bottom">
                        <?= $team['team_member_name']; ?>
                    </h4>
                    <span class="uk-text-muted uk-text-small uk-display-block uk-text-uppercase position">
                        <?= $team['team_member_position']; ?>
                    </span>
                    <div class="description-block">
                        <p class="description">
                            <?= $team['team_member_bio']; ?>
                        </p>
                        <p class="read-more">
                            <a href="#" class="uk-button uk-button-primary button">
                                Read More
                            </a>
                        </p>
                    </div>
                </li>
            <?php }
        }?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
