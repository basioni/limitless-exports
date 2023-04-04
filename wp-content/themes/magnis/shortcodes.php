<?php 

// FlexSlider
add_shortcode('flexslider','flexslider_func');
function flexslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery' 		=> '',
	), $atts));
	ob_start(); ?>
	
	<div class="home-slider">
        <!-- Place somewhere in the <body> of your page -->
        <div class="flexslider">
          <ul class="slides">
          	<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); ?>
					<li><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""></li>
			<?php } ?>
          </ul>
        </div>
	</div>

	<?php return ob_get_clean();
}

// Custom Heading
add_shortcode('heading','heading_func');
function heading_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		=> 	'h1',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'left',
	), $atts));
	 	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');
	
	$html .= '<'.$tag.' style="' . $size1 . $align1 . $color1 .'">'. $text .'</'.$tag.'>';
	
	return $html;
}

// About we are
add_shortcode('weare', 'weare_func');
function weare_func($atts, $content = null){

	extract(shortcode_atts(array(
		'sign' 		=> '',
		'pos' 		=> '',
		'title'		=> '',
		'stitle'  	=> '',
	), $atts));
	ob_start(); ?>
	
	<?php if($title) { ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
    <div class="intro">
    	<p><?php echo htmlspecialchars_decode($content); ?></p>
        <?php if($sign) { ?><p class="sign"><?php echo htmlspecialchars_decode($sign); ?></p><?php } ?>
        <?php if($pos) { ?><small><?php echo htmlspecialchars_decode($pos); ?></small><?php } ?>
    </div>

<?php 

	return ob_get_clean();
}


// Our Features
add_shortcode('features', 'features_func');
function features_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title' 	=> '',
		'icon' 		=> '',
		'style'		=> 'style1',

	), $atts));
	ob_start(); ?>
	
	<?php if($style == 'style2') { ?>
	<div class="feature">
	<?php }else{ ?>
	<div class="main-content-block home-3-features">
		<div class="home-3-features-item">
    <?php } ?>
    	<i class="fa fa-<?php echo esc_attr($icon); ?>"></i>
        <h3><?php echo htmlspecialchars_decode($title); ?></h3>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>
    <?php if($style == 'style1') { ?>
	</div>
	<?php } ?>

	<?php return ob_get_clean();
}

// Call To Action 1
add_shortcode('cta1', 'cta1_func');
function cta1_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext1' 	=> '',
		'btnlink1' 	=> '',
		'title'		=> '',
		'stitle'  	=> '',
		'icon'		=> '',
	), $atts));
	ob_start(); ?>
	
	<div class="buy-now-block">
		<div class="col-md-10 col-sm-9">
	    	<?php if($title) { ?><h3><?php echo htmlspecialchars_decode($title); ?></h3><?php } ?>
	        <?php if($stitle) { ?><p><?php echo htmlspecialchars_decode($stitle); ?></p><?php } ?>
	    </div>
	    <div class="col-md-2 col-sm-3">
	    	<a href="<?php echo esc_url($btnlink1); ?>" class="button button-color"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i> <?php echo esc_attr($btntext1); ?></a>
	    </div>
    </div>
	<?php return ob_get_clean();
}

// Call To Action 2

