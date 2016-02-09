<?php
/**

 * The template for displaying all pages by default
 *
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 * 
 * //Dans la boucle//
 * titre 				:	the_title() 				texte brut
 * identifiant unique 	:	the_ID() 					texte brut
 * résumé 				:	the_excerpt()				<p>
 * description 			:	the_content() 				HTML
 * image à la une 		:	the_thumbnail() 			<img>
 * catégorie(s) 		:	the_category() 				<a> dans <li> (sans <ul>)
 * mot(s)-clef(s) 		:	the_tags() 					plusieurs <a>
 * date de publication 	:	the_date() ou the_time()
 * permalien 			:	the_permalink()				lien simple
 */

get_header(); ?>
	<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-header col-sm-11">
			<h1 class="page-title col-sm-offset-1"><?php the_title(); ?></h1>
		</header>

		<div class="page-content">
			<?php the_content(); ?>
		</div>
		<?php
		//pour ajouter des champs avec dans la page d'edition d'une page : option de l'ecran > champ personalisé
			$client = get_post_meta($post->ID, "NOM DU CHAMP", true);//pour un seul champ
			$client = get_post_meta($post->ID, "");//pour plusieur champs(dans un array)
			if($client!=NULL){ echo '<p><strong> '.$client.'</strong></p>'; }
		?>
		<footer class="page-edit">
			<?php edit_post_link( __( 'Edit', 'themebase' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
	<?php endwhile; ?>
	</section><!-- #page -->
<?php get_sidebar();
get_footer(); ?>