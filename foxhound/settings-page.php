<?php
/**
 * Foxhound Frameowrk Theme Settings Page
 * 
 * Defines the markup for the Theme settings
 * page for the Foxhound framework.
 * 
 * @package Foxhound
 */


/**
 * Add Theme Settings Page
 * 
 * @since Foxhound 1.0
 */
function foxhound_add_settings_page() {

	// Add admin page
	add_theme_page(
		__( 'Settings', 'ktdf-theme' ),
		FOXHOUND_THEMENAME,
		'edit_theme_options',
		'theme_options',
		// Callback function to output settings page
		'foxhound_settings_page'
	);

}
add_action( 'admin_menu', 'foxhound_add_settings_page' );


/**
 * Foxhound Theme Settings Page Markup
 * 
 * @uses	foxhound_get_current_tab()	defined in \foxhound\settings-page.php
 * @uses	foxhound_get_page_tab_markup()	defined in \foxhound\settings-page.php
 */
function foxhound_settings_page() { 
	// Determine the current page tab
	$currenttab = foxhound_get_current_tab();
	// Define the page section accordingly
	$settings_section = FOXHOUND_THEMESLUG . '_' . $currenttab . '_tab';
	?>

	<div class="wrap">
		<?php foxhound_get_page_tab_markup(); ?>
		<?php if ( isset( $_GET['settings-updated'] ) ) {
    			echo '<div class="updated"><p>';
				echo __( 'Theme settings updated successfully.', 'ktdf-theme' );
				echo '</p></div>';
		} ?>
		<form action="options.php" method="post" enctype="multipart/form-data">
		<?php 
			// Implement settings field security, nonces, etc.
			settings_fields( FOXHOUND_THEMESLUG . '_theme_options' );
			// Output each settings section, and each
			// Settings field in each section
			do_settings_sections( $settings_section );
		?>
			<?php submit_button( __( 'Save Settings', 'ktdf-theme' ), 'primary', FOXHOUND_THEMESLUG . '_theme_options[submit-' . $currenttab . ']', false ); ?>
			<?php submit_button( __( 'Reset Defaults', 'ktdf-theme' ), 'secondary', FOXHOUND_THEMESLUG . '_theme_options[reset-' . $currenttab . ']', false ); ?>
		</form>
	</div>
<?php 
}


/**
 * Get current settings page tab
 */
function foxhound_get_current_tab() {

	$page = 'theme_options';
    if ( isset( $_GET['tab'] ) && array_key_exists( $_GET['tab'], foxhound_get_settings_page_tabs() ) ) {
        $current = $_GET['tab'];
    } else {
		global $foxhound_options;
		$foxhound_options = foxhound_get_options();
		$current = $foxhound_options['default_options_tab'];
    }	
	return $current;
}


/**
 * Define Foxhound Settings Page Tab Markup
 * 
 * @uses	foxhound_get_current_tab()			defined in \foxhound\settings-page.php
 * @uses	foxhound_get_settings_page_tabs()	defined in \theme-options.php
 */
function foxhound_get_page_tab_markup() {

	$page = 'theme_options';
    $current = foxhound_get_current_tab();
	$tabs = foxhound_get_settings_page_tabs();
    
    $links = array();
    
    foreach( $tabs as $tab ) {
		$tabname = $tab['name'];
		$tabtitle = $tab['title'];
        if ( $tabname == $current ) {
            $links[] = "<a class='nav-tab nav-tab-active' href='?page=$page&tab=$tabname'>$tabtitle</a>";
        } else {
            $links[] = "<a class='nav-tab' href='?page=$page&tab=$tabname'>$tabtitle</a>";
        }
    }
    
    echo '<div id="icon-themes" class="icon32"><br /></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach ( $links as $link )
        echo $link;
    echo '</h2>';
    
}


/**
 * Add theme options page styles
 *
 * @since Foxhound 1.0
 */
function foxhound_add_settings_page_css() {
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'theme_options' ) {
		wp_register_style( 'foxhound-settings-page-css', FOXHOUND_URL . 'settings-page.css' );
		wp_enqueue_style( 'foxhound-settings-page-css' );
	}
}
add_action( 'admin_enqueue_scripts', 'foxhound_add_settings_page_css' );


/**
 * Create the documentations page
 * @since Grammy 1.0
 */
function foxhound_theme_documentation() {
	echo '<div class="wrap">';
	require( apply_filters( 'foxhound_theme_documentation', FOXHOUND_PATH . 'documentation.php' ) );
	echo '</div>';
}
 
 ?>