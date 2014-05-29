<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_caroussel',
		'title' => 'Caroussel',
		'fields' => array (
			array (
				'key' => 'field_537116d404191',
				'label' => 'Caroussel',
				'name' => 'caroussel',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_537116f804192',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'uploadedTo',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Ajouter une image',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'groupe',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'record',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
