<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php global $theme_option; ?>
<head>
	<!-- Metas
	================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="<?php echo get_template_directory_uri();?>/assets/js/html5shiv.js"></script>
	  <script src="<?php echo get_template_directory_uri();?>/assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<?php if($theme_option['favicon']['url'] !=''){ ?>
		<link rel="icon" href="<?php echo esc_url( $theme_option['favicon']['url'] ); ?>" type="image/x-icon">  
	<?php } ?> 

<?php wp_head();?>	
</head>

<body <?php body_class(); ?>>
<?php if($theme_option['version_type'] == 'boxed' || is_page_template('page-templates/template-boxed.php')){ echo '<div class="magnis-boxed-wrapper"><div class="magnis-boxed-container"><div class="magnis-boxed-inner">';} ?>

	<?php 
		if(isset($theme_option['header_layout']) and $theme_option['header_layout']=="header2" ){
			get_template_part('framework/headers/header2');
		}elseif(isset($theme_option['header_layout']) and $theme_option['header_layout']=="header3" ){
			get_template_part('framework/headers/header3');	
		}else{ 
	?>

	<div class="container magnis-header">

		<div class="row">

			<div class="col-md-4 col-sm-4">

	        	<!-- site logo	//-->
	        	<a href="<?php echo esc_url(home_url('/')); ?>">
		        	<div class="site-logo <?php if($theme_option['logocheck'] == 1 ){ echo 'biglogo'; } ?>">
		        		<img src="<?php echo esc_url($theme_option['logo']['url']); ?>" alt="">
		        		<?php if($theme_option['site_name']!=''){ ?><?php echo htmlspecialchars_decode($theme_option['site_name']); ?><?php } ?>					
		        	</div>
	        	</a>
	            <!-- site description //-->

	            <?php if($theme_option['tagline']!=''){ ?><div class="site-desc"><?php echo htmlspecialchars_decode($theme_option['tagline']); ?></div><?php } ?>         
	        </div>

	        <div class="col-md-8 col-sm-8">

	        	<!-- header social buttons //-->

	        	<div class="header-social-buttons">

	        		<?php if($theme_option['facebook']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['facebook']); ?>"><i class="fa fa-facebook"></i></a>

					<?php } ?>

					<?php if($theme_option['google']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['google']); ?>"><i class="fa fa-google-plus"></i></a>

					<?php } ?>

					<?php if($theme_option['twitter']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['twitter']); ?>"><i class="fa fa-twitter"></i></a>

					<?php } ?>

					<?php if($theme_option['youtube']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['youtube']); ?>"><i class="fa fa-youtube"></i></a>

					<?php } ?>

					<?php if($theme_option['linkedin']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['linkedin']); ?>"><i class="fa fa-linkedin"></i></a>

					<?php } ?>

					<?php if($theme_option['dribbble']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['dribbble']); ?>"><i class="fa fa-dribbble"></i></a>

					<?php } ?>

					<?php if($theme_option['skype']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['skype']); ?>"><i class="fa fa-skype"></i></a>

					<?php } ?>	

					<?php if($theme_option['rssfeed']!=''){ ?>

					<a target="_blank" href="<?php echo esc_url($theme_option['rssfeed']); ?>"><i class="fa fa-rss"></i></a>

					<?php } ?>

	            </div>

	            <!-- header contacts //-->
	            <div class="header-contacts hidden-phone visible-tablet visible-desktop">
	            	<?php if($theme_option['top_info_phone'] !='') { ?><p><i class="fa fa-phone"></i><strong><?php echo esc_attr($theme_option['top_info_phone']); ?></strong></p><?php } ?>
	                <?php if($theme_option['top_info_email'] !='') { ?><p><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($theme_option['top_info_email']); ?>"><?php echo esc_attr( $theme_option['top_info_email'] ); ?></a></p><?php } ?>
	            </div>

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

	</div>

	<div class="gray-line"></div>	

  	<?php } ?>	  