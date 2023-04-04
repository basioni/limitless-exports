<?php
global $theme_option;
get_header(); ?>



  <div class="page-header pattern-bg" style="<?php if($theme_option['blog_img']) { ?>background-image: url(<?php echo esc_url( $theme_option['blog_img']['url'] ); ?>)<?php } ?>">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6">

              <h2><?php echo esc_attr($theme_option['blog_title']); ?></h2>

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

              <?php if($theme_option['blog_desc']) { ?>

              <div class="top-blog"><?php echo htmlspecialchars_decode(esc_attr($theme_option['blog_desc'])); ?></div>



              <?php }



                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;



                $args = array(



                'post_type' => 'post',



                'paged' => $paged,



                );



                $query = new WP_Query($args);



                if($query->have_posts()) : ?>



              <?php while($query->have_posts()) : $query->the_post(); ?>  



              <?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>



              <?php endwhile;?> 



              <?php else: ?>



                <h1><?php esc_html_e('Nothing Found Here!', 'magnis'); ?></h1>



              <?php endif; ?>

              <div class="magnis-pagination">

                <?php

                $big = 999999999;

                echo paginate_links( array(

                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

                  'format' => '?paged=%#%',

                  'current' => max( 1, get_query_var('paged') ),

                  'total' => $query->max_num_pages,

                  'prev_text'    => __('Prev', 'magnis'),

                  'next_text'    => __('Next', 'magnis'),

                  'type' => 'list',

                ) );

                ?>

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