add_shortcode('cta2', 'cta2_func');
function cta2_func($atts, $content = null){

	extract(shortcode_atts(array(
		'btntext1' 	=> '',
		'btnlink1' 	=> '',
		'btntext2' 	=> '',
		'btnlink2' 	=> '',
		'title'		=> '',
		'stitle'  	=> '',
		'style'		=> 'style1',
	), $atts));
	ob_start(); ?>
	
	<?php if($style == 'style2') { ?>
	<div class="purchase purchase-2">
		<?php if($title) { ?><p class="big"><?php echo htmlspecialchars_decode($title); ?></p><?php } ?>
	    <?php if($stitle) { ?><p><?php echo htmlspecialchars_decode($stitle); ?></p><?php } ?>
		
		<div class="purchase-2-buttons">
			<?php if($btntext1) { ?><a href="<?php echo esc_url($btnlink1); ?>" class="button button-color"><?php echo htmlspecialchars_decode($btntext1); ?></a><?php } ?>
		    <?php if($btntext1) { ?><a href="<?php echo esc_url($btnlink2); ?>" class="button button-dark"><?php echo htmlspecialchars_decode($btntext2); ?></a><?php } ?>
		</div>
	</div>
	<?php }else{ ?>
	<div class="purchase">
		<div class="col-md-9 col-sm-8">
			<?php if($title) { ?><p class="big"><?php echo htmlspecialchars_decode($title); ?></p><?php } ?>
		    <?php if($stitle) { ?><p><?php echo htmlspecialchars_decode($stitle); ?></p><?php } ?>
		</div>    
		<div class="col-md-3 col-sm-4">
			<?php if($btntext1) { ?><a href="<?php echo esc_url($btnlink1); ?>" class="button button-color"><?php echo htmlspecialchars_decode($btntext1); ?></a><?php } ?>
		    <?php if($btntext2) { ?><a href="<?php echo esc_url($btnlink2); ?>" class="button button-white"><?php echo htmlspecialchars_decode($btntext2); ?></a><?php } ?>
		</div>
	</div>
	<?php } ?>

	<?php return ob_get_clean();
}

// Latest Projects
add_shortcode('lproject', 'lproject_func');
function lproject_func($atts, $content = null){

	extract(shortcode_atts(array(
		'title' 	=> '',
		'number'	=> 6,
	  	'visible'  	=> 5,
	  	'style'		=> 'style1',
	), $atts));
	ob_start(); ?>
	
	<?php if($visible == 5) {?>
	<div class="latest-projects latest-projects-3">
	<?php }elseif($visible == 3) {?>
	<div class="latest-projects latest-projects-4">
	<?php }else{ ?>
	<div class="latest-projects">
	<?php } ?>
		<?php if($style == 'style2') { ?>
        <div class="latest-projects-intro">
            <?php if($title) { ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
            <?php if($content) { ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
        </div>
        <?php }else{ ?>
        	<?php if($title) { ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
        <?php } ?>
        <div class="latest-projects-wrapper <?php if($style != 'style2') echo 'full';?>">
            <ul id="latest-projects-items" class="jcarousel-skin-tango">
            	<?php 

					$args = array(   
						'post_type' => 'portfolio',
						'posts_per_page' => $number,	
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
                <li>
                	<div class="project-details">
                    	<p class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                        <p class="project-tags"><?php echo htmlspecialchars_decode($cate_name); ?></p>
                        <div class="buttons">
                        	<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                          	<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                	<?php $params = array( 'width' => 800, 'height' => 800 );
                    $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
                    <img src="<?php echo esc_url($image);?>" alt="">
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>            
	<?php return ob_get_clean();
}


// Buttons
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext' 	=> '',
		'btnlink' 	=> '',
		'icon'  	=> '',
		'type'		=> 'color',
	), $atts));
	ob_start(); ?>
	<?php 

		if($type == 'border'){
			$type1 = 'border';
		}elseif($type == 'color'){
			$type1 = 'color';
		}else{
			$type1 = 'dark';
		}
	?>
	<a href="<?php echo esc_url($btnlink); ?>" class="button button-margin button-<?php echo esc_attr($type1); ?>">
	<?php if($icon) { ?><i class="fa fa-<?php echo esc_attr($icon); ?>"></i> <?php } echo esc_attr($btntext); ?></a>
	
	<?php return ob_get_clean();
}

