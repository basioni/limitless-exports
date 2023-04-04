<?php
global $theme_option;
get_header(); ?>



  <div class="page-header pattern-bg" style="<?php if($theme_option['blog_img']) { ?>background-image: url(<?php echo esc_url( $theme_option['blog_img']['url'] ); ?>)<?php } ?>">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6">

              <h2><?php printf( __( 'Search Results for: <span>%s</span>', 'magnis' ), get_search_query() ); ?></h2>

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

        

        <!-- blog entries start //-->

        <div class="col-md-9">

          <div class="main-content-block">

            

            <div class="main-content-block-entry">



              <?php if(have_posts()) : ?>



              <?php while(have_posts()) : the_post(); ?>  



              <?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>



              <?php endwhile;?> 



              <?php else: ?>



                <h1><?php esc_html_e('Nothing Found Here!', 'magnis'); ?></h1>



              <?php endif; ?>

              <div class="magnis-pagination">

                <?php magnis_numeric_posts_nav(); ?>

              </div>

            

            </div>

          </div>

        </div>  

        <div class="col-md-3">



          <?php get_sidebar()?>



        </div>



      </div>

    </div>

  </div>



<?php get_footer(); ?>