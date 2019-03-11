<?php
/**
 * The template for displaying all single posts
 */

	get_header();
	
	if (function_exists('fw_get_db_settings_option')) {
		$enable_social_share = fw_get_db_settings_option('enable_social_share');	
	} else{
		$enable_social_share = '';
	}

 ?>
<?php
    $mypost = array( 'post_type' => 'slider_post', );
    $loopslide = new WP_Query( $mypost );
 ?>
 	<div class="row">
		<div id="slider-section" class="slider-section slider-section2 no-padding">
			<div id="photo_slider" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php
						$slide_to = 0;					
						while ( $loopslide->have_posts() ) : $loopslide->the_post();
							if($slide_to == 0){ $slideto_class = 'active'; }else { $slideto_class = '';}
						?>
						<li class="<?php echo esc_attr($slideto_class); ?>" data-target="#photo_slider" data-slide-to="<?php echo esc_attr($slide_to); ?>"></li>
						<?php
						$slide_to = $slide_to+1;
					endwhile;
					?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php
					$slide_count = 0;
					
					while ( $loopslide->have_posts() ) : $loopslide->the_post();
						if($slide_count == 0){ $slide_class = 'active'; }else { $slide_class = '';}
						$slide_count++;
						?>
						<div class="item <?php echo esc_attr($slide_class); ?>">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php
					endwhile;
					?>
				</div>				
				<a class="left carousel-control" href="#photo_slider" role="button" data-slide="prev">
					<!-- <span class="fa fa-angle-left" aria-hidden="true"></span> -->
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/back.png">
				</a>
				<a class="right carousel-control" href="#photo_slider" role="button" data-slide="next">
					<!-- <span class="fa fa-angle-right" aria-hidden="true"></span> -->
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/login_next_icon_544837.png">
				</a>
				<span class="image-icon-tintuc">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/bankground-slide.png">
				</span>
			</div>		
		</div>
	</div>


