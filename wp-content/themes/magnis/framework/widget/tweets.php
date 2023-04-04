<?php



/**



 * Tweets widget class



 *



 * @since 2.8.0



 */



class Tweets_Widget extends WP_Widget {







    function Tweets_Widget() {



        $widget_ops = array( 'classname' => 'latest-tweets', 'description' => __('Latest tweets widget ', 'magnis') );



        



        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tweets-widget' );



        



        parent::__construct( 'tweets-widget', __('Twitter Widget', 'magnis'), $widget_ops, $control_ops );



    }



    



    function getAgo($timestamp) {



        $difference = time() - $timestamp;







        if ($difference < 60) {



            return $difference." seconds ago";



        } else {



            $difference = round($difference / 60);



        }







        if ($difference < 60) {



            return $difference." minutes ago";



        } else {



            $difference = round($difference / 60);



        }







        if ($difference < 24) {



            return $difference." hours ago";



        }



        else {



            $difference = round($difference / 24);



        }







        if ($difference < 7) {



            return $difference." days ago";



        } else {



            $difference = round($difference / 7);



            return $difference." weeks ago";



        }



    }



    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {



      $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);



      return $connection;



    }



    function widget( $args, $instance ) {



        extract( $args );







        //Our variables from the widget settings.



        $title = apply_filters('widget_title', $instance['title'] );



        $notweets = $instance['num'];



        $consumerkey = $instance['custommerkey'];



        $consumersecret = $instance['custommersecret'];



        //Test



        



        



        echo $before_widget;



		if ( ! empty( $title ) ){



		echo $args['before_title'] . $title . $args['after_title'];



        } ?>

            <script>

                    

                 twitterFetcher.fetch('<?php echo $consumerkey;?>', 'latest-tweets', <?php echo esc_attr( $notweets );?>, true, true, false);

                        

            </script>

			<div class="footer-widget footer-latest-tweets">



				<ul id="latest-tweets" class="jcarousel-skin-tango"></ul> 

               

			</div>	





		<?php





        echo $after_widget;



    }







    //Update the widget 



     



    function update( $new_instance, $old_instance ) {



        $instance = $old_instance;







        //Strip tags from title and name to remove HTML 



        $instance['title'] = strip_tags( $new_instance['title'] );



        $instance['num'] = strip_tags( $new_instance['num'] );



        $instance['custommerkey'] = strip_tags( $new_instance['custommerkey'] );



        $instance['custommersecret'] = strip_tags( $new_instance['custommersecret'] );







        return $instance;



    }







    



    function form( $instance ) {







        //Set up some default widget settings.



        $defaults = array( 'title' => __('Recent Tweets.', 'magnis'), 'name' => __('Suono Libero', 'magnis'),'custommerkey' => __('428880392213381120', 'magnis'),'custommersecret' => __('twitter-posts-2', 'magnis'), 'style' => 'sidebar', 'num' => __('2', 'magnis'));



        $instance = wp_parse_args( (array) $instance, $defaults ); ?>







        <p>



            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'magnis'); ?></label>



            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />



        </p>



        <p>



            <label for="<?php echo $this->get_field_id( 'custommerkey' ); ?>"><?php _e('Twitter Widget ID:', 'magnis'); ?></label></br>(the number you copied)



            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'custommerkey' ); ?>" name="<?php echo $this->get_field_name( 'custommerkey' ); ?>" value="<?php echo esc_attr( $instance['custommerkey'] ); ?>" style="width:100%;" />



        </p>



        <p>



            <label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of tweets:', 'magnis'); ?></label><br>(between 1 and 20)



            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo esc_attr( $instance['num'] ); ?>" style="width:100%;" />



        </p>



        <!-- style: Select Box -->





    <?php



    }



}



function envor_register_tweets_widgets() {



    register_widget( 'Tweets_Widget' );



}



add_action( 'widgets_init', 'envor_register_tweets_widgets' ); 



?>