<?php
/**
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<!--<meta name="viewport" content="width=device-width">-->
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<!--<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php //bloginfo( 'pingback_url' ); ?>">-->
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/style.css' type='text/css' media='screen' />
	<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/bootstraperso.css' type='text/css' media='screen' />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="container" >
		<header id="main-header" >
			<a id="logo" class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( home_url( '/wp-content/images/logo_smdba.png' ) ); ?>">
			</a>
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if (is_single()) : ?>
					<p class="site-title"><?php bloginfo( 'name' ); ?></p>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php else : ?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>
			</a>
			<nav id="primary-navigation" class="col-sm-offset-2 col-sm-10 no-padding">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu no-padding full-width' ) ); ?>
			</nav>
		</header><!-- #masthead -->

		<div id="main">
