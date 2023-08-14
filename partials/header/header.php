<header id="masthead" class="uk-width-1-1 site-header" uk-sticky="top: 100; animation: uk-animation-scale-up; bottom: #colophon">
    <div class="uk-container uk-navbar">
        <div class="site-branding uk-navbar-left">
            <?php get_template_part('partials/header/logo'); ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="uk-navbar-right main-navigation">
            <button class="uk-navbar-toggle menu-toggle uk-hidden@s" uk-navbar-toggle-icon href="#" uk-toggle="target: #offcanvas-push"></button>
            <?php get_template_part('partials/menus/header', 'menu');
            //get_template_part('partials/header/login', 'button');
            ?>
        </nav><!-- #site-navigation -->
    </div>
</header><!-- #masthead -->
