<?php
/**
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : 
	wp_reset_postdata();?>
	<div class="sidebar" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- .widget-area -->
	</div><!-- .sidebar  -->
<?php endif; ?>