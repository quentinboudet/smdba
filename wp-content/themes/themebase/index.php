<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>

	<?php else : get_template_part( 'content', 'none' );

	endif; ?>
<?php get_sidebar();
get_footer(); ?>