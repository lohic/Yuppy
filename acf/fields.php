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
	register_field_group(array (
		'id' => 'acf_images-de-fond',
		'title' => 'Images de fond',
		'fields' => array (
			array (
				'key' => 'field_53a1b4f3852d0',
				'label' => 'Images de fond',
				'name' => 'backgrounds',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53a1b562852d1',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'medium',
						'library' => 'uploadedTo',
					),
					array (
						'key' => 'field_53ac4c6120c94',
						'label' => 'Répétition',
						'name' => 'repeat',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'repeat' => 'Motif répété',
							'no-repeat' => 'Pas de répétion',
						),
						'default_value' => 'repeat',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_53ac4caa20c95',
						'label' => 'Défilant/fixe',
						'name' => 'attachment',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'scroll' => 'Défilant',
							'fixed' => 'Fixe',
						),
						'default_value' => 'scroll',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_53ac4d1920c96',
						'label' => 'Dimension',
						'name' => 'size',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'normal' => 'Normal',
							'cover' => 'Recadré',
							'contain' => 'À l\'échelle',
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
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
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
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
