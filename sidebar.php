<?php
/**
 * Sidebar template
 */


/**
 * Bail out if on full width template
 */
if ( is_page_template( 'full-width.php' ) )
	return;

/**
 * Main sidebar
 */
?>

<div id="sidebar">
	<?php /* Start Primary Widget Area */
	if ( !dynamic_sidebar( 'sidebar' ) ) : ?>
	<div class="widget">
		<h3><?php _e( 'Archives', 'dark-gritty' ); ?></h3>
		<ul>
			<?php wp_get_archives( 'type=monthly' ); ?>
		</ul>
	</div>
	<?php endif; /* End Primary Widget Area */ ?>
</div>

