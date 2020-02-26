<?php
/**
 * @package WordPress
 * @subpackage Dark n' Gritty
 *
 * Loads useful functions
 * Some code borrowed from Toolbox by Ian Stewart ... http://themeshaper.com/toolbox-html5-starter-theme/
 */
 
/**
 * Define Themename for Foxhound Framework
 */
define( 'FOXHOUND_THEMESLUG', 'darkgritty' );
define( 'FOXHOUND_THEMENAME', 'Dark N Gritty - KTDF' );
 
/**
 * Bootstrap Foxhound Framework
 */
require_once( get_template_directory() . '/foxhound/admin.php' );

/**
 * Theme Options Functions
 */
require( get_template_directory() . '/theme-options.php' );

/**
 * Globalize $mdma_options
 * 
 * @global	array	$foxhound_options	Theme options array
 */
global $foxhound_options;
$foxhound_options = foxhound_get_options();

/**
 * Theme Custom Post Types
 */
require( get_template_directory() . '/theme-custom-post-types.php' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 *
 * @since Dark N Gritty 1.0
 */
function darkgritty_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'ktdf-theme' ),
		)
	);

	// DEPRECATED: add_custom_image_header( 'darkgritty_header_style', 'darkgritty_admin_header_style', 'darkgritty_admin_header_image' ); // Custom header
	add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '222' ); // Text colour of custom header
	define( 'HEADER_IMAGE_WIDTH', 975 ); // Width of custom header
	define( 'HEADER_IMAGE_HEIGHT', 370 ); // Height of custom header // 182

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'header-slider-image', 974, 416, true );
	add_image_size( 'header-slider-image-small', 974, 225, true );
	add_image_size( 'post-featured-image', 555, 368, true );
	
	/*
	 * Define $content_width global variable, to keep 
	 * media content from overflowing the Theme's
	 * main content area.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 560;
	}

}
add_action( 'after_setup_theme', 'darkgritty_setup' );

/**
 * Included in the site head for custom headers
 * @since Dark and Gritty 1.0
 */
function darkgritty_header_style() {
	if ( get_header_image() ) {
		echo '<style type="text/css">h1#title {background: url(' . get_header_image() . ') 50% 0;}';
		echo 'h1#title, h1#title a {';
		if ( 'blank' != get_header_textcolor() )
			echo 'color: #' . get_header_textcolor() . ';text-indent:0;';
		else
			echo 'text-indent: -999em;';
		echo '}</style>';
	}
}

/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 * Referenced via add_custom_image_header() in darkgritty_setup().
 * @since Dark and Gritty 1.0
 */
function darkgritty_admin_header_image() { 
	$style = '';
	?>
	<div id="darkgritty_title">
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo home_url(); ?>"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
	</div>
	<?php 
}

/**
 * Included in the admin head for custom headers
 * @since Dark and Gritty 1.0
 */
function darkgritty_admin_header_style() { ?>
<style type="text/css">
	#darkgritty_title h1,
	#darkgritty_title h1 a {
		float: left;
		text-align: center;
		width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
		height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
		background: url(<?php header_image(); ?>) 50% 0;
		clear: left;
		font-family: sans-serif;
		font-weight: bold;
		color: #fff;
		margin:0;
		padding: 0;
		font-size: 28px;
		line-height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
		color: #<?php header_textcolor(); ?>;
		text-decoration: none;
		font-family: sans-serif;
		text-align: center;
		font-size: 50px;
		text-transform: uppercase;
	}
	#darkgritty_title h1 a:hover {
		text-decoration: none;
	}
</style><?php
}



/**
 * Register widget areas
 * @since Dark and Gritty 1.0
 */
