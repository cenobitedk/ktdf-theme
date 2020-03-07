<?php
/**
 * Foxhound Frameowrk Theme Options
 * 
 * Defines the handling of Theme options for 
 * the Foxhound framework.
 * 
 * @package Foxhound
 */


/**
 * Foxhound Theme Settings Page Tabs
 * 
 * Array that holds all of the tabs for the
 * Foxhound Theme Settings Page. Each tab
 * key holds an array that defines the 
 * sections for each tab, including the
 * description text.
 * 
 * @return	array	$tabs	array of arrays of tab parameters
 */
function foxhound_get_settings_page_tabs() {

	$tabs = array( 
        'images' => array(
			'name' => 'images',
			'title' => __( 'Band Logo and Images', 'ktdf-theme' ),
			'sections' => array(
				'general' => array(
					'name' => 'general',
					'title' => __( 'Band Logo and Images', 'ktdf-theme' ),
					'description' => __( '', 'ktdf-theme' )
				),
			)
		),
        // 'headerfooter' => array(
		// 	'name' => 'headerfooter',
		// 	'title' => __( 'Header/Footer', 'ktdf-theme' ),
		// 	'sections' => array(
		// 		'header' => array(
		// 			'name' => 'header',
		// 			'title' => __( 'Site Header', 'ktdf-theme' ),
		// 			'description' => __( '', 'ktdf-theme' )
		// 		),
		// 		'slider' => array(
		// 			'name' => 'slider',
		// 			'title' => __( 'Header Slider', 'ktdf-theme' ),
		// 			'description' => __( '', 'ktdf-theme' )
		// 		),
		// 		'footer' => array(
		// 			'name' => 'footer',
		// 			'title' => __( 'Site Footer', 'ktdf-theme' ),
		// 			'description' => __( '', 'ktdf-theme' )
		// 		),
		// 	)
		// ),
        'colors' => array(
			'name' => 'colors',
			'title' => __( 'Colors and Background', 'ktdf-theme' ),
			'sections' => array(
				'background' => array(
					'name' => 'background',
					'title' => __( 'Site Background', 'ktdf-theme' ),
					'description' => __( '', 'ktdf-theme' )
				),
				'colorscheme' => array(
					'name' => 'colorscheme',
					'title' => __( 'Color Scheme', 'ktdf-theme' ),
					'description' => __( '', 'ktdf-theme' )
				),
			)
		),
        // 'social' => array(
		// 	'name' => 'social',
		// 	'title' => __( 'Social Network Profiles', 'ktdf-theme' ),
		// 	'sections' => array(
		// 		'profiles' => array(
		// 			'name' => 'profiles',
		// 			'title' => __( 'Social Media Icons', 'ktdf-theme' ),
		// 			'description' => __( '', 'ktdf-theme' )
		// 		),
		// 	)
		// ),
    );
	return apply_filters( 'foxhound_get_settings_page_tabs', $tabs );
}


/**
 * Foxhound Theme Option Parameters
 * 
 * Array that holds parameters for all options for
 * the Theme. The 'type' key is used to generate
 * the proper form field markup and to sanitize
 * the user-input data properly. The 'tab' key
 * determines the Settings Page on which the
 * option appears, and the 'section' tab determines
 * the section of the Settings Page tab in which
 * the option appears.
 * 
 * @return	array	$options	array of arrays of option parameters
 */