//Newsletters
add_shortcode('magnis_newsletter', 'newsletter_func');
function newsletter_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title' 	=> '',
		'stitle' 	=> '',
		'btntext'	=> ''
	), $atts));
	ob_start(); ?>
	
    <div class="quick_newsletter">
        <div class="col-md-4 col-sm-4">
            <?php if($title) { ?><p class="big"><?php echo htmlspecialchars_decode($title); ?></p><?php } ?>
           <?php if($stitle) { ?><p><?php echo htmlspecialchars_decode($stitle); ?></p><?php } ?>
        </div>
        <script type="text/javascript">
			if (typeof newsletter_check !== "function") {
				window.newsletter_check = function (f) {
				    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
				    if (!re.test(f.elements["ne"].value)) {
				        alert("The email is not correct");
				        return false;
				    }
				    for (var i=1; i<20; i++) {
				    if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
				        alert("");
				        return false;
				    }
				    }
				    if (f.elements["ny"] && !f.elements["ny"].checked) {
				        alert("You must accept the privacy statement");
				        return false;
				    }
				    return true;
				}
			}
		</script>
		<div class="newsletter newsletter-subscription">
			<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>?na=s" onsubmit="return newsletter_check(this)">
				<p class="col-md-3 col-sm-3"><input class="newsletter-firstname" type="text" name="nn" size="30" placeholder="Name"></p>
				<p class="col-md-3 col-sm-3"><input class="newsletter-email" type="email" name="ne" size="30" placeholder="Email" required></p>												
				<p class="col-md-2 col-sm-2"><input class="newsletter-submit" type="submit" value="<?php echo htmlspecialchars_decode($btntext); ?>"/></p>					
			</form>
		</div>
    </div>
<?php 
	return ob_get_clean();
}


// Testimonial 
add_shortcode('testimonials','testimonials_func');
function testimonials_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 		'',
		'style'		=> 		'style1',
	), $atts));

	 ob_start(); ?>

	<?php if($style == 'style2') {?>
	<div class="testimonials-2">
		<?php if($title) { ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
		<ul id="testimonials-2" class="jcarousel-skin-tango">
	<?php }else{?>
	<div class="testimonials-1">
		<?php if($title) { ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
		<ul id="testimonials-1" class="jcarousel-skin-tango">
	<?php } ?>
        <?php
			$args = array(
				'post_type' => 'testimonial',
				'posts_per_page' => -1,
			);
			$testimonial = new WP_Query($args);
			if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
			$job_name = get_post_meta(get_the_ID(),'_cmb_job_name', true);
			$website = get_post_meta(get_the_ID(),'_cmb_website', true);
		?>        
		<?php if($style == 'style2') {?>
			
        	<li>
            	<figure><img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt=""></figure>
                <i class="fa fa-quote-left"></i>
                <div class="quote"><?php the_content(); ?></div>
                <p><span><?php the_title(); ?></span> <?php echo htmlspecialchars_decode($job_name); ?>, <a target="_blank" href="<?php echo esc_url($website); ?>"><?php echo esc_url($website); ?></a></p>
            </li>

		<?php }else{?>
			<li>
            	<img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt="">
                <div><i class="fa fa-quote-left"></i><?php the_content(); ?>
                	<span><?php the_title(); ?></span>
                	<small><?php echo htmlspecialchars_decode($job_name); ?>, 
                	<a target="_blank" href="<?php echo esc_url($website); ?>"><?php echo esc_url($website); ?></a></small>
                </div>
            </li>

	    <?php }; endwhile; endif; ?>

	    </ul>

	</div>

<?php
    return ob_get_clean();
}


// Clients block by Davis Hoang
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 		'',
	), $atts));
	ob_start(); ?>

	<div class="respective-partners">
        <ul id="respective-partners" class="jcarousel-skin-tango">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); ?>
					<li><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""></li>
			<?php } ?>
        </ul>
    </div>
			
<?php 
	return ob_get_clean();
}

