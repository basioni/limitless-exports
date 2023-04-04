<?php

/**

 * Register FF Tab Widget

 * @since 0.0.1

 */

 

 

function register_magnis_tab_widget() {

    register_widget( 'Magnis_Tab_Widget' );

}

add_action( 'widgets_init', 'register_magnis_tab_widget' );



function magnis_set_post_views($postID) {

    $count_key = 'magnis_post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

    }else{

        $count++;

        update_post_meta($postID, $count_key, $count);

    }

}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 





/**

 * Add filter to single post

 * @since 0.0.1

 * updated 1.0

 */

 



function magnis_post_view($content) {

	if(is_single()){

		$content .= magnis_set_post_views(get_the_ID());

		// return magnis_get_post_views(get_the_ID());

	}

	return $content;

} 



add_filter( 'the_content', 'magnis_post_view' ); 

 



/**

 * FF Tab Widget Class

 * @since 0.0.1

 */





class magnis_Tab_Widget extends WP_Widget {

	

	/**

	 * Widget actual process

	 * Reference: http://codex.wordpress.org/Plugins/WordPress_Widgets_Api

	 * @since 0.0.1

	 */

	

	public function __construct() {

		$widget_ops = array('classname' => 'magnis_tab_widget', 'description' => __('Display popular posts, recent posts, recent commets, and tags in an animated tabs.', 'magnis'));

		$control_ops = array('width' => 250, 'height' => 350);

		parent::__construct(null, __('Magnis Tab Widget', 'magnis'), $widget_ops, $control_ops);

	}

	

	

	

	

	/**

	 * Widget output

	 * Reference: http://codex.wordpress.org/Plugins/WordPress_Widgets_Api

	 * @since 0.0.1

	 */ 

	 

	public function widget( $args, $instance ) {

		extract( $args );

		$pop = empty( $instance['pop'] ) ? '' : $instance['pop'];

		$poplimit = empty( $instance['poplimit'] ) ? '' : $instance['poplimit'];

		$recent = empty( $instance['recent'] ) ? '' : $instance['recent'];

		$recentlimit = empty( $instance['recentlimit'] ) ? '' : $instance['recentlimit'];

		$comment = empty( $instance['comment'] ) ? '' : $instance['comment'];

		$commentlimit = empty( $instance['commentlimit'] ) ? '' : $instance['commentlimit'];

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;

		if ( ! empty( $title ) )

			echo $args['before_title'] . $title . $args['after_title'];

	?>	



	<div class="sidebar-posts">

		<div class="sorting-filters">

			<a href="" class="active" data-filter="recent"><?php echo esc_attr($recent); ?></a>

			<a href="" data-filter="popular"><?php echo esc_attr($pop); ?></a>

			<a href="" data-filter="comments"><?php echo esc_attr($comment); ?></a>

		</div>

		

		<div class="main-content-block-entry">

			

				<?php

				

				/**

				 * Recent posts

				 * ------------

				 */			 



				global $post;



				$args = array(

					'post_type' => 'post', 

					'numberposts' => $recentlimit		

				);



				$get_query_posts = get_posts($args);



				if($get_query_posts) :



					$count=0; ?>



					<section class="sort-item recent">

					<?php foreach($get_query_posts as $post) : 

						$num_comments = get_comments_number(); // get_comments_number returns only a numeric value



						if ( comments_open() ) {

							if ( $num_comments == 0 ) {

								$comments = __('0 Comment', 'magnis');

							} elseif ( $num_comments > 1 ) {

								$comments = $num_comments . __(' Comments', 'magnis');

							} else {

								$comments = __('1 Comment', 'magnis');

							}

							$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';

						} else {

							$write_comments =  __('Comments are off for this post.', 'magnis');

						}

						$params = array( 'width' => 90, 'height' => 60 );

                        $url = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );

						setup_postdata($post);

						$format = get_post_format();

