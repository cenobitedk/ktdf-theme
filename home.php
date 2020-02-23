<?php
/**
 * Blog Posts Index (Home) template
 */
?>
<?php get_header(); ?>

<?php
/* Main loop - displays posts */
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<?php if ( ! is_singular() && has_post_thumbnail() ) { ?>
	<div class="img">
		<?php the_post_thumbnail( 'post-featured-image' ); ?>
	</div>
	<?php } ?>
	<?php the_content( 'Read More' ); ?>
	<?php wp_link_pages( array( 'before' => '<strong>Pages:</strong> ', 'after' => '<br /><br />', 'next_or_number' => 'number' ) ); ?>
	<div class="post-info">
		<?php _e( 'Posted by ', 'ktdf-theme' ); ?>
		<span class="author"><?php the_author_posts_link(); ?></span>
		<?php _e( 'in', 'ktdf-theme' ); ?>
		<span class="categories"><?php the_category( ', ' ); ?></span>
		<?php the_tags( '<span class="tags">with the tags: ', ', ', '</span>' ); ?>
		<?php edit_post_link( 'Edit', '. ', '' ); ?>
	</div>
	<div class="post-meta">
		<span class="time"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<span class="comments-meta"><a href="<?php the_permalink(); ?>#respond"><?php comments_number(__( 'No Comments', 'ktdf-theme' ), __( '1 Comment', 'ktdf-theme' ), __( '% Comments', 'ktdf-theme' )); ?></a></span>
		<span class="comment-question"><a href="<?php the_permalink(); ?>#respond"><?php _e( 'Leave a comment/question', 'ktdf-theme' ); ?></a></span>
	</div>
</div>
<?php endwhile;

/* If no posts, then serve error message */
else: ?>
<div class="post">
	<h2><?php _e( 'Not Found', 'ktdf-theme' ); ?></h2>
	<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'ktdf-theme' ); ?></p>
</div>
<?php endif; ?>

<?php get_footer(); ?>