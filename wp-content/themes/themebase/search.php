<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<?php if ( have_posts() ) : ?>

		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'themebase' ), get_search_query() ); ?></h1>

		<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>

	<?php else : get_template_part( 'content', 'none' );

	endif; ?>
<?php get_sidebar();
get_footer(); ?>