<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Form Đặt bàn', 'woodest' ),
	'description' => esc_attr__( 'Thêm', 'woodest' ),
	'tab'         => esc_attr__( 'Woodest', 'woodest' ),
	'popup_size'  => 'medium'
);