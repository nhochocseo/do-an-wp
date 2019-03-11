<?php
/**
 * The header for our theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<?php
if(function_exists('fw_get_db_settings_option')){
		$favicon = fw_get_db_settings_option('favicon');
		
	} else {
		$favicon = '';
}

?>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="Referrer" content="no-referrer" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($favicon['url']); ?>">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<?php 
		
		wp_head(); 
		?>
	</head>
	<body <?php body_class(); ?>>
		<div class="body-wrapper" data-home="<?php echo esc_url(home_url('/')); ?>">
			<?php get_template_part( 'template-parts/header/header', 'functions' ); ?>
			<?php get_template_part( 'template-parts/header/sub', 'headers' ); ?>
			<div class="awardthemes-content">