<?php
/**
 * Foxhound Band Themes Framework
 * 
 * Contains common functions and code used in
 * Foxhound Band Themes
 * 
 * @package	Foxhound
 */

/**
 * Define Framework path
 */
define( 'FOXHOUND_PATH', get_template_directory() . '/foxhound/' );
define( 'FOXHOUND_URL', get_template_directory_uri() . '/foxhound/' );

/**
 * Load Theme Options
 */
require_once( FOXHOUND_PATH . 'options.php' );

/**
 * Load Settings API Implementation
 */
require_once( FOXHOUND_PATH . 'options-register.php' );

/**
 * Load Theme Settings Page
 */
require_once( FOXHOUND_PATH . 'settings-page.php' );

/**
 * Load Theme Customizer Integration
 */
require_once( FOXHOUND_PATH . 'options-customizer.php' );

/**
 * Load WordPress Hooks
 */
require_once( FOXHOUND_PATH . 'wordpress-hooks.php' );

/**
 * Load Framework Localization
 */
require_once( FOXHOUND_PATH . 'localization.php' );


?>