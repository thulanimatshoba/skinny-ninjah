<?php

if (!has_nav_menu('header')) {
    return;
}

wp_nav_menu(
    [
        'theme_location' => 'header',
        'container_class' => 'ninjah-menu',
        'menu_class' => 'uk-navbar-nav uk-visible@s',
        'link_before' => '<span class="damn">',
        'link_after' => '</span>',
    ]
);
