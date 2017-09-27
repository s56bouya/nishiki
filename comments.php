<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title"><i class="icomoon icon-bubble"></i>
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( esc_html_x( '%s Comment', 'comments title', 'nishiki' ), get_the_title() );
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: number of comments, 2: post title */
			  			esc_html( _nx(
							'%1$s Comment', // single
							'%1$s Comments', // plural
							$comments_number, // number
							'comments title', // context
							'nishiki'
							)
						), esc_html( number_format_i18n( $comments_number ) ), get_the_title()
					);
				}
			?>
		</h2>

		<ol class="comment-list">
			<?php wp_list_comments( array(
				'avatar_size' => 55,
				'style'       => 'ol',
				'short_ping'  => false,
				'reply_text'  => __( 'Reply', 'nishiki' ),
				'callback'    => 'nishiki_comment_template'
				)
			);
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'nishiki' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'nishiki' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nishiki' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
