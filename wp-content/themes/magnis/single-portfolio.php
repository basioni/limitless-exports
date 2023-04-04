<?php

/**

 * The Template for displaying all single posts

 */

global $theme_option; 

get_header(); ?>

<?php while(have_posts()) :the_post(); ?>

<?php 

	$desc = get_post_meta(get_the_ID(),'_cmb_portfolio_desc', true);

	$details = get_post_meta(get_the_ID(),'_cmb_portfolio_details', true);

  $launch = get_post_meta(get_the_ID(),'_cmb_project_url', true);

  $more_title = get_post_meta(get_the_ID(),'_cmb_more_title', true);

  $more_des = get_post_meta(get_the_ID(),'_cmb_more_des', true);

  $format = get_post_format();

  $cates = get_the_terms(get_the_ID(),'categories');

  $cate_name ='';

    foreach((array)$cates as $cate){

      if(count($cates)>1){

          $cate_name .= $cate->name.' ';   

      }

      elseif(count($cates)==1){

          $cate_name .= $cate->name;   

    }



  }          

?>

  <div class="page-header pattern-bg" style="<?php if($theme_option['portfolio_bg']) { ?>background-image: url(<?php echo esc_url(  $theme_option['portfolio_bg']['url'] ); ?>)<?php } ?>">

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

          

            <!-- project images //-->

              <div class="col-md-7">

                <div class="main-content-block">

                    <div class="single-project-slides">

                    <?php if($format=='gallery'){

                    $gallery = get_post_gallery( get_the_ID(), false );

                    if(isset($gallery['ids'])){

                    ?>

                    <ul id="single-projects-slides" class="jcarousel-skin-tango">

                        <?php

                          $gallery_ids = $gallery['ids'];

                          $img_ids = explode(",",$gallery_ids);               

                          foreach( $img_ids AS $img_id ){

                          $image_src = wp_get_attachment_image_src($img_id,'');

                        ?>

                        <?php $image = $image_src[0]; ?>

                        <li><img src="<?php echo esc_url(  $image );?>" alt=""></li>

                        <?php } ?>

                    </ul>

                    <?php }}elseif($format=='audio'){

                      $link_audio = get_post_meta(get_the_ID(),'_cmb_portfolio_audio', true);

                      if($link_audio !=''){?>

                      <iframe width="100%" height="196" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio );?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>

                    <?php }}elseif($format=='video'){ 

                      $link_video = get_post_meta(get_the_ID(),'_cmb_portfolio_video', true);

                      if($link_video !=''){?>

                      <iframe height="190" src="<?php echo esc_url( $link_video );?>" allowfullscreen></iframe>

                    <?php }}else{ 

                      $image = wp_get_attachment_url(get_post_thumbnail_id()); 

                      if (!empty($image)) {?>

                      <img src="<?php echo esc_url( $image );?>" alt="">

                    <?php } } ?>

                    </div>

                  </div>

              </div>

              

              <!-- project details //-->

              <div class="col-md-5">

                <div class="main-content-block desc-folio">

                    <?php if(get_the_content()) { ?><div class="page-intro"><?php the_content(); ?></div><?php } ?>

                    <?php if($desc) { ?><p><?php echo htmlspecialchars_decode($desc); ?></p><?php } ?>

                </div>

                <div class="details-block">

                      <?php if($theme_option['portfolio_detail']) { ?><h3><?php echo htmlspecialchars_decode($theme_option['portfolio_detail']); ?></h3><?php } ?>
 
                      <?php if($desc) { ?>

                      <div class="single-project-details">

                          <?php echo htmlspecialchars_decode($details); ?>

                      </div>

                      <?php } ?>

                      <?php if($launch) { ?><p><a href="<?php echo esc_url($launch); ?>" class="button button-color"><?php echo esc_attr($theme_option['project_out']); ?></a></p><?php } ?>

                  </div>

              </div>

           </div>

      </div>



      <div class="main-content-block">

        <div class="container">

          <div class="row">

            <div class="col-md-12">

              <div class="latest-projects latest-projects-2">

                <h2><?php echo htmlspecialchars_decode( $theme_option['portfolio_related'] ); ?></h2>

                <div class="latest-projects-wrapper">

                  <ul id="latest-projects-items" class="jcarousel-skin-tango">

                    <?php 

                    global $post;



                    $current_post_type = get_post_type( $post );



                    $args = array(

                        'order' => 'DESC',

                        'orderby' => 'rand',

                        'post_type' => $current_post_type,

                        'post__not_in' => array( $post->ID ),

                        'posts_per_page' => 7,

                    );



                    $my_query = new WP_Query( $args );



                    if( $my_query->have_posts() ) {            

                    while( $my_query->have_posts() ) {

                    $my_query->the_post();

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

                    <li>

                        <div class="project-details">

                            <p class="project-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>

                            <p class="project-tags"><?php echo htmlspecialchars_decode( $cate_name );?></p>

                            <div class="buttons">

                                <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" title="<?php the_title();?>"><i class="fa fa-search"></i></a>

                                <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>

                            </div>

                        </div>

                        <?php $params = array( 'width' => 450, 'height' => 450 );

                        $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>

                        <img src="<?php echo esc_url($image);?>" alt="">

                    </li>



                    <?php 

                      }

                    }

                    wp_reset_query(); 

                    ?>

                  </ul>

                </div>  

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>  





<?php endwhile;?>   

<?php get_footer();?>