<?php
/**
 * @package WordPress
 * @subpackage Theme_Base
 * @since Theme Base 1.0
 */
?>

<form method="get" id="form" action="<?php bloginfo('url'); ?>/">
  <input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
  <input type="submit" id="submit">
</form>

