<!-- This is the login and registration modal -->
<div id="modal-center" class="login-register-modal uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            <li><?php wp_login_form(); ?></li>
            <li><?php echo do_shortcode("[register role='subscriber']");?></li>
        </ul>
    </div>
</div>
