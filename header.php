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

	<title><?php wp_title('–', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="keywords" content="killtown, kill, town, kill-town, death, fest, deathfest, underground, undergrund, ungdomshuset, dortheavej, metal, deathmetal, københavn, copenhagen, kopenhagen, diy, d.i.y., festival, music, beer, party, extreme, xtreem music, me saco un ojo, soulseller, serpent pulse, zero tolerance, extremely rotten, nuclear winter, blood harvest, doomentia, no posers please, ibex moon, posh isolation, terrorizer, magazine, undergrundsmusikkens fremme, vegan, veganer, vegetar" />
	<meta name="description" content="Danish D.I.Y. underground Death Metal festival. The 2020 edition will take place from 3rd-6th of September in Copenhagen, Denmark." />

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
           src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>"
		   class="desktop">
      <img class="mobile" src="<?php echo get_template_directory_uri() . '/images/logo.mobile.png'; ?>">
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
