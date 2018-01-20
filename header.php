<?php
/**
 * Header template part
 */

/**
 * Globalize $foxhound_options
 *
 * @global	array	$foxhound_options	Theme options array
 */
global $foxhound_options;
$foxhound_options = foxhound_get_options();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/1">
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo( 'name' ); ?> <?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">
	<?php /* Logo */ ?>
	<h1 id="title">
    <a href="<?php echo esc_url(home_url('/')); ?>" title="Home">
      <img srcset="<?php echo get_template_directory_uri() . '/images/logo.png'; ?> 975w,
                   <?php echo get_template_directory_uri() . '/images/logo.1.5x.png'; ?> 1463w,
                   <?php echo get_template_directory_uri() . '/images/logo.2x.png'; ?> 1950w"
           sizes="(max-width: 750px) 100vw,
                  (min-width: 1100px) 2000px,
                  750px"
           src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>">
      <?php bloginfo( 'name' ); ?>
    </a>
  </h1>

	<?php /* Main menu */
	wp_nav_menu(
		array(
			'theme_location' => 'primary-menu',
			'container'      => '',
			'menu_class'     => 'nav sf-menu',
		)
	);



	/* The main image header */ ?>

	<div id="header">

		<?php /*
		<div class="band-photo">
		<?php
			global $paged, $post;
			if ( is_front_page() && ( '1' > $paged ) ) {
				if ( 'slider' == $foxhound_options['front_page_image'] ) {
					$slider_image_args = array(
						'numberposts' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'post_type' => 'slider-image',
						'post_parent' => 0
					);
					$slider_images = get_posts( $slider_image_args );
					?>
					<div id="nivoslider">
						<?php
						foreach ( $slider_images as $image ) {
							$image_atts = array(
								'alt'	=> '',
								'title'	=> '',
							);
							$img = get_the_post_thumbnail( $image->ID, 'header-slider-image', $image_atts );
							$sliderimage_link = get_post_meta( $image->ID, 'sliderimage_link', true );
							$sliderimage_linktarget = get_post_meta( $image->ID, 'sliderimage_linktarget', true );
							if ( '' != $sliderimage_link ) {
								$target = ( $sliderimage_linktarget ? ' target="_blank"' : '' );
								?>
								<a href="<?php echo $sliderimage_link; ?>" <?php echo $target; ?>><?php echo $img; ?></a>
								<?php
							} else {
								echo $img;
							}
						}
						?>
					</div>
					<script type="text/javascript">
					jQuery(window).load(function() {
						$('#nivoslider').nivoSlider({
							effect: '<?php echo $foxhound_options['slider_effect']; ?>',
							animSpeed: '<?php echo $foxhound_options['slider_speed']; ?>', // Slide transition speed
							pauseTime: <?php echo $foxhound_options['slider_pause']; ?>, // How long each slide will show
							manualAdvance: <?php echo $foxhound_options['slider_manual']; ?>, // Force manual transitions
							slices:15, // For slice animations
							boxCols: 8, // For box animations
							boxRows: 4, // For box animations
							startSlide:0, // Set starting Slide (0 index)
							directionNav:false, // Next & Prev navigation (default: true)
							directionNavHide:true, // Only show on hover
							controlNav:true, // 1,2,3... navigation (default: true)
							controlNavThumbs:false, // Use thumbnails for Control Nav
							controlNavThumbsFromRel:false, // Use image rel for thumbs
							controlNavThumbsSearch: '.jpg', // Replace this with...
							controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
							keyboardNav:true, // Use left & right arrows
							pauseOnHover:true, // Stop animation while hovering
							captionOpacity:0.8, // Universal caption opacity
							prevText: 'Prev', // Prev directionNav text
							nextText: 'Next', // Next directionNav text
							beforeChange: function(){}, // Triggers before a slide transition
							afterChange: function(){}, // Triggers after a slide transition
							slideshowEnd: function(){}, // Triggers after all slides have been shown
							lastSlide: function(){}, // Triggers when last slide is shown
							afterLoad: function(){} // Triggers when slider has loaded
						});
					});
					</script>
					<?php
				} else {
					$large_band_photo = $foxhound_options['large_band_photo'];
					$large_band_photo_url = $large_band_photo['url'];
					echo '<img src="' . esc_attr( $large_band_photo_url ) . '" width="975" alt="" />';
				}
			} else if ( is_singular() ) {
				// Query post custom metadata
				$darkgritty_post_custom = ( get_post_custom( $post->ID ) ? get_post_custom( $post->ID ) : false );
				// Determine the post custom header image size
				$darkgritty_header_image_size = ( isset( $darkgritty_post_custom['_darkgritty_header_image_size'][0] ) ? $darkgritty_post_custom['_darkgritty_header_image_size'][0] : 'small' );
				// Determine image width
				$darkgritty_header_image_width = ( 'small' == $darkgritty_header_image_size ? '974' : '975' );
				// If defined, output the Post Featured Image
				if ( has_post_thumbnail() ) {
					$darkgritty_header_post_thumbnail_size = ( 'small' == $darkgritty_header_image_size ? 'header-slider-image-small' : 'header-slider-image' );
					the_post_thumbnail( $darkgritty_header_post_thumbnail_size );
				} else {
					// Output appropriate image size
					$darkgritty_header_image = $foxhound_options[$darkgritty_header_image_size . '_band_photo'];
					$darkgritty_header_image_url = $darkgritty_header_image['url'];
					echo '<img src="' . esc_attr( $darkgritty_header_image_url ) . '" width="' . $darkgritty_header_image_width . '" alt="" />';
				}
			} else {
				$small_band_photo = $foxhound_options['small_band_photo'];
				$small_band_photo_url = $small_band_photo['url'];
				echo '<img src="' . esc_attr( $small_band_photo_url ) . '" width="975" alt="" />';
			}
		?>
		</div>

		<?php get_template_part( 'social-network-links' ); ?>

		*/ ?>

	</div>

	<?php /* Main page content */ ?>
	<div id="content">
