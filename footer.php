<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skinny_Ninjah
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="uk-container">
			<div class="footer-top uk-margin-medium-top uk-margin-small-bottom uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid>
				<div class="uk-animation-scale-up">
					<?php if (!dynamic_sidebar('footer-one')): endif; ?>
				</div>
				<div class="uk-animation-scale-up">
					<?php if (!dynamic_sidebar('footer-two')): endif; ?>
				</div>
				<div class="uk-animation-scale-up">
					<?php if (!dynamic_sidebar('footer-three')): endif; ?>
				</div>
				<div class="uk-animation-scale-up">
					<?php if (!dynamic_sidebar('footer-four')): endif; ?>
				</div>
			</div>
		</div>


		<div class="site-info uk-padding-small">
			<div class="uk-container">
				<div class="uk-grid">
					<div class="uk-width-1-2@s uk-width-1-2@m uk-width-1-1">
						<?php _e('All rights reserved &copy;');?> <?php echo date("Y"); echo " "; bloginfo('name'); ?>
					</div>
					<div class="uk-width-1-2@s uk-width-1-2@m uk-width-1-1 uk-text-right@m uk-text-right@s uk-text-left">
						<?php //printf( esc_html__( 'Developed by: %2$s', 'skinny-ninjah' ), 'skinny-ninjah', '<a title="Bounce Ideas" target="_blank" href="http://thulanimatshoba.co.za"><img width="70px" height="50px" src="/wp-content/themes/bounceideas/src/images/bounce.png"></a>' ); ?>
						<?php get_template_part('/partials/components/social', 'media'); ?>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
