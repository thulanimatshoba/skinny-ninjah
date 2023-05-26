<?php
/**
 * This is for social sharing
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skinny_Ninjah
 */
?>


<h6 class="uk-float-left uk-text-muted uk-text-small"><?php _e('Share this on...'); ?></h6>

<div class="sn-social-sharing uk-float-left">
    <ul>
        <li class="uk-inline">
            <a title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
               onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
                <img height="20" width="20" src="<?php echo get_template_directory_uri() . '/images/social-share/facebook.svg'; ?>">
            </a>
        </li>
        <li class="uk-inline">
            <a title="Twitter" href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>"
               onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
                <img height="20" width="20" src="<?php echo get_template_directory_uri() . '/images/social-share/twitter.svg'; ?>">
            </a>
        </li class="uk-inline">
        <li class="uk-inline">
            <a title="LinkedIn" href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php echo get_the_title();?>"
               onclick="window.open(this.href, 'linkedin-share', 'width=550,height=235');return false;">
                <img height="20" width="20" src="<?php echo get_template_directory_uri() . '/images/social-share/linkedin.svg'; ?>">
            </a>
        </li>
    </ul>
</div>