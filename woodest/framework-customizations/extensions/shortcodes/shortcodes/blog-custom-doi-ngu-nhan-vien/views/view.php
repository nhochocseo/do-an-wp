<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	global $post_builder_options;
	$page_class = isset( $atts['page_class'] ) ? $atts['page_class'] : '';
	$blog_category = isset( $atts['blog_category'] ) ? $atts['blog_category'] : '';
	$blog_style = isset( $atts['blog_style'] ) ? $atts['blog_style'] : '';
	$blog_pagination = isset( $atts['blog_pagination'] ) ? $atts['blog_pagination'] : '';
	$blog_cols = isset( $atts['blog_cols'] ) ? $atts['blog_cols'] : '';
	$blog_slide = isset( $atts['blog_slide'] ) ? $atts['blog_slide'] : '';
	$blog_num_fetch = isset( $atts['blog_num_fetch'] ) ? $atts['blog_num_fetch'] : '';
	$blog_order_by = isset( $atts['blog_order_by'] ) ? $atts['blog_order_by'] : '';
	
	$post_builder_options['blog_num_title'] = isset( $atts['blog_num_title'] ) ? $atts['blog_num_title'] : '';
	$post_builder_options['blog_num_descrp'] = isset( $atts['blog_num_descrp'] ) ? $atts['blog_num_descrp'] : '';
	
	
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type' => 'doi_ngu_nhan_vien',
		'posts_per_page' => $blog_num_fetch,
		'orderby' => $blog_order_by,
		'paged' => $paged,
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'categories',
				'field'    => 'post_id',
				'terms'    => $blog_category,
			),
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'post_id',
				'terms'    => '',
			),
		)
	);
	
	$the_query = new WP_Query( $args );
?>

	<div class="blog-holder row <?php echo esc_attr($page_class); ?>">
		<?php 
		if($blog_style == 'grid_box'){
			while($the_query->have_posts()){ 
				$the_query->the_post();
				global $post;
				
				get_template_part( 'template-parts/post/content', 'gridbox' );
			}
		}
		else if($blog_style == 'blog_grid_full') {
			while($the_query->have_posts()){ 
				$the_query->the_post();
				global $post;
				
				get_template_part( 'template-parts/post/content', 'gridboxfull' );
			}
		}else{
			if($blog_slide == "co") {
				?>
				<div class="row">
					<div class="no-padding slider-post slider-section">
						<div id="post_slider" class="carousel" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div class="item active">
								<?php 
									$slide_count = 0;
									while($the_query->have_posts()){ 
										$the_query->the_post();
										global $post;
										;?>
											<div class="<?php echo esc_attr($blog_cols); ?> item col-sm-6">
												<?php get_template_part( 'template-parts/post/content', 'grid' ); ?>
											</div>
										<?php
										$slide_count = $slide_count+1; 
									if($slide_count/2==1){
                                    	echo '</div><div class="item">';
                                	}
									}?>	
								</div>		
							</div>
							<a class="left carousel-control"  href="#post_slider" role="button" data-slide="prev">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/back.png">
							</a>
							<a  class="right carousel-control" href="#post_slider" role="button" data-slide="next">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/login_next_icon_544837.png">
							</a>
						</div>
					</div>
				</div>
			<?php } else {
			?>
				<div class="row">
					<?php 
					while($the_query->have_posts()){ 
						$the_query->the_post();
						global $post; ?>
						<div class="<?php echo esc_attr($blog_cols); ?> col-sm-6">
							<?php get_template_part( 'template-parts/post/content', 'grid' ); ?>
						</div>
						<?php
					} ?>
				</div>
				<?php
			}
		}
		
		if(isset($blog_pagination) && $blog_pagination == 'enable'){
			echo awardthemes_pagination($the_query);
		}
		
		wp_reset_postdata(); ?>
	</div>