						$icon = '';

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

                        }?>

						

						<article class="sidebar-posts-item">

                           	<div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

                            <i class="fa fa-<?php echo esc_attr($icon); ?>"></i>

                      		<figure><img src="<?php echo esc_url($url); ?>" alt=""></figure>

                            <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

                        </article>

						

					<?php endforeach; ?>

					</section>

					

				<?php endif; 



				// End of recent posts

				?>		

			

			

			

			

				<?php 

				

				// Popular posts

							

				$popular = new WP_Query( array( 

					'posts_per_page' => $poplimit, 

					'meta_key' => 'magnis_post_views_count', 

					'orderby' => 'meta_value_num', 

					'order' => 'DESC'  

				) );?>

				

				<section class="sort-item popular">

				<?php while ( $popular->have_posts() ) : $popular->the_post();

					$num_comments = get_comments_number(); // get_comments_number returns only a numeric value



					if ( comments_open() ) {

						if ( $num_comments == 0 ) {

							$comments = __('0 Comment', 'magnis');

						} elseif ( $num_comments > 1 ) {

							$comments = $num_comments . __('Comments', 'magnis');

						} else {

							$comments = __('1 Comment', 'magnis');

						}

						$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';

					} else {

						$write_comments =  __('Comments are off for this post.', 'magnis');

					}

					$params = array( 'width' => 90, 'height' => 60 );

                    $url = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );

					$format = get_post_format();

					$icon = '';

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

                    

					} ?>



					<article class="sidebar-posts-item">

                       	<div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

                        <i class="fa fa-<?php echo esc_attr($icon); ?>"></i>

                  		<figure><img src="<?php echo esc_url($url); ?>" alt=""></figure>

                        <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

                    </article>

				<?php endwhile;	?>

				</section>

				

				<?php

				

				// Comments

				//$GLOBALS['comment'] = $comment;

				$comments = get_comments( apply_filters( 'widget_comments_args', array( 

					'number' => $commentlimit, 

					'status' => 'approve', 

					'post_status' => 'publish' 

				) ) ); ?>

				

				<section class="sort-item comments">

				<?php if ( $comments ) {

					// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)

					$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );

					_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );



					foreach ( (array) $comments as $comment) { 

						$format = get_post_format($comment->comment_post_ID);

						$icon = '';

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

	                    

						} ?>

						<article class="sidebar-posts-item sidebar-comment-item">

                        	<div class="date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

                            <i class="fa fa-<?php echo esc_attr($icon);?>"></i>

       	          			<p class="comment">" <?php echo wp_html_excerpt( $comment->comment_content, 50 ); ?>... "</p>

                            <p class="user"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?> <?php _e('on', 'magnis') ?> <a href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php echo get_the_title( $comment->comment_post_ID); ?></a></p>

                        </article>

				<?php }	}?>



				</section>	

			

		</div>

	</div>

		

	<?php	

		

		echo $after_widget;

		

	}	

	

	/**

	 * Widget form on admin

	 * Reference: http://codex.wordpress.org/Plugins/WordPress_Widgets_Api

	 * @since 0.0.1

	 */ 

	

	public function form( $instance ) {



		$instance = wp_parse_args( (array) $instance, array(  

			'title'			=> '',

			'poplimit' 		=> 3, 

			'recentlimit' 	=> 3, 

			'commentlimit' 	=> 3,  			

		) );

		$pop = strip_tags($instance['pop']);

		$poplimit = strip_tags($instance['poplimit']);

		$recent = strip_tags($instance['recent']);

		$recentlimit = strip_tags($instance['recentlimit']);

		$comment = strip_tags($instance['comment']);

		$commentlimit = strip_tags($instance['commentlimit']);

		$title = isset( $instance['title'] ) ? $instance['title'] : 'Blog Post';



	?>	

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'magnis' ); ?></label> 

			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

		</p>



		<!-- = Popular posts setting -->

	

		<p><span><strong><?php _e('Popular posts:', 'magnis'); ?></strong></span><br />

		

		<label for="<?php echo $this->get_field_id('pop'); ?>" style="display:block;"><?php _e('Tab name: ', 'magnis');?></label><input id="<?php echo $this->get_field_id('pop'); ?>" class="widefat" name="<?php echo $this->get_field_name('pop'); ?>" type="text" value="<?php echo esc_attr($pop); ?>" /><br />

		<label for="<?php echo $this->get_field_id('poplimit'); ?>" style="display:block;"><?php _e('Show number:', 'magnis');?></label><input id="<?php echo $this->get_field_id('poplimit'); ?>" class="widefat" name="<?php echo $this->get_field_name('poplimit'); ?>" type="text" value="<?php echo esc_attr($poplimit); ?>" />

		

		</p>

		

		<!-- / Popular posts setting -->

		

		

		<!-- = Recent posts setting -->

		

		<p><span><strong><?php _e('Recent posts:', 'magnis'); ?></strong></span><br />

		

		<label for="<?php echo $this->get_field_id('recent'); ?>" style="display:inline;"><?php _e('Tab name: ', 'magnis');?></label><input id="<?php echo $this->get_field_id('recent'); ?>" class="widefat" name="<?php echo $this->get_field_name('recent'); ?>" type="text" value="<?php echo esc_attr($recent); ?>" /><br />

		<label for="<?php echo $this->get_field_id('recentlimit'); ?>" style="display:inline;"><?php _e('Show number: ', 'magnis');?></label><input id="<?php echo $this->get_field_id('recentlimit'); ?>" class="widefat" name="<?php echo $this->get_field_name('recentlimit'); ?>" type="text" value="<?php echo esc_attr($recentlimit); ?>" />

		

		</p>

		

		<!-- / Recent posts setting -->

		



		<!-- = Recent comments setting -->

		

		<p><span><strong><?php _e('Recent comments:', 'magnis'); ?></strong></span><br />

		

		<label for="<?php echo $this->get_field_id('comment'); ?>" style="display:inline;"><?php _e('Tab name: ', 'magnis');?></label><input id="<?php echo $this->get_field_id('comment'); ?>" class="widefat" name="<?php echo $this->get_field_name('comment'); ?>" type="text" value="<?php echo esc_attr($comment); ?>" /><br />

		<label for="<?php echo $this->get_field_id('commentlimit'); ?>" style="display:inline;"><?php _e('Limit number: ', 'magnis');?></label><input id="<?php echo $this->get_field_id('commentlimit'); ?>" class="widefat" name="<?php echo $this->get_field_name('commentlimit'); ?>" type="text" value="<?php echo esc_attr($commentlimit); ?>" />

		

		</p>

		

		<!-- / Recent comments setting -->

		

	

	<?php

	}



	/**

	 * Processes widget options to be saved

	 * Reference: http://codex.wordpress.org/Plugins/WordPress_Widgets_Api

	 * @since 0.0.1

	 */ 

	 

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['pop'] = strip_tags($new_instance['pop']);

		$instance['poplimit'] = strip_tags($new_instance['poplimit']);

		$instance['recent'] = strip_tags($new_instance['recent']);

		$instance['recentlimit'] = strip_tags($new_instance['recentlimit']);	

		$instance['comment'] = strip_tags($new_instance['comment']);

		$instance['commentlimit'] = strip_tags($new_instance['commentlimit']);

		$instance['title'] = strip_tags( $new_instance['title'] );	

		return $instance;

	}	

}