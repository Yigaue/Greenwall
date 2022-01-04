/**
 * Newsletter block inspector.
 */

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const { compose } = wp.compose;

const {
	InspectorControls,
	withColors,
	ContrastChecker,
	PanelColorSettings,
} = wp.blockEditor;

const {
	PanelBody,
	SelectControl,
	TextControl,
	FormToggle,
	withFallbackStyles,
} = wp.components;

/**
 * Internal dependencies.
 */
import Padding from './../../../utils/components/padding';
import Margin from './../../../utils/components/margin';
import ButtonSettings from './../../../utils/inspector/button';
import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

/* Apply fallback styles. */
const applyFallbackStyles = withFallbackStyles( ( node, ownProps ) => {
	const {
		backgroundColor,
		textColor,
		buttonBackgroundColor,
		buttonTextColor,
	} = ownProps.attributes;
	const editableNode = node.querySelector( '[contenteditable="true"]' );
	const computedStyles = editableNode
		? getComputedStyle( editableNode )
		: null;
	return {
		fallbackBackgroundColor:
			backgroundColor || ! computedStyles
				? undefined
				: computedStyles.backgroundColor,
		fallbackTextColor:
			textColor || ! computedStyles ? undefined : computedStyles.color,
		fallbackButtonBackgroundColor:
			buttonBackgroundColor || ! computedStyles
				? undefined
				: computedStyles.buttonBackgroundColor,
		fallbackButtonTextColor:
			buttonTextColor || ! computedStyles
				? undefined
				: computedStyles.buttonTextColor,
	};
} );

class Inspector extends Component {
	doubleOptInChange( event ) {
		if ( this.props.doubleOptIn ) {
			this.props.doubleOptIn( event.target.checked );
		}
	}

