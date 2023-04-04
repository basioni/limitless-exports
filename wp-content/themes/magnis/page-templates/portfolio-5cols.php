<?php
/*
 * Template Name: 5 Cols Portfolio
 * Description: A Page Template Blog.
 */
global $theme_option;
get_header(); ?>



  <div class="page-header pattern-bg" style="<?php if($theme_option['portfolio_bg']) { ?>background-image: url(<?php echo esc_url( $theme_option['portfolio_bg']['url'] ); ?>)<?php } ?>">

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

          <div class="col-md-12">

            

            <div class="main-content-block">

                <?php if($theme_option['portfolio_desc']) { ?>

                <div class="top-blog"><?php echo htmlspecialchars_decode($theme_option['portfolio_desc']); ?></div>



                <?php } ?>

                <div id="portfolio-list" class="portfolio-5-columns">

                

                    <!-- sorting filters //-->

                  <div class="sorting-filters">

                    <a href=""  class="active" data-filter="*"><?php _e('all', 'magnis') ?></a>

                  <?php 



                  $categories = get_terms('categories');



                   foreach( (array)$categories as $categorie){



                    $cat_name = $categorie->name;



                    $cat_slug = $categorie->slug;



                              $cat_count = $categorie->count;



                  ?>



                    <a href="" data-filter="<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a>



                  <?php } ?>



                  </div>



                  <?php 



                    $num = (!empty($theme_option['portfolio_show'])) ? $theme_option['portfolio_show'] : 10;



                    $args = array(   



                      'post_type' => 'portfolio',   



                      'posts_per_page' => $num,



                      'paged' => $paged,



                    );  



                    $wp_query = new WP_Query($args);



                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); 



                    $cates = get_the_terms(get_the_ID(),'categories');



                    $cate_name ='';



                    $cate_slug = '';



                        foreach((array)$cates as $cate){



                        if(count($cates)>0){



                          $cate_name .= '<a>'.$cate->name.'</a><span>, </span> ' ;



                          $cate_slug .= $cate->slug .' ';     



                        } 



                    }



                    ?>  



                    <div class="project-item sort-item <?php echo esc_attr($cate_slug); ?>">

                      <div class="project-details">

                        <p class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>

                        <p class="project-tags"><?php echo htmlspecialchars_decode($cate_name); ?></p>

                        <div class="buttons">

                          <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>

                          <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>

                        </div>

                      </div>

                      <?php $params = array( 'width' => 800, 'height' => 800 );

                      $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>

                      <img src="<?php echo esc_url($image);?>" alt="">

                    </div>



                    <?php endwhile;?>



                  



                  <div class="magnis-pagination paging-folio">



                    <?php



                      global $wp_query;



                      $big = 999999999;



                      echo paginate_links( array(



                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),



                        'format' => '?paged=%#%',



                        'current' => max( 1, get_query_var('paged') ),



                        'total' => $wp_query->max_num_pages,

                        'prev_text'    => __('Prev', 'magnis'),

                        'next_text'    => __('Next', 'magnis'),

                        'type' => 'list',

                      ) );



                      ?>



                  </div>

                </div>

            </div>    

        </div>

      </div>  

    </div>

  </div>



<?php get_footer(); ?>