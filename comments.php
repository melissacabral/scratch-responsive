<?php
/**
 * The template for displaying Comments.
 * adapted from twentyten
*/
?>

<div id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments-title">
	 <?php comments_number( 'no responses', 'one response', '% responses' ); ?> 
	 to  
	 <?php the_title(); ?>
	 
	
	<?php
	//if commments are open, jump to comment form
	if(comments_open()){ ?>
	| <a href="#respond" class="btn"><i class="icon-comments-alt icon-large"></i> Leave a Comment</a>
	<?php } //end if comments open ?>
	</h3>
			
<?php
// Are there comments to navigate through?  
//get_option( 'page_comments' ) returns TRUE is the "Paged Comments" option is true; otherwise returns FALSE
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<div class="pagination">
				<?php previous_comments_link( '<i class="icon-arrow-left"></i> Older Comments' ); ?>
				<?php next_comments_link( 'Newer Comments <i class="icon-arrow-right"></i>'  ); ?>
			</div> <!-- .navigation -->
<?php } // endif comment navigation ?>

			<div class="commentlist">
				<?php
					/* Loop through and list the comments. 
					/* wp_list_comments(array(
					
					'walker'            => null,
					'max_depth'         => ,
					'style'             => 'ul',
					'callback'          => null,
					'end-callback'      => null,
					'type'              => 'all',
					'page'              => ,
					'per_page'          => ,
					'avatar_size'       => 32,
					'reverse_top_level' => null,
					'reverse_children'  => 
					));
					 */
					 //use this for easy demo:
					//wp_list_comments(array('avatar_size' => 70	));
					//enhanced. will use function wcm400_comment() for template and only show comments, no pingbacks or trackbacks:
					wp_list_comments('type=comment&style=div'); 
				?>
			</div>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there pages of comments to navigate through? ?>
			<div class="pagination">
				<?php previous_comments_link( '<i class="icon-arrow-left"></i> Older Comments' ); ?>
				<?php next_comments_link( 'Newer Comments <i class="icon-arrow-right"></i>'  ); ?>
				</div>
<?php } // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() && !is_page() ) :
?>
	<p class="nocomments">Comments are Closed</p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->