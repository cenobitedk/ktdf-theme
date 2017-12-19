<?php
/**
 * Foxhound Frameowrk Settings API Implementation
 * 
 * Defines the handling of Theme options for 
 * the Foxhound framework.
 * 
 * @package Foxhound
 */


 /**
 * Foxhound Theme Settings API Implementation
 *
 * Implement the WordPress Settings API for the 
 * Foxhound Theme Settings.
 * 
 * @link	http://codex.wordpress.org/Settings_API	Codex Reference: Settings API
 * @link	http://ottopress.com/2009/wordpress-settings-api-tutorial/	Otto
 * @link	http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/	Ozh
 */
function foxhound_register_options(){
	/**
	 * Register Theme Settings
	 * 
	 * Register array to hold all Theme options.
	 * 
	 * @link	http://codex.wordpress.org/Function_Reference/register_setting	Codex Reference: register_setting()
	 * 
	 * @param	string		$option_group		Unique Settings API identifier; passed to settings_fields() call
	 * @param	string		$option_name		Name of the wp_options database table entry
	 * @param	callback	$sanitize_callback	Name of the callback function in which user input data are sanitized
	 */
	register_setting( 
		// $option_group
		FOXHOUND_THEMESLUG . '_theme_options', 
		// $option_name
		FOXHOUND_THEMESLUG . '_theme_options',  
		// $sanitize_callback
		'foxhound_validate_options' 
	);

	/**
	 * Globalize the variable that holds 
	 * the Settings Page tab definitions
	 * 
	 * @global	array	Settings Page Tab definitions
	 */
	global $foxhound_tabs;
	$foxhound_tabs = foxhound_get_settings_page_tabs();

	/**
	 * Call add_settings_section() for each Settings 
	 * 
	 * Loop through each Theme Settings page tab, and add 
	 * a new section to the Theme Settings page for each 
	 * section specified for each tab.
	 * 
	 * @link	http://codex.wordpress.org/Function_Reference/add_settings_section	Codex Reference: add_settings_section()
	 * 
	 * @param	string		$sectionid	Unique Settings API identifier; passed to add_settings_field() call
	 * @param	string		$title		Title of the Settings page section
	 * @param	callback	$callback	Name of the callback function in which section text is output
	 * @param	string		$pageid		Name of the Settings page to which to add the section; passed to do_settings_sections()
	 */
	foreach ( $foxhound_tabs as $tab ) {
		$tabname = $tab['name'];
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $section ) {
			$sectionname = $section['name'];
			$sectiontitle = $section['title'];
			// Add settings section
			add_settings_section(
				// $sectionid
				FOXHOUND_THEMESLUG . '_' . $sectionname . '_section',
				// $title
				$sectiontitle,
				// $callback
				'foxhound_sections_callback',
				// $pageid
				FOXHOUND_THEMESLUG . '_' . $tabname . '_tab'
			);
		}
	}

	/**
	 * Globalize the variable that holds 
	 * all the Theme option parameters
	 * 
	 * @global	array	Theme options parameters
	 */
	global $option_parameters;
	$option_parameters = foxhound_get_option_parameters();
	
	/**
	 * Call add_settings_field() for each Setting Field
	 * 
	 * Loop through each Theme option, and add a new 
	 * setting field to the Theme Settings page for each 
	 * setting.
	 * 
	 * @link	http://codex.wordpress.org/Function_Reference/add_settings_field	Codex Reference: add_settings_field()
	 * 
	 * @param	string		$settingid	Unique Settings API identifier; passed to the callback function
	 * @param	string		$title		Title of the setting field
	 * @param	callback	$callback	Name of the callback function in which setting field markup is output
	 * @param	string		$pageid		Name of the Settings page to which to add the setting field; passed from add_settings_section()
	 * @param	string		$sectionid	ID of the Settings page section to which to add the setting field; passed from add_settings_section()
	 * @param	array		$args		Array of arguments to pass to the callback function
	 */
	foreach ( $option_parameters as $option ) {
		$optionname = $option['name'];
		$optiontitle = $option['title'];
		$optiontab = $option['tab'];
		$optionsection = $option['section'];
		$optiontype = $option['type'];
		if ( 'internal' != $optiontype && 'custom' != $optiontype ) {
			add_settings_field(
				// $settingid
				FOXHOUND_THEMESLUG . '_setting_' . $optionname,
				// $title
				$optiontitle,
				// $callback
				'foxhound_setting_callback',
				// $pageid
				FOXHOUND_THEMESLUG . '_' . $optiontab . '_tab',
				// $sectionid
				FOXHOUND_THEMESLUG . '_' . $optionsection . '_section',
				// $args
				$option
			);
		} if ( 'custom' == $optiontype ) {
			add_settings_field(
				// $settingid
				FOXHOUND_THEMESLUG . '_setting_' . $optionname,
				// $title
				$optiontitle,
				//$callback
				FOXHOUND_THEMESLUG . '_setting_' . $optionname,
				// $pageid
				FOXHOUND_THEMESLUG . '_' . $optiontab . '_tab',
				// $sectionid
				FOXHOUND_THEMESLUG . '_' . $optionsection . '_section'
			);
		}
	}
}
// Settings API options initilization and validation
add_action( 'admin_init', 'foxhound_register_options' );


