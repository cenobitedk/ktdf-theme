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
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	<?php /* Logo */ ?>
	<h1 id="title">
    <a href="<?php echo esc_url(home_url('/')); ?>" title="Home">
      <img srcset="<?php echo get_template_directory_uri() . '/images/logo.png'; ?> 975w,
                   <?php echo get_template_directory_uri() . '/images/logo.large.png'; ?> 1640w"
           sizes="(max-width: 750px) 100vw,
                  975px"
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


	<?php /* Main page content */ ?>
	<div id="main">
	<div id="content">
