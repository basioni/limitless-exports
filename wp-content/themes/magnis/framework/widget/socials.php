<?php 



// Creating the widget 



class socials_widget extends WP_Widget {







function __construct() {



parent::__construct(



// Base ID of your widget



'socials_widget', 







// Widget name will appear in UI



__('Magnis Socials', 'magnis'), 







// Widget description



array( 'description' => __( 'Magnis Socials Footer', 'magnis' ), ) 



);



}







// Creating widget front-end



// This is where the action happens



public function widget( $args, $instance ) {



	// these are the widget options



	$title = apply_filters( 'widget_title', $instance['title'] );



	 $facebook = esc_attr($instance['facebook']); $gplus = esc_attr($instance['gplus']); 



	 $twitter = esc_attr($instance['twitter']); $youtube = esc_attr($instance['youtube']); 



	 $linkedin = esc_attr($instance['linkedin']); $dribbble = esc_attr($instance['dribbble']); 



	 $skype = esc_attr($instance['skype']); $rss = esc_attr($instance['rss']);







// before and after widget arguments are defined by themes



echo $args['before_widget'];



if ( ! empty( $title ) ){

	echo $args['before_title'] . $title . $args['after_title']; 

}?>



	<p class="soc-icons">



	<?php



		if( $facebook ) {



	      echo '<a href="'.esc_url($facebook).'" title="" ><i class="fa fa-facebook"></i></a>';



	   }





	   if( $twitter ) {



	      echo '<a href="'.esc_url($twitter).'" title=""><i class="fa fa-twitter"></i></a>';



	   }



	   if( $youtube ) {



	      echo '<a href="'.esc_url($youtube).'" title=""><i class="fa fa-youtube"></i></a>';



	   }



	   if( $linkedin ) {



	      echo '<a href="'.esc_url($linkedin).'" title=""><i class="fa fa-linkedin"></i></a>';



	   }



	   if( $gplus ) {



	      echo '<a href="'.esc_url($gplus).'" title=""><i class="fa fa-google-plus"></i></a>';



	   }



	   if( $dribbble ) {



	      echo '<a href="'.esc_url($dribbble).'" title=""><i class="fa fa-dribbble"></i></a>';



	   }



	   if( $skype ) {



	      echo '<a href="'.esc_url($skype).'" title=""><i class="fa fa-skype"></i></a>';



	   } 



	   if( $rss ) {



	      echo '<a href="'.esc_url($rss).'" title=""><i class="fa fa-rss"></i></a>';



	   }  



	?>



	</p>



</div>



<?php 



echo $after_widget;

}



		



// Widget Backend 



public function form( $instance ) {



// Check values



     $title = esc_attr($instance['title']);



	 $facebook = esc_attr($instance['facebook']); $gplus = esc_attr($instance['gplus']); 



	 $twitter = esc_attr($instance['twitter']); $youtube = esc_attr($instance['youtube']); 



	 $linkedin = esc_attr($instance['linkedin']); $dribbble = esc_attr($instance['dribbble']); 



	 $skype = esc_attr($instance['skype']); $rss = esc_attr($instance['rss']);

 



// Widget admin form



?>



<p>



<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'magnis' ); ?></label> 



<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />



</p>





<p>



<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Link Facebook:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('gplus'); ?>"><?php _e('Link Google+:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo $gplus; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Link Twitter:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Link Youtube:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Link Linkedin:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Link Dribbble:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo $dribbble; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Link Skype:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo $skype; ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Link Rss:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />



</p>



<?php 



}



	



// Updating widget replacing old instances with new



public function update( $new_instance, $old_instance ) {



$instance = array();



$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';



$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';



$instance['gplus'] = ( ! empty( $new_instance['gplus'] ) ) ? strip_tags( $new_instance['gplus'] ) : '';



$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';



$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';



$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';



$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';



$instance['skype'] = ( ! empty( $new_instance['skype'] ) ) ? strip_tags( $new_instance['skype'] ) : '';



$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';



return $instance;



}



} // Class wpb_widget ends here







// Register and load the widget



function wpb_socials_widget() {



	register_widget( 'socials_widget' );



}



add_action( 'widgets_init', 'wpb_socials_widget' );



