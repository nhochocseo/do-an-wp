<?php 
/*
 Template Name: Đặt bàn
 */
 ?>
 <?php
/*
 Template Name: Đặt bàn
 */

	get_header(); 
	?>

		<div class="awardthemes-content-area">
			
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

				endwhile; // End of the loop.
			?>
		</div>

	<?php get_footer(); ?>