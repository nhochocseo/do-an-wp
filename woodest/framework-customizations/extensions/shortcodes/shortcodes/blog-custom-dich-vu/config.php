<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Blog Custom Dịch Vụ', 'woodest' ),
	'description' => esc_attr__( 'Add a blog element', 'woodest' ),
	'tab'         => esc_attr__( 'Woodest', 'woodest' ),
	'popup_size'  => 'medium'
);