/**
 * Foxhound Theme Option Defaults
 * 
 * Returns an associative array that holds 
 * all of the default values for all Theme 
 * options.
 * 
 * @uses	foxhound_get_option_parameters()	defined in \theme-options.php
 * 
 * @return	array	$defaults	associative array of option defaults
 */
function foxhound_get_option_defaults() {
	// Get the array that holds all
	// Theme option parameters
	$option_parameters = foxhound_get_option_parameters();
	// Initialize the array to hold
	// the default values for all
	// Theme options
	$option_defaults = array();
	// Loop through the option
	// parameters array
	foreach ( $option_parameters as $option_parameter ) {
		$name = $option_parameter['name'];
		// Add an associative array key
		// to the defaults array for each
		// option in the parameters array
		$option_defaults[$name] = $option_parameter['default'];
	}
	// Return the defaults array
	return $option_defaults;
}
 
 
 /**
 * Get Foxhound Theme Options
 * 
 * Array that holds all of the defined values
 * for Foxhound Theme options. If the user 
 * has not specified a value for a given Theme 
 * option, then the option's default value is
 * used instead.
 *
 * @uses	foxhound_get_option_defaults()	defined in \foxhound\options.php
 * 
 * @uses	get_option()
 * @uses	wp_parse_args()
 * 
 * @return	array	$foxhound_options	current values for all Theme options
 */
function foxhound_get_options() {
	// Get the option defaults
	$option_defaults = foxhound_get_option_defaults();
	// Globalize the variable that holds the Theme options
	global $foxhound_options;
	// Parse the stored options with the defaults
	$foxhound_options = wp_parse_args( get_option( FOXHOUND_THEMESLUG . '_theme_options', array() ), $option_defaults );
	// Return the parsed array
	return $foxhound_options;
}


/**
 * Separate settings by tab
 * 
 * Returns an array of tabs, each of
 * which is an indexed array of settings
 * included with the specified tab.
 *
 * @uses	foxhound_get_option_parameters()	defined in \theme-options.php
 * @uses	foxhound_get_settings_page_tabs()	defined in \theme-options.php
 * 
 * @return	array	$settingsbytab	array of arrays of settings by tab
 */
function foxhound_get_settings_by_tab() {
	// Get the list of settings page tabs
	$tabs = foxhound_get_settings_page_tabs();
	// Initialize an array to hold
	// an indexed array of tabnames
	$settingsbytab = array();
	// Loop through the array of tabs
	foreach ( $tabs as $tab ) {
		$tabname = $tab['name'];
		// Add an indexed array key
		// to the settings-by-tab 
		// array for each tab name
		$settingsbytab[] = $tabname;
	}
	// Get the array of option parameters
	$option_parameters = foxhound_get_option_parameters();
	// Loop through the option parameters
	// array
	foreach ( $option_parameters as $option_parameter ) {
		// Ignore "internal" type options
		if ( 'internal' != $option_parameter['type'] ) {
			$optiontab = $option_parameter['tab'];
			$optionname = $option_parameter['name'];
			// Add an indexed array key to the 
			// settings-by-tab array for each
			// setting associated with each tab
			$settingsbytab[$optiontab][] = $optionname;
			$settingsbytab['all'][] = $optionname;
		}
	}
	// Return the settings-by-tab
	// array
	return $settingsbytab;
}


/**
 * File Upload Handler
 * 
 * @since Foxhound 1.0
 */