function darkgritty_widgets_init() {

	// Registers Primary Widget Area
	register_sidebar(
		array (
			'name' => __( 'Sidebar', 'ktdf-theme' ),
			'id' => 'sidebar',
			'description' => __( 'The sidebar widget area', 'ktdf-theme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title widgettitle">',
			'after_title' => '</h3>',
		) 
	);

}
add_action( 'widgets_init', 'darkgritty_widgets_init' );

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 *
 * @since Dark and Gritty 1.0
 */
load_theme_textdomain( 'darkgritty', get_template_directory() . '/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . '/languages/$locale.php';
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Add class attributes to the first <ul> occurence in wp_page_menu and strip <div> tags and strip title attributes
 * Needed for suckerfish script to function correctly
 * @since Dark and Gritty 1.0
 */
function darkgritty_add_menuclass( $menu ) {

	/* Add classes to UL */
	$menu = preg_replace( '/<ul>/', '<ul class="nav sf-menu">', $menu, 1 ); // Add classes

	/* Removing DIV tags */
	//$menu = preg_replace( '/<div class="menu sf-menu">/', '', $menu, 1 ); // Remove opening DIV
	$menu = preg_replace( '/<div class="nav sf-menu">/', '', $menu, 1 ); // Remove opening DIV
	$menu = preg_replace( '/<\/div>/', '', $menu, 1 ); // Remove closing DIV

	/* Strip title attributes */
	$menu = preg_replace( '/title=\"(.*?)\"/','',$menu );

	/* Add has-children class */
	$match = '#(<li id="[^"]+" class="[^"]+)("><a[^<]+</a>\s+<ul)#mis';
	$replace = '$1 has-children$2';
	$menu = preg_replace($match, $replace, $menu);

	return $menu;
}
add_filter( 'wp_page_menu','darkgritty_add_menuclass' );
add_filter( 'wp_nav_menu','darkgritty_add_menuclass' );

/**
 * Adding home link to wp_nav_menu() fallback
 * @since Dark and Gritty 1.0
 */
function darkgritty_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'darkgritty_page_menu_args' );

function darkgritty_nav_menu_home( $items ) {
	if ( empty( $items ) ) {
		$class = '';
		if ( is_front_page() ) {
			$class = ' class="current_page_item" ';
		}
		$items .= '<li' . $class . '><a href="' . home_url() . '">Home</a></li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'darkgritty_nav_menu_home' );

/**
 * Loading scripts
 * Animations script from PixoPoint Animations plugin ... http://pixopoint.com/2010/03/03/pixopoint-menu-animations-beta/
 * Suckerfish script for IE6 support combined into animations script (already loading JS file so may as well include it there rather than use conditionals)
 * @since Dark and Gritty 1.0
 */
function darkgritty_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script(
		'jquery-init',
		get_template_directory_uri() . '/scripts/jquery-init.js',
		array( 'jquery' ),
		1.0,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'darkgritty_scripts' );

/**
 * Add scripts and styles for Nivo slider
 */
function darkgritty_nivo() {
	if ( is_front_page() ) {
		wp_enqueue_script(
			'nivo',
			get_template_directory_uri() . '/scripts/jquery.nivo.slider.js',
			array( 'jquery' ),
			1.0,
			false
		);
		wp_register_style( 'nivo_stylesheet', get_template_directory_uri() . '/nivo-slider.css' );
		wp_enqueue_style( 'nivo_stylesheet' );
	}
}
// add_action( 'wp_enqueue_scripts', 'darkgritty_nivo' );

/**
 * Adjust style when using Large Band Photo on the Front page
 */
function darkgritty_large_photo_css() {
	global $post, $foxhound_options;
	$darkgritty_post_custom = ( is_singular() && get_post_custom( $post->ID ) ? get_post_custom( $post->ID ) : false );
	// Determine the post custom header image size
	$darkgritty_header_image_size = ( isset( $darkgritty_post_custom['_darkgritty_header_image_size'][0] ) ? $darkgritty_post_custom['_darkgritty_header_image_size'][0] : 'small' );
	if ( ( is_front_page() && 'slider' != $foxhound_options['front_page_image'] ) || ( 'large' == $darkgritty_header_image_size ) ) {
		?>
<style type="text/css">
.home #header .band-photo,
.single #header .band-photo,
.page #header .band-photo {
	height: 416px;
}
.home #header .icons,
.single #header .icons,
.page #header .icons {
	top: 341px;
}
</style>
		<?php
	}
}
add_action( 'wp_print_styles', 'darkgritty_large_photo_css' );

/**
 * Adjust logo style
 */
function darkgritty_logo_css() {

	return;

	global $foxhound_options;
	$logo = $foxhound_options['band_logo_image'];
	if ( is_admin() || ( get_template_directory_uri() . '/images/logo.png' == $logo['url'] ) ) {
		return;
	}
	?>
<style type="text/css">
h1#title {
	background: url(<?php echo $logo['url']; ?>);
}
</style>
	<?php
}
add_action( 'wp_print_styles', 'darkgritty_logo_css' );



/**
 * Comments callback function
 * @since darkgritty 1.0
 */
function darkgritty_comment( $comment, $args, $depth ) {
	$GLOBALS ['comment'] = $comment; ?>
	<?php

	/* Display Comments */
	if ( '' == $comment->comment_type ) :  ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<?php

		/* Display commenters gravatar */
		echo get_avatar( $comment, 64, get_template_directory_uri() . '/images/gravatar.jpg' );

		/* Comment body */
		echo '<div class="comment-body">';
		echo '<div class="comment-arrow"></div>';

		/* Display authors name */
		printf( __( '<cite>%s</cite> ', 'ktdf-theme' ), get_comment_author_link() );

		/* Display comment link, date and time */ ?>
		<a class="time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'ktdf-theme' ), get_comment_date(),  get_comment_time() ); ?></a>
		<?php 

		/* Edit comment link */
		edit_comment_link( __( 'Edit', 'ktdf-theme' ), '. <span class="edit">', '</span>' );

		/* Message for when comment not approved yet */
		if ( $comment->comment_approved == '0' )
			echo '<em>' . __( 'Your comment is awaiting moderation.', 'ktdf-theme' ) . '</em><br />';

		/* Display the comment itself */
		comment_text();

		/* Comment reply link */
		echo '<span class="reply">';
		comment_reply_link(
			array_merge(
				$args, array(
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				)
			)
		);
		echo '</span>';

		/* Closing comment body */
		echo '</div>';

	/* Display pingbacks */
	else : ?>
	<li class="post pingback">
		<p><?php _e( 'Pingback: ', 'ktdf-theme' ); ?><?php comment_author_link(); ?><?php edit_comment_link ( __( 'edit', 'ktdf-theme' ), '&nbsp;&nbsp;', '' ); ?></p>
	<?php endif;
}

