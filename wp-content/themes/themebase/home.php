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

	global $wpdb;
get_header(); ?>
	<div id="home_slider">
		<div class="vague"></div>
		<ul class="slider_image">
			<?php $u_slider = $wpdb->get_results("SELECT * FROM slider ORDER BY id");
			foreach ($u_slider as $row) {
				$id = $row->id;?>
			<li>
				<img src="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $row->img;?>" alt="">
				<div class="slider_texte">
					<?php 
					if($row->titre != "") echo "<h4>".$row->titre."</h4><br>";
					if($row->texte != "") echo "<p>".$row->texte."</p>";
					?>
				</div>
			</li>
			<?php }	?>
		</ul>
		<ul class="slider_bouton">
			<?php $u_slider = $wpdb->get_results("SELECT * FROM slider ORDER BY id");
			$n=0;
			foreach ($u_slider as $row) {
				$id = $row->id;
				if($n == 0){
					echo '<li class="active"></li>';
					$n = 1;
				}
				else echo '<li></li>';?>
			<?php }	?>
		</ul>
	</div>
	<div class="slider_image">
			<?php $u_edito = $wpdb->get_results("SELECT * FROM edito ORDER BY id");
			foreach ($u_edito as $row) {
				$id = $row->id;?>
				<div class="slider_texte">
					<?php 
					if($row->texte != "") echo "<p>".$row->texte."</p>";
					?>
				</div>
			<?php }	?>
	</div>
	
<?php
get_sidebar();

wp_reset_postdata();
query_posts('posts_per_page=5&post_type=post');?>

<h2 class="actualites">Actualités</h2>

<?php if (have_posts()) {while (have_posts()) { the_post_thumbnail(); the_post(); ?>
    <article class="post clearfix">
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
         <div class="post-content col-sm-offset-3">
            <?php the_content(); ?>
        </div>

        <hr>
  <?php }?>
    </article>

<?php } 
} 
wp_reset_postdata();
query_posts('posts_per_page=5&post_type=post&category_name=debats'); // rajouter category name pour spécifier la catégorie en question

  echo "<h2 class=\"actualites\">Débats</h2>";
  if (have_posts()) {while (have_posts()) { the_post_thumbnail(); the_post(); ?>
    <article class="post clearfix">
        <header>
            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </header>
        <aside class="post-info">
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </aside>
        <div class="post-content col-sm-offset-3">
            <?php the_content(); ?>
        </div>

        <hr>

    </article>
<?php }
} 

get_footer(); ?>