<section class="tin-tuc-container container-fluid no-padding">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 ">
            <div class="fw-row">
               <div class="fw-col-xs-12 col-md-12 ">
                  <div class="">
                     <div class="container-fluid no-padding">
                        <div class="image_1">
                           <img width="200" height="150" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/image-left-dich-vu.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="image_2">
                           <img width="200" height="170" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/image-bottom-1.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="image_3">
                           <img width="100" height="100" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/mieng-ca-ngoi-tintuc.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="image_4">
                           <img width="250" height="250" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/icon-slide-1.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="image_5">
                           <img width="100" height="100" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/bankground-tintuc.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="image_6">
                           <img width="200" height="150" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/con-cua-1.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="image_7">
                           <img width="190" height="100" src="<?php echo get_home_url() ?>/wp-content/uploads/2019/01/con-tom-tren-dia.png" class="attachment-full size-full" alt="">			
                        </div>
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12 ">
                                 <div class="fw-row">
                                    <div class="fw-col-xs-12 col-md-12 ">
                                       <div style="margin-bottom:100px "></div>
                                    </div>
                                 </div>

								<?php 
								while ( have_posts() ){ the_post();
									global $post;
									
									$comment_count = wp_count_comments( $post->ID );
									$comment_count = $comment_count->total_comments;

									$post_categories = wp_get_post_categories( $post->ID );
									$custom_count_cats = 0;
									$count_post_categories = count($post_categories);
									$post_tags = wp_get_post_tags( $post->ID );
									$custom_count_tags = 0;
									$count_post_tags = count($post_tags);
									$term_list = get_the_term_list($post->ID,'category');
									?>
                                 <div class="fw-row">
                                    <div class="fw-col-xs-12 col-md-12 ">
                                       <div class="awardthemes-simple-heading text-center header-cs">
                                          <div id="awardthemes-heading-2" class="section-header-2 section-header">
                                             <h3><strong class="title">                                             	
													<?php 
													if(isset($post_categories) && $post_categories <> ''){
														foreach($post_categories as $c){
															$custom_count_cats++;
															if($custom_count_cats == $count_post_categories){
																$sep_format_cat = '';
															}else{
																$sep_format_cat = ', ';
															}
															$cat = get_category( $c ); ?>
															<!-- <a href="<?php echo get_category_link($c); ?>"> -->
																<?php echo esc_attr($cat->name); ?>
																	<!-- </a> -->
																<?php echo ' '; ?>
															<?php
														}	
													}
													?>
                                             </strong></h3>
                                             <p> </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="fw-row">
                                    <div class="fw-col-xs-12 col-md-12 ">
                                       <div class="blog-holder ">
                                          <div class="row">
                                             <div class="blog-full-single single-detail">
													<!--Blog Detail Start-->
													<div class="post-content-parent">	
														<!-- <div class="featured-image">
															<?php 
															if(has_post_thumbnail()){
																echo get_the_post_thumbnail($post->ID,'full'); ?>
																<div class="post-like">
																	<?php 
																	if(isset($post_categories) && $post_categories <> ''){
																		foreach($post_categories as $c){
																			$custom_count_cats++;
																			if($custom_count_cats == $count_post_categories){
																				$sep_format_cat = '';
																			}else{
																				$sep_format_cat = ', ';
																			}
																			$cat = get_category( $c ); ?>
																			<a href="<?php echo get_category_link($c); ?>"><?php echo esc_attr($cat->name); ?></a><?php echo ' '; ?>
																			<?php
																		}	
																	}
																	?>
																</div>
																<?php
															} ?>
														</div> -->
														<div class="container">
															<div class="main-single">
																<h1 class="entry-title"><?php echo the_title(); ?></h1>
																<!-- <div class="post-meta">
																	<span class="posted-on"><?php echo esc_attr__('Ngày đăng','woodest'); ?>
																		<a href="#"><?php echo esc_attr(get_the_date(get_option( 'date_format' ))); ?></a>
																	</span>
																	<span class="byline"> <?php echo esc_attr__('bởi','woodest'); ?> <span class="author">
																		<?php echo get_the_author_link(); ?></span>
																	</span>
																	<?php
																	if(function_exists('woodest_get_post_views')){ ?>
																		<span class="seperator">|</span>
																		<span class="post-views">  <?php echo woodest_get_post_views($post->ID); ?> <?php echo esc_attr__('Lượt xem','woodest'); ?> </span>	
																		<?php 
																	}
																	?>
																	
																</div> -->
																<div class="post-content">
																	<?php 
																	the_content(); 
																	wp_link_pages( array(
																		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Trang:', 'woodest' ) . '</span>',
																		'after'       => '</div>',
																		'link_before' => '<span>',
																		'link_after'  => '</span>',
																		'pagelink'    => '<span class="screen-reader-text"></span>%',
																		'separator'   => '<span class="screen-reader-text"></span>',
																		) );
																	?>
																</div>
																<?php 
																if(has_tag()){ ?>
																	<div class="tags-inline">
																		<span class="cat-links"><?php echo esc_attr__('Đăng trong','woodest'); ?> 
																			<?php
																			if(isset($post_tags) && $post_tags <> ''){ ?>
																				<?php
																				foreach($post_tags as $t){
																					$custom_count_tags++;
																					if($custom_count_tags == $count_post_tags){
																						$sep_format = ' ';
																					}else{
																						$sep_format = ' ';
																					}
																					
																					$tag = get_category( $t ); ?>
																					<a href="<?php echo get_term_link($t); ?>"><?php echo esc_attr($tag->name); ?></a><?php echo esc_attr($sep_format); ?>
																					<?php
																				}
																			}
																			?>
																		</span> 
																	</div>
																	<?php 
																}
																
																if(isset($enable_social_share) && $enable_social_share == 'enable' ){ ?>
																	<div class="share-wrapper">
																		<div class="woodest-social-share">
																			<a href="#" class="post-share"><i class="fa fa-share fa-fw"></i></a>
																			<?php echo awardthemes_get_social_shares();?>
																		</div>
																		<div class="comments-wrapper">
																			<a href="#">
																			<i class="fa fa-comments"></i>
																			<span><?php echo esc_attr($comment_count); ?></span>
																			</a>
																		</div>
																	</div>
																	<?php 
																}
																	
																if(get_next_post() || get_previous_post()){
																	$prevPost = get_previous_post(); 
																	if(!empty($prevPost)){
																		
																		if(has_post_thumbnail($prevPost->ID)){
																			$prev_thumbnail_id = get_post_thumbnail_id( $prevPost->ID );
																			$prev_image = wp_get_attachment_image($prev_thumbnail_id, array(480, 310));
																			$prev_title_only = 'next-prev-title';
																		}else{
																			$prev_image = '';
																			$prev_title_only = 'no-image-present';
																		}
																		
																	}else{
																		$prev_image = '';
																		$prev_title_only = 'no-image-present';
																	}
																	$nextPost = get_next_post(); 
																	if(!empty($nextPost)){
																		
																		if(has_post_thumbnail($nextPost->ID)){
																			$next_thumbnail_id = get_post_thumbnail_id( $nextPost->ID );
																			$next_image = wp_get_attachment_image($next_thumbnail_id, array(480, 310));
																			
																		}else{
																			$next_image = '';
																		}
																	}else{
																		$next_image = '';
																	}
																	?>
																	<!-- <div class="woodest-post-blocks">
																		<div class="post-nav">
																			<div class="prev">
																				<?php previous_post_link('<div class="prev-post">%link</div>', '<span> '.esc_attr__('Tin trước', 'woodest').'', true); ?>
																			</div>
																			<div class="next">
																				<?php next_post_link('<div class="next-post">%link</div>', '<span>'.esc_attr__('Tin sau', 'woodest').' ', true); ?>
																			</div>
																		</div>
																	</div> -->						

																<?php	
																}
																?>
															</div>
														</div>
													</div>

														<?php
															/*
															 * Code hiển thị bài viết liên quan trong cùng 1 category
															 */
															$categories = get_the_category(get_the_ID());
															if ($categories){
															    echo '<div class="blog-holder lien-quan">';
															    $category_ids = array();
															    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
															    $args=array(
															        'category__in' => $category_ids,
															        'post__not_in' => array(get_the_ID()),
															        'posts_per_page' => 5, // So bai viet dc hien thi
															    );
															    $my_query = new wp_query($args);
															    if( $my_query->have_posts() ):
															        echo '
																	<div id="awardthemes-heading-2" class="section-header-2 section-header">
							                                             <h3><strong class="title">                                             	
																				Có thể bạn quan tâm
							                                             </strong></h3>
						                                          </div>
															        ';
															        while ($my_query->have_posts()):$my_query->the_post();
															            ?>
															            <article class="col-md-3 col-sm-6" id="post-<?php the_ID(); ?>">
															            	<div class="main-post ">
																				<?php 
																				if(has_post_thumbnail()){ ?>
																					<div class="entry-cover row">
																						<a href="<?php echo esc_url(get_permalink()); ?>">
																							<figure>
																								<?php the_post_thumbnail('full' ); ?>
																							</figure>
																						</a>
																					</div>
																					<?php 
																				} ?>
																				<div class="main-content">
																					<div class="title">
																						<a href="<?php echo esc_url(get_permalink())?>"><?php echo substr(get_the_title(),0,100); ?></a>
																					</div>
																					<div class="content">
																						<?php echo substr(get_the_content(),0,200); ?>
																					</div>
																				</div>
																			</div>
																			</article>
															            <?php
															        endwhile;
															        echo '</ul>';
															    endif; wp_reset_query();
															    echo '</div>';
															}
															?>
													<?php 
												} ?>
											</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>