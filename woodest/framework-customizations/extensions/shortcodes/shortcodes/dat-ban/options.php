<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'page_class' => array(
        'type' => 'text',
        'label' => esc_attr__('Page Custom Class', 'woodest'),
        'desc' => esc_attr__('Please add the page custom class.', 'woodest'),
    ),
	'title' => array(
		'label' => esc_attr__('Tiêu đề chức năng', 'woodest'),
		'type'  => 'text',
		'desc' => esc_attr__('Nội dung tiêu đề.', 'woodest'),
	),
);
