<?php


class NCR_render_engine {

	protected $checkboxes;
	protected $options;
	protected $settings_field = 'uncr_settings';


	/**
	 * Function that is responsible for checking if an option has a value in it or not.
	 *
	 * Returns false if it doesn't
	 *
	 * @param $option_id
	 *
	 * @since   1.0.0
	 */
	public function check_option_value( $option_id ) {

		$this->option_id = $option_id;
		$this->options   = get_option( $this->settings_field );

		if ( !isset($this->options['captcha_key_type']) ) {
			$this->options['captcha_key_type'] = 'normal';
		}
		if ( !isset($this->options['disable_submit_button']) ) {
			$this->options['disable_submit_button'] = 'no';
		}

		if ( ! empty( $this->options[ $this->option_id ] ) ) {
			return $this->options[ $this->option_id ];
		} else {
			return;
		}

	}

	/**
	 * Function that is responsible for generating text fields
	 *
	 * @param $args
	 *
	 * @return string
	 *
	 * @since   1.0.0
	 */
	public function render_text_field( $args ) {

		$output = '<fieldset>';
		$output .= '<label for="' . esc_attr( $args['id'] ) . '" title="' . esc_attr( $args['title'] ) . '"></label>';
		$output .= '<input placeholder="' . esc_attr( $args['title'] ) . '" type="text" id="' . esc_attr( $args['id'] ) . '" name="' . esc_attr( $this->settings_field ) . '[' . esc_attr( $args['id'] ) . ']' . '" value="' . sanitize_text_field( $this->check_option_value( $args['id'] ) ) . '">';
		$output .= '</fieldset>';

		return $output;
	}


	/**
	 * Function that is responsible for generating radio fields
	 *
	 * @param $args
	 *
	 * @return string
	 *
	 * @since   1.0.0
	 */
	public function render_radio_field( $args ) {

		$output = '<fieldset class="uncr-radio-field-wrapper">';

		foreach ( $args['options'] as $array_key => $array_value ) {

			$output .= '<input id="' . esc_attr( $array_key ) . '" type="radio" name="' . esc_attr( $this->settings_field ) . '[' . esc_attr( $args['id'] ) . ']' . '" value="' . esc_attr( $array_key ) . '"' . checked( $this->check_option_value( $args['id'] ), esc_attr( $array_key ), false ) . '>';
			$output .= '<label for="' . esc_attr( $array_key ) . '">' . $array_value . '</label>';
		}

		$output .= '</fieldset>';

		return $output;

	}

	/**
	 * Function that is responsible for generating checkbox fields
	 *
	 * @param $args
	 *
	 * @return string
	 *
	 * @since   1.0.0
	 */
	public function render_multicheckbox_field( $args ) {

		$output = '<fieldset>';

		$args['options'] = array_flip( $args['options'] );

		$current_selection = $this->check_option_value( $args['id'] );

		if ( !is_array( $current_selection ) ) {
			$current_selection = array();
		}

		foreach ( $args['options'] as $value => $key ) {

			$output .= '<div class="uncr-checkbox-wrapper">';
			$output .= '<input id="' . esc_attr( $args['options'][ $value ] ) . '" type="checkbox" name="' . esc_attr( $this->settings_field ) . '[' . esc_attr( $args['id'] ) . '][]' . '" value="' . esc_attr( $key ) . '"' . checked( in_array($key, $current_selection ), true, false ) . '>';
			$output .= '<label for="' . esc_attr( $args['options'][ $value ] ) . '">' . esc_attr( $value ) . '</label>';
			$output .= '</div>';
		}

		$output .= '</fieldset>';

		return $output;

	}

	/**
	 * Function that is responsible for generating checkbox fields
	 *
	 * @param $args
	 *
	 * @return string
	 *
	 * @since   1.0.0
	 */
	public function render_checkbox_field( $args ) {

		$output = '<fieldset>';

		$args['options'] = array_flip( $args['options'] );

		foreach ( $args['options'] as $value => $key ) {

			$output .= '<div class="uncr-checkbox-wrapper">';
			$output .= '<input id="' . esc_attr( $args['options'][ $value ] ) . '" type="checkbox" name="' . esc_attr( $this->settings_field ) . '[' . esc_attr( $args['options'][ $value ] ) . ']' . '" value="' . esc_attr( $args['options'][ $value ] ) . '"' . checked( $this->check_option_value( $args['options'][ $value ] ), $key, false ) . '>';
			$output .= '<label for="' . esc_attr( $args['options'][ $value ] ) . '">' . esc_attr( $value ) . '</label>';
			$output .= '</div>';
		}

		$output .= '</fieldset>';

		return $output;

	}
	

	public function render_select_field( $args ) {


		$output = '<fieldset>';

		$output .= '<select name="' . esc_attr( $this->settings_field ) . '[' . esc_attr( $args['id'] ) . ']' . '">';

		foreach ( $args['options'] as $value => $key ) {

			$output .= '<option value="' . esc_attr( $key ) . '"' . selected( $this->check_option_value( $args['id'] ), $key, false ) . '">' . $value . '</option>';

		}
		$output .= '</select>';

		$output .= '</fieldset>';

		return $output;

	}


}