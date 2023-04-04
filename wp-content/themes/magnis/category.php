<?php
global $theme_option;
get_header(); ?>



  <div class="page-header pattern-bg" style="<?php if($theme_option['blog_img']) { ?>background-image: url(<?php echo esc_url( $theme_option['blog_img']['url'] ); ?>)<?php } ?>">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6">

              <h2><?php printf( __( 'Category: <span>%s</span>', 'magnis' ), single_cat_title( '', false ) ); ?></h2>

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

            <h3><?php _e('posts under', 'magnis'); ?> <span><?php printf( '%s', single_cat_title( '', false ) ); ?></span> <?php _e('category', 'magnis'); ?></h3>
            
            <div class="main-content-block-entry">

              <?php
                // Show an optional term description.
                $term_description = term_description();
                if ( ! empty( $term_description ) ) :
                  printf( '<div class="cat_desc">%s</div>', $term_description );
                endif;
              ?>

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