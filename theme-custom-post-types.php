<?php
/**
 * @package Dark-N-Gritty
 *
 * Theme Custom Post Types
 */
 

/**
 * Add Custom Post Type for Slider Images
 * 
 */
function darkgritty_register_slider_post_type() {
 
	$labels = array(
		'name' => __( 'Slider Images' ),
		'singular_name' => __( 'Slider Image' ),
		'add_new' => _x( 'Add New', 'slider image' ),
		'add_new_item' => __( 'Add New Slider Image' ),
		'edit_item' => __( 'Edit Slider Image' ),
		'new_item' => __( 'New Slider Image' ),
		'view_item' => __( 'View Slider Image' ),
		'search_items' => __( 'Search Slider Images' ),
		'not_found' =>  __( 'Nothing found' ),
		'not_found_in_trash' => __( 'Nothing found in Trash' ),
		'parent_item_colon' => 'Parent Slider Image'
	);
 
	$args = array(
		'labels' => $labels,
		'description' => 'Images to be displayed in the Front Page slider',
		'show_in_menu' => true,
		'menu_position' => 27,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/menu_icon.gif',
		'capability' => 'post',
		'map_meta_cap' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'rewrite' => true,
		'hierarchical' => false,
		'supports' => array( 'thumbnail', 'page-attributes' )
	  ); 
 
	register_post_type( 'slider-image' , $args );
}
/* Add our function to the init hook. */
add_action('init', 'darkgritty_register_slider_post_type');

/**
 * Rearrange Post Edit screen for Slider Images
 */
function darkgritty_sliderimage_post_metaboxes( $post ) {
    global $wp_meta_boxes;

    remove_meta_box('postimagediv', 'slider-image', 'side');
    add_meta_box('postimagediv', __('Featured Image'), 'post_thumbnail_meta_box', 'slider-image', 'normal', 'high');
	add_meta_box('sliderimagelink', __('Featured Image Link'), 'darkgritty_sliderimage_link_metabox', 'slider-image', 'normal', 'high');
}
add_action( 'add_meta_boxes_slider-image', 'darkgritty_sliderimage_post_metaboxes' );

/**
 * Define Link Metabox for Post Edit screen for Slider Images
 */
function darkgritty_sliderimage_link_metabox() {
  global $post;
  $custom = ( get_post_custom($post->ID) ? get_post_custom($post->ID) : false );
  $sliderimage_link = ( isset( $custom['sliderimage_link'][0] ) ? $custom['sliderimage_link'][0] : false );
  $sliderimage_linktarget = ( isset( $custom['sliderimage_linktarget'][0] ) ? $custom['sliderimage_linktarget'][0] : false );
  ?>
  <p>
  <label>Slider Image Link:</label><br />
  <input type="text" name="sliderimage_link" value="<?php echo esc_url( $sliderimage_link ); ?>" style="width:400px;" />
  
  <input type="checkbox" name="sliderimage_linktarget" <?php checked( $sliderimage_linktarget ); ?> />
  <label>Open Link in New Window</label>
  </p>
  <?php
}

/**
 * Validate, sanitize, and save post metadata.
 */
function darkgritty_save_sliderimage_metadata(){
  global $post;

  $valid_sliderimage_link = ( isset( $_POST['sliderimage_link'] ) ? esc_url_raw( $_POST['sliderimage_link'] ) : '' );
  $valid_sliderimage_linktarget = ( isset( $_POST['sliderimage_linktarget'] ) ? true : false );
 
  update_post_meta($post->ID, 'sliderimage_link', $valid_sliderimage_link );
  update_post_meta($post->ID, 'sliderimage_linktarget', $valid_sliderimage_linktarget );
}
/* Add our function to the publish_chapter and draft_chapter hooks. */
add_action('publish_slider-image', 'darkgritty_save_sliderimage_metadata');
add_action('draft_slider-image', 'darkgritty_save_sliderimage_metadata');

/**
 * Modify displayed columns when viewing Slider Image posts
 */
function darkgritty_sliderimage_posts_edit_columns( $posts_columns ) {

    $tmp = array();

    foreach( $posts_columns as $key => $value ) {
        if( $key == 'title' ) {
            $tmp['slider-image'] = 'Slider Image';
        } else {
            $tmp[$key] = $value;
        }
    }

    return $tmp;
}
add_filter( 'manage_slider-image_posts_columns', 'darkgritty_sliderimage_posts_edit_columns' );

/**
 * Custom column output when viewing the header-image post list.
 */
function darkgritty_sliderimage_custom_column( $column_name ) {
    global $post;

    if( $column_name == 'slider-image' ) {
        echo "<a href='", get_edit_post_link( $post->ID ), "'>", get_the_post_thumbnail( $post->ID, 'medium' ), "</a>";
        echo "<div class=\"row-actions\">";
        echo "</div>";
    }
}
add_action( 'manage_posts_custom_column', 'darkgritty_sliderimage_custom_column' );
?>