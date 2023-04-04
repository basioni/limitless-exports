<?php
/*
 * Template Name: Coming Soon
 * Description: A Page Template.
 */
?>
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
  <!-- Page Title 
  ================================================== -->
  <title><?php wp_title( '|', true, 'right' ); ?></title>
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

<div class="main-content main-content-soon" style="<?php if($theme_option['cs_bg']) { ?>background-image: url(<?php echo esc_url( $theme_option['cs_bg']['url'] ); ?>)<?php } ?>">
  <div class="container">
      <div class="row">
        
        <div class="col-md-12">
          <div class="">
            <?php if($theme_option['cs_title']) { ?><h1><?php echo htmlspecialchars_decode($theme_option['cs_title']); ?></h1><?php } ?>
            <div class="main-content-block-entry">
               <?php if($theme_option['cs_title']) { ?><p><?php echo htmlspecialchars_decode($theme_option['cs_stitle']); ?></p><?php } ?>
                          
              <!-- counter //-->
              <div class="counter">
                <div class="riva-countdown" id="riva-countdown">
                  <!--
                  * Days
                  //-->
                  <div class="riva-countdown-item" id="riva-countdown-days">
                    <div class="value"><p>0</p></div>
                    <div class="label"><?php _e('days', 'magnis') ?></div>
                  </div>
                  <!--
                  * Hours
                  //-->
                  <div class="riva-countdown-item" id="riva-countdown-hours">
                    <div class="value"><p>0</p></div>
                    <div class="label"><?php _e('hours', 'magnis') ?></div>
                  </div>
                  <!--
                  * Minutes
                  //-->
                  <div class="riva-countdown-item" id="riva-countdown-minutes">
                    <div class="value"><p>0</p></div>
                    <div class="label"><?php _e('minutes', 'magnis') ?></div>
                  </div>
                  <!--
                  * seconds
                  //-->
                  <div class="riva-countdown-item" id="riva-countdown-seconds">
                    <div class="value"><p>0</p></div>
                    <div class="label"><?php _e('seconds', 'magnis') ?></div>
                  </div>
                </div>
              </div>    

              <script type="text/javascript">
              (function($) {

              "use strict";
                    $('#riva-countdown').rivaCountdown({
                      year : <?php echo esc_attr( $theme_option['cs_year'] ); ?>,
                      month : <?php echo esc_attr( $theme_option['cs_month'] ); ?>,
                      date : <?php echo esc_attr( $theme_option['cs_day'] ); ?>,
                      hour : 0,
                      minute : 0,
                      second : 0,
                    });
              })(jQuery);  
              </script>
              
              <?php if($theme_option['cs_title']) { ?><p><?php echo htmlspecialchars_decode($theme_option['cs_letter']); ?></p><?php } ?>
              <?php if($theme_option['letter_show'] == '1') { ?>
              <div class="newsletters-2">
                <div class="quick-letter">
                  <?php dynamic_sidebar( 'news-letter' ); ?>  
                </div>   
              </div>
              <?php } ?>
            </div>
          </div>
        
        </div>
      </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>