// Blog Post latest news
add_shortcode('latest_news', 'latest_news_func');
function latest_news_func($atts, $content = null) {	
	extract(shortcode_atts(array(
		'title'			=> '',
		'showpost' 		=> '',
		'excerpt_length' => '',
		'visible'  		=>  1
	), $atts));

 	ob_start(); ?>

	<?php if($visible == 2) {?>
	<div class="latest-blog-posts latest-blog-posts-2">
	<?php }else{?>
	<div class="latest-blog-posts">
	<?php }?>
        <h2><?php echo htmlspecialchars_decode($title); ?></h2>
        <ul id="<?php if($visible == 2) echo 'latest-blog-posts2'; else echo 'latest-blog-posts';?>" class="jcarousel-skin-tango">	
        <?php
			$args=array('post_type'=>'post','posts_per_page'=> $showpost);
			$blog= new WP_Query($args);
			if($blog->have_posts()){
			while($blog->have_posts()) : $blog->the_post();
		?>   
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
		
		<li>
        	<div class="latest-blog-post-img">
        		<?php $params = array( 'width' => 120, 'height' => 120 );
                $image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
                <img src="<?php echo esc_url($image);?>" alt="">
                <div class="latest-blog-post-date">
                	<?php the_time('d'); ?> <span><?php the_time('M'); ?></span>
                </div>
                <div class="latest-blog-post-type">
					<i class="fa fa-<?php echo esc_attr($icon); ?>"></i>
                </div>
            </div>
        	<div class="latest-blog-post-details">
            	<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p><?php echo magnis_excerpt($excerpt_length); ?></p>
                <small>
                	<span class="tags"><?php the_category(', '); ?></span>
                    <span class="read"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-double-right"></i><?php echo _e('read more', 'magnis'); ?></a></span>
                </small>
            </div>
        </li>

		<?php endwhile; } ?>
		</ul>

	</div>
<?php

    return ob_get_clean();

}


//Toggle Accordion

add_shortcode('accordion', 'accordion_func');
function accordion_func($atts, $content = null){

	extract(shortcode_atts(array(
		'title' 	=> '',
		'icon'		=> '',
	), $atts));
	ob_start(); ?>
	<div class="magnis-toggle">
    <section>
        <header><i class="fa fa-<?php echo esc_attr($icon); ?>"></i> <?php echo htmlspecialchars_decode($title); ?></header>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </section>
    </div>
	<?php return ob_get_clean();
}


// Skills

add_shortcode('skills', 'skill_func');

function skill_func($atts, $content = null){

	extract(shortcode_atts(array(
		'title' 	=> '',
		'percent'	=> '',
	), $atts));
	ob_start(); ?>
	<div class="magnis-skills">
    	<section>
        	<div class="skill-title"><?php echo htmlspecialchars_decode($title); ?></div>
            <div class="skill-value" data-skill-value="<?php echo esc_attr($percent); ?>"></div>
        </section>
    </div>    
	<?php return ob_get_clean();
	
}

// Team

add_shortcode('team','team_func');
function team_func($atts, $content = null){
    extract( shortcode_atts( array(
      'name'   	=> '',
      'photo'   => '',
      'icon1'   => '',
      'icon2'   => '',
      'icon3'   => '',
      'soc1'   	=> '',
      'soc2'   	=> '',
      'soc3'   	=> '',
   ), $atts ) );
    ob_start(); ?>
	<div class="team-member team-member-first">
		<?php $url = wp_get_attachment_image_src($photo, '');
		$image_src = $url[0]; ?>
    	<figure><img src="<?php echo esc_url($image_src); ?>" alt=""></figure>
        <div class="soc-buttons">
        	<?php if($soc1) { ?><a href="<?php echo esc_url($soc1); ?>"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></a>
        	<?php }if($soc2){ ?><a href="<?php echo esc_url($soc2); ?>"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></a>
        	<?php }if($soc3){ ?><a href="<?php echo esc_url($soc3); ?>"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></a><?php } ?>
        </div>
        <div class="desc">
        	<p class="name"><?php echo htmlspecialchars_decode($name); ?></p>
        	<p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    </div>    

<?php

    return ob_get_clean();

}	


//Team Slider

