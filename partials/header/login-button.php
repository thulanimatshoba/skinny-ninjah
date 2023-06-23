<?php
if ( !is_user_logged_in()) : ?>
<button class="uk-button-small uk-button-default" uk-toggle="target: .login-register-modal"><i class="fa fa-user"></i></button>
<?php
else :
    $current_user = wp_get_current_user(); ?>
<div class="">
    <button class="uk-button-small uk-button-default"><i class="fa fa-user"></i></button>
    <div uk-dropdown>
        <ul class="uk-nav uk-dropdown-nav">
            <li>Item</li>
            <li>Item</li>
            <li>Item</li>
            <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</li>
        </ul>
    </div>
</div>
<?php endif;
