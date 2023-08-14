<?php
if (!is_user_logged_in()) : ?>
    <button class="uk-button-small uk-button-primary" uk-toggle="target: .login-register-modal"><i class="fa fa-user"></i> Sign in</button>
<?php else :
    $current_user = wp_get_current_user(); ?>
    <div class="uk-float-left">
        <button class="uk-button-small uk-button-primary"><i class="fa fa-user"></i> Profile</button>
        <div uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav">
                <li><a href="#">Item</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#">Item</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a></li>
            </ul>
        </div>
    </div>
<?php endif;?>
