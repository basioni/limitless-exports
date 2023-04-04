<?php

/**
 * The template for displaying the footer
 */
global $theme_option; ?>



<footer class="site-footer" style="background-color: <?php echo esc_attr($theme_option['footer_bg']); ?>; color: <?php echo esc_attr($theme_option['footer_color']); ?>;">

	<div class="container">

    	<div class="row">

    		<div class="footer-widget">

            <?php get_sidebar('footer'); ?>

            </div>

        </div>

    </div>

</footer>



<div class="bottom-line" style="background-color: <?php echo esc_attr($theme_option['botfooter_bg']); ?>; color: <?php echo esc_attr($theme_option['footer_color']); ?>;">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<?php if($theme_option['footer_text']!=''){ ?>
					<p>
						<?php echo htmlspecialchars_decode( $theme_option['footer_text'] ); ?>
					</p>
				<?php } ?> 
            </div>

        	<div class="col-md-6">
            	<div class="bottom-menu">
            		<?php
					 $secondary = array(
							'theme_location'  => 'secondary',
							'menu'            => '',
							'container'       => 'div',
							'container_class' => 'footer-menu',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '<span> /</span>',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						);

						if ( has_nav_menu( 'secondary' ) ) {
							wp_nav_menu( $secondary );
						}

					?>

            	</div>

            </div>

        </div>

    </div>

</div>

<div id="to-the-top"><i class="fa fa-angle-up"></i></div>

<?php if($theme_option['version_type'] == 'boxed' || is_page_template('page-templates/template-boxed.php')){ echo '</div></div></div>';} ?>

<?php wp_footer(); ?>
</body>
</html>