add_shortcode('teamslider','teamslider_func');
function teamslider_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   	=> '',
   ), $atts ) );
    ob_start(); ?>
    	
    <div class="team-list">
    	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
    	<div class="row">
		   	<ul id="team-list" class="jcarousel-skin-tango">
		      <?php 
					$args = array(   
						'post_type' => 'team',   
						'posts_per_page' => -1,
					);  
					$wp_query = new WP_Query($args);
					while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
					

		        $icon1 = get_post_meta(get_the_ID(),'_cmb_team_icon1', true);
		        $icon2 = get_post_meta(get_the_ID(),'_cmb_team_icon2', true);
		        $icon3 = get_post_meta(get_the_ID(),'_cmb_team_icon3', true);
		        $link1 = get_post_meta(get_the_ID(),'_cmb_team_link1', true);
		        $link2 = get_post_meta(get_the_ID(),'_cmb_team_link2', true);
		        $link3 = get_post_meta(get_the_ID(),'_cmb_team_link3', true);

			  ?>

			  	<li>
		        	<div class="team-member team-member-first">
		            	<figure><img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt=""></figure>
		                <div class="soc-buttons">
		                	<a href="<?php echo esc_url($link1); ?>"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></a>
		                	<a href="<?php echo esc_url($link2); ?>"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></a>
		                	<a href="<?php echo esc_url($link3); ?>"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></a>
		                </div>
		                <div class="desc">
		                	<p class="name"><?php the_title(); ?></p>
		                	<?php if(get_the_content()) { the_content(); } ?>
		                </div>
		            </div>
		        </li>

		  	  <?php endwhile; ?>
		  	</ul>
		</div>  	
    </div>

<?php

    return ob_get_clean();

}


// Download Box

add_shortcode('download', 'download_func');

function download_func($atts, $content = null){

	extract(shortcode_atts(array(
		'title' 	=> '',
		'img'		=> '',
		'filename' 	=> '',
		'link'		=> '',
		'btn' 		=> '',
	), $atts));
	ob_start(); ?>
	<div class="magnis-brochure">
    	<header><?php echo htmlspecialchars_decode($title); ?></header>
        <section>
        	<p><?php $url = wp_get_attachment_image_src($img, '');
			$image_src = $url[0]; ?>
	    	<?php if($url){ ?><img src="<?php echo esc_url($image_src); ?>" alt=""><?php } ?><a href="<?php echo esc_url($link); ?>"><?php echo htmlspecialchars_decode($filename); ?></a></p>
        	<p><a href="<?php echo esc_url($link); ?>" class="button button-color"><i class="fa fa-download"></i> <?php echo esc_attr($btn); ?></a></p>
        </section>
    </div>   
	<?php return ob_get_clean();
	
}


// List FAQs

add_shortcode('faqs','faqs_func');
function faqs_func($atts, $content = null){
    extract( shortcode_atts( array(
      'exclass'   	=> '',
      'textbf'		=> '',
   ), $atts ) );
    ob_start(); ?>
    	<div class="<?php echo esc_attr($exclass); ?>" id="sort-faq">
            <div class="sorting-filters">
            	<?php echo htmlspecialchars_decode($textbf); ?>
            	<a href=""  class="active" data-filter="*">all</a>
              <?php 
				$categories = get_terms('categories2');   
				 foreach( (array)$categories as $categorie){
					$cat_name = $categorie->name;
					$cat_slug = $categorie->slug;
                    $cat_count = $categorie->count;
				?>
				<a href="" data-filter="<?php echo esc_attr($cat_slug);?>"><?php echo esc_attr($cat_name); ?></a>
			  <?php } ?>
            </div>
            <div class="magnis-toggle">
              <?php 
      			$args = array(   
						'post_type' => 'faq',   
						'posts_per_page' => -1,
					);  
					$wp_query = new WP_Query($args);
					while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
					$cates = get_the_terms(get_the_ID(),'categories2');
					$cate_name ='';
					$cate_slug = '';
					  foreach((array)$cates as $cate){
						if(count($cates)>0){
							$cate_name .= $cate->name.' ' ;
							$cate_slug .= $cate->slug .' ';     
						} 
					}

                $icon = get_post_meta(get_the_ID(),'_cmb_faq_icon', true);
			  ?>

			  	<section class="sort-item <?php echo esc_attr($cate_slug);?>">
	                <header><i class="fa fa-<?php echo esc_attr($icon);?>"></i> <?php the_title(); ?></header>
	                <?php the_content(); ?>
	            </section>

          	  <?php endwhile; ?>
            </div>
        </div>    

<?php

    return ob_get_clean();

}

