<?php
/**
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 * 
 * //Dans la boucle//
 * titre                :	the_title() 				texte brut
 * identifiant unique 	:	the_ID() 					texte brut
 * résumé 				:	the_excerpt()				<p>
 * description 			:	the_content() 				HTML
 * image à la une 		:	the_thumbnail() 			<img>
 * catégorie(s) 		:	the_category() 				<a> dans <li> (sans <ul>)
 * mot(s)-clef(s) 		:	the_tags() 					plusieurs <a>
 * date de publication 	:	the_date() ou the_time()
 * permalien 			:	the_permalink()				lien simple
 * 
 */

//si plusieurs loop dans une page & selection type à afficher
wp_reset_postdata();
query_posts('posts_per_page=3&post_type=post');

if (have_posts()) while (have_posts()) : the_post(); ?>
    <article class="post">
        <header>
            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </header>
        <aside class="post-info">
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </aside>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
    </article>
<?php } ?>