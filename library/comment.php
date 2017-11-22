<?php
// Customize Comment
function nishiki_comment_template($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'nishiki' ); ?></em>
	<?php endif; ?>

	<?php comment_text(); ?>
	<?php echo '<cite class="fn">' . get_comment_author_link() . '</cite>'; ?>

	<div class="comment-meta commentmetadata">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		<a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( esc_html__( '%1$s at %2$s', 'nishiki' ), get_comment_date(),  get_comment_time() );
			?>
		</a>
		<?php edit_comment_link( esc_html__( '(Edit)', 'nishiki' ), '  ', '' ); ?>

	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}