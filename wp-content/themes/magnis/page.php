<?php
/**
 * The template for displaying all pages
 */
global $theme_option;
global $wp_query;
$thumbnail = get_post_meta(get_the_ID(),'_cmb_image_thumbnail', true);
$page_layout = get_post_meta(get_the_ID(),'_cmb_page_layout', true);
get_header(); ?>
	<div class="page-header pattern-bg" style="<?php if($thumbnail) { ?>background-image: url(<?php echo esc_url($thumbnail); ?>)<?php } ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="col-md-6 col-sm-6">
              <?php magnis_breadcrumbs(); ?>
            </div>
          </div>
      </div>
  </div>

  <div class="main-content">
  <div class="container">
    <div class="row">    
      <?php if($page_layout == "no_sidebar"){ ?>
        <div class="col-md-12">
            <div class="main-content-block page-content">
              <?php while (have_posts()) : the_post()?>
              <?php the_content(); ?>
              <?php wp_link_pages(); ?>
              <?php endwhile; ?>
            </div>
        </div>
      <?php }elseif($page_layout == "left_sidebar"){ ?>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
        <div class="col-md-9">
          <div class="main-content-block page-content">
            <?php while (have_posts()) : the_post()?>

              <?php the_content(); ?>

              <?php wp_link_pages(); ?>

            <?php endwhile; ?>
          </div>
        </div>
      
      <?php }else{ ?>
        
        <div class="col-md-9">
          <div class="main-content-block page-content">
            <?php while (have_posts()) : the_post()?>

              <?php the_content(); ?>

              <?php wp_link_pages(); ?>

            <?php endwhile; ?>
          </div>
        </div>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>