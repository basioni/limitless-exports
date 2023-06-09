<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
	
	<!-- page header start //-->
	<div class="page-header pattern-bg" style="<?php if($theme_option['shop_bg']) { ?>background-image: url(<?php echo esc_url( $theme_option['shop_bg']['url'] ); ?>)<?php } ?>">
		<div class="container">
	    	<div class="row">
	        	<div class="col-md-6 col-sm-6">
	            	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h2><?php woocommerce_page_title(); ?></h2>
					<?php endif; ?>
	            </div>
	            <div class="col-md-6 col-sm-6">
	            	<?php do_action('breadcrumb_before_main_content') ?>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- page header end //-->


	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<div class="col-lg-9">	
		
            <?php do_action( 'woocommerce_archive_description' ); ?>            

            <div class="main-content-block magnis-shop">                      	
				<?php if ( have_posts() ) : ?>
					<div class="magnis-shop-sorting">
						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>
					</div>	
					<div class="clearfix"></div>				

					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>				
			</div>
		</div>
		
		<div class="col-lg-3">
			<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
		</div>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>