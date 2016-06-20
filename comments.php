<?php
/**
 * The template for showing Comments.
 *
 * @package theme-name
 */

if ( post_password_required() ) {
	return;
}
?>
<div class="comments container">
	<?php if ( have_comments() ) :?>
		<h2 class="comments-title">
		Comments on <?php echo get_the_title(); ?>:
		</h2>
		
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                ) );
            ?>
        </ol><!-- .comment-list -->
	<?php endif; // have_comments ?>

	<!-- Comment form -->

	<?php if ( comments_open() ) : ?>

		<h3>Leave a note</h3>

		<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" />

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" role="form"> 
		
			<div class="form-group">
				<label for="author">Name: <small class="text-danger">*</small></label>
				<input class="form-control" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22"/	>
			</div>

			<div class="form-group">
				<label for="email">Email: <small class="text-danger">*</small></label>
				<input class="form-control" type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2"/>
			</div>

			<div class="form-group">
				<label for="url">Website: </label>
				<input class="form-control" type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3"/>
			</div>

			<div class="form-group">
				<label for="comment">Your comment: </label>
				<textarea class="form-control" name="comment" id="comment" rows="5" tabindex="4"></textarea>
			</div>

			

			<div class="form-group text-center">
				<input class="form-control btn btn-secondary" name="submit" type="submit" id="submit" tabindex="5" value="Post Comment">
				<input class="form-control" type="hidden" name="comment_post_ID" value="<?php echo $id ?>" />
			</div>


			<?php do_action('comment_form', $post->ID); ?>

		</form>
	<?php endif; ?>
</div>