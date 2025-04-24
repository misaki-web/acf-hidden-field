<?php

namespace AcfHiddenField;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * acf_field_hidden class.
 */
class acf_field_hidden extends \acf_field {
	private const DEFAULT_EDITOR_MODE = 'tree';

	/**
	 * Constructor.
	 */
	public function __construct() {
		/**
		 * Field type reference used in PHP code.
		 *
		 * No spaces. Underscores allowed.
		 */
		$this->name = 'hidden';

		/**
		 * Field type label.
		 *
		 * For public-facing UI. May contain spaces.
		 */
		$this->label = __('Hidden', 'acf-hidden-field');

		/**
		 * The category the field appears within in the field type picker.
		 */
		$this->category = 'advanced';

		parent::__construct();
	}

	/**
	 * Settings to display when users configure a field of this type.
	 *
	 * These settings appear on the ACF “Edit Field Group” admin page when
	 * setting up the field.
	 *
	 * @param array $field
	 * @return void
	 */
	public function render_field_settings($field) {
		acf_render_field_setting(
			$field,
			[
				'name' => 'default_value',
				'label' => __('Default Value', 'acf-hidden-field'),
				'type' => 'text',
				'required' => false,
				'instructions' => __('Default content added to the "value" attribute', 'acf-hidden-field'),
			]
		);
	}

	/**
	 * HTML content to show when the field is edited.
	 *
	 * @param array $field The field settings and values.
	 * @return void
	 */
	public function render_field($field) {
		$field_id = isset($field['id']) ? esc_attr($field['id']) : '';
		$field_name = isset($field['name']) ? esc_attr($field['name']) : '';
		$field_value = isset($field['value']) ? esc_attr($field['value']) : '';

		if ($field_id !== '' && $field_name !== '') {
			echo "<input id=\"$field_id\" class=\"acf-hidden-field-input\" name=\"$field_name\" type=\"hidden\" value=\"$field_value\">";
		}
	}
}
