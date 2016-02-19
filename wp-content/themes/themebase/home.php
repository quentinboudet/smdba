<?php
/**
 * The home page
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

get_header(); 
	
get_sidebar();

wp_reset_postdata();
query_posts('posts_per_page=5&post_type=post');?>

<?php if (have_posts()) {while (have_posts()) { the_post_thumbnail(); the_post(); ?>
    <article class="post">
        <header>
            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </header>
        <aside class="post-info">
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </aside>
        <?php if (has_post_thumbnail()) { ?>
       <?php the_post_thumbnail(); ?>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <?php } else { ?>
         <div class="post-content col-sm-offset-1">
            <?php the_content(); ?>
        </div>
  <?php }?>
    </article>

<?php } ?>
<?php } ?>

<?php get_footer(); ?>