	render() {
		const {
			attributes,
			setAttributes,
			backgroundColor,
			setBackgroundColor,
			fallbackBackgroundColor,
			textColor,
			fallbackTextColor,
			setTextColor,
			buttonBackgroundColor,
			fallbackButtonBackgroundColor,
			buttonTextColor,
			fallbackButtonTextColor,
			setButtonBackgroundColor,
			setButtonTextColor,
		} = this.props;

		const mailingListProviders = {
			mailchimp: {
				label: 'Mailchimp',
				value: 'mailchimp',
				lists: [
					{
						label: __( 'Select a list', 'genesis-blocks' ),
						value: '',
					},
				],
			},
		};

		genesis_blocks_newsletter_block_vars.mailingListProviders.mailchimp.lists.map(
			( item ) =>
				mailingListProviders.mailchimp.lists.push( {
					label: item.name,
					value: item.id,
				} )
		);

		return (
			<InspectorControls>
				<PanelBody
					title={ __( 'Newsletter', 'genesis-blocks' ) }
					initialOpen={ attributes.mailingList ? false : true }
				>
					<RenderSettingControl id="gb_newsletter_mailingList">
						<SelectControl
							label={ __( 'Mailing List', 'genesis-blocks' ) }
							help={ __(
								'The list people will be subscribed to.',
								'genesis-blocks'
							) }
							options={ mailingListProviders.mailchimp.lists }
							value={ attributes.mailingList }
							onChange={ ( value ) =>
								setAttributes( { mailingList: value } )
							}
						/>
					</RenderSettingControl>

					<RenderSettingControl id="gb_newsletter_successMessage">
						<TextControl
							type="string"
							label={ __( 'Success Message', 'genesis-blocks' ) }
							help={ __(
								'The message shown when people successfully subscribe.',
								'genesis-blocks'
							) }
							value={ attributes.successMessage }
							onChange={ ( value ) =>
								setAttributes( { successMessage: value } )
							}
						/>
					</RenderSettingControl>

					<RenderSettingControl id="gb_newsletter_doubleOptIn">
						<div className="gb-newsletter-double-opt-in-setting-wrapper">
							<FormToggle
								id={
									'double-opt-in-toggle-' +
									this.props.instanceId
								}
								className="gb-newsletter-double-opt-in-toggle"
								checked={ attributes.doubleOptIn }
								onChange={ ( event ) =>
									setAttributes( {
										doubleOptIn: event.target.checked,
									} )
								}
							/>
							<label
								className="gb-newsletter-double-opt-in-setting-label"
								htmlFor={
									'double-opt-in-toggle-' +
									this.props.instanceId
								}
							>
								{ __(
									'Enable Double Opt-In',
									'genesis-blocks'
								) }
							</label>
							<p className="description">
								{ __(
									'Send contacts an opt-in confirmation email when they subscribe to your list.',
									'genesis-blocks'
								) }
							</p>
						</div>
					</RenderSettingControl>
				</PanelBody>

				<PanelBody
					title={ __( 'General', 'genesis-blocks' ) }
					initialOpen={ attributes.mailingList ? true : false }
				>
					<RenderSettingControl id="gb_newsletter_containerPadding">
						<Padding
							// Enable padding on all sides
							paddingEnable={ true }
							paddingTitle={ __(
								'Block Padding',
								'genesis-blocks'
							) }
							paddingHelp={ __(
								'Adjust the padding applied to the inside of the block.',
								'genesis-blocks'
							) }
							padding={ attributes.containerPadding }
							paddingMin="0"
							paddingMax="100"
							onChangePadding={ ( containerPadding ) =>
								setAttributes( { containerPadding } )
							}
						/>
					</RenderSettingControl>

					<RenderSettingControl id="gb_newsletter_containerMargin">
						<Margin
							// Enable margin top setting
							marginEnableTop={ true }
							marginTopLabel={ __(
								'Block Margin Top',
								'genesis-blocks'
							) }
							marginTop={ attributes.containerMarginTop }
							marginTopMin="0"
							marginTopMax="200"
							onChangeMarginTop={ ( containerMarginTop ) =>
								setAttributes( { containerMarginTop } )
							}
							// Enable margin bottom setting
							marginEnableBottom={ true }
							marginBottomLabel={ __(
								'Block Margin Bottom',
								'genesis-blocks'
							) }
							marginBottom={ attributes.containerMarginBottom }
							marginBottomMin="0"
							marginBottomMax="200"
							onChangeMarginBottom={ ( containerMarginBottom ) =>
								setAttributes( { containerMarginBottom } )
							}
						/>
					</RenderSettingControl>

					<ButtonSettings
						enableButtonTarget={ false }
						buttonSize={ attributes.buttonSize }
						onChangeButtonSize={ ( buttonSize ) =>
							setAttributes( { buttonSize } )
						}
						buttonShape={ attributes.buttonShape }
						onChangeButtonShape={ ( buttonShape ) =>
							setAttributes( { buttonShape } )
						}
						enableButtonBackgroundColor={ false }
						enableButtonTextColor={ false }
					/>
				</PanelBody>

				<RenderSettingControl id="gb_newsletter_colorOptions">
					<PanelColorSettings
						title={ __( 'Color', 'genesis-blocks' ) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: backgroundColor.color,
								onChange: setBackgroundColor,
								label: __(
									'Block Background Color',
									'genesis-blocks'
								),
							},
							{
								value: textColor.color,
								onChange: setTextColor,
								label: __(
									'Block Text Color',
									'genesis-blocks'
								),
							},
							{
								value: buttonBackgroundColor.color,
								onChange: setButtonBackgroundColor,
								label: __(
									'Button Background Color',
									'genesis-blocks'
								),
							},
							{
								value: buttonTextColor.color,
								onChange: setButtonTextColor,
								label: __(
									'Button Text Color',
									'genesis-blocks'
								),
							},
						] }
					>
						{ /* Compare block background and block text color */ }
						<ContrastChecker
							{ ...{
								textColor: textColor.color,
								backgroundColor: backgroundColor.color,
								fallbackTextColor,
								fallbackBackgroundColor,
							} }
						/>
						{ /* Compare button background and button text color */ }
						<ContrastChecker
							{ ...{
								textColor: buttonTextColor.color,
								backgroundColor: buttonBackgroundColor.color,
								fallbackButtonTextColor,
								fallbackButtonBackgroundColor,
							} }
						/>
						{ /* Compare block background button background color */ }
						<ContrastChecker
							{ ...{
								textColor: buttonBackgroundColor.color,
								backgroundColor: backgroundColor.color,
								fallbackButtonBackgroundColor,
								fallbackBackgroundColor,
							} }
						/>
					</PanelColorSettings>
				</RenderSettingControl>
			</InspectorControls>
		);
	}
}

export default compose( [
	applyFallbackStyles,
	withColors(
		'backgroundColor',
		{ textColor: 'color' },
		{ buttonBackgroundColor: 'background-color' },
		{ buttonTextColor: 'color' }
	),
] )( Inspector );
