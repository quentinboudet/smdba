<?php
/**
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 */
?>

		</div><!-- #main -->
		<footer id="main-footer">

			<div class="site-info">
				<?php //do_action( 'twentythirteen_credits' ); ?>
				<a href="<?php //echo ; ?>"</a>
			</div><!-- .site-info -->
		</footer>
	</div><!-- #container -->

	<?php 
	//wp_enqueue_script( 'jquery-ui-core', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js', array( 'jquery' ), '1.8', true);
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js', array(), '1.7' );
	wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js', array(), '1.7' );


	wp_enqueue_script( 'mon-slider', get_bloginfo('stylesheet_directory').'/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'mon-slider', get_bloginfo('stylesheet_directory').'/js/monscript.js', array( 'jquery' ), null, true );

	wp_footer(); ?>
</body>
</html>