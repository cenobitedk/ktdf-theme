<?php
/**
 * Static Page template
 */
?>
<?php get_header(); ?>

<?php
/* Main loop - displays posts */
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="link-pages"><strong>Pages:</strong> ', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
	<div class="post-info">
		<?php edit_post_link( 'Edit', '. ', '' ); ?>
	</div>
</div>
<?php 

if ( ! post_password_required() && comments_open() ) {
	comments_template(); // Load comments
}

endwhile;

/* If no posts, then serve error message */
else : ?>
<div class="post">
	<h2><?php _e( 'Not Found', 'darkgritty' ); ?></h2>
	<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'darkgritty' ); ?></p>
</div>
<?php endif; ?>

<?php get_footer(); ?>