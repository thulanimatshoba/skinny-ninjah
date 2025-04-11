<!-- This is the login and registration modal -->
<!--<div id="modal-center" class="login-register-modal uk-flex-top uk-modal-full" uk-modal bg-close="false">-->
<!--    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">-->
<!--        <button class="uk-modal-close-default" type="button" uk-close></button>-->
<!--        <ul class="uk-subnav uk-subnav-pill"-->
<!--            uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">-->
<!--            <li><a href="#">Login</a></li>-->
<!--            <li><a href="#">Register</a></li>-->
<!--        </ul>-->
<!---->
<!--        <ul class="uk-switcher uk-margin">-->
<!--            <li>--><?php //wp_login_form(); ?><!--</li>-->
<!--            <li>--><?php //echo do_shortcode("[register role='subscriber']")  ?>
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->

<div id="modal-full" class="login-register-modal uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            <div class="uk-background-cover" style="background-image: url('/wp-content/themes/skinny-ninjah/images/register-bg.jpg');" uk-height-viewport></div>
            <div class="uk-padding-large">
                <h1>Register</h1>
                <?php //echo do_shortcode("[register role='subscriber']") ?>
                <?php wp_login_form(); ?>
            </div>
        </div>
    </div>
</div>
