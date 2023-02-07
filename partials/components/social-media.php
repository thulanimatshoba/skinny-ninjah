<?php
// Get all entered urls from the database
$social_links = carbon_get_theme_option( 'skinny_ninjah_social_links' );

if ($social_links) : ?>
    <div class="social-links">
        <?php
            foreach ( $social_links as $link ) :
                echo '<a 
                        class="' . esc_html( $link['skinny_ninjah_social_label'] ) . '" 
                        href="' . esc_url( $link['skinny_ninjah_social_url'] ) . '" 
                        target="_blank">' . esc_html( $link['skinny_ninjah_social_label'] ) .
                    '</a>';
                endforeach; ?>
    </div>
<?php endif;
