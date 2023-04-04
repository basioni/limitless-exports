<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
$classes[] = 'col-md-4 col-sm-4';
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<div <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<!-- product item //-->
	<div class="magnis-product-item">
    	<figure>
        	<div class="magnis-product-item-hover">
            	<a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"><i class="fa fa-search"></i></a>
                <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
            </div>
        	<a href="<?php the_permalink(); ?>">
		        <?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
			</a>
    	</figure>
        <div class="product-desc">
        	<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        	<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			<?php
				$handler = apply_filters( 'woocommerce_add_to_cart_handler', $product->product_type, $product );
				switch ( $handler ) {
				case "variable" :
					$add_cart = get_permalink();
				break;
				case "grouped" :
					$add_cart = get_permalink();
				break;
				case "external" :
					 $add_cart = get_permalink();
				break;
				default :
					if ( $product->is_purchasable() ) {
						 $add_cart = esc_url( $product->add_to_cart_url() );
					} else {
						 $add_cart = get_permalink();
					}
				break;
			}
			?>            
            <p><a href="<?php echo $add_cart; ?>" rel="nofollow" data-product_id="<?php the_ID(); ?>" data-product_sku="<?php echo $product->get_sku(); ?>" class="button button-color add_to_cart_button product_type_<?php echo $product->product_type; ?>"><i class="fa fa-shopping-cart"></i> <?php echo esc_html( $product->add_to_cart_text() ); ?></a> <a href="<?php the_permalink(); ?>" class="button button-dark" ><i class="fa fa-align-justify"></i> <?php _e('details', 'magnis'); ?></a></p>
        </div>
    </div>

	<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>

</div>