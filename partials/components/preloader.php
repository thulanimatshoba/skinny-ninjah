<?php
$user = wp_get_current_user();
$allowed_roles = array('editor', 'administrator', 'author');
if ( !array_intersect($allowed_roles, $user->roles)) { ?>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="uk-position-center" style="z-index: 9999" >
        </div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
<?php } ?>
