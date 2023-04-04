<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs magnis-tabs">
		<header>
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<p><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></p>

			<?php endforeach; ?>
		</header>
		<?php foreach ( $tabs as $key => $tab ) : ?>

		<section>
			<?php call_user_func( $tab['callback'], $key, $tab ) ?>
		</section>

		<?php endforeach; ?>
	</div>

<?php endif; ?>