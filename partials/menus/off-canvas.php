<?php

if (!has_nav_menu('off-canvas')) {
    return;
}

wp_nav_menu(
    [
        'theme_location' => 'off-canvas',
        'container_class' => 'uk-nav uk-margin-auto-vertical',
        'menu_class'    => 'uk-nav'
    ]
);
