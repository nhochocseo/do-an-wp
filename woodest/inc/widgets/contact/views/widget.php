<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var string $before_title
 * @var string $after_title
 * @var string $before_widget
 * @var string $after_widget
 */
	global $awardthemes_allowed_html;
	// Opening of widget
	echo wp_kses($before_widget,$awardthemes_allowed_html);
	
	// Open of title tag
	?>
<div class="thong-tin">
	<div class="col-md-8">
		<?php
		if( !empty($title) ){
			echo wp_kses($args['before_title'], $awardthemes_allowed_html) . esc_attr($title) . $args['after_title']; 
		}
		?>
		<!--// TextWidget //-->
		<aside class="ftr-widget widget_contact">
			<?php
			if(isset($widget_phone) && $widget_phone <> ''){ ?>
				<div class="info-box">
					<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png"> <?php echo esc_attr($widget_phone);?></span>
				<?php 
			}

			if(isset($widget_email) && $widget_email <> ''){ ?>
					<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/email.png"> <!-- <a href="mailto:<?php echo esc_attr($widget_email);?>" title="<?php echo esc_attr($widget_email);?>"> --> <?php echo esc_attr($widget_email);?>
				<!-- </a>
					<a href="<?php echo esc_attr($widget_email_sec);?>" title="<?php echo esc_attr($widget_email_sec);?>"> --> 
						<!-- <?php echo esc_attr($widget_email_sec);?> -->
						
					<!-- </a>				 --></span>
				</div>
				<?php 
			} 
			if(isset($widget_address) && $widget_address <> ''){ ?>
				<div class="info-box">
					<p> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home.png"> <?php echo esc_attr($widget_address);?></p>
				</div>
				<?php 
			} ?>
		</aside>
		<!--// TextWidget //-->
		<?php		
		echo wp_kses($after_widget,$awardthemes_allowed_html);	 ?>
	</div>
	<div class="col-md-4">
		<div class="mapouter">
			<div class="main-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74697.31188422159!2d103.91386058354125!3d10.2781866836429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a78c62b49eda17%3A0x8aa79fbbdd72cdb!2zUGjDuiBRdeG7kWM!5e0!3m2!1svi!2s!4v1551251905238" width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>