<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Autixir
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

// Comment form args.
$fields = array(			
	'author' =>
		'<div class="input-item input-item-name ltn__custom-icon"><input id="author" name="author" type="text" placeholder=" '. esc_attr__('Type your name....', 'autixir') .' " value="' . esc_attr( $commenter['comment_author'] ) . '" /></div>',
		
	'email' =>
		'<div class="input-item input-item-email ltn__custom-icon"><input id="email" name="email" class="input_half" placeholder=" '. esc_attr__( 'Type your email....', 'autixir' ) .' " type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
		
	'url' =>
		'<div class="input-item input-item-website ltn__custom-icon"><input id="url" name="url" placeholder=" '. esc_attr__( 'Type your website....', 'autixir' ) .' " type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',

	'cookies'=> sprintf( '<label class="input-info-save">%s %s</label>','<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" '.( empty( $commenter['comment_author_email'] ) ? '' : 'checked="checked"').' />', esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'autixir' ) )
		
);


$args = array(
	'class_submit' => 'btn theme-btn-1 btn-effect-1 text-uppercase',
	'label_submit' => esc_html__( 'Post Comment', 'autixir' ),
	'submit_button' =>'<button class="%3$s" type="submit"><i class="far fa-comments"></i> %4$s</button>',
	'submit_field'=> '<div class="btn-wrapper mt-0">%1$s %2$s</div>',
	'comment_field' =>'<div class="input-item input-item-textarea ltn__custom-icon"><textarea id="comment" name="comment" placeholder="'. esc_attr__( 'Type your comment...', 'autixir' ) .'"  required="required"></textarea></div>',
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
 
if ( have_comments() ) :
	$autixir_comment_count = number_format_i18n( get_comments_number() );
	if ( '1' === $autixir_comment_count ) {
		$comments_title = esc_html__( 'One Comment', 'autixir' );
	} else {
		$comments_title = sprintf( esc_html__( '%s Comments', 'autixir' ), $autixir_comment_count );
	}
	$comments_title = apply_filters( 'autixir_comments_title', $comments_title );
?>
<hr>
<div class="ltn__comment-area mb-50">
    <h4 class="comments-title title-2">
		<?php echo esc_html( $comments_title ); ?>
	</h4>
    <div class="ltn__comment-inner">
        <ol class="comment-list">
        	<?php
				wp_list_comments(
					array(
						'callback' => 'autixir_comment',
						'style'    => 'ol',
					)
				);
			?>
        </ol>

        <?php
			// Display comment navigation - WP 4.4.0.
			if ( function_exists( 'the_comments_navigation' ) ) :

				the_comments_navigation(
					array(
						'prev_text' => '<i class="fas fa-angle-left"></i><span class="screen-reader-text">' . __( 'Previous comment', 'autixir' ) . '</span>' . esc_html__( 'Previous', 'autixir' ),
						'next_text' => esc_html__( 'Next', 'autixir' ) . '<i class="fas fa-angle-right"></i><span class="screen-reader-text">' . __( 'Next comment', 'autixir' ) . '</span>',
					)
				);

			elseif ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

				?>

				<div class="comment-navigation clr">
				<?php
					paginate_comments_links(
						array(
							'prev_text' => '<i class="fas fa-angle-left"></i><span class="screen-reader-text">' . __( 'Previous comment', 'autixir' ) . '</span>' . esc_html__( 'Previous', 'autixir' ),
							'next_text' => esc_html__( 'Next', 'autixir' ) . '<i class="fas fa-angle-right"></i><span class="screen-reader-text">' . __( 'Next comment', 'autixir' ) . '</span>',
						)
					);
				?>
				</div>

		<?php endif; ?>

		<?php

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'autixir' ); ?></p>
			<?php
		endif;
		?>

    </div>
</div>
<?php endif; ?>
<hr>
<!-- comment-reply -->
<div class="ltn__comment-reply-area ltn__form-box">
    <?php comment_form( $args ); ?>
</div>
