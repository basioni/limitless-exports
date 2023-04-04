<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div class="shop-sidebar">
	<?php if ( is_active_sidebar( 'sidebar-shop' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-shop' ); ?>
	<?php endif; ?>
</div>	
