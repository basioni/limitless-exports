<?php

$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));

if ( file_exists( $root.'/wp-load.php' ) ) {

    require_once( $root.'/wp-load.php' );

} elseif ( file_exists( $root.'/wp-config.php' ) ) {

    require_once( $root.'/wp-config.php' );

}

header("Content-type: text/css; charset=utf-8");

function hex2rgb($hex) {

   $hex = str_replace("#", "", $hex);



   if(strlen($hex) == 3) {

      $r = hexdec(substr($hex,0,1).substr($hex,0,1));

      $g = hexdec(substr($hex,1,1).substr($hex,1,1));

      $b = hexdec(substr($hex,2,1).substr($hex,2,1));

   } else {

      $r = hexdec(substr($hex,0,2));

      $g = hexdec(substr($hex,2,2));

      $b = hexdec(substr($hex,4,2));

   }

   $rgb = array($r, $g, $b);

   //return implode(",", $rgb); // returns the rgb values separated by commas

   return $rgb; // returns an array with the rgb values

}



global $theme_option; 



$b=$theme_option['main_color'];

$rgba = hex2rgb($b);  





?>

/*	################################################################
	14. COLOR SCHEMES
################################################################# */

/*********************************************
Main Color
*********************************************/
.magnis-boxed-wrapper {
  background-image: url(<?php echo esc_url( $theme_option['boxed_bg']['url'] ); ?>);
}

/**** Custom Css Menu ****/
nav.site-desktop-menu > ul > li.current-menu-item > a, 
nav.site-desktop-menu > ul > li.current-menu-ancestor > a {
  border-bottom: 3px solid <?php echo esc_attr( $theme_option['main_color'] ); ?>;
  color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}

nav.site-desktop-menu ul ul.sub-menu li.current-menu-item a {
  background-color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}


.riva-countdown .riva-countdown-item .label, .newsletter input.newsletter-submit, 
.header-social-buttons a i:hover, nav.site-mobile-menu li.hovered, 
nav.site-desktop-menu > ul > li li.hovered, .button-color, .latest-projects-intro, 
.newsletters-1, .latest-blog-posts .jcarousel-skin-tango .jcarousel-item-horizontal .latest-blog-post-img .latest-blog-post-date, 
.magnis-skills section .skill-value .skill-value-chart, .team-member .soc-buttons, 
.pr-table-1 header p.head, .pr-table-2 header p.featured, .sidebar-posts-item .date, 
.post-item .date, .add-comment-form p input[type=submit], .main-content-soon-color, 
.home-3-features-item i.hover, .feature i.hover, form.magnis-product-item-review p button,
.single-project-slides .jcarousel-skin-tango .jcarousel-next-horizontal, .single-project-slides .jcarousel-skin-tango .jcarousel-prev-horizontal,
.latest-projects .latest-projects-wrapper .jcarousel-skin-tango .jcarousel-next-horizontal, .latest-projects .latest-projects-wrapper .jcarousel-skin-tango .jcarousel-prev-horizontal {
	background-color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}

.tweet-item .fa, .page-header h2 span, .breadcrumb>li+li:before, a:hover, 
.header-contacts p i, .purchase p.big b, .purchase-2 p.big b, .main-content h2 b, 
.intro p.sign, .feature i, .testimonials-1 .jcarousel-skin-tango .jcarousel-item-horizontal div span, 
.testimonials-1 .jcarousel-skin-tango .jcarousel-item-horizontal div i, 
.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal .project-details .buttons i, 
.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal .project-details p.project-tags i, 
.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal .project-details p a:hover, 
.footer-latest-tweets .jcarousel-skin-tango .jcarousel-item-horizontal p.username i, .footer-widget a, 
.footer-latest-tweets .jcarousel-skin-tango .jcarousel-prev-horizontal, .footer-latest-tweets .jcarousel-skin-tango .jcarousel-next-horizontal, 
.bottom-line a, .footer-latest-tweets .jcarousel-skin-tango .jcarousel-next-horizontal i,  
.footer-latest-tweets .jcarousel-skin-tango .jcarousel-prev-horizontal i, .page-header p i, 
.magnis-toggle section.active header, ul.ul-style-1 li i, .offer-item i, .ul-style-2 li i, 
.sorting-filters a.active, .quick-info-item i, .pr-table-1 header p.price span, .pr-table-1 section ul li strong, 
.pr-table-2 header p.featured, .pr-table-3 td i.fa-check-circle, .pr-table-3 td strong, .pr-table-3 .options i, 
.sidebar .widget_categories ul li i, .project-item .project-details .buttons i, a.button-border:hover, 
.single-project-details p span, .main-content h3 span, .contact-info p i, ul li i.fa, .list-style-4 li i, 
.home-3-features i, .buy-now-block h3 b, .testimonials-2 ul li > i, .testimonials-2 .jcarousel-skin-tango .jcarousel-item-horizontal p span, 
.magnis-shop-sorting li i, .magnis-product-item .product-desc p.price, .magnis-product-item-hover a, 
.magnis-shopping-cart p span, .magnis-product-item-single-desc .price > span, .customers-reviews-list h3 span, 
.magnis-shopping-cart-details p.title i, .magnis-shopping-cart-details p.title span, 
.magnis-shopping-cart-details-table .product-total, .magnis-cart-totals tr.total td.td2, 
.magnis-tabs header p.active, .magnis-product-total tbody tr.sec2 td.td2, .home-slider .block-2 {

	color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;

}