/**
 * Comments form fields filter
 */
function darkgritty_comment_form_fields( $fields ) {
	$authorfield = '<p><input type="text" name="author" id="author" value="Name" onfocus="if (this.value == \'Name\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Name\';}"  /></p>';
	$emailfield = '<p><input type="text" name="email" id="email" value="Email" onfocus="if (this.value == \'Email\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Email\';}"  /></p>';
	$urlfield = '<p><input type="text" name="url" id="url" value="Website" onfocus="if (this.value == \'Website\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Website\';}"  /></p>';
	$darkgritty_fields = array(
		'author' => $authorfield,
		'email' => $emailfield,
		'url' => $urlfield
	);
	return $darkgritty_fields;
}
add_filter( 'comment_form_default_fields', 'darkgritty_comment_form_fields' );

/**
 * Enqueue comment-reply script
 */
function darkgritty_enqueue_comment_reply() {
	// on single blog post pages with comments open and threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		// enqueue the javascript that performs in-link comment reply fanciness
		wp_enqueue_script( 'comment-reply' ); 
	}
}
// Hook into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'darkgritty_enqueue_comment_reply' );

/**
 * Add Dark N Gritty Header Image Meta Box
 * 
 * @link	add_meta_box()
 */
function darkgritty_add_header_image_meta_box( $post ) {
    global $wp_meta_boxes;
	
	$context = 'side'; // 'normal', 'side', 'advanced'
	$priority = 'default'; // 'high', 'core', 'low', 'default'

    add_meta_box( 'darkgritty_header_image', __( 'Post Header Image Size', 'ktdf-theme' ), 'darkgritty_header_image_meta_box', 'post', $context, $priority );
    add_meta_box( 'darkgritty_header_image', __( 'Page Header Image Size', 'ktdf-theme' ), 'darkgritty_header_image_meta_box', 'page', $context, $priority );
	
}
// Hook meta boxes into 'add_meta_boxes'
add_action( 'add_meta_boxes', 'darkgritty_add_header_image_meta_box' );

/**
 * Define Header Image Meta Box
 * 
 * Define the markup for the meta box
 * for the "Header Image" post custom meta
 * data. The metabox will consist of
 * radio selection options for "large"
 * and "small" header image size
 * option for single blog posts or
 * static pages.
 * 
 * @link	checked()
 * @link	get_post_custom()
 */
function darkgritty_header_image_meta_box() {
	global $post;
	$custom = ( get_post_custom( $post->ID ) ? get_post_custom( $post->ID ) : false );
	$header_image_size = ( isset( $custom['_darkgritty_header_image_size'][0] ) ? $custom['_darkgritty_header_image_size'][0] : 'small' );
	?>
	<p>
	<input type="radio" name="_darkgritty_header_image_size" <?php checked( 'small' == $header_image_size ); ?> value="small" /> 
	<label>Small</label><br />
	<input type="radio" name="_darkgritty_header_image_size" <?php checked( 'large' == $header_image_size ); ?> value="large" /> 
	<label>Large</label><br />
	</p>
	<?php
}

/**
 * Validate, sanitize, and save post metadata.
 * 
 * Validates the user-submitted post custom 
 * meta data, ensuring that the selected header 
 * image size option is in the array of valid 
 * options; otherwise, it returns 'small'.
 * 
 * Since there are only two image sizes, and 
 * the Theme uses the small header image size 
 * by default, the post custom meta data 
 * will only be stored if the value is 'large'.
 * 
 * @link	update_post_meta()
 */
function darkgritty_save_header_image_post_metadata(){
	global $post;
	$header_image_size = ( isset( $_POST['_darkgritty_header_image_size'] ) && in_array( $_POST['_darkgritty_header_image_size'], array( 'large', 'small' ) ) ? $_POST['_darkgritty_header_image_size'] : 'small' );

	if ( 'small' == $header_image_size ) {
		delete_post_meta( $post->ID, '_darkgritty_header_image_size' );
	} else {
		update_post_meta( $post->ID, '_darkgritty_header_image_size', $header_image_size );
	}
}
// Hook the save layout post custom meta data into
// publish_{post-type}, draft_{post-type}, and future_{post-type}
add_action( 'publish_post', 'darkgritty_save_header_image_post_metadata' );
add_action( 'publish_page', 'darkgritty_save_header_image_post_metadata' );
add_action( 'draft_post', 'darkgritty_save_header_image_post_metadata' );
add_action( 'draft_page', 'darkgritty_save_header_image_post_metadata' );
add_action( 'future_post', 'darkgritty_save_header_image_post_metadata' );
add_action( 'future_page', 'darkgritty_save_header_image_post_metadata' );



/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
   
/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
   
/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
	
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
   
   return $urls;
}