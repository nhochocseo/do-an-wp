<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	$page_class = isset( $atts['page_class'] ) && $atts['page_class'] !='' ? $atts['page_class'] : '';
	$heading_style = isset( $atts['heading_style'] ) && $atts['heading_style'] !='' ? $atts['heading_style'] : '';
	$title = isset( $atts['title'] ) && $atts['title'] !='' ? $atts['title'] : '';
	$title_color = isset( $atts['title_color'] ) && $atts['title_color'] !='' ? $atts['title_color'] : '';
	$logo = isset( $atts['logo']['attachment_id'] ) && $atts['logo']['attachment_id'] !='' ? $atts['logo']['attachment_id'] : '';
	$background = isset( $atts['background']['attachment_id'] ) && $atts['background']['attachment_id'] !='' ? $atts['background']['attachment_id'] : '';
	$des = isset( $atts['des'] ) && $atts['des'] !='' ? $atts['des'] : '';
	$text_button = isset( $atts['text_button'] ) && $atts['text_button'] !='' ? $atts['text_button'] : '';
?>
	<div class="awardthemes-simple-heading text-<?php echo esc_attr($alignment); ?> <?php echo esc_attr($page_class); ?>">
		<?php 
		if($heading_style == 'style_1'){
			
			$custom_css ='.thuc-don-'. esc_attr($uni_flag).' .noidung .title{color:'.esc_attr($title_color).';}
				.thuc-don-'. esc_attr($uni_flag).' p{color:'.esc_attr($caption_color).';}
			';
			wp_enqueue_style('awardthemes-inline-style',get_template_directory_uri() . '/assets/css/inline-style.css');
			wp_add_inline_style( 'awardthemes-inline-style', $custom_css);
			?>


			<div class="row main-thuc-don thuc-don-<?php echo esc_attr($uni_flag); ?>">
				<div class="col-md-8 col-sm-12 thucdonright">
					<div class="content">
						<?php echo wp_get_attachment_image($background,'full' ); ?>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 thucdonleft">
					<div class="noidung">
						<div class="title">
							<?php echo esc_attr($title); ?>
						</div>
						<div class="content">
							<?php echo $des; ?>
						</div>
						<div class="chitiet">
							<?php echo esc_attr($text_button); ?>
						</div>
						<div class="avatar">
							<?php echo wp_get_attachment_image($logo,'full' ); ?>
						</div>
					</div>
				</div>
			</div>



			<?php	
		}else {
			$custom_css ='#awardthemes-heading-'. esc_attr($uni_flag).' h4{color:'.esc_attr($title_color).';}
				#awardthemes-heading-'. esc_attr($uni_flag).' p{color:'.esc_attr($caption_color).';}
			';
			wp_enqueue_style('awardthemes-inline-style',get_template_directory_uri() . '/assets/css/inline-style.css');
			wp_add_inline_style( 'awardthemes-inline-style', $custom_css);
		?>
				<div class="container main-thuc-don thuc-don-<?php echo esc_attr($uni_flag); ?>">
				<div class="col-md-8">
					<div class="content">
						<?php echo wp_get_attachment_image($background,'full' ); ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="noidung">
						<div class="title">
							<?php echo esc_attr($title); ?>
						</div>
						<div class="content">
							<?php echo $des; ?>
						</div>
						<div class="chitiet">
							<?php echo esc_attr($text_button); ?>
						</div>
						<div class="avatar">
							<?php echo wp_get_attachment_image($logo,'full' ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php	
		}?>
	</div>