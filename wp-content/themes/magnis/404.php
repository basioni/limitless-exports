<?php
global $theme_option;
get_header(); ?>

  <div class="main-content homepage page404" style="<?php if($theme_option['bg_404']) { ?> background-image: url(<?php echo esc_url( $theme_option['bg_404']['url'] ); ?>)<?php } ?>">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="main-content-block magnis-404">
                  <span><?php _e('404', 'magnis'); ?></span>
                  <p><?php _e('We are sorry, but the page you are looking is not exist...', 'magnis'); ?></p>
                  <?php get_search_form(); ?>
                  <p><a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo _e('Back To Home', 'magnis'); ?></a></p>
                </div>
            </div>
          
          </div>
      </div>
  </div>

<?php get_footer(); ?>