function foxhound_get_option_parameters() {

    $options = array(
		// Band Logo
        'band_logo_image' => array(
			'name' => 'band_logo_image',
			'title' => __( 'Band Logo Image', 'ktdf-theme' ),
			'type' => 'file',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'images',
			'section' => 'general',
			'since' => '1.0',
			'default' => array(
				'url' => get_template_directory_uri() . '/images/logo.png',
				'file' => get_template_directory() . '/images/logo.png',
				'width' => '0',
				'height' => '0'
			)
		),
		// Band Images
        'large_band_photo' => array(
			'name' => 'large_band_photo',
			'title' => __( 'Large Band Photo', 'ktdf-theme' ),
			'type' => 'file',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'images',
			'section' => 'general',
			'since' => '1.0',
			'default' => array(
				'url' => get_template_directory_uri() . '/images/header-home.jpg',				
				'file' => get_template_directory() . '/images/header-home.jpg',
				'width' => '0',
				'height' => '0'
			)
		),
        'small_band_photo' => array(
			'name' => 'small_band_photo',
			'title' => __( 'Small Band Photo', 'ktdf-theme' ),
			'type' => 'file',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'images',
			'section' => 'general',
			'since' => '1.0',
			'default' => array(
				'url' => get_template_directory_uri() . '/images/header-other.jpg',
				'file' => get_template_directory() . '/images/header-other.jpg',
				'width' => '0',
				'height' => '0'
			)
		),
		// Favicon
        'favicon' => array(
			'name' => 'favicon',
			'title' => __( 'Favicon', 'ktdf-theme' ),
			'type' => 'file',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'images',
			'section' => 'general',
			'since' => '1.0',
			'default' => array(
				'url' => get_template_directory_uri() . '/images/favicon.ico',
				'file' => get_template_directory() . '/images/favicon.ico',
				'width' => '0',
				'height' => '0'
			)
		),
		// Slider Effects
        'front_page_image' => array(
			'name' => 'front_page_image',
			'title' => __( 'Show the large band photo or slider?', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => array( 
				'photo' => array( 
					'name' => 'photo', 
					'title' => 'Large Band Photo'
				), 
				'slider' => array( 
					'name' => 'slider', 
					'title' =>'Image Slider' 
				) 
			),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'header',
			'since' => '1.0',
			'default' => 'photo'
		),
        'slider_effect' => array(
			'name' => 'slider_effect',
			'title' => __( 'Animation Effect', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_slider_effects(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'slider',
			'since' => '1.0',
			'default' => 'boxRandom'
		),
        'slider_speed' => array(
			'name' => 'slider_speed',
			'title' => __( 'Animation Speed', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_slider_speeds(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'slider',
			'since' => '1.0',
			'default' => 'slow'
		),
        'slider_pause' => array(
			'name' => 'slider_pause',
			'title' => __( 'Slider Pause Time', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_slider_pauses(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'slider',
			'since' => '1.0',
			'default' => '5000'
		),
        'slider_manual' => array(
			'name' => 'slider_manual',
			'title' => __( 'Slider Manual', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => array(
				'true' => array(
					'name'	=> 'true',
					'title'	=> 'Manual Advance'
				),
				'false' => array(
					'name'	=> 'false',
					'title'	=> 'AutoPlay'
				)
			),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'slider',
			'since' => '1.0',
			'default' => 'false'
		),
		// Site Color Options (select)
        'background' => array(
			'name' => 'background',
			'title' => __( 'Background', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_backgrounds(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'colors',
			'section' => 'background',
			'since' => '1.0',
			'default' => 'background_1'
		),
        'main_color' => array(
			'name' => 'main_color',
			'title' => __( 'Main Color', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_main_colors(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'colors',
			'section' => 'colorscheme',
			'since' => '1.0',
			'default' => 'main_color_1'
		),
        'accent_color' => array(
			'name' => 'accent_color',
			'title' => __( 'Accent Color', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_accent_colors(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'colors',
			'section' => 'colorscheme',
			'since' => '1.0',
			'default' => 'accent_color_1'
		),
		// Footer Options (checkbox, text-html, text-script)
		'link_love' => array(
			'name' => 'link_love',
			'title' => __( 'Link Love', 'ktdf-theme' ),
			'type' => 'checkbox',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'footer',
			'since' => '1.0',
			'default' => true
		),
		'footer_text' => array(
			'name' => 'footer_text',
			'title' => __( 'Footer Text', 'ktdf-theme' ),
			'type' => 'textarea',
			'sanitize' => 'html',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'footer',
			'since' => '1.0',
			'default' => 'All Rights Reserved. &copy; ' . get_bloginfo( 'name' ) . '. Support Local Music.'
		),
		'google_analytics' => array(
			'name' => 'google_analytics',
			'title' => __( 'Google Analytics', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'nohtml',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'headerfooter',
			'section' => 'footer',
			'since' => '1.0',
			'default' => false
		),
		// Social Media Links (select, url)
        'social_link_1_profile' => array(
			'name' => 'social_link_1_profile',
			'title' => __( 'Social Icon 1', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_social_networks(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => ''
		),
		'social_link_1_url' => array(
			'name' => 'social_link_1_url',
			'title' => __( 'Social Icon 1 URL', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'url',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => false
		),
        'social_link_2_profile' => array(
			'name' => 'social_link_2_profile',
			'title' => __( 'Social Icon 2', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_social_networks(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => ''
		),
		'social_link_2_url' => array(
			'name' => 'social_link_2_url',
			'title' => __( 'Social Icon 2 URL', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'url',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => false
		),
        'social_link_3_profile' => array(
			'name' => 'social_link_3_profile',
			'title' => __( 'Social Icon 3', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_social_networks(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => ''
		),
		'social_link_3_url' => array(
			'name' => 'social_link_3_url',
			'title' => __( 'Social Icon 3 URL', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'url',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => false
		),
        'social_link_4_profile' => array(
			'name' => 'social_link_4_profile',
			'title' => __( 'Social Icon 4', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_social_networks(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => ''
		),
		'social_link_4_url' => array(
			'name' => 'social_link_4_url',
			'title' => __( 'Social Icon 4 URL', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'url',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => false
		),
        'social_link_5_profile' => array(
			'name' => 'social_link_5_profile',
			'title' => __( 'Social Icon 5', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_social_networks(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => ''
		),
		'social_link_5_url' => array(
			'name' => 'social_link_5_url',
			'title' => __( 'Social Icon 5 URL', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'url',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => false
		),
        'social_link_6_profile' => array(
			'name' => 'social_link_6_profile',
			'title' => __( 'Social Icon 6', 'ktdf-theme' ),
			'type' => 'select',
			'valid_options' => foxhound_social_networks(),
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => ''
		),
		'social_link_6_url' => array(
			'name' => 'social_link_6_url',
			'title' => __( 'Social Icon 6 URL', 'ktdf-theme' ),
			'type' => 'text',
			'sanitize' => 'url',
			'description' => __( '', 'ktdf-theme' ),
			'tab' => 'social',
			'section' => 'profiles',
			'since' => '1.0',
			'default' => false
		),
        'default_options_tab' => array(
			'name' => 'default_options_tab',
			'title' => 'Default Options Page Tab',
			'type' => 'internal',
			'description' => '',
			'section' => false,
			'tab' => false,
			'since' => '1.0',
			'default' => 'images'
		),
	);
	return apply_filters( 'foxhound_get_option_parameters', $options );
}




/**
 * Return array for our main colors
 */
function foxhound_main_colors() {
	$main_colors = array(
		'main_color_1' => array(
			'name' =>	'main_color_1',
			'title' => '',
			'color' => ''
		),
	);

	return apply_filters( 'foxhound_main_colors', $main_colors );
}

/**
 * Return array for our accent colors
 */
function foxhound_accent_colors() {
	$accent_colors = array(
		'accent_color_1' => array(
			'name' =>	'accent_color_1',
			'title' => '',
			'color' => ''
		),
	);

	return apply_filters( 'foxhound_accent_colors', $accent_colors );
}

/**
 * Return array for our backgrounds
 */
function foxhound_backgrounds() {
	$backgrounds = array(
		'background_1' => array(
			'name'	=> 'background_1',
			'title' => '',
			'color' => ''
		),
	);

	return apply_filters( 'foxhound_backgrounds', $backgrounds );
}

/**
 * Return array for social networks
 */
function foxhound_social_networks() {
	$social_networks = array(
		'none' => array(
			'name' => false,
			'title' => '(none)'
		),
		'amazon' => array(
			'name' => 'amazon',
			'title' => 'Amazon',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'bandcamp' => array(
			'name' => 'bandcamp',
			'title' => 'BandCamp',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'bandsintown' => array(
			'name' => 'bandsintown',
			'title' => 'BandsInTown',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'facebook' => array(
			'name' => 'facebook',
			'title' => 'Facebook',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'ilike' => array(
			'name' => 'ilike',
			'title' => 'iLike',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'itunes' => array(
			'name' => 'itunes',
			'title' => 'iTunes',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'lastfm' => array(
			'name' => 'lastfm',
			'title' => 'LastFM',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'myspace' => array(
			'name' => 'myspace',
			'title' => 'MySpace',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'purevolume' => array(
			'name' => 'purevolume',
			'title' => 'PureVolume',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'reverbnation' => array(
			'name' => 'reverbnation',
			'title' => 'ReverbNation',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'soundcloud' => array(
			'name' => 'soundcloud',
			'title' => 'SoundCloud',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'tumblr' => array(
			'name' => 'tumblr',
			'title' => 'Tumblr',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'twitter' => array(
			'name' => 'twitter',
			'title' => 'Twitter',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		),
		'youtube' => array(
			'name' => 'youtube',
			'title' => 'YouTube',
			'baseurl' => '',
			'iconlinkpos' => array(
				'headerx' => '',
				'headery' => '',
				'footerx' => '',
				'footery' => ''
			)
		)
	);
	return apply_filters( 'foxhound_social_networks', $social_networks );
}

/**
 * Get valid Slider transition effects
 */
function foxhound_slider_effects() {
	$effects = array(
		'sliceDown' 			=> array(
			'name'	=> 'sliceDown',
			'title'	=> 'Slice Down'
		),
		'sliceDownLeft'			=> array(
			'name'	=> 'sliceDownLeft',
			'title'	=> 'Slice Down Left'
		),
		'sliceDownRight'		=> array(
			'name'	=> 'sliceDownRight',
			'title'	=> 'Slice Down Right'
		),
		'sliceUp'				=> array(
			'name'	=> 'sliceUp',
			'title'	=> 'Slice Up'
		),
		'sliceUpRight'			=> array(
			'name'	=> 'sliceUpRight',
			'title'	=> 'Slice Up Right'
		),
		'sliceUpLeft'			=> array(
			'name'	=> 'sliceUpLeft',
			'title'	=> 'Slice Up Left'
		),
		'sliceUpDown'			=> array(
			'name'	=> 'sliceUpDown',
			'title'	=> 'Slice Up/Down'
		),
		'sliceUpDownRight'		=> array(
			'name'	=> 'sliceUpDownRight',
			'title'	=> 'Slice Up/Down Right'
		),
		'sliceUpDownLeft'		=> array(
			'name'	=> 'sliceUpDownLeft',
			'title'	=> 'Slice Up/Down Left'
		),
		'boxRandom'				=> array(
			'name'	=> 'boxRandom',
			'title'	=> 'Box (Random)'
		),
		/*
		'fold' 					=> array(
			'name'	=> 'fold',
			'title'	=> 'Fold'
		),
		'fade'					=> array(
			'name'	=> 'fade',
			'title'	=> 'Fade'
		),
		'slideInRight'			=> array(
			'name'	=> 'slideInRight',
			'title'	=> 'Slide In Right'
		),
		'slideInleft'			=> array(
			'name'	=> 'slideInleft',
			'title'	=> 'Slide In Left'
		),
		'boxRain'				=> array(
			'name'	=> 'boxRain',
			'title'	=> 'Box Rain'
		),
		'boxRainReverse'		=> array(
			'name'	=> 'boxRainReverse',
			'title'	=> 'Box Rain Reverse'
		),
		'boxRainGrow'			=> array(
			'name'	=> 'boxRainGrow',
			'title'	=> 'Box Rain Grow'
		),
		'boxRainGrowReverse'	=> array(
			'name'	=> 'slow',
			'title'	=> 'Box Rain Grow Reverse'
		),
		*/
	);
	return apply_filters( 'foxhound_slider_effects', $effects );
}

/**
 * Get valid Slider transition speeds
 */
function foxhound_slider_speeds() {
	$speeds = array(
		'slow' 		=> array(
			'name'	=> 'slow',
			'title'	=> 'Slow'
		),
		'medium' 	=> array(
			'name'	=> 'medium',
			'title'	=> 'Medium'
		),
		'fast' 		=> array(
			'name'	=> 'fast',
			'title'	=> 'Fast'
		),
	);
	return apply_filters( 'foxhound_slider_speeds', $speeds );
}

/**
 * Get valid Slider pause durations
 */
function foxhound_slider_pauses() {
	$pauses = array(
		'1000' 	=> array(
			'name'	=> '1000',
			'title'	=> 1000
		),
		'2000' 	=> array(
			'name'	=> '2000',
			'title'	=> 2000
		),
		'3000' 	=> array(
			'name'	=> '3000',
			'title'	=> 3000
		),
		'4000' 	=> array(
			'name'	=> '4000',
			'title'	=> 4000
		),
		'5000' 	=> array(
			'name'	=> '5000',
			'title'	=> 5000
		),
		'6000' 	=> array(
			'name'	=> '6000',
			'title'	=> 6000
		),
		'7000' 	=> array(
			'name'	=> '7000',
			'title'	=> 7000
		),
		'8000' 	=> array(
			'name'	=> '8000',
			'title'	=> 8000
		),
		'9000' 	=> array(
			'name'	=> '9000',
			'title'	=> 9000
		),
		'10000'	=> array(
			'name'	=> '10000',
			'title'	=> 10000
		)
	);
	return apply_filters( 'foxhound_slider_pauses', $pauses );
}

?>