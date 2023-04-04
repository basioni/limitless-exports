<?php

/*
 * Template Name: Canvas
 * Description: A Page Template.
 */


get_header(); ?>



<?php if (have_posts()){ ?>

		<div class="main-content homepage">

		<?php while (have_posts()) : the_post()?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		</div>

	<?php }else {

		_e('Page Canvas For Page Builder', 'magnis'); 

	}?>

<?php get_footer(); ?>