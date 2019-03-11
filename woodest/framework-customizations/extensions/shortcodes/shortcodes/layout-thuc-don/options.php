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
	'heading_style' => array(
		'label' => esc_attr__('Layout style', 'woodest'),
		'type'  => 'select',
		'desc' => esc_attr__('Please select the heading style here.', 'woodest'),
		'choices' => array(
			'style_1' => esc_attr__('Style 1', 'woodest'),
			'style_2' => esc_attr__('Style 2', 'woodest'),
		),
	),
	'title' => array(
		'label' => esc_attr__('Title', 'woodest'),
		'type'  => 'text',
		'desc' => esc_attr__('', 'woodest'),
	),
	'des' => array(
		'label' => esc_attr__('Descript', 'woodest'),
		'type'  => 'text',
		'desc' => esc_attr__('', 'woodest'),
	),
	'text_button' => array(
		'label' => esc_attr__('Text Botton', 'woodest'),
		'type'  => 'text',
		'desc' => esc_attr__('', 'woodest'),
	),
	'logo' => array(
		'label' => esc_attr__('Logo Title', 'woodest'),
		'type'  => 'upload',
		'desc' => esc_attr__('', 'woodest'),
	),
	'background' => array(
		'label' => esc_attr__('Bacnkground', 'woodest'),
		'type'  => 'upload',
		'desc' => esc_attr__('', 'woodest'),
	),
	'title_color' => array(
		'label' => esc_attr__('Title Color', 'woodest'),
		'type'  => 'color-picker',
	),
);
