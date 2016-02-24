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
	<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/slider-style.css' type='text/css' media='screen' />
	<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/bootstraperso.css' type='text/css' media='screen' />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//recupérer la part du permalink correspondant au plus grand ancetre de la page
	$parentSlug = "";
	 if (is_page()) {
	 $ancestors = get_post_ancestors($post);

		 if ($ancestors) {
			 $ancestors = array_reverse($ancestors);

	 		 $parentSlug = basename(get_permalink($ancestors[0]));
		 }
	 	else $parentSlug = basename(get_permalink());
	 }
	 if($parentSlug == "")
	 	$parentSlug = "accueil"
?>
	<div id="container" class="<?php echo $parentSlug ?>" >
		<header id="main-header" >
			<a id="logo" class="home-link col-sm-2" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( home_url( '/wp-content/images/logo_smdba.png' ) ); ?>">
			</a>
			<aside class="col-sm-offset-4 col-sm-5">  
				<span>Mairie, Le Village - 04270 Bras d’Asse</span><span>smdba@hotmail.fr</span>
			</aside>
			<nav id="primary-navigation" class="col-sm-offset-2 col-sm-10 no-padding text-center">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu no-padding full-width' ) ); ?>
			</nav>
		</header><!-- #masthead -->
		<div>
			<p><?php // Breadcrumb navigation
			 if (is_page() && !is_front_page() || is_single() || is_category()) {
				 echo '<ul class="breadcrumb">';
				 echo '<li><a title="Accueil - '.get_bloginfo( 'name' ).'" rel="nofollow" href="'.esc_url( home_url( '/' ) ).'">SMDBA</a></li>';

				 if (is_page()) {
				 $ancestors = get_post_ancestors($post);

					 if ($ancestors) {
						 $ancestors = array_reverse($ancestors);

						 foreach ($ancestors as $crumb) {
						 	echo '<li><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li>';
						 }
					 }
				 }

				 if (is_single()) {
					 $category = get_the_category();
					 echo '<li><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li>';
				 }

				 if (is_category()) {
					 $category = get_the_category();
					 echo '<li>'.$category[0]->cat_name.'</li>';
				 }

				 // Current page
				 if (is_page() || is_single()) {
					 echo '<li>'.get_the_title().'</li>';
				 }
				 echo '</ul>';
			 } 
			?></p>
		</div>
		<div id="main">
