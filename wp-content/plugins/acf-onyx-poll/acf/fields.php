<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e7d2e8ddec98',
	'title' => 'Onyx Poll',
	'fields' => array(
		array(
			'key' => 'field_5e7d2f3504edc',
			'label' => __('Answers', 'acf-onyx-poll'),
			'name' => 'onyx_poll_answers',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5e7d2f4904edd',
			'min' => 2,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5e7d3ded5af23',
					'label' => __('Image', 'acf-onyx-poll'),
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array (
						array (
							array (
							'field' => 'field_5ea7a5e12c4db',
							'operator' => '==',
							'value' => 1,
							),
						),
					),
					'wrapper' => array(
						'width' => '10',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'ID',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5e7d2f4904edd',
					'label' => __('Answer', 'acf-onyx-poll'),
					'name' => 'answer',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '70',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e7d2f6204ede',
					'label' => __('Votes', 'acf-onyx-poll'),
					'name' => 'votes',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 0,
					'max' => '',
					'step' => '',
				),
			),
		),
		array(
			'key' => 'field_5e7d3352bab6a',
			'label' => __('Limit voting', 'acf-onyx-poll'),
			'name' => 'onyx_poll_limit_vote',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => __('Free Vote', 'acf-onyx-poll'),
				2 => __('Per device', 'acf-onyx-poll'),
				30 => __('Every 30 minutes', 'acf-onyx-poll'),
				60 => __('Every 1 hour', 'acf-onyx-poll'),
				120 => __('Every 2 hours', 'acf-onyx-poll'),
				180 => __('Every 3 hours', 'acf-onyx-poll'),
				240 => __('Every 4 hours', 'acf-onyx-poll'),
				300 => __('Every 5 hours', 'acf-onyx-poll'),
				720 => __('Every 12 hours', 'acf-onyx-poll'),
				1440 => __('Every 24 hours', 'acf-onyx-poll'),
			),
			'default_value' => array(
				0 => 1,
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e7d3a19c7c98',
			'label' => __('Results', 'acf-onyx-poll'),
			'name' => 'onyx_poll_results',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => __('Show in percentage', 'acf-onyx-poll'),
				2 => __('Show in numbers', 'acf-onyx-poll'),
				3 => __('Show both', 'acf-onyx-poll'),
			),
			'default_value' => array(
				0 => 3,
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e7d329ff86b4',
			'label' => __('End of Poll', 'acf-onyx-poll'),
			'name' => 'onyx_poll_end',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y g:i a',
			'return_format' => 'Y-m-d H:i:s',
			'first_day' => 0,
		),
		array(
			'key' => 'field_5e7d3261e0a48',
			'label' => __('Total votes', 'acf-onyx-poll'),
			'name' => 'onyx_poll_total',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5ea7a5e12c4db',
			'label' => __('Enable Images', 'acf-onyx-poll'),
			'name' => 'onyx_poll_images',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5e7d3710c640f',
			'label' => __('Poll Modal', 'acf-onyx-poll'),
			'name' => 'onyx_poll_modal',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5e7d39d093c70',
			'label' => __('Show Results', 'acf-onyx-poll'),
			'name' => 'onyx_poll_show_results',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5e81c48f36a8f',
			'label' => __('Expired', 'acf-onyx-poll'),
			'name' => 'onyx_poll_expired',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		)
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'onyxpolls',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5e81950362e50',
	'title' => 'Onyx Poll Settings',
	'fields' => array(
		array(
			'key' => 'field_5e81954eb8b44',
			'label' => __('Modal Interval for Voting', 'acf-onyx-poll'),
			'name' => 'onyx_poll_modal_time',
			'type' => 'select',
			'instructions' => __('Periodicity that the poll modal appears to the user.', 'acf-onyx-poll'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => __('Every 1 hour', 'acf-onyx-poll'),
				2 => __('Every 2 hours', 'acf-onyx-poll'),
				3 => __('Every 3 hours', 'acf-onyx-poll'),
				4 => __('Every 4 hours', 'acf-onyx-poll'),
				5 => __('Every 5 hours', 'acf-onyx-poll'),
				12 => __('Every 12 hours', 'acf-onyx-poll'),
				24 => __('Every 24 hours', 'acf-onyx-poll'),
			),
			'default_value' => array(
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e81c96326aab',
			'label' => __('Use own CSS', 'acf-onyx-poll'),
			'name' => 'onyx_poll_css',
			'type' => 'true_false',
			'instructions' => __('To use your own CSS and disable the default plugin styles, check this option', 'acf-onyx-poll'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'onyx-poll-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5ed174ac8bd06',
	'title' => 'Onyx Poll Block',
	'fields' => array(
		array(
			'key' => 'field_5ed174c6b5a8f',
			'label' => __('Poll', 'acf-onyx-poll'),
			'name' => 'onyx_poll_block_id',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '70',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'onyxpolls',
			),
			'taxonomy' => '',
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		),
		array(
			'key' => 'field_5ed17b7ef8646',
			'label' => __('Style', 'acf-onyx-poll'),
			'name' => 'onyx_poll_block_style',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '30',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'standard' => __('Bar style', 'acf-onyx-poll'),
				'twitter' => __('Twitter', 'acf-onyx-poll'),
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/acf-onyx-poll',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

?>
