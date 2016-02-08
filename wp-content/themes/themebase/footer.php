<?php
/**
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 */
?>
		<footer id="main-footer">

			<div class="site-info">

			</div><!-- .site-info -->
			<div class="site-partenaires clearfix">
				<h2>Nos partenaires</h2>
				<ul class="list-unstyled list-inline col-sm-12 no-padding text-center">
					<li class="col-sm-offset-1 col-sm-2 no-padding"><img src="<?php echo esc_url( home_url( '/wp-content/images/logo-natura-2000.original-150x150.jpg' ) ); ?>"></li>
					<li class="col-sm-2 no-padding"><img src="<?php echo esc_url( home_url( '/wp-content/images/logo-union-europeenne-2-150x150.jpg' ) ); ?>"></li>
					<li class="col-sm-2 no-padding"><img src="<?php echo esc_url( home_url( '/wp-content/images/MEDDE-150x150.jpg' ) ); ?>"></li>
					<li class="col-sm-2 no-padding"><img src="<?php echo esc_url( home_url( '/wp-content/images/region_logo-2.png' ) ); ?>"></li>
					<li class="col-sm-2 no-padding"><img src="<?php echo esc_url( home_url( '/wp-content/images/agence-eau-1-150x150.png' ) ); ?>"></li>
				</ul>
			</div>
			<nav id="footer-navigation" class="col-sm-12 no-padding">
				<?php wp_nav_menu( array( 'theme_location' => 'menufooter', 'menu_class' => 'nav-menu no-padding full-width' ) ); ?>
			</nav>
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