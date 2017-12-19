<?php
/**
 * Foxhound Frameowrk Localization
 * 
 * Defines the localization for the
 * Foxhound framework.
 * 
 * @package Foxhound
 */

 
/**
 * Make framework available for translation
 * Translations can be filed in the /languages/ directory
 *
 * @since Foxhound 1.0
 */
function foxhound_localization() {
	load_theme_textdomain( FOXHOUND_PATH . '/languages' );
	global $locale;
	$locale = get_locale();
	$locale_file = get_template_directory() . '/languages/$locale.php';
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}
add_action( 'after_setup_theme', 'foxhound_localization' );
?>