// Quick Info

add_shortcode('question', 'question_func');
function question_func($atts, $content = null){

	extract(shortcode_atts(array(
		'title' 	=> '',

	), $atts));
	ob_start(); ?>
	
	<div class="quick-info-item">
    	<i class="fa fa-question-circle"></i>
        <p class="title"><?php echo htmlspecialchars_decode($title); ?></p>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>

	<?php return ob_get_clean();
}


// Pricing Tables

add_shortcode('pricing','pricing_func');
function pricing_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   	=> '',
      'rec'			=> '',
      'price'		=> '',
      'details'		=> '',
      'des'			=> '',
      'btntext'		=> '',
      'btnlink'		=> '',
      'time'		=> '',
      'style'		=> 'style1',
   ), $atts ) );
    ob_start(); ?>
    	 
    
	<div class="pr-table-1 <?php if($style == 'style2') echo 'pr-table-2';?> <?php if($rec) echo 'pr-table-featured';?>">
    	<header>
        	<p class="head"><?php echo htmlspecialchars_decode($title); ?></p>
        	<?php if($rec) { ?><p class="featured"><?php echo htmlspecialchars_decode($rec); ?></p><?php } ?>
        	<p class="price">
            	<?php echo htmlspecialchars_decode($price); ?>
                <?php if($time) { ?><span><?php echo htmlspecialchars_decode($time); ?></span><?php } ?>
            </p>
		</header>
        <section>
        	<div class="des">
	            <?php if($des) { ?><p class="tdes"><?php echo htmlspecialchars_decode($des); ?></p><?php } ?>
	            <?php if($details) { ?><?php echo htmlspecialchars_decode($details); ?><?php } ?>
            </div>
            <p><a href="<?php echo esc_url($btnlink); ?>" class="button <?php if($style == 'style2') { echo 'button-color'; }else{ echo 'button-white';}?>"><i class="fa fa-check-circle"></i> <?php echo htmlspecialchars_decode($btntext); ?></a></p>
        </section>
    </div>
    
<?php
    return ob_get_clean();
}

// Feature Box
add_shortcode('featurebox','featurebox_func');
function featurebox_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   => '',
      'des'	    => '',
      'btn'		=> '',
      'link'	=> '',
      'bg'		=> '',
      'color'	=> '',
      'border'	=> '',
   ), $atts ) );
    ob_start(); ?>

    <?php 
    	if($bg){
    		$bg1 = 'background-color: '.esc_attr($bg).';';
    	}
    	if($color){
    		$color1 = 'color: '.esc_attr($color).';';
    	}
    	if($border){
    		$border1 = 'border: 1px solid '.esc_attr($border).';';
    	}

     ?>
	
	<div class="main-content-block-entry assistance" style="<?php echo $bg1.$color1.$border1?>">
		<?php if($title) { ?><h3><?php echo htmlspecialchars_decode($title); ?></h3><?php } ?>
    	<?php if($des) { ?><p><?php echo htmlspecialchars_decode($des) ?></p><?php } ?>
        <?php if($btn) { ?><p><a href="<?php echo esc_url($link); ?>" class="button button-color"><?php echo htmlspecialchars_decode($btn); ?></a></p><?php } ?>
    </div>

<?php

    return ob_get_clean();

}

