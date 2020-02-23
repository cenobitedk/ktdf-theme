<?php
/**
 * Comments template part
 *
 * Code modified from Enterprise by StudioPress / WordPress.com
 */
?>
<div id="comments">

	<?php
	/* You can start editing here -- including this comment! */
	if ( have_comments() ) :

	if ( get_comment_pages_count() > 1 ) : // are there comments to navigate through ?>
	<div class="navigation">
		<div class="nav-previous">
			<?php previous_comments_link( __( '&larr; Older Comments', 'ktdf-theme' ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'ktdf-theme' ) ); ?>
		</div>
	</div>
<?php endif; // check for comment navigation ?>

	<?php /* The main comments list */ ?>
	<ol class="commentlist">
		<?php
			/* Load comments list - utilizing callback function */
			wp_list_comments(
				array( 
					'callback' => 'darkgritty_comment'
				)
			);
		?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 ) : // are there comments to navigate through ?>
	<div class="navigation">
		<div class="nav-previous">
			<?php previous_comments_link( __( '&larr; Older Comments', 'ktdf-theme' ) ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'ktdf-theme' ) ); ?>
		</div>
	</div>
<?php endif; // check for comment navigation ?>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>

<?php else : // if comments are closed ?>
</div><!-- #comments -->
<p class="comments-closed"></p>
<?php return; ?>
<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : 

	comment_form();

endif; // if you delete this the sky will fall on your head ?>

</div><!-- #comments -->