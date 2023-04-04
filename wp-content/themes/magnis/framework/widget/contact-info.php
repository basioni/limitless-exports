<?php 

// Creating the widget 

class contact_info_widget extends WP_Widget {

function __construct() {

parent::__construct(



// Base ID of your widget



'contact_info_widget', 







// Widget name will appear in UI



__('Magnis Contact Info', 'magnis'), 







// Widget description



array( 'description' => __( 'Magnis Contact Info Footer Widget', 'magnis' ), ) 



);



}







// Creating widget front-end



// This is where the action happens



public function widget( $args, $instance ) {



	// these are the widget options



	$title = apply_filters( 'widget_title', $instance['title'] );



     $email = esc_attr($instance['email']);



	 $phone = esc_attr($instance['phone']);



     $address = esc_textarea($instance['address']);





// before and after widget arguments are defined by themes



echo $args['before_widget'];



if ( ! empty( $title ) )



echo $args['before_title'] . $title . $args['after_title']; ?>



	<div class="footer-contacts-wrapper">

		<ul>

			<li class="li1"><?php _e( 'Address:', 'magnis' ); ?></li><li class="li2"><?php echo htmlspecialchars_decode( $address ); ?></li>



			<li class="li1"><?php _e( 'Phone:', 'magnis' ); ?></li><li class="li2"><?php echo htmlspecialchars_decode( $phone ); ?></li>



			<li class="li1"><?php _e( 'Email:', 'magnis' ); ?></li><li class="li2"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a></li>

		</ul>

	</div>





<?php 



echo $args['after_widget'];



}



		



// Widget Backend 



public function form( $instance ) {



// Check values



     $title = esc_attr($instance['title']);



     $email = esc_attr($instance['email']);



	 $phone = esc_attr($instance['phone']);



     $address = esc_textarea($instance['address']);





?>



<p>



<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'magnis' ); ?></label> 



<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone Number:', 'magnis'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr(  $phone ); ?>" />



</p>



<p>



<label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'magnis'); ?></label>



<textarea class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo $address; ?></textarea>



</p>





<?php 



}



	



// Updating widget replacing old instances with new



public function update( $new_instance, $old_instance ) {



$instance = array();



$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';



$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';



$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';



$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';



return $instance;



}



} // Class wpb_widget ends here







// Register and load the widget



function wpb_load_widget() {



	register_widget( 'contact_info_widget' );



}



add_action( 'widgets_init', 'wpb_load_widget' );



