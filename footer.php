<?php
/**
 * @package WordPress
 * @subpackage Dark and Gritty
 *
 * Footer
 */

/**
 * Globalize $mdma_options
 *
 * @global	array	$foxhound_options	Theme options array
 */
global $foxhound_options;
?>

<div style="text-align:center;">
<?php posts_nav_link(); ?>
</div>

	</div>
	<?php
	global $post;
	if ( 'template-full-width.php' != get_page_template_slug( $post->ID )  or  is_404() ) {
		get_sidebar();
	}
	?>
</div>

<?php /* Footer */ ?>
<div id="footer">

	<?php get_template_part( 'social-network-links' ); ?>

	<p>
		<?php echo $foxhound_options['footer_text']; ?>
		</br>
		<em class="develop"><a href="http://foxhoundbandthemes.com/themes/dark-gritty-theme/">Dark N Gritty Theme</a> by <a href="http://foxhoundbandthemes.com">Foxhound Band Themes</a></em>

	</p>

</div>

<?php wp_footer(); ?>
<!-- <?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds. --> 
</body>
</html>
