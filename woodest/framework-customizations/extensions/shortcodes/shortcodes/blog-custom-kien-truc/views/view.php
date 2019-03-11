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
	$textcontent = isset( $atts['textcontent'] ) ? $atts['textcontent'] : '';
	
	$post_builder_options['blog_num_title'] = isset( $atts['blog_num_title'] ) ? $atts['blog_num_title'] : '';
	$post_builder_options['blog_num_descrp'] = isset( $atts['blog_num_descrp'] ) ? $atts['blog_num_descrp'] : '';
	
	
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type' => 'vi_tri_kien_truc',
		'posts_per_page' => $blog_num_fetch,
		'orderby' => $blog_order_by,
		'paged' => $paged,
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'categories_dich_vu',
				'field'    => 'post_id',
				'terms'    => 59,
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

	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/jssor.slider.min.js'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/su-ly.js?ver=1.0'></script>
		<script>
      jssor_slider1_init = function () {
            var options = {
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                }
            };

            var jssor_slider1 = new $JssorSlider$('slider1_container', options);

            /*#region responsive code begin*/
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 820));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };

    </script>
	<div class="blog-kientruc container <?php echo esc_attr($page_class); ?>">
		<?php
		if($blog_slide == "co") {
				?>
				<div class="col-md-3">
					<div class="main-left-kien-truc">
						<div class="logo">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon.png">
						</div>
						<div class="main-content">
							<ul class="nav nav-tabs">
								<?php
								$count = 0;
								foreach ($blog_category as $key) { ?>
									<li class="<?php if($count == 0) {echo 'active';} ?>"><a data-toggle="tab" href="#tabmenu_<?php echo $key;?>"><?php echo get_the_category_by_ID($key);?></a></li>
									<!-- <div class="item">
										<?php echo get_the_category_by_ID($key);?>
									</div> -->
								<?php
								$count+=1;}
							?>
						  </ul>
						</div>
					</div>
				</div>
				<div class="col-md-8">					
					<div class="row">
						<div class="tab-content">
							<?php 
							$count = 0;
								foreach ($blog_category as $key) {
									$args = array(
										'post_type' => 'vi_tri_kien_truc',
										'posts_per_page' => $blog_num_fetch,
										'orderby' => $blog_order_by,
										'paged' => $paged,
										'tax_query' => array(
											'relation' => 'OR',
											array(
												'taxonomy' => 'categories_kien_truc',
												'field'    => 'post_id',
												'terms'    => $key,
											),
											array(
												'taxonomy' => 'post_tag',
												'field'    => 'post_id',
												'terms'    => '',
											),
										)
									);
									$the_query = new WP_Query( $args);
									?>
				<script>
				      jssor_slider<?php echo $key; ?>_init = function () {
				            var options = {
				                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
				                $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
				                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
				                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
				                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

				                $ThumbnailNavigatorOptions: {
				                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
				                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

				                    $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, default value is 1
				                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
				                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
				                    
				                    $ArrowNavigatorOptions: {
				                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
				                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				                        $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
				                    }
				                }
				            };

				            var jssor_slider<?php echo $key; ?> = new $JssorSlider$('slider<?php echo $key; ?>_container', options);

				            /*#region responsive code begin*/
				            //you can remove responsive code if you don't want the slider scales while window resizing
				            function ScaleSlider<?php echo $key; ?>() {
				                var parentWidth = jssor_slider<?php echo $key; ?>.$Elmt.parentNode.clientWidth;
				                if (parentWidth)
				                    jssor_slider<?php echo $key; ?>.$ScaleWidth(Math.min(parentWidth, 820));
				                else
				                    $Jssor$.$Delay(ScaleSlider, 30);
				            }

				            ScaleSlider<?php echo $key; ?>();
				            $Jssor$.$AddEvent(window, "load", ScaleSlider<?php echo $key; ?>);

				            $Jssor$.$AddEvent(window, "resize", ScaleSlider<?php echo $key; ?>);
				            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider<?php echo $key; ?>);
				            /*#endregion responsive code end*/
				        };

				    </script>
				    <div id="tabmenu_<?php echo $key; ?>" class="tab-pane <?php if($count == 0) {echo 'active';} ?>">
						<div id="slider<?php echo $key; ?>_container" style="position: relative; width: 820px; height: 700px; overflow: hidden;">
				        <!-- Loading Screen -->
				        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
				            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
				        </div>
					        <!-- Slides Container -->
					        <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 820px; height: 450px;
					            overflow: hidden;">
					            <?php
									$slide_count = 0;
									
									while ( $the_query->have_posts() ) : $the_query->the_post();
										if($slide_count == 0){ $slide_class = 'active'; }else { $slide_class = '';}
										$slide_count++;
										?>
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $the_query->post->ID ), 'single-post-thumbnail' );?>
						          		<div>
							                <img class="oveshow"data-u="image" src="<?php echo $image[0]; ?>" />
							                <img data-u="thumb" src="<?php echo $image[0]; ?>" />
						          			
								            <div class="content-slideshow">
												<?php the_content(); ?>
								            </div>
							            </div>
											<?php
									endwhile;
									?>  							            
					        </div>
					        <!-- thumbnail navigator container -->
					        <div data-u="thumbnavigator" class="jssort07" style="width: 820px; height: 100px; left: 0px; bottom: 118px;">
					            <!-- Thumbnail Item Skin Begin -->
					            <div data-u="slides" style="cursor: default;">
					                <div data-u="prototype" class="p">
					                    <div data-u="thumbnailtemplate" class="i"></div>
					                    <div class="o"></div>
					                </div>
					            </div>
					            <!-- Thumbnail Item Skin End -->
					            <div data-u="arrowleft" class="jssora051" style="width:40px;height:40px;top:123px;left:8px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
					                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
					                </svg>
					            </div>
					            <div data-u="arrowright" class="jssora051" style="width:40px;height:40px;top:123px;right:8px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
					                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
					                </svg>
					            </div>
					            <!--#endregion Arrow Navigator Skin End -->

					        </div>
					    </div>
							        <!--#endregion Thumbnail Navigator Skin End -->

							        <!-- Trigger -->
							        <script>
							            jssor_slider<?php echo $key; ?>_init();
							        </script>

						    </div>
						    <!-- Jssor Slider End -->
							<?php
							$count += 1;
								 }
							?>
							<div class="contentslide">
								<?php echo esc_attr($textcontent); ?>
							</div>
						</div>
				</div>
			<?php }
		wp_reset_postdata(); ?>
	</div>
</div>

      