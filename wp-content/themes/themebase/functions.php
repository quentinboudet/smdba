<?php
/**
 * Theme Base functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 *
 * register_post_type: 
 *   supports
 *         Default: title and editor 
 * 
 *         'title'
 *         'editor' (content)
 *         'author'
 *         'thumbnail' (featured image, current theme must also support post-thumbnails)
 *         'excerpt'
 *         'trackbacks'
 *         'custom-fields'
 *         'comments' (also will see comment count balloon on edit screen)
 *         'revisions' (will store revisions)
 *         'page-attributes' (menu order, hierarchical must be true to show Parent option)
 *         'post-formats' add post formats, see Post Formats 
 * 
 */

add_theme_support( 'post-thumbnails' );


add_action('init', 'my_custom_init');
function my_custom_init()
{
	//Ajouter un type de post ou de page
    //voir aussi dans page-template.php
	add_action('init', 'register_post_type');
	register_post_type('projet', array(
	  'label' => __('Projets'),
	  'singular_label' => __('Projet'),
	  'public' => true,
	  'show_ui' => true,
	  'capability_type' => 'post',
	  'hierarchical' => false,
	  'supports' => array('title', 'excerpt', 'thumbnail')
	));

    //cela pourra s'afficher dans "la boucle"
    register_taxonomy( 'type', 'projet', array( 'hierarchical' => true, 'label' => 'Type', 'query_var' => true, 'rewrite' => true ) );  
    register_taxonomy( 'couleur', 'projet', array( 'hierarchical' => false, 'label' => 'Couleur', 'query_var' => true, 'rewrite' => true ) );
}
add_action('init', 'my_custom_init');

//création d'un menu à placer avec 
//wp_nav_menu( array( 'theme_location' => 'menumain', 'container' => 'ul', 'menu_class' => 'nav-main' ) );
//puis gérer dans: apparence > menu
//en faisant attention d'avoir une class qui ne se modifie pas automatiquement depuis le titre donné dans apparence > menu
register_nav_menus( array( 
	'menumain' => 'Principal',
	'menuparticulier' => 'Particulier', 
	'menucollectivites' => 'Collectivites',
));

//Ajouter des liens dans le menu admin
add_action('admin_menu', 'nom_fonction_du_lien');
function nom_fonction_du_lien(){
	if (function_exists('add_options_page')) {
				
		//ajoute le lien dans reglages
		$plugin_page_options = add_options_page('Nom de page', 'Nom de menu', 'administrator', 'menu_id', 'fonction_a_appeler');
		//ajoute le lien dans le menu principal du bas
		add_menu_page( "Nom de page", "Nom de menu", "administrator", "menu_id", "fonction_a_appeler", "images/icone.png", 3 );
		//ajoute dans le menu principal du haut
		add_object_page( "Nom de page", "Nom de menu", "administrator", "menu_id", "fonction_a_appeler", "images/icone.png");
		//Nom de page(string) (required) The text to be displayed in the title tags of the page when the menu is selected
		//Nom de menu(string) (required) Nom qui s'affiche dans le menu
		//administrator(string) (required) The capability required for this menu to be displayed to the user. User levels are deprecated and should not be used here!
		//menu_id(string) (required) The slug name to refer to this menu by (should be unique for this menu). Prior to Version 3.0 this was called the file 	(or handle) parameter. If the function parameter is omitted, the menu_slug should be the PHP file that handles the display of the menu page content.
		
		//fonction_a_appeler(string) (optional) The function that displays the page content for the menu page.
        	//Default: None. Technically, the function parameter is optional, but if it is not supplied, then WordPress will assume that including the PHP file will generate the administration screen, without calling a function. Most plugin authors choose to put the page-generating code in a function within their main plugin file. In the event that the function parameter is specified, it is possible to use any string for the file parameter. This allows usage of pages such as ?page=my_super_plugin_page instead of ?page=my-super-plugin/admin-options.php. 

    		//The function must be referenced in one of two ways:

        	//if the function is a member of a class within the plugin it should be referenced as array( $this, 'function_name' )
        	//in all other cases, using the function name itself is sufficient 

		//images/icone.png(string) (optional) The icon for this menu.
		//$position(int) (Required) The position in the menu order this one should appear 

	}
}
//fonction_de_la_page_options est la fonction de création de la page des options.
//administrator indique le niveau de privilège que l'utilisateur doit posséder afin de pouvoir accéder à la page des options.
function fonction_de_la_page_options() {

  if (!current_user_can('administrator'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  echo '<div class="wrap">';
  echo '<p>Ceci est l\'endroit où placer le formulaire des options.</p>';
  echo '</div>';

}