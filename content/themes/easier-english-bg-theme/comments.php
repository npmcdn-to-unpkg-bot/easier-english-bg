<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="comments-title">
			<?php
				printf( _n( '<span class="comments_count">Един коментар:</span>', '<span class="comments_count">%1$s коментара:</span>', get_comments_number(), 'twentytwelve' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</div>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'twentytwelve_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(array(
		'title_reply' => 'Добави бърз коментар:',
		'label_submit' => __( 'Публикувай!' ),
		'comment_notes_after' => '',
		'comment_notes_before' => __( '' ) . ( $req ? $required_text : '' ),
		'cancel_reply_link' => __( 'Отказ' ),
		'fields' => apply_filters( 'comment_form_default_fields', array(
		    'author' =>
		      '<div class="group"><p class="comment-form-author">' .
		      '<label for="author">' . __( 'Име:', 'domainreference' ) . 
		      ( $req ? ' <span class="required">*</span></label>' : '' ) .
		      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		      '" size="30"' . $aria_req . ' aria-required="true" /></p>',

		    'email' =>
		      '<p class="comment-form-email"><label for="email">' . __( 'E-mail:', 'domainreference' ) .
		      ( $req ? ' <span class="required">*</span> <small>(няма страшно, няма да го публикуваме)</small></label>' : '' ) .
		      '<input id="email" name="email" type="text" placeholder="асоцииран с Gravatar e-mail се показва със снимка" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		      '" size="30"' . $aria_req . ' aria-required="true" /></p></div>',

		    'url' =>
		      ''
		    )
		  ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Коментар:', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true" placeholder="Българи, пишете на кирилица :)"></textarea></p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Логнат си като: <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Влез с друг акаунт?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>'
	)); ?>

</div><!-- #comments .comments-area -->