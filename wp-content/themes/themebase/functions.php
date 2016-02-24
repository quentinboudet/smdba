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

function gn_ajouter_styles_editeur() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'gn_ajouter_styles_editeur' );
//fonction pour ajout de style dans l'éditeur de texte Wordpress

//création d'un menu à placer avec 
//wp_nav_menu( array( 'theme_location' => 'menumain', 'container' => 'ul', 'menu_class' => 'nav-main' ) );
//puis gérer dans: apparence > menu
//en faisant attention d'avoir une class qui ne se modifie pas automatiquement depuis le titre donné dans apparence > menu
register_nav_menus( array( 
	'menumain' => 'Principal',
	'menufooter' => 'Footer', 
));


//Ajouter des liens dans le menu admin
add_action('admin_menu', 'nom_fonction_du_lien');
function nom_fonction_du_lien(){
	if (function_exists('add_options_page')) {
		//ajoute le lien dans le menu principal
		add_object_page( "edition accueil", "Edition Accueil", "administrator", "menu_edit_home", "edit_home" );
	}
}

function edit_home() {

add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
wp_enqueue_media();
	if (!current_user_can('administrator'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	global $wpdb;
	$suppr_slider = $wpdb->get_col("SELECT id FROM slider");
	$suppr_edito = $wpdb->get_col("SELECT id FROM edito");

	foreach ($suppr_slider as $id){
		if (isset($_POST['s'.$id.'_suppr'])){
			$wpdb->delete("slider", array('id' => $id ));
			echo "<p style='font-weight:bold;color:#1a7;' class='updated below-h2' >Le slider a bien été supprimé.</p>";
		}
	}

	foreach ($suppr_edito as $id){
		if (isset($_POST['s'.$id.'_suppr'])){
			$wpdb->delete("edito", array('id' => $id ));
			echo "<p style='font-weight:bold;color:#1a7;' class='updated below-h2' >L'édito a bien été supprimé.</p>";
		}
	}

	if (isset($_POST['new_slider'])){
		$maxid = $wpdb->get_var("SELECT MAX(id) FROM slider");
		if($wpdb->insert(
			'slider', 
			array(
				'id' => ++$maxid,
				'img' => '', 
				'titre' => '', 
				'texte' => '' 
			)
		)) echo "<p style='font-weight:bold;color:#1a7;' class='updated below-h2' >Un slider a bien été ajouté.</p>";
		else echo "Un problème est survenu pour l'ajout d'un slider, veuillez réessayer ou contacter l'éditeur du site si le problème persiste.";
	}

	if (isset($_POST['submit'])) {
		$u_slider = $wpdb->get_results("SELECT * FROM slider");
		foreach ($u_slider as $row) {
			$id = $row->id;
			$imgSrc = $_POST['s'.$id.'_img'];
			if(strpos($imgSrc, "wp-content" )){
				echo "hey";
				$imgSrc = strstr($imgSrc, "wp-content");
			}

			$wpdb->update( 
				'slider', //nom de la table a up
				array( //remplacement des colonnes
					'id' => $_POST['s'.$id.'_ordre'], 
					'img' => $imgSrc, 
					'titre' => str_replace("\'", "'", $_POST['s'.$id.'_titre']), 
					'texte' => str_replace("\'", "'", $_POST['s'.$id.'_texte']) ), 
				array( 'id' => $id ) //selection de la ligne a éditer
			);
		}
	}

	if (isset($_POST['new_edito'])) {
		$u_edito = $wpdb->get_results("SELECT * FROM edito");
		
			$wpdb->update( 
				'edito', //nom de la table a up
				array( //remplacement des colonnes
					'texte' => str_replace("\'", "'", $_POST[$id.'_texte']) ),
				array( 'id' => $id ) //selection de la ligne a éditer

			);
		
	}
	$slider = $wpdb->get_results("SELECT * FROM slider");
	$edito = $wpdb->get_results("SELECT * FROM edito");

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js', array(), '1.7' );
	wp_enqueue_script( 'jquery', 'http://www.smdba.fr/wp-admin/js/perso-ouverturemedia.js', array(), '1.7' );
?>
	<script type="text/javascript" src="js/perso-ouverturemedia.js"></script>
	<h1>Contenu éditable de la page d'accueil</h1>

<!-- début affichage d'edition des sliders -->
	<h2 style="font-weight:bold;font-size:160%;">Slider</h2>
	<form method='post' action='admin.php?page=menu_edit_home'>
		<input type="submit" name="submit" style="display:none;">
	<?php 
	foreach ($slider as $row) {
		?>
		<hr style="width:70%;margin:15px 0 35px;">
		<legend style="display:inline-block;text-decoration:underline;font-size:140%;">Slider n°<?php echo $row->id;?></legend>
		<input type="submit" name="s<?php echo $row->id;?>_suppr" value="Supprimer le slider"><br>
		<label>Ordre : </label><input type="text" name="s<?php echo $row->id;?>_ordre" value="<?php echo $row->id;?>" size="3"><br>

		<label>Image : </label><input type="text" class="media-input" name="s<?php echo $row->id;?>_img" value="<?php echo $row->img;?>" size="100"><button class="button media-button ">Choisir image</button><br>
		<label>si vous voulez mettre une image qui n'est pas dans la biblihotèque, elle doit forcément être dans les dossiers du site. Il faut danc ce cas saisir le chemin seulement a partir de ce qui suit l'url du site.
		Sans oubliez l'extension (".png", ".jpg", etc...)</label><br>
		<label>Exemple seul ce qui est entre crochets doit être saisit: http://www.monsite.fr/[wp-content/images/monimage.jpg]</label><br>
		<label>Hauteur minimum de l'image (et conseillé, plus grand est inutile) : 400px</label><br>
		<img src="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $row->img;?>"><br>
		<label>Titre : </label><input type="text" name="s<?php echo $row->id;?>_titre" value="<?php echo $row->titre;?>" size="100"><br>
		<label>Texte : </label><textarea name="s<?php echo $row->id;?>_texte" rows="4" cols="100"><?php echo $row->texte;?></textarea><br>
		<input type="submit" name="submit">
		<?php global $post;
		// Get WordPress' media upload URL
		$upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );

		// See if there's a media id already saved as post meta
		$your_img_id = get_post_meta( $post->ID, '_your_img_id', true );

		// Get the image src
		$your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );

		// For convenience, see if the array is valid
		$you_have_img = is_array( $your_img_src );

	}
	?>
	<hr style="width:70%;margin:15px 0 35px;">
	<input type="submit" name="new_slider" value="Ajouter un slider">
	<hr style="margin:15px 0 40px;border-width:2px;">

<!-- Ajouter un éditorial -->
	<label>Editorial : </label><input type="text" name="<?php echo $edito[0]->id;?>_texte" value="<?php echo $edito[0]->texte;?>"><br>
	<?php echo var_dump($edito);?>
	<input type="submit" name="new_edito" value="Editer l'édito">

<!-- Fin affichage d'edition des sliders -->
<?php
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

// fonction permettant de remplacer les balises <p> par des balises figure pour gérer plus facilement les images
add_filter( 'the_content', 'replace_p_in_img', 99 );
function replace_p_in_img( $content ) {

   $content = preg_replace(

      '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',

      '<figure>$1</figure>',
      $content

   );

   return $content;

}