// Message Box
add_shortcode('message','message_func');
function message_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   => '',
      'des'	    => '',
      'type'	=> 'success',
   ), $atts ) );
    ob_start(); ?>
	
	<?php if($type == 'error') {?>   
    <div class="message-box message-error">
    	<i class="fa fa-times-circle"></i> 
        <p><span><?php echo htmlspecialchars_decode($title); ?></span> <?php echo htmlspecialchars_decode($des); ?></p>
    </div>
    <?php }elseif($type == 'info'){ ?>
    <div class="message-box message-information">
    	<i class="fa fa-exclamation-circle"></i> 
        <p><span><?php echo htmlspecialchars_decode($title); ?></span> <?php echo htmlspecialchars_decode($des); ?></p>
    </div>
    <?php }elseif($type == 'attention'){ ?>
    <div class="message-box message-warning">
    	<i class="fa fa-arrow-circle-right"></i> 
        <p><span><?php echo htmlspecialchars_decode($title); ?></span> <?php echo htmlspecialchars_decode($des); ?></p>
    </div>
    <?php }else{ ?>
    <div class="message-box message-success">
    	<i class="fa fa-check-circle"></i> 
        <p><span><?php echo htmlspecialchars_decode($title); ?></span> <?php echo htmlspecialchars_decode($des); ?></p>
    </div>
    <?php } ?>


<?php

    return ob_get_clean();

}


// Contact Info
add_shortcode('contactinfo', 'contactinfo_func');
function contactinfo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> '',
	), $atts));
	ob_start(); ?>
	
	<?php if($title){ ?><h2><?php echo htmlspecialchars_decode($title); ?></h2><?php } ?>
    <div class="contact-info">
    	<?php echo htmlspecialchars_decode($content); ?>
    </div>

	<?php return ob_get_clean();
}


// Google Map
add_shortcode('ggmap','ggmap_func');
function ggmap_func($atts, $content = null){
    extract( shortcode_atts( array(
	  'idmap'		=> 'map-canvas',
	  'height'		=> '',	
      'lat'   		=> '',
      'long'	  	=> '',
      'zoom'		=> '',
      'address'		=> '',
	  'mapcolor'	=> '',
	  'icon'		=> '',
   ), $atts ) );
   
   $img = wp_get_attachment_image_src($image,'full');
   $img = $img[0];
   
   $icon1 = wp_get_attachment_image_src($icon,'full');
   $icon1 = $icon1[0];

   $mapcolor = (!empty($mapcolor) ? esc_attr($mapcolor) : '#37c878');
   $zoom = (!empty($zoom) ? esc_attr($zoom) : 15); 
   		
    ob_start(); ?>
    	 
    <div id="<?php echo esc_attr( $idmap ); ?>" class="map-canvas" style="<?php if($height != ''){ echo 'height: '.$height.'px;'; } ?>"></div>

    <script type="text/javascript">
	
	(function($) {
    "use strict"
    $(document).ready(function(){
        
        var locations = [
			['<div class="infobox"><span><?php echo htmlspecialchars_decode( $address );?><span></div>', <?php echo esc_attr( $lat );?>, <?php echo esc_attr( $long );?>, 2]
        ];
	
		var map = new google.maps.Map(document.getElementById('<?php echo esc_attr( $idmap ); ?>'), {
		  zoom: <?php echo esc_attr( $zoom );?>,
			scrollwheel: false,
			navigationControl: true,
			mapTypeControl: false,
			scaleControl: false,
			draggable: true,
			styles: [ { "stylers": [ { "hue": "<?php echo esc_attr( $mapcolor );?>" }, { "gamma": 1 } ] } ],
			center: new google.maps.LatLng(<?php echo esc_attr( $lat );?>, <?php echo esc_attr( $long );?>),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
		var infowindow = new google.maps.InfoWindow();
	
		var marker, i;
	
		for (i = 0; i < locations.length; i++) {  
	  
			marker = new google.maps.Marker({ 
			position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
			map: map ,
			icon: '<?php echo esc_url( $icon1 );?>'
			});
		
		  google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
			  infowindow.setContent(locations[i][0]);
			  infowindow.open(map, marker);
			}
		  })(marker, i));
		}
        
        });
    })(jQuery);   	
   	</script>
<?php
    return ob_get_clean();
}


//------------------------   vc_map SHORT CODE

 ?>