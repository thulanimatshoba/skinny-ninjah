<?php
// Get all entered urls from the database
$social_links = carbon_get_theme_option( 'social_links' );

if ($social_links) : ?>
    <div class="social-links">
        <?php
            foreach ( $social_links as $link ) :
                echo '<a href="' . esc_url( $link['social_url'] ) . '"
                        target="_blank" title="'. esc_html( $link['social_label']) . '"><span class="screen-reader-text">' . esc_html( $link['social_label'] ) .
                    '</span></a>';
                endforeach; ?>
    </div>
<?php endif;
