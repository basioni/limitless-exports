<?php

/**

 * The Template for displaying all single posts

 */

global $theme_option;

get_header(); ?>



  <div class="page-header pattern-bg" style="<?php if($theme_option['blog_img']) { ?>background-image: url(<?php echo esc_url( $theme_option['blog_img']['url'] ); ?>)<?php } ?>">

    <div class="container">

        <div class="row">

            <div class="col-md-3">

              <h2><?php echo esc_attr($theme_option['single_title']); ?></h2>

            </div>

            <div class="col-md-9">

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

          <?php while(have_posts()) : the_post(); ?>  

          <div class="main-content-block">

            <div class="post-item post-item-single page-content">

              <?php 

                $format = get_post_format();

                $icon = '';

                $id = get_the_ID();

                    switch($format){

                        case 'gallery':

                        $icon = 'picture-o';

                        break;

                        case 'video':

                        $icon = 'camera';

                        break;

                        case 'audio':

                        $icon ='volume-up';

                        break;

                        case 'quote':

                        $icon ='quote-left';

                        break;

                        default:

                        $icon ='pencil';

                    }

              ?>

                

              

              <div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

                <i class="fa fa-<?php echo esc_attr($icon); ?>"></i>



                <?php if($format=='video'){ ?>



                <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>

                <div class="post-item-body <?php if(!$link_video) echo 'offset';?>">

                  <?php if($link_video) { ?>

                    <iframe height="170" src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_link_video', true));?>" ></iframe>

                  

                <?php } }elseif($format=='audio') { ?>



                <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>

                <div class="post-item-body <?php if(!$link_audio) echo 'offset';?>">

                  <?php if($link_audio) { ?>

                    <iframe class="auframe" height="166" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta(get_the_ID(), "_cmb_link_audio", true));?>"></iframe>

                <?php } }elseif($format=='gallery') { ?>



                  <?php $gallery = get_post_gallery( get_the_ID(), false ); ?>

                  <div class="post-item-body <?php if(!$gallery) echo 'offset';?>">



                    <?php if(isset($gallery['ids'])){ ?>

                    <div class="flexslider">

                      <ul class="slides">

                        <?php

                          $gallery_ids = $gallery['ids'];

                          $img_ids = explode(",",$gallery_ids);

                          foreach( $img_ids AS $img_id ){

                          $image_src = wp_get_attachment_image_src($img_id,'');

                        ?>

                        <li><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>

                        <?php } ?>

                      </ul>

                    </div>

                <?php } }else{ $image = wp_get_attachment_url(get_post_thumbnail_id()); ?>

                <div class="post-item-body <?php if(!$image) echo 'offset';?>">

                <?php if($image) { ?>

                  <figure>

                    <img src="<?php echo esc_url($image);?>" alt="">

                  </figure>

                <?php } } ?>

                <p class="title"><?php the_title(); ?></p>

                <?php the_content(); ?>

                <?php wp_link_pages(); ?>

                <div class="meta">

                    <p><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></p>

                    <p><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></p>

                    <p><i class="fa fa-comment"></i> <?php comments_number( __('0 Comment', 'magnis'), __('1 Comment', 'magnis'), __('% Comments', 'magnis') ); ?></p>                    

                    <p class="tags" style="display: none;"><?php the_tags(' ',' ', ' '); ?></p>
                </div>

              </div>

          </div>



          <!-- related posts start //-->

          <div class="main-content-block single-post-releated-posts">

            <h2><?php _e( 'related posts' , 'magnis' ); ?></h2>

            <div class="main-content-block-entry">

                <ul id="single-post-releated-posts" class="jcarousel-skin-tango">

                    <?php $orig_post = $post;

                    global $post;

                    $categories = get_the_category($post->ID);

                    if ($categories) {

                    $category_ids = array();

                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;



                    $args=array(

                    'category__in' => $category_ids,

                    'post__not_in' => array($post->ID),

                    'posts_per_page'=> 6, // Number of related posts that will be shown.

                    'caller_get_posts'=>1

                    );



                    $my_query = new wp_query( $args );

                    if( $my_query->have_posts() ) {               

                    while( $my_query->have_posts() ) {

                    $my_query->the_post();?>

                    <li>

                      <?php 

                        $format = get_post_format();

                        $icon = '';

                        $id = get_the_ID();

                            switch($format){

                                case 'gallery':

                                $icon = 'picture-o';

                                break;

                                case 'video':

                                $icon = 'camera';

                                break;

                                case 'audio':

                                $icon ='volume-up';

                                break;

                                case 'quote':

                                $icon ='quote-left';

                                break;

                                default:

                                $icon ='pencil';

                            }

                      ?>

                      <?php $params = array( 'width' => 90, 'height' => 60 );

                      $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>

                      <article class="sidebar-posts-item <?php if(!$image) echo 'notpadd';?>">

                          <div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></div>

                          <i class="fa fa-<?php echo esc_attr($icon); ?>"></i>

                          <figure><img src="<?php echo esc_url( $image );?>" alt=""></figure>

                          <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

                      </article>

                    </li>

                    <?php 

                      } } }

                      $post = $orig_post;

                      wp_reset_query(); 

                    ?>

                  </ul>

              </div>

            </div>  

            <!-- related posts end //-->



            <div class="main-content-block">

              <?php comments_template(); ?>

            </div>

          </div>

          <?php endwhile; ?>

        </div>        

        <div class="col-md-3">



          <?php get_sidebar()?>



        </div>



      </div>

    </div>

  </div>



<?php

get_footer();

