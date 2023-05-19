<?php

use Carbon_Fields\Block;
use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'skinny_ninjah_post_meta');
function skinny_ninjah_post_meta()
{
    /* Home Page Team */
    Container::make('post_meta', __('Home Page Slider', 'skinny-ninjah'))
        ->show_on_page('home')
        ->add_fields([
            Field::make('complex', 'skinny_ninjah_slider', 'Add your slides below.')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('image', 'skinny_ninjah_slider_image', 'Slider Image'),
                    Field::make( 'select', 'show_slider_heading', 'Show Heading' )
                        ->add_options(
                            [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ]
                        ),
                    Field::make('text', 'skinny_ninjah_slider_name', 'Heading')
                        ->set_width(30)
                        ->set_attribute('placeholder', 'Slider Heading')
                        ->set_default_value( 'Slider Heading Lorem Ipsum' )
                        ->set_help_text( 'Enter your slider heading' )
                        ->set_conditional_logic(
                            [
                                'relation' => 'AND',
                                [
                                    'field' => 'show_slider_heading',
                                    'value' => 'yes',
                                    'compare' => '=',
                                ]
                            ]
                        ),

                    Field::make( 'select', 'show_slider_description', 'Show Description' )
                        ->add_options(
                            [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ]
                        ),
                    Field::make('textarea', 'skinny_ninjah_slider_description', 'Description')
                        ->set_attribute('placeholder', 'Slider Description')
                        ->set_default_value( 'Slider Description Lorem Ipsum dolor sit amet' )
                        ->set_help_text( 'Enter your slider description' )
                        ->set_conditional_logic(
                            [
                                'relation' => 'AND',
                                [
                                    'field' => 'show_slider_description',
                                    'value' => 'yes',
                                    'compare' => '=',
                                ]
                            ]
                        ),

                    Field::make('text', 'skinny_ninjah_slider_link_label_1', 'Slider Link Label One')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'Link label')
                        ->set_help_text( 'Enter your button link label' ),

                    Field::make('text', 'skinny_ninjah_slider_link_1', 'Slider Link One')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'https//')
                        ->set_help_text( 'Enter your button link url' ),

                    Field::make('text', 'skinny_ninjah_slider_link_label_2', 'Slider Link Label Two')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'Link label')
                        ->set_help_text( 'Enter your button link label' ),

                    Field::make('text', 'skinny_ninjah_slider_link_2', 'Slider Link Two')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'https//')
                        ->set_help_text( 'Enter your button link url' ),

                    Field::make( 'color', 'skinny_ninjah_slider_title_color', 'Heading Color' )
                        ->set_alpha_enabled()
                        ->set_width(30),

                    Field::make( 'color', 'skinny_ninjah_slider_desc_color', 'Description Color' )
                        ->set_alpha_enabled()
                        ->set_width(30),
                ])
                ->set_header_template(
                    '
                <% if (skinny_ninjah_slider_name) { %>
                    <%- skinny_ninjah_slider_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);

    /* Home Page Info Block */
    Container::make('post_meta', __('Small Info', 'skinny-ninjah'))
        ->show_on_page('home')
        ->add_fields([
            Field::make('complex', 'skinny_ninjah_homepage_info_block', '')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make( 'select', 'info_block_icon', 'Select Icon' )
                        ->add_options( array(
                            'fa-users' => 'Users',
                            'fa-coffee' => 'Coffee',
                            'fa-comments-o' => 'Comments',
                            'fa-thumbs-up' => 'Thumbs Up',
                        ) )->set_width(30),
                    Field::make('text', 'info_block_title', 'Number')->set_width(30),
                    Field::make('text', 'info_block_description', 'Description')->set_width(30),
                ])
                ->set_header_template(
                    '
                <% if (info_block_description) { %>
                    <%- info_block_description %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);


    /* Skinny Ninjah Options Page */
    $basic_options_container = Container::make('theme_options', __('Skinny Ninjah Settings'))
        ->set_page_menu_position(2)
        ->set_icon('dashicons-image-filter')
        ->add_tab( 'Social', [
            Field::make( 'complex', 'skinny_ninjah_social_links', 'Social Links' )
                ->set_layout('tabbed-vertical')
                ->add_fields( [
                    Field::make( 'text', 'skinny_ninjah_social_label', 'Social Label' )
                        ->set_attribute('placeholder', 'Facebook')
                        ->set_help_text( 'Enter your social media label' )
                        ->set_width( 50 )
                        ->set_required(),

                    Field::make( 'text', 'skinny_ninjah_social_url', 'Social URL' )
                        ->set_attribute('placeholder', 'https://facebook.com')
                        ->set_help_text( 'Enter your social media link url' )
                        ->set_width( 50 )
                        ->set_required(),
                ] )
                ->set_header_template(
                    '
                <% if (skinny_ninjah_social_label) { %>
                    <%- skinny_ninjah_social_label %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ] )

        ->add_tab(__('Google Analytics'), [
            Field::make('text', 'skinny_ninjah_gtm_code', __('Google Tag Manager Code'))
                ->set_attribute('placeholder', 'GTM-XXX'),
            Field::make('text', 'skinny_ninjah_ua_code', __('Google Universal Analytics Tracking ID'))
                ->set_attribute('placeholder', 'UA-XXX'),
        ])
        ->add_tab(__('ReCaptcha'), [
            Field::make('text', 'skinny_ninjah_recaptcha_client_key', __('ReCaptcha Site Key')),
            Field::make('text', 'skinny_ninjah_recaptcha_server_key', __('ReCaptcha Secret Key')),
        ])
        ->add_tab(__('Scripts'), [
            Field::make('header_scripts', 'skinny_ninjah_header_script', __('Header Script')),
            Field::make('footer_scripts', 'skinny_ninjah_footer_script', __('Footer Script')),
        ]);


    // Add social options page under 'Basic Options'
    Container::make('theme_options', __('Something Else'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_tab( 'Something', [
            Field::make( 'complex', 'skinny_ninjah_social_links', 'Social Links' )
                ->set_layout('tabbed-vertical')
                ->add_fields( [
                    Field::make( 'text', 'skinny_ninjah_social_label', 'Social Label' )
                        ->set_attribute('placeholder', 'Facebook')
                        ->set_help_text( 'Enter your social media label' )
                        ->set_width( 50 ) // condense layout so field takes only 50% of the available width
                        ->set_required(),

                    Field::make( 'text', 'skinny_ninjah_social_url', 'Social URL' )
                        ->set_attribute('placeholder', 'https://facebook.com')
                        ->set_help_text( 'Enter your social media link url' )
                        ->set_width( 50 )
                        ->set_required(),
                ] )
                ->set_header_template(
                    '
                <% if (skinny_ninjah_social_label) { %>
                    <%- skinny_ninjah_social_label %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ] );
}
add_action('after_setup_theme', 'skinny_ninjah_load');

function skinny_ninjah_load()
{
    Carbon_Fields::boot();
}
