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
	<style>
		body {
			background-color: black;
		}
	</style>
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
			<span class="visuallyhidden"><?php bloginfo( 'name' ); ?></span>
    	</a>
  	</h1>

	<nav class="nav">
		<div class="main-menu">
			<?php /* Main menu */
			wp_nav_menu(
				array(
					'theme_location' => 'primary-menu',
					'container'      => '',
					'menu_class'     => 'ktdf-menu',
				)
			);
			/* The main image header */ ?>
		</div>
		<div class="menu-item toggle-btn">
			<a href="javascript: void(0);">
				<span>MENU</span>
				<img src="<?php echo get_template_directory_uri() . '/images/icon-menu.svg'; ?>" class="menu-icon" >
				<img src="<?php echo get_template_directory_uri() . '/images/icon-menu-close.svg'; ?>" class="menu-icon menu-icon-close hide" >
			</a>
		</div>
	</nav>
	<script>
		var isOpen = false;
		function toggleMenu(event) {
			event.stopPropagation();

			var menuIcon = document.querySelector('.menu-icon');
			var menuIconClose = document.querySelector('.menu-icon-close');
			var menu = document.querySelector('.main-menu');
			var body = document.querySelector('body');

			body.classList.toggle('lock', !isOpen);
			menu.classList.toggle('slide-in', !isOpen);
			menuIcon.classList.toggle('hide', !isOpen);
			menuIconClose.classList.toggle('hide', isOpen);

			isOpen = !isOpen;

			if (isOpen) {
				body.addEventListener('click', toggleMenu);
			} else {
				body.removeEventListener('click', toggleMenu);
			}
		}
		document.querySelector('.toggle-btn a').addEventListener('click', toggleMenu);
	</script>

	<?php /* Main page content */ ?>
	<div id="main">
	<div id="content">
