<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Team', 'woodest' ),
	'description' => esc_attr__( 'Add a team element', 'woodest' ),
	'tab'         => esc_attr__( 'Woodest', 'woodest' ),
	'popup_size'  => 'medium'
);