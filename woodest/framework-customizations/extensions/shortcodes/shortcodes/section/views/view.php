<?php
if (!defined('FW')) {
    die('Forbidden');
}


	$awardthemes_sidebar = 'full';
	$content_col = 'col-md-12';
	$content_position = '';
	$sidebar_position = '';
	if (function_exists('fw_ext_sidebars_get_current_position')) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
			$awardthemes_sidebar = $current_position;
			$content_col = 'col-md-8';
		}
	}
	
	if (isset($awardthemes_sidebar) && $awardthemes_sidebar == 'right') {
		$sidebar_position = 'pull-right';
		$content_position = 'pull-left';
	} else if (isset($awardthemes_sidebar) && $awardthemes_sidebar == 'left') {
		$sidebar_position = 'pull-left';
		$content_position = 'pull-right';
	}

/**
 * @var $atts
 */
	$bg_video_data_attr  = '';
	$custom_classes = '';
	$custom_id = '';
	$section_css = '';
	
	$custom_css = '';
	$custom_unique_id = rand();
	
	if (isset($atts['custom_id']) && $atts['custom_id'] <> '' ){
		$custom_id = 'id = '. $atts['custom_id'];
	} 

	if (isset($atts['custom_classes'])){
		$custom_classes .= $atts['custom_classes'];
	} 
	
	if($atts['background_settings']['gadget'] == 'background-color'){
		$background_color = $atts['background_settings']['background-color'];
		
		if (!empty($background_color['background_color'])) {
			$section_css .= 'background-color:' .esc_attr($background_color['background_color']) . ';';
		}
		
	}else if($atts['background_settings']['gadget'] == 'background-image'){
		$background_img = $atts['background_settings']['background-image'];
		
		if (isset($background_img['background_image']['data']['icon']) && !empty($background_img['background_image']['data']['icon'])) {
			$section_css .= 'background-image:url(' . esc_url($background_img['background_image']['data']['icon']) . '); position:relative;';
		}
		
		if (isset($background_img['background_repeat'])){
			$section_css .= 'background-repeat:' . $background_img['background_repeat'] . ';';
		}
		if (isset($background_img['background_size'])){
			$section_css .= 'background-size:' . $background_img['background_size'] . ';';
		}
		
		if (isset($background_img['background_opacity'])){
			$custom_css.= '.awardthemes-elements.section-css-'. esc_attr($custom_unique_id).':before{
					background-color: '. $background_img['background_color'] .';
					opacity: '. $background_img['background_opacity'] .';
					content: "";
					position: absolute;
					left: 0;
					top: 0;
					right:0;
					bottom:0;
				}';
		}
		
	}else if($atts['background_settings']['gadget'] == 'background-video'){
		$background_video = $atts['background_settings']['background-video'];
		
		if ( ! empty( $background_video['video'] ) ) {
			$filetype           = wp_check_filetype( $background_video['video'] );
			$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
			$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
			$data_name_attr = version_compare( fw_ext('shortcodes')->manifest->get_version(), '1.3.9', '>=' ) ? 'data-background-options' : 'data-wallpaper-options';
			$bg_video_data_attr = $data_name_attr.'="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $background_video['video'] ) ) ) ) . '"';
			$custom_classes .= ' background-video';
		}
	}
	
	if(isset($atts['padding_top']) && $atts['padding_top'] != ''){
		$section_css .= 'padding-top:' . $atts['padding_top'] . 'px;';
	}
	
	if(isset($atts['padding_right']) && $atts['padding_right'] != ''){
		$section_css .= 'padding-right:' . $atts['padding_right'] . 'px;';
	}
	
	if (isset($atts['padding_bottom']) && $atts['padding_bottom'] != ''){
		$section_css .= 'padding-bottom:' . $atts['padding_bottom'] . 'px;';
	}

	if (isset($atts['padding_left']) && $atts['padding_left'] != ''){
		$section_css .= 'padding-left:' . $atts['padding_left'] . 'px;';
	}
	
	if(isset($atts['margin_top']) && $atts['margin_top'] != ''){
		$section_css .= 'margin-top:' . $atts['margin_top'] . 'px;';
	}
	
	if(isset($atts['margin_right']) && $atts['margin_right'] != ''){
		$section_css .= 'margin-right:' . $atts['margin_right'] . 'px;';
	}
	
	if (isset($atts['margin_bottom']) && $atts['margin_bottom'] != ''){
		$section_css .= 'margin-bottom:' . $atts['margin_bottom'] . 'px;';
	}

	if (isset($atts['margin_left']) && $atts['margin_left'] != ''){
		$section_css .= 'margin-left:' . $atts['margin_left'] . 'px;';
	}
	
	$custom_css.= '.awardthemes-elements.section-css-'. esc_attr($custom_unique_id).'{
		'.esc_attr($section_css).'
	}';
	
	wp_enqueue_style('awardthemes-inline-style',get_template_directory_uri() . '/assets/css/inline-style.css');
	wp_add_inline_style( 'awardthemes-inline-style', $custom_css);
	
	// $container_class = ( isset( $atts['fullwidth'] ) && $atts['fullwidth'] == 'yes' ) ? 'container-fluid' : 'container';
	if(isset( $atts['fullwidth'] )) {
		if($atts['fullwidth']['gadget'] == 'default') {
			$container_class = "container";
		} else if($atts['fullwidth']['gadget'] == 'yes'){
			$container_class = "container-fluid";
		} else if($atts['fullwidth']['gadget'] == 'width80'){
			$container_class = "container80";
		} else {
			$container_class = "container";
		}
	}
	if(isset( $atts['background_tintuc'] ) && $atts['background_tintuc'] == 'no' || $atts['background_tintuc'] == "") {
?>
<section <?php echo ($custom_id); ?> class="tin-tuc-main container-fluid no-padding <?php echo ' '; ?> awardthemes-elements section-css-<?php echo esc_attr($custom_unique_id); echo ' '; ?>  <?php echo ($custom_classes); ?>" <?php echo esc_attr($bg_video_data_attr); ?>>
	<div class="<?php echo esc_attr($container_class); ?>">		
		<div class="row">
			<div class="<?php echo esc_attr($content_col); echo ' '; echo esc_attr($content_position); ?>">
				<?php echo do_shortcode( $content ); ?>
			</div>
			<?php 
			if(function_exists('fw_ext_sidebars_get_current_position')) {
				if(isset($sidebar_position) && $sidebar_position <> ''){ ?>
					<div class="col-md-4 <?php echo esc_attr($sidebar_position); ?>">
						<?php echo fw_ext_sidebars_show('blue'); ?>
					</div>
					<?php 
				}
				
			} ?>
		</div>
	</div>	
</section>
<div class="clear"></div>
<?php
}
else {
	$background = isset( $atts['background']['attachment_id'] ) && $atts['background']['attachment_id'] !='' ? $atts['background']['attachment_id'] : '';
	$image_1 = isset( $atts['image_1']['attachment_id'] ) && $atts['image_1']['attachment_id'] !='' ? $atts['image_1']['attachment_id'] : '';
	$image_1_style_top = isset( $atts['image_1_style_top'] ) && $atts['image_1_style_top'] !='' ? $atts['image_1_style_top'] : '';
	$image_1_style_left = isset( $atts['image_1_style_left'] ) && $atts['image_1_style_left'] !='' ? $atts['image_1_style_left'] : '';
	$image_1_style_right = isset( $atts['image_1_style_right'] ) && $atts['image_1_style_right'] !='' ? $atts['image_1_style_right'] : '';
	$image_2 = isset( $atts['image_2']['attachment_id'] ) && $atts['image_2']['attachment_id'] !='' ? $atts['image_2']['attachment_id'] : '';
	$image_2_style_top = isset( $atts['image_2_style_top'] ) && $atts['image_2_style_top'] !='' ? $atts['image_2_style_top'] : '';
	$image_2_style_left = isset( $atts['image_2_style_left'] ) && $atts['image_2_style_left'] !='' ? $atts['image_2_style_left'] : '';
	$image_2_style_right = isset( $atts['image_2_style_right'] ) && $atts['image_2_style_right'] !='' ? $atts['image_2_style_right'] : '';
	$image_3 = isset( $atts['image_3']['attachment_id'] ) && $atts['image_3']['attachment_id'] !='' ? $atts['image_3']['attachment_id'] : '';
	$image_3_style_top = isset( $atts['image_3_style_top'] ) && $atts['image_3_style_top'] !='' ? $atts['image_3_style_top'] : '';
	$image_3_style_left = isset( $atts['image_3_style_left'] ) && $atts['image_3_style_left'] !='' ? $atts['image_3_style_left'] : '';
	$image_3_style_right = isset( $atts['image_3_style_right'] ) && $atts['image_3_style_right'] !='' ? $atts['image_3_style_right'] : '';
	$image_4 = isset( $atts['image_4']['attachment_id'] ) && $atts['image_4']['attachment_id'] !='' ? $atts['image_4']['attachment_id'] : '';
	$image_4_style_top = isset( $atts['image_4_style_top'] ) && $atts['image_4_style_top'] !='' ? $atts['image_4_style_top'] : '';
	$image_4_style_left = isset( $atts['image_4_style_left'] ) && $atts['image_4_style_left'] !='' ? $atts['image_4_style_left'] : '';
	$image_4_style_right = isset( $atts['image_4_style_right'] ) && $atts['image_4_style_right'] !='' ? $atts['image_4_style_right'] : '';
	$image_5 = isset( $atts['image_5']['attachment_id'] ) && $atts['image_5']['attachment_id'] !='' ? $atts['image_5']['attachment_id'] : '';
	$image_5_style_top = isset( $atts['image_5_style_top'] ) && $atts['image_5_style_top'] !='' ? $atts['image_5_style_top'] : '';
	$image_5_style_left = isset( $atts['image_5_style_left'] ) && $atts['image_5_style_left'] !='' ? $atts['image_5_style_left'] : '';
	$image_5_style_right = isset( $atts['image_5_style_right'] ) && $atts['image_5_style_right'] !='' ? $atts['image_5_style_right'] : '';
	$image_6 = isset( $atts['image_6']['attachment_id'] ) && $atts['image_6']['attachment_id'] !='' ? $atts['image_6']['attachment_id'] : '';
	$image_6_style_top = isset( $atts['image_6_style_top'] ) && $atts['image_6_style_top'] !='' ? $atts['image_6_style_top'] : '';
	$image_6_style_left = isset( $atts['image_6_style_left'] ) && $atts['image_6_style_left'] !='' ? $atts['image_6_style_left'] : '';
	$image_6_style_right = isset( $atts['image_6_style_right'] ) && $atts['image_6_style_right'] !='' ? $atts['image_6_style_right'] : '';
	$image_7 = isset( $atts['image_7']['attachment_id'] ) && $atts['image_7']['attachment_id'] !='' ? $atts['image_7']['attachment_id'] : '';
	$image_7_style_top = isset( $atts['image_7_style_top'] ) && $atts['image_7_style_top'] !='' ? $atts['image_7_style_top'] : '';
	$image_7_style_left = isset( $atts['image_7_style_left'] ) && $atts['image_7_style_left'] !='' ? $atts['image_7_style_left'] : '';
	$image_7_style_right = isset( $atts['image_7_style_right'] ) && $atts['image_7_style_right'] !='' ? $atts['image_7_style_right'] : '';
?>

<section class="tin-tuc-container container-fluid no-padding awardthemes-elements section-css-<?php echo esc_attr($custom_unique_id); echo ' '; ?>  <?php echo ($custom_classes);?> ">
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
		<div class="container-fluid no-padding">
			<div class="background"">
				<?php echo wp_get_attachment_image($background,'full' ); ?>
			</div>
			<div class="image_1" style="<?php
										if($image_1_style_top !='') { echo 'top: '; echo $image_1_style_top; echo ';'; }
										 if($image_1_style_left !='') { echo 'left: '; echo $image_1_style_left; echo ';'; }
										  if($image_1_style_right !='') { echo 'right: '; echo $image_1_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_1,'full' ); ?>
			</div>
			<div class="image_2" style="<?php
										if($image_2_style_top !='') { echo 'top: '; echo $image_2_style_top; echo ';'; }
										 if($image_2_style_left !='') { echo 'left: '; echo $image_2_style_left; echo ';'; }
										  if($image_2_style_right !='') { echo 'right: '; echo $image_2_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_2,'full' ); ?>
			</div>
			<div class="image_3" style="<?php
										if($image_3_style_top !='') { echo 'top: '; echo $image_3_style_top; echo ';'; }
										 if($image_3_style_left !='') { echo 'left: '; echo $image_3_style_left; echo ';'; }
										  if($image_3_style_right !='') { echo 'right: '; echo $image_3_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_3,'full' ); ?>
			</div>
			<div class="image_4" style="<?php
										if($image_4_style_top !='') { echo 'top: '; echo $image_4_style_top; echo ';'; }
										 if($image_4_style_left !='') { echo 'left: '; echo $image_4_style_left; echo ';'; }
										  if($image_4_style_right !='') { echo 'right: '; echo $image_4_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_4,'full' ); ?>
			</div>
			<div class="image_5" style="<?php
										if($image_5_style_top !='') { echo 'top: '; echo $image_5_style_top; echo ';'; }
										 if($image_5_style_left !='') { echo 'left: '; echo $image_5_style_left; echo ';'; }
										  if($image_5_style_right !='') { echo 'right: '; echo $image_5_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_5,'full' ); ?>
			</div>
			<div class="image_6" style="<?php
										if($image_6_style_top !='') { echo 'top: '; echo $image_6_style_top; echo ';'; }
										 if($image_6_style_left !='') { echo 'left: '; echo $image_6_style_left; echo ';'; }
										  if($image_6_style_right !='') { echo 'right: '; echo $image_6_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_6,'full' ); ?>
			</div>
			<div class="image_7" style="<?php
										if($image_7_style_top !='') { echo 'top: '; echo $image_7_style_top; echo ';'; }
										 if($image_7_style_left !='') { echo 'left: '; echo $image_7_style_left; echo ';'; }
										  if($image_7_style_right !='') { echo 'right: '; echo $image_7_style_right; echo ';'; } ?>">
				<?php echo wp_get_attachment_image($image_7,'full' ); ?>
			</div>
			<div class="container">
				<div class="row">
				<div class="<?php echo esc_attr($content_col); echo ' '; echo esc_attr($content_position); ?>">
					<?php echo do_shortcode( $content ); ?>
				</div>
			<?php 
			if(function_exists('fw_ext_sidebars_get_current_position')) {
				if(isset($sidebar_position) && $sidebar_position <> ''){ ?>
					<div class="col-md-4 <?php echo esc_attr($sidebar_position); ?>">
						<?php echo fw_ext_sidebars_show('blue'); ?>
					</div>
					<?php 
				}
				
			} ?>
		</div>
			</div>
		</div>
	</div></div>
</div>
	</div>	
</section>
<?php
}
?>