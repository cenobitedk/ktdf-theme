<?php
/**
 * Foxhound Options Theme Customizer Integration
 *
 * This file integrates the Theme Customizer
 * for the Foxhound Theme.
 * 
 * @package 	Foxhound
 * @copyright	Copyright (c) 2012, Chip Bennett
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Foxhound 2.6
 */

/**
 * Foxhound Theme Settings Theme Customizer Implementation
 *
 * Implement the Theme Customizer for the 
 * Foxhound Theme Settings.
 * 
 * @param 	object	$wp_customize	Object that holds the customizer data
 * 
 * @link	http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/	Otto
 */
function foxhound_register_theme_customizer( $wp_customize ){

	// Failsafe is safe
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	global $foxhound_options;
	$foxhound_options = foxhound_get_options();

	// Get the array of option parameters
	$option_parameters = foxhound_get_option_parameters();
	// Get list of tabs
	$tabs = foxhound_get_settings_page_tabs();

	// Add Sections
	foreach ( $tabs as $tab ) {
		// Add $tab section
		$wp_customize->add_section( 'foxhound_' . $tab['name'], array(
			'title'		=> 'Foxhound ' . $tab['title'] . ' Settings',
		) );
	}

	// Add Settings
	foreach ( $option_parameters as $option_parameter ) {
		// Add $option_parameter setting
		$wp_customize->add_setting( FOXHOUND_THEMESLUG . '_theme_options[' . $option_parameter['name'] . ']', array(
			'default'        => $option_parameter['default'],
			'type'           => 'option',
		) );

		// Add $option_parameter control
		if ( 'text' == $option_parameter['type'] ) {
			$wp_customize->add_control( 'foxhound_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'foxhound_' . $option_parameter['tab'],
				'settings'   => FOXHOUND_THEMESLUG . '_theme_options['. $option_parameter['name'] . ']',
				'type'    => 'text',
			) );

		} else if ( 'checkbox' == $option_parameter['type'] ) {
			$wp_customize->add_control( 'foxhound_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'foxhound_' . $option_parameter['tab'],
				'settings'   => FOXHOUND_THEMESLUG . '_theme_options['. $option_parameter['name'] . ']',
				'type'    => 'checkbox',
			) );

		} else if ( 'radio' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'foxhound_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'foxhound_' . $option_parameter['tab'],
				'settings'   => FOXHOUND_THEMESLUG . '_theme_options['. $option_parameter['name'] . ']',
				'type'    => 'radio',
				'choices'    => $valid_options,
			) );

		} else if ( 'select' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'foxhound_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'foxhound_' . $option_parameter['tab'],
				'settings'   => FOXHOUND_THEMESLUG . '_theme_options['. $option_parameter['name'] . ']',
				'type'    => 'select',
				'choices'    => $valid_options,
			) );
		} else if ( 'custom' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'foxhound_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'foxhound_' . $option_parameter['tab'],
				'settings'   => FOXHOUND_THEMESLUG . '_theme_options['. $option_parameter['name'] . ']',
				'type'    => 'select',
				'choices'    => $valid_options,
			) );
		}
	}

}
// Settings API options initilization and validation
add_action( 'customize_register', 'foxhound_register_theme_customizer' );


?>