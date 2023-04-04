<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="main-content">
	<div class="container">

<?php
wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>
<div class="row">
<div class="col-md-12">
<div class="main-content-block magnis-shopping-cart-details">
<?php global $woocommerce; ?>
<p class="title"><i class="fa fa-shopping-cart"></i> <?php _e('You have', 'magnis') ?> <?php echo sprintf(_n('<span>%d</span> item in your cart', '<span>%d</span> items in your cart', $woocommerce->cart->cart_contents_count, 'woocommerce'), $woocommerce->cart->cart_contents_count);?>.</p>
<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>
<div class="magnis-shopping-cart-details-table-wrapper">
<table class="magnis-shopping-cart-details-table" cellspacing="0">
	<thead>
		<tr>			
			<td class="td1"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<td class="td2"><?php _e( 'Price', 'woocommerce' ); ?></th>
			<td class="td3"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<td class="td4"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td>
						<div class="product-details">
                            <figure>
	                            <?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $_product->is_visible() )
										echo $thumbnail;
									else
										printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
								?>
							</figure>
							<div class="product-info cart_page">	
								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">x</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
								?>
								<?php
									if ( ! $_product->is_visible() )
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
									else
										echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="title" href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

									// Meta data
									echo WC()->cart->get_item_data( $cart_item );

									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
										echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
								?>	                            
																
							</div>
						</div>
						
					</td>

					<td>
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>

					<td>
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
						?>
					</td>

					<td>
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="4" class="actions bottom-cart">

				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon fleft">

						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button button-dark" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

						<?php do_action('woocommerce_cart_coupon'); ?>

					</div>
				<?php } ?>

				<div class="fright">
					<input type="submit" class="button button-dark" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" /> 

					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</div>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
</div>
<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>
</div>
</div><!-- .col-md-12 -->
</div><!-- .row -->

<div class="cart-collaterals row">
	<?php //do_action( 'woocommerce_cart_collaterals' ); ?>
	<div class="col-md-6"><div class="main-content-block"><?php woocommerce_shipping_calculator(); ?></div></div>
	<div class="col-md-6"><div class="main-content-block"><?php woocommerce_cart_totals(); ?></div></div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
</div><!-- .container -->
</div><!-- .main-content -->
