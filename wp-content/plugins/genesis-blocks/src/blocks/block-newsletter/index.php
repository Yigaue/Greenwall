<?php
/**
 * Newsletter block registration and rendering functions.
 *
 * @package Genesis\Blocks\Newsletter
 */

add_action( 'init', 'genesis_blocks_register_newsletter_block' );
/**
 * Registers the newsletter block.
 */
function genesis_blocks_register_newsletter_block() {

	register_block_type(
		'genesis-blocks/gb-newsletter',
		[
			'attributes'      => genesis_blocks_newsletter_block_attributes(),
			'render_callback' => 'genesis_blocks_render_newsletter_block',
		]
	);
}

/**
 * Renders the newsletter block.
 *
 * @param array $attributes The block attributes.
 * @return string The block HTML.
 */
function genesis_blocks_render_newsletter_block( $attributes ) {

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- False positive. Only used for displaying a message on AMP redirects.
	if ( ! empty( $_GET['gb-newsletter-submission-message'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- False positive. Only used for displaying a message on AMP redirects.
		echo '<p class="gb-newsletter-submission-message">' . esc_html( urldecode( sanitize_text_field( wp_unslash( $_GET['gb-newsletter-submission-message'] ) ) ) );
		return;
	}

	$amp_endpoint = function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();

	$hubspot_installed = defined( 'LEADIN_PLUGIN_VERSION' );

	if ( ! $amp_endpoint && ! $hubspot_installed ) {
		wp_enqueue_script( 'genesis-blocks-newsletter-functions' );
	}

	$defaults = [];
	foreach ( genesis_blocks_newsletter_block_attributes() as $key => $values ) {
		$defaults[ $key ] = isset( $values['default'] ) ? $values['default'] : null;
	}

	$attributes = wp_parse_args( $attributes, $defaults );

	$button_bg_color_class   = ! empty( $attributes['buttonBackgroundColor'] ) ? 'has-' . $attributes['buttonBackgroundColor'] . '-background-color' : null;
	$button_text_color_class = ! empty( $attributes['buttonTextColor'] ) ? 'has-' . $attributes['buttonTextColor'] . '-color' : null;
	$button_class            = $attributes['buttonClass'] . ' ' . $attributes['buttonSize'] . ' ' . $attributes['buttonShape'] . ' ' . $button_bg_color_class . ' ' . $button_text_color_class;

	$wrapper_styles = '';

	/* Padding styles. */
	if ( ! empty( $attributes['containerPadding'] ) && $attributes['containerPadding'] > 0 ) {
		$wrapper_styles .= 'padding:' . $attributes['containerPadding'] . 'px;';
	}

	/* Margin styles. */
	if ( ! empty( $attributes['containerMarginTop'] ) && $attributes['containerMarginTop'] > 0 ) {
		$wrapper_styles .= 'margin-top:' . $attributes['containerMarginTop'] . 'px;';
	}

	if ( ! empty( $attributes['containerMarginBottom'] ) && $attributes['containerMarginBottom'] > 0 ) {
		$wrapper_styles .= 'margin-bottom:' . $attributes['containerMarginBottom'] . 'px;';
	}

	/* Background styles. */
	if ( ! empty( $attributes['customBackgroundColor'] ) ) {
		$wrapper_styles .= 'background-color:' . $attributes['customBackgroundColor'] . ';';
	}

	/* Text styles. */
	if ( ! empty( $attributes['customTextColor'] ) ) {
		$wrapper_styles .= 'color:' . $attributes['customTextColor'] . ';';
	}

	/* Newsletter wrapper styles. */
	if ( ! empty( $wrapper_styles ) ) {
		$wrapper_style = $wrapper_styles;
	} else {
		$wrapper_style = null;
	}

	/* Wrapper color classes. */
	$wrapper_class = '';

	if ( isset( $attributes['className'] ) ) {
		$wrapper_class .= $attributes['className'];
	}

	if ( ! empty( $attributes['backgroundColor'] ) ) {
		$wrapper_class .= ' has-background has-' . $attributes['backgroundColor'] . '-background-color';
	}

	if ( ! empty( $attributes['customBackgroundColor'] ) ) {
		$wrapper_class .= ' gb-has-custom-background-color';
	}

	if ( ! empty( $attributes['textColor'] ) ) {
		$wrapper_class .= ' has-text-color has-' . $attributes['textColor'] . '-color';
	}

	if ( ! empty( $attributes['customTextColor'] ) ) {
		$wrapper_class .= ' gb-has-custom-text-color';
	}

	/* Button styles. */
	$button_styles_custom = '';

	if ( ! empty( $attributes['customButtonBackgroundColor'] ) ) {
		$button_styles_custom .= 'background-color:' . $attributes['customButtonBackgroundColor'] . ';';
	}

	if ( ! empty( $attributes['customButtonTextColor'] ) ) {
		$button_styles_custom .= 'color:' . $attributes['customButtonTextColor'] . ';';
	}

	/* Button style output. */
	if ( ! empty( $button_styles_custom ) ) {
		$button_styles = $button_styles_custom;
	} else {
		$button_styles = null;
	}

	$form = '
		<div class="gb-block-newsletter gb-form-styles ' . esc_attr( $wrapper_class ) . '" style="' . safecss_filter_attr( $wrapper_style ) . '" >
			<form method="post" action-xhr="' . esc_url( admin_url( 'admin-ajax.php' ) ) . '">
				<label for="gb-newsletter-email-address-' . esc_attr( $attributes['instanceId'] ) . '" class="gb-newsletter-email-address-label">' . esc_html( $attributes['emailInputLabel'] ) . '</label>
				<input type="email" id="gb-newsletter-email-address-' . esc_attr( $attributes['instanceId'] ) . '" name="gb-newsletter-email-address" class="gb-newsletter-email-address-input" />
				<input class="' . esc_attr( $button_class ) . ' gb-newsletter-submit" type="submit" style="' . safecss_filter_attr( $button_styles ) . '"  value="' . esc_attr( $attributes['buttonText'] ) . '"/>
				<input type="hidden" name="gb-newsletter-mailing-list-provider" value="' . esc_attr( $attributes['mailingListProvider'] ) . '" />
				<input type="hidden" name="gb-newsletter-mailing-list" value="' . esc_attr( $attributes['mailingList'] ) . '" />
				<input type="hidden" name="gb-newsletter-success-message" value="' . esc_attr( $attributes['successMessage'] ) . '" />
				<input type="hidden" name="gb-newsletter-double-opt-in" value="' . esc_attr( $attributes['doubleOptIn'] ) . '" />
				<input type="hidden" name="gb-newsletter-amp-endpoint-request" value="' . $amp_endpoint . '" />
				<input type="hidden" name="gb-newsletter-form-nonce" value="' . wp_create_nonce( 'gb-newsletter-form-nonce' ) . '" />
			</form>
			<div class="gb-block-newsletter-errors" style="display: none;"></div>
		</div>';

	return $form;
}

/**
 * Returns the newsletter block attributes.
 *
 * @return array
 */
function genesis_blocks_newsletter_block_attributes() {
	return [
		'buttonAlignment'             => [
			'type'    => 'string',
			'default' => 'left',
		],
		'buttonBackgroundColor'       => [
			'type' => 'string',
		],
		'customButtonBackgroundColor' => [
			'type' => 'string',
		],
		'buttonClass'                 => [
			'type'    => 'string',
			'default' => 'gb-button',
		],
		'buttonShape'                 => [
			'type'    => 'string',
			'default' => 'gb-button-shape-rounded',
		],
		'buttonSize'                  => [
			'type'    => 'string',
			'default' => 'gb-button-size-medium',
		],
		'buttonText'                  => [
			'type'    => 'string',
			'default' => esc_html__( 'Subscribe', 'genesis-blocks' ),
		],
		'buttonTextColor'             => [
			'type' => 'string',
		],
		'customButtonTextColor'       => [
			'type' => 'string',
		],
		'buttonTextProcessing'        => [
			'type'    => 'string',
			'default' => esc_html__( 'Please wait...', 'genesis-blocks' ),
		],
		'emailInputLabel'             => [
			'type'    => 'string',
			'default' => esc_html__( 'Your Email Address', 'genesis-blocks' ),
		],
		'mailingList'                 => [
			'type' => 'string',
		],
		'mailingListProvider'         => [
			'type'    => 'string',
			'default' => 'mailchimp',
		],
		'successMessage'              => [
			'type'    => 'string',
			'default' => esc_html__( 'Thanks for subscribing.', 'genesis-blocks' ),
		],
		'containerPadding'            => [
			'type'    => 'number',
			'default' => 0,
		],
		'containerMarginTop'          => [
			'type'    => 'number',
			'default' => 0,
		],
		'containerMarginBottom'       => [
			'type'    => 'number',
			'default' => 0,
		],
		'backgroundColor'             => [
			'type' => 'string',
		],
		'customBackgroundColor'       => [
			'type' => 'string',
		],
		'textColor'                   => [
			'type' => 'string',
		],
		'customTextColor'             => [
			'type' => 'string',
		],
		'instanceId'                  => [
			'type'    => 'number',
			'default' => 1,
		],
		'doubleOptIn'                 => [
			'type'    => 'boolean',
			'default' => false,
		],
	];
}

add_action( 'init', 'genesis_blocks_register_newsletter_block_settings' );
/**
 * Registers the Newsletter block settings.
 *
 * @since 1.0.0
 * @return void
 */
function genesis_blocks_register_newsletter_block_settings() {
	// Register a new global setting for the Mailchimp API key.
	register_setting(
		'genesis_blocks_global_settings',
		'genesis_blocks_mailchimp_api_key',
		[
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		]
	);
}

add_action( 'admin_init', 'genesis_blocks_register_newsletter_block_sections_and_fields' );
/**
 * Registers the setting sections and fields for the Newsletter block.
 *
 * @since 1.0.0
 * @return void
 */
function genesis_blocks_register_newsletter_block_sections_and_fields() {
	// Register a new section on the settings page for the Newsletter block.
	add_settings_section(
		'genesis_blocks_settings_newsletter_block_section',
		__( 'Newsletter Block', 'genesis-blocks' ),
		null, // Render callback is not needed.
		'genesis_blocks_global_settings'
	);

	add_settings_field(
		'genesis_blocks_block_newsletter_intro',
		__( 'Newsletter Block Settings', 'genesis-blocks' ),
		null, // Rendering is handled by React, not WordPress.
		'genesis_blocks_global_settings',
		'genesis_blocks_settings_newsletter_block_section',
		[
			// phpcs:ignore WordPress.WP.I18n.NoHtmlWrappedStrings -- passing to React to render.
			'content' => '<h2>' . __( 'Newsletter Block Settings', 'genesis-blocks' ) . '</h2><p>' . __( 'Setup the email newsletter block with Mailchimp.', 'genesis-blocks' ) . ' <a target="_blank" rel="noopener noreferrer" href="https://developer.wpengine.com/genesis-blocks/email-newsletter-block/">' . __( 'View Documentation', 'genesis-blocks' ) . '</a></p>',
			'type'    => 'html',
		]
	);

	// Add the Mailchimp API key field.
	add_settings_field(
		'genesis_blocks_mailchimp_api_key',
		__( 'Mailchimp API Key', 'genesis-blocks' ),
		null, // Callback function as rendering is not needed.
		'genesis_blocks_global_settings',
		'genesis_blocks_settings_newsletter_block_section',
		[
			'description' => __( 'Your Mailchimp API key is required for the Newsletter block to communicate with your Mailchimp account.', 'genesis-blocks' ),
			'type'        => 'text',
		]
	);

}
