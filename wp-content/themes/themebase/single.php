<?php
/**
 * The template for displaying all single posts
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
	<article id="single" class="post">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="post-title"><?php the_title(); ?></h1>
		
		<p class="post-info">
		  Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
		</p>
		
		<div class="post-content">
		  <?php the_content(); ?>
		</div>
		

		<?php //get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>
	</article><!-- #single -->
<?php get_sidebar();
get_footer(); ?>