function foxhound_image_upload( $the_file, $input ) {
	$data = $_FILES[$the_file . '_file'];
	if ( '' != $data['name'] ) {
		$filesize = getimagesize( $data['tmp_name'] );
		$upload = wp_handle_upload( $_FILES[$the_file . '_file'], array( 'test_form' => false ) );
		$upload['width'] = $filesize[0];
		$upload['height'] = $filesize[1];
	} else {
		global $foxhound_options;
		$upload = $foxhound_options[$the_file];
	}
	//return $upload['url'];
	return $upload;
}



/**
 * Callback for add_settings_section()
 * 
 * Generic callback to output the section text
 * for each Plugin settings section. 
 * 
 * @uses	foxhound_get_settings_page_tabs()	Defined in /theme-options.php
 * 
 * @param	array	$section_passed	Array passed from add_settings_section()
 */
function foxhound_sections_callback( $section_passed ) {
	global $foxhound_tabs;
	$foxhound_tabs = foxhound_get_settings_page_tabs();
	foreach ( $foxhound_tabs as $tabname => $tab ) {
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $sectionname => $section ) {
			if ( FOXHOUND_THEMESLUG . '_' . $sectionname . '_section' == $section_passed['id'] ) {
				?>
				<p><?php echo $section['description']; ?></p>
				<?php
			}
		}
	}
}

/**
 * Callback for get_settings_field()
 */
