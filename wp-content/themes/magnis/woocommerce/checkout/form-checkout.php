<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">	
				<div class="main-content-block magnis-checkout">			
					<?php 

					wc_print_notices();

					do_action( 'woocommerce_before_checkout_form', $checkout );

					// If checkout registration is disabled and not logged in, the user cannot checkout
					if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
						echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
						return;
					}

					// filter hook for include new pages inside the payment method
					$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

					<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
						<div class="magnis-tabs" style="margin-top: 30px;">
							<header>
	                        	<p><?php _e( 'Billing address', 'woocommerce' ); ?></p>
								<p><?php _e( 'Shipping address', 'woocommerce' ); ?></p>
	                        	<p><?php _e( 'Review and payment', 'woocommerce' ); ?></p>
	                        </header>
							<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
								<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
									<div id="customer_details">
										<section><?php do_action( 'woocommerce_checkout_billing' ); ?></section>										
										<section><?php do_action( 'woocommerce_checkout_shipping' ); ?></section>								
									</div>
								<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>								
							<?php endif; ?>
							<section>
								<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
									<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
	   							<?php endif; ?>								
								<?php do_action( 'woocommerce_checkout_order_review' ); ?>
							</section>
						</div>
					</form>

					<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
				</div>
			</div>
			<div class="col-lg-3">
				
			</div>
		</div>
	</div>
</div>