.feature i, .latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal .project-details, 
.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal .project-details .buttons i, 
.footer-latest-tweets .jcarousel-skin-tango .jcarousel-prev-horizontal, 
.footer-latest-tweets .jcarousel-skin-tango .jcarousel-next-horizontal, .magnis-skills section .skill-value, 
.offer-item i, .magnis-tabs header p.active, .quick-info-item i, .sidebar-search-active, .project-item .project-details, 
.project-item .project-details .buttons i, a.button-border:hover, .add-comment-form-active, .home-3-features i, 
.header-search-focused, .magnis-product-item-hover, .magnis-product-item-hover a, .magnis-shipping .focused, 
.magnis-promo .focused, .magnis-checkout-block .focused, .main-content blockquote,
body, nav.site-desktop-menu > ul > li > ul, nav.site-mobile-menu > ul, .magnis-toggle section.active, 
.magnis-product-item figure.hovered, .magin-payment-option p.desc, nav.site-desktop-menu > ul > li ul ul,
nav.site-desktop-menu > ul > li a:hover, .sorting-filters a.active, .pr-table-3 thead th, 
.single-project-details p, .magnis-shopping-cart-details thead, .magnis-404 .focused {

	border-color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;

}

.add-comment-form .add-comment-form-active, form.magnis-product-item-review p input.focused, form.magnis-product-item-review p textarea.focused {
	border: 1px solid <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}


/*********************************************



	Overlay Color



*********************************************/



.main-content-soon-color {
	background-color: rgba(<?php echo esc_attr( $rgba[0] ); ?>, <?php echo esc_attr( $rgba[1] ); ?>, <?php echo esc_attr( $rgba[2] ); ?>, 0.7);
}



/*********************************************
	Placeholder
*********************************************/



::-webkit-input-placeholder {

   color: #ccc;

}



:-moz-placeholder { /* Firefox 18- */

   color: #ccc;

}



::-moz-placeholder {  /* Firefox 19+ */

   color: #ccc;

}



:-ms-input-placeholder {  

   color: #ccc;

}

.footer-about-logo{
	background-image: url(<?php echo esc_url( $theme_option['logo']['url'] ); ?>);
}




/*********************************************



   Shop Color



*********************************************/

.woocommerce .star-rating span, .woocommerce-page .star-rating span
{
  color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}        

.woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, 
.woocommerce #content div.product p.price, .woocommerce-page div.product span.price, 
.woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, 
.woocommerce-page #content div.product p.price {
  color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}    

.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, 
.woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, 
.woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button,
.woocommerce .woocommerce-message a.button:hover, .magnis-product-item .product-desc a.added_to_cart
 {
  background: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}

.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, 
.woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, 
.woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, 
.woocommerce-page #content input.button.alt {
  background: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
  border-color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;
}
.woocommerce .quantity .plus, .woocommerce .quantity .minus, .woocommerce #content .quantity .plus, 
.woocommerce #content .quantity .minus, .woocommerce-page .quantity .plus, .woocommerce-page .quantity .minus, 
.woocommerce-page #content .quantity .plus, .woocommerce-page #content .quantity .minus {
	background: #333333;
}
.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, 
.woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, 
.woocommerce-page button.button:hover, .woocommerce-page input.button:hover, 
.woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover, 
.woocommerce .woocommerce-message a.button {background: <?php echo esc_attr( $theme_option['main_color'] ); ?>;}

.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, 
.woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, 
.woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, 
.woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover {background: <?php echo esc_attr( $theme_option['main_color'] ); ?>;text-shadow: 0 0px 0 rgba(255, 255, 255, 0.8);}
.woocommerce .quantity .plus:hover, .woocommerce .quantity .minus:hover, .woocommerce #content .quantity .plus:hover, 
.woocommerce #content .quantity .minus:hover, .woocommerce-page .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, 
.woocommerce-page #content .quantity .plus:hover, .woocommerce-page #content .quantity .minus:hover {background: <?php echo esc_attr( $theme_option['main_color'] ); ?>;}
.woocommerce .woocommerce-message, .woocommerce-page .woocommerce-message {border-top: 3px solid <?php echo esc_attr( $theme_option['main_color'] ); ?>;}
.woocommerce .woocommerce-message:before, .woocommerce-page .woocommerce-message:before {background-color: <?php echo esc_attr( $theme_option['main_color'] ); ?>;}
input:focus, input:active, textarea:focus, textarea:active {border: 1px solid <?php echo esc_attr( $theme_option['main_color'] ); ?>;}
.woocommerce a.button.button-dark, .woocommerce button.button.button-dark, .woocommerce input.button-dark {background-color: #333;color: #fff;}