function foxhound_setting_callback( $option ) {
	$foxhound_options = foxhound_get_options();
	$option_parameters = foxhound_get_option_parameters();
	$optionname = $option['name'];
	$optiontitle = $option['title'];
	$optiondescription = $option['description'];
	$fieldtype = $option['type'];
	$fieldname = FOXHOUND_THEMESLUG . '_theme_options[' . $optionname . ']';
	
	// Output checkbox form field markup
	if ( 'checkbox' == $fieldtype ) {
		?>
		<input type="checkbox" name="<?php echo $fieldname; ?>" <?php checked( $foxhound_options[$optionname] ); ?> />
		<?php
	}
	// Output radio button form field markup
	else if ( 'radio' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		foreach ( $valid_options as $valid_option ) {
			?>
			<input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $foxhound_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>" />
			<span>
			<?php echo $valid_option['title']; ?>
			<?php if ( $valid_option['description'] ) { ?>
				<span style="padding-left:5px;"><em><?php echo $valid_option['description']; ?></em></span>
			<?php } ?>
			</span>
			<br />
			<?php
		}
	}
	// Output select form field markup
	else if ( 'select' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		?>
		<select name="<?php echo $fieldname; ?>">
		<?php 
		foreach ( $valid_options as $valid_option ) {
			?>
			<option <?php selected( $valid_option['name'] == $foxhound_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>"><?php echo $valid_option['title']; ?></option>
			<?php
		}
		?>
		</select>
		<?php
	} 
	// Output text input form field markup
	else if ( 'text' == $fieldtype ) {
		?>
		<input type="text" name="<?php echo $fieldname; ?>" value="<?php echo wp_filter_nohtml_kses( $foxhound_options[$optionname] ); ?>" />
		<?php
	} 
	// Output text input form field markup
	else if ( 'textarea' == $fieldtype ) {
		?>
		<textarea name="<?php echo $fieldname; ?>" value=""><?php echo esc_textarea( $foxhound_options[$optionname] ); ?></textarea>
		<?php
	} 
	// Output file input form field markup
	else if ( 'file' == $fieldtype ) {
		$foxhound_options_name = $foxhound_options[$optionname];
		$option_file = $foxhound_options_name['file'];
		$option_url = $foxhound_options_name['url'];
		?>
		<input type="file" name="<?php echo $optionname . '_file'; ?>" />
		<span><img src="<?php echo esc_url( $option_url ); ?>" class="foxhound-settings-page-image" /></span>
		<input type="hidden" name="<?php echo $fieldname; ?>" value="<?php echo esc_url( $option_url ); ?>" />
		<?php
	} 
	// Output the setting description
	?>
	<span class="description"><?php echo $optiondescription; ?></span>
	<?php
}

 
/**
 * Theme register_setting() sanitize callback
 * 
 * Validate and whitelist user-input data before updating Theme 
 * Options in the database. Only whitelisted options are passed
 * back to the database, and user-input data for all whitelisted
 * options are sanitized.
 * 
 * @link	http://codex.wordpress.org/Data_Validation	Codex Reference: Data Validation
 * 
 * @param	array	$input	Raw user-input data submitted via the Theme Settings page
 * @return	array	$input	Sanitized user-input data passed to the database
 */
function foxhound_validate_options( $input ) {
	// This is the "whitelist": current settings
	$valid_input = foxhound_get_options();
	// Get the array of Theme settings, by Settings Page tab
	$settingsbytab = foxhound_get_settings_by_tab();
	// Get the array of option parameters
	$option_parameters = foxhound_get_option_parameters();
	// Get the array of option defaults
	$option_defaults = foxhound_get_option_defaults();
	// Get list of tabs
	$tabs = foxhound_get_settings_page_tabs();
	
	// Determine what type of submit was input
	$submittype = 'submit';	
	foreach ( $tabs as $tab ) {
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$resetname] ) ) {
			$submittype = 'reset';
		}
	}

	// Determine what tab was input
	$submittab = $valid_input['default_options_tab'];
	foreach ( $tabs as $tab ) {
		$submitname = 'submit-' . $tab['name'];
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$submitname] ) || ! empty( $input[$resetname] ) ) {
			$submittab = $tab['name'];
		}
	}
	global $wp_customize;
	// Get settings by tab
	$tabsettings = ( isset ( $wp_customize ) ? $settingsbytab['all'] : $settingsbytab[$submittab] );
	// Loop through each tab setting
	foreach ( $tabsettings as $setting ) {

		// If no option is selected, set the default
		$valid_input[$setting] = ( ! isset( $input[$setting] ) ? $option_defaults[$setting] : $input[$setting] );
		
		// If submit, validate/sanitize $input
		if ( 'submit' == $submittype ) {
		
			// Get the setting details from the defaults array
			$optiondetails = $option_parameters[$setting];
			// Get the array of valid options, if applicable
			$valid_options = ( isset( $optiondetails['valid_options'] ) ? $optiondetails['valid_options'] : false );
			
			// Validate checkbox fields
			if ( 'checkbox' == $optiondetails['type'] ) {
				// If input value is set and is true, return true; otherwise return false
				$valid_input[$setting] = ( isset( $input[$setting] ) && true == $input[$setting] ? true : false );
			}
			// Validate radio button fields
			else if ( 'radio' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( isset( $input[$setting] ) && array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate select fields
			else if ( 'select' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( isset( $input[$setting] ) && array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate text input and textarea fields
			else if ( 'text' == $optiondetails['type'] || 'textarea' == $optiondetails['type'] ) {
				// Validate HTML content
				if ( 'html' == $optiondetails['sanitize'] ) {
					// Pass input data through the wp_filter_kses filter
					$valid_input[$setting] = ( isset( $input[$setting] ) ? wp_kses_post( $input[$setting] ) : false );
				}
				// Validate no-HTML content
				else if ( 'nohtml' == $optiondetails['sanitize'] ) {
					// Pass input data through the wp_filter_nohtml_kses filter
					$valid_input[$setting] = ( isset( $input[$setting] ) ? wp_filter_nohtml_kses( $input[$setting] ) : false );
				}
				// Validate URL content
				else if ( 'url' == $optiondetails['sanitize'] ) {
					// Pass input data through the esc_url_raw filter
					$valid_input[$setting] = ( isset( $input[$setting] ) ? esc_url_raw( $input[$setting] ) : false );
				}
				// Validate script content
				else if ( 'script' == $optiondetails['sanitize'] ) {
					// Pass input data through the esc_js filter
					$valid_input[$setting] = ( isset( $input[$setting] ) ? esc_js( $input[$setting] ) : false );
				}
				// Default text filter
				else {
					// Pass input data through the wp_filter_nohtml_kses filter
					$valid_input[$setting] = ( isset( $input[$setting] ) ? wp_filter_nohtml_kses( $input[$setting] ) : false );
				}
			}
			// Validate file fields
			else if ( 'file' == $optiondetails['type'] ) {
				if ( isset( $input[$setting] ) ) {
					// Only update setting if input value is in the list of valid options
					$setting_file = $setting . '_file';
					$valid_input[$setting] = ( isset( $_FILES[$setting_file] ) ? foxhound_image_upload( $setting, $input ) : $valid_input[$setting] );
				}
			}
		} 
		// If reset, reset defaults
		elseif ( 'reset' == $submittype ) {
			// Set $setting to the default value
			$valid_input[$setting] = $option_defaults[$setting];
		}
	}
	return $valid_input;		

}

?>