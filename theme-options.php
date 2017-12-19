<?php
/**
 * Theme options
 * 
 * @package Dark-N-Gritty
 */


/**
 * Globalize the variable that holds the Theme Options
 * 
 * @global	array	$foxhound_options	holds Theme options
 */
global $foxhound_options;
$foxhound_options = foxhound_get_options();


/**
 * Add Dark-N-Gritty custom option parameters
 * 
 * Adds Theme custom option parameters to the
 * default option parameters defined in the
 * Foxhound framework.
 * 
 * @return	array	$options	array of arrays of option parameters
 */
function darkgritty_add_option_parameters( $options ) {

	// Define Theme custom option parameters
    $darkgritty_options = array(
		// Color Scheme (select)
		'colour_scheme' => array(
			'name' => 'colour_scheme',
			'title' => __( 'Color Scheme', 'darkgritty' ),
			'type' => 'select',
			'valid_options' => darkgritty_valid_color_schemes(),
			'description' => __( '', 'darkgritty' ),
			'tab' => 'colors',
			'section' => 'colorscheme',
			'since' => '1.0',
			'default' => 'grey'
		),
	);
	
	// Change default logo
	$options['band_logo_image']['default'] = array(
		'url' => get_template_directory_uri() . '/images/logo.png',
		'file' => get_template_directory() . '/images/logo.png',
		'width' => '975',
		'height' => '416'
	);
	
	// Remove Large and Small Band Photo options
	unset( $options['main_color'], $options['accent_color'], $options['background'] );
	
	// Merge and return framework and custom Theme options
	return array_merge( $options, $darkgritty_options );
}
add_filter( 'foxhound_get_option_parameters', 'darkgritty_add_option_parameters' );

/**
 * Return array for our colour schemes
 * @since Dark and Gritty 1.0
 */
function darkgritty_valid_color_schemes() {
	$color_schemes = array(
		'grey' => array(
			'name' =>	'grey',
			'title' => __( 'Grey', 'dark-gritty' )
		),
		'red' => array(
			'name' =>	'red',
			'title' => __( 'Red', 'dark-gritty' )
		),
		'blue' => array(
			'name' =>	'blue',
			'title' => __( 'Blue', 'dark-gritty' )
		),
		'green' => array(
			'name' =>	'green',
			'title' => __( 'Green', 'dark-gritty' )
		),
		'green' => array(
			'name' =>	'gold',
			'title' => __( 'Gold', 'dark-gritty' )
		),
	);

	return $color_schemes;
}

/*
 * Register with hook 'wp_print_styles'
 * Enqueue style sheet
 */
function darkgritty_stylesheet() {
	global $foxhound_options;
	// Register stylesheet
	wp_register_style( 'darkgritty_stylesheet', get_template_directory_uri() . '/css/' . $foxhound_options['colour_scheme'] . '.css' ); 
	wp_enqueue_style( 'darkgritty_stylesheet' );

}
add_action( 'wp_print_styles', 'darkgritty_stylesheet' );
?>