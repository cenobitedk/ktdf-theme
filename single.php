<?php
/**
 * Single Blog Post template
 */
?>
<?php get_header(); ?>

<?php
/* Main loop - displays posts */
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1><?php the_title(); ?></h1>
	<div class="post-meta">
		<?php the_time( get_option( 'date_format' ) ); ?>
	</div>
	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<strong>Pages:</strong> ', 'after' => '<br /><br />', 'next_or_number' => 'number' ) ); ?>

	<div class="post-info">
		<?php the_category( ', ' ); ?>
		<?php edit_post_link( 'Edit', ' – [ ', ' ]' ); ?>
	</div>
</div>
<?php 

// if ( ! post_password_required() ) {
// 	comments_template(); // Load comments
// }

endwhile;

/* If no posts, then serve error message */
else: ?>
<div class="post">
	<h2><?php _e( 'Not Found', 'ktdf-theme' ); ?></h2>
	<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'ktdf-theme' ); ?></p>
</div>
<?php endif; ?>

<?php get_footer(); ?>