<?php
/**
 * Template Name: Template
 * ce nom sera celui affiché lors de la selection du modèle de page
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
 * image à la une 		:	the_post_thumbnail() 		<img>
 * catégorie(s) 		:	the_category() 				<a> dans <li> (sans <ul>)
 * mot(s)-clef(s) 		:	the_tags() 					plusieurs <a>
 * date de publication 	:	the_date() ou the_time()
 * permalien 			:	the_permalink()				lien simple
 */

get_header(); ?>
	<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-content">
			<?php the_content(); ?>
			<div><p>hello</p></div>
			<?php the_post_thumbnail();
			//taxonomie (fonctions.php)
			echo get_the_term_list( $post->ID, 'type', '<p>Type de projet : ', ', ', '</p>' )
			echo get_the_term_list( $post->ID, 'couleur', '<p>Couleurs : ', ', ', '</p>' ) ?>
		</div>

		<div class="page-edit">
			<?php edit_post_link( __( 'Edit', 'themebase' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	<?php endwhile; ?>
	</div><!-- #page -->
<?php get_sidebar();
get_footer(); ?>