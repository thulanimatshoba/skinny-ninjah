<?php

use Carbon_Fields\Block;
use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'skinny_ninjah_post_meta');
function skinny_ninjah_post_meta()
{
    /* Page Slider */
    Container::make('post_meta', __('Page Slider', 'skinny-ninjah'))
        ->where( 'post_id', '=', get_option( 'page_on_front' ) )
        ->add_fields([
            Field::make('complex', 'skinny_ninjah_slider', 'Add your slides below.')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make ( 'select' , 'media_type' , 'Slider Image or Video?' )
                        ->set_width(30)
                        ->add_options ([
                            'image' => 'Image' ,
                            'video' => 'Video' ,
                        ]),

                    Field::make ( 'image' , 'slider_image' , 'Slider Image' )
                        ->set_width(30)
                        ->set_conditional_logic ([
                            'relation' => 'AND' ,
                            [
                                'field' => 'media_type' ,
                                'value' => 'image' ,
                                'compare' => '=' ,
                            ]
                        ]),

                    Field::make ( 'file' , 'slider_video' , 'Slider Video' )
                        ->set_width(30)
                        ->set_type('video')
                        ->set_value_type('url')
                        ->set_conditional_logic ([
                            'relation' => 'AND' ,
                            [
                                'field' => 'media_type' ,
                                'value' => 'video' ,
                                'compare' => '=' ,
                            ]
                        ]),

                    Field::make( 'select', 'show_slider_heading', 'Show Heading' )
                        ->add_options(
                            [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ]
                        ),
                    Field::make('text', 'slider_name', 'Heading')
                        ->set_width(80)
                        ->set_attribute('placeholder', 'Slider Heading')
                        ->set_default_value( 'Slider Heading' )
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

                    Field::make( 'color', 'slider_title_color', 'Heading Color' )
                        ->set_alpha_enabled()
                        ->set_width(20)
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
                    Field::make('textarea', 'slider_description', 'Description')
                        ->set_width(80)
                        ->set_attribute('placeholder', 'Slider Description')
                        ->set_default_value( 'Slider Description' )
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

                    Field::make( 'color', 'slider_desc_color', 'Description Color' )
                        ->set_alpha_enabled()
                        ->set_width(20)
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

                    Field::make('text', 'slider_link_label_1', 'Slider Link Label One')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'Link label')
                        ->set_help_text( 'Enter your button link label' ),

                    Field::make('text', 'slider_link_1', 'Slider Link One')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'https//')
                        ->set_help_text( 'Enter your button link url' ),

                    Field::make('text', 'slider_link_label_2', 'Slider Link Label Two')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'Link label')
                        ->set_help_text( 'Enter your button link label' ),

                    Field::make('text', 'slider_link_2', 'Slider Link Two')
                        ->set_width(20)
                        ->set_attribute('placeholder', 'https//')
                        ->set_help_text( 'Enter your button link url' ),
                ])
                ->set_header_template(
                    '
                <% if (slider_name) { %>
                    <%- slider_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);

    /* Services */
    Container::make('post_meta', __('Our Services', 'skinny-ninjah'))
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields([
            Field::make('text', 'our_services_section_title', 'Section Title'),
            Field::make('text', 'our_services_section_description', 'Section Description'),
            Field::make('image', 'our_service_side_image', 'Services Image')->set_value_type( 'url' )->set_width(30),
            Field::make('complex', 'our_services', 'Our Services')->set_width(70)
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'service_name', 'Service Name')->set_width(30),
                    Field::make('rich_text', 'service_excerpt', 'Service Excerpt')->set_width(70),
                ])
                ->set_header_template(
                    '
                <% if (service_name) { %>
                    <%- service_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);

    /* Home Page Team */
    Container::make('post_meta', __('Our Team', 'skinny-ninjah'))
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields([
            Field::make('text', 'our_team_title', 'Section title'),
            Field::make('text', 'team_section_description', 'Section description'),
            Field::make('complex', 'skinny_ninjah_team', '')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('text', 'team_member_name', 'Full Name')->set_width(30),
                    Field::make('text', 'team_member_position', 'Position')->set_width(30),
                    Field::make('image', 'team_member_image', 'Profile Picture')->set_width(30),
                    Field::make('textarea', 'team_member_bio', 'Bio'),
                ])
                ->set_header_template(
                    '
                <% if (team_member_name) { %>
                    <%- team_member_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);

    /* Page Info Block */
    Container::make('post_meta', __('Small Info', 'skinny-ninjah'))
        ->where( 'post_id', '=', get_option( 'page_on_front' ) )
        ->add_fields([
            Field::make('complex', 'page_info_block', '')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make( 'select', 'info_block_icon', 'Select Icon' )
                        ->add_options([
                            'fa-users' => 'Users',
                            'fa-coffee' => 'Coffee',
                            'fa-comments-o' => 'Comments',
                            'fa-thumbs-up' => 'Thumbs Up',
                        ])->set_width(30),
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

    /* Page Our Clients */
    Container::make('post_meta', __('Our Clients', 'skinny-ninjah'))
        ->where( 'post_id', '=', get_option( 'page_on_front' ) )
        ->add_fields([
            Field::make('text', 'our_client_section_title'),
            Field::make('complex', 'our_clients', '')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'client_name', 'Client Name')->set_width(30),
                    Field::make('image', 'client_logo', 'Client Logo')->set_width(30),
                ])
                ->set_header_template(
                    '
                <% if (client_name) { %>
                    <%- client_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);

    /* Our Clients Block */
    Block::make( __( 'Our clients logo slider' ) )
        ->add_fields([
            Field::make('text', 'our_client_section_title'),
            Field::make('complex', 'our_clients', '')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'client_name', 'Client Name')->set_width(30),
                    Field::make('image', 'client_logo', 'Client Logo')->set_width(30),
                ])
                ->set_header_template(
                    '
                <% if (client_name) { %>
                    <%- client_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ])
        ->set_icon( 'groups' )
        ->set_category( 'layout' )
        ->set_description( __( 'Add logos to display them as a slider block consisting of a heading, an image.' ) )
        ->set_render_callback( function () {
            $our_clients = carbon_get_the_post_meta('our_clients');
            ?>

            <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true">
                <?php
                echo '<div class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">';
                if ($our_clients) {
                    foreach ($our_clients as $clients) : ?>
                        <div>
                            <figure class="clients-thumbnail uk-text-center">
                                <?= wp_get_attachment_image($clients['client_logo'], 'featured-square'); ?>
                            </figure>
                        </div>
                    <?php endforeach;
                }
                echo '</div>';
                ?>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
            <?php
        } );

    /* Portfolio */
    Container::make('post_meta', __('Portfolio', 'skinny-ninjah'))
        ->where( 'post_type', '=', 'page' )
        ->add_fields([
            Field::make('text', 'section_title', 'Section Title')->set_width(50),
            Field::make('text', 'section_description', 'Section Small Description')->set_width(50),
            Field::make('complex', 'page_portfolio_block', '')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make( 'select', 'portfolio_category', 'Portfolio Category' )
                        ->add_options([
                            'ecommerce' => 'E-commerce',
                            'web-design' => 'Web Design',
                            'web-development' => 'Web Development',
                            'running' => 'Running',
                        ])->set_width(20),
                    Field::make('image', 'category_image', 'Image')->set_width(20),
                    Field::make('text', 'category_name', 'Title')->set_width(20),
                    Field::make('text', 'portfolio_description', 'Small Description')->set_width(20),
                ])
                ->set_header_template(
                    '
                <% if (category_name) { %>
                    <%- category_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);


    /* Skinny Ninjah Options Page */
    $basic_options_container = Container::make('theme_options', __('Stashed Settings'))
        ->set_page_menu_position(2)
        ->set_icon('dashicons-image-filter')
        ->add_tab( 'Social', [
            Field::make( 'complex', 'social_links', 'Social Links' )
                ->set_layout('tabbed-vertical')
                ->add_fields( [
                    Field::make( 'text', 'social_label', 'Social Label' )
                        ->set_attribute('placeholder', 'Facebook')
                        ->set_help_text( 'Enter your social media label' )
                        ->set_width( 50 )
                        ->set_required(),

                    Field::make( 'text', 'social_url', 'Social URL' )
                        ->set_attribute('placeholder', 'https://facebook.com')
                        ->set_help_text( 'Enter your social media link url' )
                        ->set_width( 50 )
                        ->set_required(),
                ] )
                ->set_header_template(
                    '
                <% if (social_label) { %>
                    <%- social_label %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ] )

        ->add_tab(__('Google Analytics'), [
            Field::make('text', 'gtm_code', __('Google Tag Manager Code'))
                ->set_attribute('placeholder', 'GTM-XXX'),
            Field::make('text', 'ua_code', __('Google Universal Analytics Tracking ID'))
                ->set_attribute('placeholder', 'UA-XXX'),
        ])
        ->add_tab(__('ReCaptcha'), [
            Field::make('text', 'recaptcha_client_key', __('ReCaptcha Site Key')),
            Field::make('text', 'recaptcha_server_key', __('ReCaptcha Secret Key')),
        ])
        ->add_tab(__('Scripts'), [
            Field::make('header_scripts', 'header_script', __('Header Script')),
            Field::make('footer_scripts', 'footer_script', __('Footer Script')),
        ]);


    // Add social options page under 'Basic Options'
    Container::make('theme_options', __('Something Else'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_tab( 'Something', [
            Field::make( 'complex', 'social_links', 'Social Links' )
                ->set_layout('tabbed-vertical')
                ->add_fields( [
                    Field::make( 'text', 'social_label', 'Social Label' )
                        ->set_attribute('placeholder', 'Facebook')
                        ->set_help_text( 'Enter your social media label' )
                        ->set_width( 50 ) // condense layout so field takes only 50% of the available width
                        ->set_required(),

                    Field::make( 'text', 'social_url', 'Social URL' )
                        ->set_attribute('placeholder', 'https://facebook.com')
                        ->set_help_text( 'Enter your social media link url' )
                        ->set_width( 50 )
                        ->set_required(),
                ] )
                ->set_header_template(
                    '
                <% if (social_label) { %>
                    <%- social_label %>
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
