<?php

/**
 * The template for displaying Comments.
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

if ( post_password_required() )

    return;

?>

<!-- COMMENTS -->

<?php if ( have_comments() ) : ?>  

            <h2><?php _e( 'Comments' , 'magnis' ); ?></h2>

            <ul class="main-content-block-entry" id="comments">

                <?php wp_list_comments(

                    array(

                    'callback'=>'magnis_theme_comment',

                    'style' => 'ul' 

                    )

                ); 

                ?>

            </ul>

            <?php

                // Are there comments to navigate through?

                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

            ?>

                <nav class="navigation comment-navigation" role="navigation">

                    

                    <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'magnis' ) ); ?></div>

                    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'magnis' ) ); ?></div>

                </nav><!-- .comment-navigation -->

            <?php endif; // Check for comment navigation ?>



            <?php if ( ! comments_open() && get_comments_number() ) : ?>

                <p class="no-comments"><?php _e( 'Comments are closed.' , 'magnis' ); ?></p>

            <?php endif; ?>

        <?php endif; ?>

    <!-- End Comments -->



<?php if (comments_open()) { ?>

<!-- LEAVE A COMMENT -->

<div class="main-content-block add-comment-form">

	<?php

        if ( is_singular() ) wp_enqueue_script( "comment-reply" );

            $aria_req = ( $req ? " aria-required='true'" : '' );

            $comment_args = array(

                    'id_form' => 'comment_form',                           

                    'title_reply'=> __('add a comment', 'magnis'),

                                                    

                     

                     'fields' => apply_filters( 'comment_form_default_fields', array(

                        'comment_field' => '<p><span><textarea id="comment-entry" name="comment" placeholder="'.__('your comment', 'magnis').'"></textarea></span></p>',

                        'author' => '<p class="name-mail"><span><input type="text" name="author" placeholder="'.__('your name', 'magnis').'" id="comments_form_name"></span>',   

                        'email' => '<span><input type="text" name="email" placeholder="'.__('your email', 'magnis').'" id="comment-email"></span></p>',                                                                                  

                        

                     ) ),

                     'comment_field' => '<p class="cmfield"><span><textarea id="comment-entry" name="comment" placeholder="'.__('your comment', 'magnis').'"></textarea></span></p>',                                             

                     'label_submit' => __('Submit', 'magnis'),

                     'class_submit' => 'magnis-btn',

                     'comment_notes_before' => '',

                     'comment_notes_after' => '',

                     

            )

        ?>

        <?php comment_form($comment_args); ?>

</div><!-- //LEAVE A COMMENT -->

<?php }else {}?>





<!-- //COMMENTS -->                