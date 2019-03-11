<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$textcontent = (isset( $atts['textcontent'] ) && $atts['textcontent'] !='') ? $atts['textcontent'] : '';
	$fontsize = (isset( $atts['fontsize'] ) && $atts['fontsize'] !='') ? $atts['fontsize'] : '';
?>
<p style="font-size: <?php echo esc_attr($fontsize) ?>px">
	<?php echo esc_attr($textcontent) ?>
</p>
	