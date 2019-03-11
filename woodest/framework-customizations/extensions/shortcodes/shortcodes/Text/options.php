<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'textcontent' => array(
        'type' => 'text',
        'label' => esc_attr__('Text', 'woodest'),
        'desc' => esc_attr__('.', 'woodest'),
    ),
    'fontsize' => array(
        'type' => 'text',
        'label' => esc_attr__('Font Size', 'woodest'),
        'desc' => esc_attr__('.', 'woodest'),
    ),
);
