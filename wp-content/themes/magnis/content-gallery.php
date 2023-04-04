<?php global $theme_option; ?>

<!-- post item //-->



<div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

<div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

  <i class="fa fa-picture-o"></i>

  <div class="post-item-body <?php if(!isset($gallery['ids'])){ echo 'offset'; } ?>">

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

    <?php } ?>

    <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

    <p class="post-content"><?php echo magnis_excerpt($theme_option['blog_excerpt']); ?></p>

    <div class="meta">

        <p><i class="fa fa-tag"></i> <?php the_category(', '); ?></p>

        <p><i class="fa fa-comment"></i> <?php comments_number( __('0 Comment', 'magnis'), __('1 Comment', 'magnis'), __('% Comments', 'magnis') ); ?></p>

        <p><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></p>

        <p class="read"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-double-right"></i> <?php _e('Read More', 'magnis'); ?></a></p>

    </div>

  </div>

</div>



<!-- Post end -->