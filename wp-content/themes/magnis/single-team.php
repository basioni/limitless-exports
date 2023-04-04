<?php
/*
 * Single team
 */
get_header(); ?>
<div class="envor-content">
      <!--
      Page Title start
      //-->
      <section class="envor-page-title-1" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo esc_url( $theme_option['portfolio_bg']['url'] ); ?>')">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      <!--
      Page Title end
      //-->
      </section>
      <!--
      Desktop breadscrubs start
      //-->
      <section class="envor-desktop-breadscrubs">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="envor-desktop-breadscrubs-inner">
                <?php envor_breadcrumbs(); ?>
              </div>
            </div>
          </div>
        </div>
      <!--
      Desktop breadscrubs end
      //-->
      </section>
      <!--
      Mobile breadscrubs start
      //-->
      <section class="envor-mobile-breadscrubs">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <?php envor_breadcrumbs(); ?>
            </div>
          </div>
        </div>
      <!--
      Mobile breadscrubs end
      //-->
      </section>
<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>

	<?php }else {
		_e('Page Canvas For Page Builder', 'magnis'); 
	}?>
</div>
<?php get_footer(); ?>