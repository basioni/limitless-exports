<?php global $theme_option; ?>    
<!-- header start //-->
<div class="container magnis-header">	
<div class="row">		
<div class="col-md-12">        	
<!-- site logo	//-->        	
<a href="<?php echo esc_url(home_url('/')); ?>">	        	
<div class="site-logo site-logo-3 <?php if($theme_option['logocheck'] == 1 ) echo 'biglogo';?>"><img src="<?php echo esc_url($theme_option['logo']['url']); ?>" alt="">	        		
<?php if($theme_option['site_name']!=''){ ?><?php echo htmlspecialchars_decode($theme_option['site_name']); ?><?php } ?>						        	</div>	        </a>             <!-- header contacts //-->            <div class="header-contacts header-contacts-3 hidden-phone visible-tablet visible-desktop">            	
<?php if($theme_option['top_info_phone'] != '') { ?><p><i class="fa fa-phone"></i><strong><?php echo esc_attr($theme_option['top_info_phone']); ?></strong></p><?php } ?>	                
<?php if($theme_option['top_info_email']!='') { ?><p><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($theme_option['top_info_email']); ?>"><?php echo esc_attr( $theme_option['top_info_email'] ); ?></a></p><?php } ?>            </div>           <div class="header-sub-wrapper header-sub-wrapper-3">                <!-- header social buttons //-->                <div class="header-social-buttons header-social-buttons-3">                    
<?php if($theme_option['facebook']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['facebook']); ?>"><i class="fa fa-facebook"></i></a>					<?php } ?>					
<?php if($theme_option['google']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['google']); ?>"><i class="fa fa-google-plus"></i></a>					<?php } ?>					
<?php if($theme_option['twitter']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['twitter']); ?>"><i class="fa fa-twitter"></i></a>					<?php } ?>					
<?php if($theme_option['youtube']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['youtube']); ?>"><i class="fa fa-youtube"></i></a>					<?php } ?>					
<?php if($theme_option['linkedin']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['linkedin']); ?>"><i class="fa fa-linkedin"></i></a>					<?php } ?>					
<?php if($theme_option['dribbble']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['dribbble']); ?>"><i class="fa fa-dribbble"></i></a>					<?php } ?>					
<?php if($theme_option['skype']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['skype']); ?>"><i class="fa fa-skype"></i></a>					<?php } ?>						
<?php if($theme_option['rssfeed']!=''){ ?>					<a target="_blank" href="<?php echo esc_url($theme_option['rssfeed']); ?>"><i class="fa fa-rss"></i></a>					<?php } ?>										
<?php if (class_exists('Woocommerce')) { ?>					<?php global $woocommerce; ?>					<a href="<?php echo WC()->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>															<?php } ?>                </div>                
<!-- header search //-->                
<div class="header-search">					
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">						
<i class="fa fa-search"></i>						
<input type="text" value="" name="s" id="s" placeholder="<?php echo esc_attr__( 'type and search...', 'magnis' ) ?>" />						
<input type="submit" class="search_btn" value="<?php echo esc_attr__( 'Search', 'magnis' ) ?>" /> 
<input type="hidden" value="post" name="post_type" id="post_type" />						
</form>                	                
</div>            
</div>        
</div>    
</div></div>
<div class="site-menu-3-wrapper">	
<div class="container">    	
<div class="row">        	
<div class="col-md-12">            
<!-- site desktop menu start //-->            
<nav class="site-desktop-menu">            	
<?php					 
		$primarymenu = array(							
			'theme_location'  => 'primary',							
			'menu'            => '',							
			'container'       => '',							
			'container_class' => '',							
			'container_id'    => '',							
			'menu_class'      => '',							
			'menu_id'         => '',							
			'echo'            => true,							
			'fallback_cb'     => 'wp_page_menu',							
			'before'          => '',							
			'after'           => '',							
			'link_before'     => '',							
			'link_after'      => '',							
			'items_wrap'      => '<ul>%3$s</ul>',							
			'depth'           => 0,							
			'walker'          => ''						
		);						
		if ( has_nav_menu( 'primary' ) ) {							
			wp_nav_menu( $primarymenu );						
		}					
		?>	
</nav>            
<!-- site desktop menu end //-->            
<!-- site desktop menu start //-->            
<nav class="site-mobile-menu">            	
<i class="fa fa-bars"></i>            	
<?php					 
	$primarymenu = array(							
	'theme_location'  => 'primary',							
	'menu'            => '',							
	'container'       => '',							
	'container_class' => '',							
	'container_id'    => '',							
	'menu_class'      => '',							
	'menu_id'         => '',							
	'echo'            => true,							
	'fallback_cb'     => 'wp_page_menu',							
	'before'          => '',							
	'after'           => '',							
	'link_before'     => '',							
	'link_after'      => '',							
	'items_wrap'      => '<ul>%3$s</ul>',							
	'depth'           => 0,							
	'walker'          => ''						
	);						
	if ( has_nav_menu( 'primary' ) ) {							
		wp_nav_menu( $primarymenu );						
	}					
?>			
</nav>            
<!-- site desktop menu end //-->			
</div>		
</div>	
</div></div><div class="gray-line gray-line-3"></div><!-- header end //-->