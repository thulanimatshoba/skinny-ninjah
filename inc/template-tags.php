<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Skinny_Ninjah
 */

if ( ! function_exists( 'skinny_ninjah_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function skinny_ninjah_posted_on() {
		$time_string = '<time class="entry-date published updated uk-text-muted" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published uk-text-muted uk-text-small" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date('d. M. Y') ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date('d. M. Y') )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'skinny-ninjah' ), $time_string
		);

		echo '<span class="posted-on uk-text-muted uk-text-small">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'skinny_ninjah_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function skinny_ninjah_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By: %s', 'post author', 'skinny-ninjah' ),
			'<span class="author vcard"><a class="url fn n uk-text-muted uk-text-small" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline uk-text-muted uk-text-small"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'skinny_ninjah_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function skinny_ninjah_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'skinny-ninjah' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links uk-text-small uk-text-muted">' . esc_html__( 'Posted in: %1$s', 'skinny-ninjah' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'skinny-ninjah' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links uk-text-small uk-text-muted">' . esc_html__( 'Tagged %1$s', 'skinny-ninjah' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'skinny-ninjah' ),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'skinny-ninjah' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'skinny_ninjah_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function skinny_ninjah_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						[
							'alt' => the_title_attribute(
								[
									'echo' => false,
								]
							),
						]
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

/**
 * Gets the thumbnail with Lazy Load.
 * Should be called in the WordPress Loop.
 *
 * @param int|null $post_id               Post ID.
 * @param string   $size                  The registered image size.
 * @param array    $additional_attributes Additional attributes.
 *
 * @return string
 */
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
	$custom_thumbnail = '';

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	if ( has_post_thumbnail( $post_id ) ) {
		$default_attributes = [
			'loading' => 'lazy'
		];

		$attributes = array_merge( $additional_attributes, $default_attributes );

		$custom_thumbnail = wp_get_attachment_image(
			get_post_thumbnail_id( $post_id ),
			$size,
			false,
			$attributes
		);
	}

	return $custom_thumbnail;
}

/**
 * Renders Custom Thumbnail with Lazy Load.
 *
 * @param int    $post_id               Post ID.
 * @param string $size                  The registered image size.
 * @param array  $additional_attributes Additional attributes.
 */
function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
	echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
