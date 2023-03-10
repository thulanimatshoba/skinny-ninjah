<?php

use Carbon_Fields\Block;
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
                    Field::make('image', 'skinny_ninjah_slider_image', 'Slider Image')
                        ->set_width(30),

                    Field::make('text', 'skinny_ninjah_slider_name', 'Heading')
                        ->set_width(30)
                        ->set_attribute('placeholder', 'Slider Heading')
                        ->set_default_value( 'Slider Heading Lorem Ipsum' )
                        ->set_help_text( 'Enter your slider heading' ),

                    Field::make('textarea', 'skinny_ninjah_slider_description', 'Description')
                        ->set_width(30)
                        ->set_attribute('placeholder', 'Slider Description')
                        ->set_default_value( 'Slider Description Lorem Ipsum dolor sit amet' )
                        ->set_help_text( 'Enter your slider description' ),

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
                        ->set_alpha_enabled( true )
                        ->set_width(30),

                    Field::make( 'color', 'skinny_ninjah_slider_desc_color', 'Description Color' )
                        ->set_alpha_enabled( true )
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

    /* Skinny Ninjah Options Page */
    $basic_options_container = Container::make('theme_options', __('Skinny Ninjah Options'))
        ->set_page_menu_position(2)
        ->set_icon('dashicons-image-filter')
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
    Container::make('theme_options', __('Social Links'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_tab( 'Social', [
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

    //Skinny Ninjah Block
    Block::make( __( 'Skinny Ninjah Block' ) )
        ->add_tab( __( 'Profile' ), array(
            Field::make( 'text', 'skinny_ninjah_first_name', __( 'First Name' ) ),
            Field::make( 'text', 'skinny_ninjah_last_name', __( 'Last Name' ) ),
            Field::make( 'text', 'skinny_ninjah_position', __( 'Position' ) ),
        ) )
        ->add_tab( __( 'Notification' ), array(
            Field::make( 'text', 'skinny_ninjah_email', __( 'Notification Email' ) ),
            Field::make( 'text', 'skinny_ninjah_phone', __( 'Phone Number' ) ),
        ) )
        ->add_tab( __('Stuff'), array(
            Field::make( 'text', 'skinny_ninjah_heading', __( 'Block Heading' ) ),
            Field::make( 'image', 'skinny_ninjah_image', __( 'Block Image' ) ),
            Field::make( 'rich_text', 'skinny_ninjah_content', __( 'Block Content' ) ),
        ) )
        ->set_icon( 'heart' )
        ->set_description( __( 'A simple block consisting of a heading, an image and a text content.' ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            ?>

            <div class="skinny-ninjah-block">
                <div class="block__heading">
                    <h1><?php echo esc_html( $fields['skinny_ninjah_heading'] ); ?></h1>
                </div><!-- /.block__heading -->

                <div class="block__image">
                    <?php echo wp_get_attachment_image( $fields['skinny_ninjah_image'], 'full' ); ?>
                </div><!-- /.block__image -->

                <div class="block__content">
                    <?php echo apply_filters( 'the_content', $fields['skinny_ninjah_content'] ); ?>
                </div><!-- /.block__content -->
            </div><!-- /.block -->

            <?php
        } );
    //Skinny Ninjah Block End
}
add_action('after_setup_theme', 'skinny_ninjah_load');

function skinny_ninjah_load()
{
    //require_once( ABSPATH . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
