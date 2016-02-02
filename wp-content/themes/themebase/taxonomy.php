<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<div class="main">
		<?php while (have_posts()) : the_post(); ?>
		<div class="project">
		    <h3 class="project-name"><?php the_title(); ?></h3>
		    <p class="project-description"><?php the_excerpt(); ?></p>
		    <?php the_post_thumbnail('thumbnail'); ?>
		</div>
		<?php endwhile; ?>
	</div>
<?php get_sidebar();
get_footer(); ?>