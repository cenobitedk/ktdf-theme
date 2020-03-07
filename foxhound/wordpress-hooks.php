<?php
/**
 * Foxhound Frameowrk WordPress Hooks
 * 
 * Defines the callbacks for WordPress hooks,
 * used by Foxhound Themes.
 * 
 * @package Foxhound
 */

 
/**
 * Enqueue comment-reply script
 */
function foxhound_enqueue_comment_reply() {
	// on single blog post pages 
	// with comments open and 
	// threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		// enqueue the javascript that performs 
		// in-link comment reply fanciness
		wp_enqueue_script( 'comment-reply' ); 
	}
}
// Hook into wp_enqueue_scripts
// add_action( 'wp_enqueue_scripts', 'foxhound_enqueue_comment_reply' );


/**
 * Enqueue Favicon
 * 
 * @since Foxhound 1.0
 */
function foxhound_enqueue_favicon() {
	global $foxhound_options;
	$favicon = $foxhound_options['favicon'];
	if ( '' != $favicon['url'] ) {
		echo '<link rel="shortcut icon" href="' . esc_attr( $foxhound_options['favicon']['url'] ) . '" />';
	}
}
// add_action( 'wp_head', 'foxhound_enqueue_favicon' );


/**
 * Enqueue Social Icons CSS
 * 
 * @since Foxhound 1.0
 */
function foxhound_enqueue_social_icons_css() {
	$foxhound_css_path = get_template_directory_uri() . '/foxhound/css/';
	$foxhound_social_icons_stylesheet = $foxhound_css_path . 'social-icons.css';
	wp_enqueue_style( 'foxhound-social-icons-css', $foxhound_social_icons_stylesheet );
}
// add_action( 'wp_enqueue_scripts', 'foxhound_enqueue_social_icons_css' );


/**
 * Enqueue Fadein Script in Footer
 * 
 * @since Foxhound 1.0
 */
function foxhound_enqueue_fadein() {
	/*
		Thumbnail opacity on page load and mouseout
		Not loaded for IE8 and older browsers as they
		do not treat transparent PNG's correctly when
		they have opacity
	*/
	echo '
<!--[if gte IE 9]><!-->
<script type="text/javascript">
var $ = jQuery;
$(document).ready(function(){
	$(".fadein").fadeTo("medium", 0.7); // This sets the opacity of the thumbs to fade down to 30% when the page loads
	$(".fadein").hover(function(){
		$(this).fadeTo("medium", 1.0); // This should set the opacity to 100% on hover
	},function(){
		$(this).fadeTo("medium", 0.7); // This should set the opacity back to 30% on mouseout
	});
});
</script>
<!--<![endif]-->
';

}
// add_action( 'wp_footer', 'foxhound_enqueue_fadein' );

/**
 * Enqueue Google Analytics Script in Footer
 * 
 * @since	Foxhound 1.0
 */
function foxhound_enqueue_google_analytics() {
	global $foxhound_options;
	if ( false == $foxhound_options['google_analytics'] ) {
		return;
	} else {
		?>
<!-- Google Analytics code -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $foxhound_options['google_analytics']; ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>		<?php
	}
}
// add_action( 'wp_footer', 'foxhound_enqueue_google_analytics' );

/**
 * Comment reply form notes_after filter
 */
function foxhound_comment_form_notes_after( $args ) {
	$args['comment_notes_after'] = '';
	return $args;
}
// add_filter( 'comment_form_defaults', 'foxhound_comment_form_notes_after' );
?>