<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gurkhacuisine
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-lg-3">
    <div class="blog-right-sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div>
