<?php global $theme_option; ?>

<!-- post item //-->



<div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

<div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

  <i class="fa fa-volume-up"></i>

  <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>

  <div class="post-item-body <?php if(!$link_audio) echo 'offset';?>">

    <?php if($link_audio) { ?>

      <iframe class="auframe" height="166" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta(get_the_ID(), "_cmb_link_audio", true));?>"></iframe>

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