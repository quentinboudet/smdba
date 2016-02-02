<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<div id="archives">
	<?php if ( have_posts() ) : ?>

		<h1 class="archive-title"><?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'themebase' ), get_the_date() );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'themebase' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'themebase' ) ) );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'themebase' ), get_the_date( _x( 'Y', 'yearly archives date format', 'themebase' ) ) );
			else :
				_e( 'Archives', 'themebase' );
			endif;
		?></h1>

  		<?php query_posts('posts_per_page=20');
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>

	<?php else : get_template_part( 'content', 'none' );
	
	endif; ?>
	</div><!--  #archives -->
<?php get_sidebar();
get_footer(); ?>