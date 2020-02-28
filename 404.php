<?php
/**
 * 404 error template
 */
?>
<?php get_header(); ?>

	<div id="maincontent">
		<div id="maincontent_inner">

		<div class="post">

			<h2 class="title"><?php _e( '404 Error - Not found', 'ktdf-theme' ); ?></h2>
			<div class="post-info">
			</div>

			<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'ktdf-theme' ); ?></p>

			<form id="404-search-form" role="search" method="get" action="<?php echo home_url(); ?>">
				<input type="text" value="" name="s" id="s" />
				<input type="submit" id="search-submit" value="<?php _e( 'Search', 'ktdf-theme' ); ?>" />
			</form> 

		</div>

	</div>

<!--<?php get_sidebar(); ?>-->

<?php get_footer(); ?>