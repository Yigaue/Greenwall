/**
 * Inspector Controls
 */

import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

// Setup the block
const { __ } = wp.i18n;
const { Component } = wp.element;

// Import block components
const { InspectorControls } = wp.blockEditor;

// Import Inspector components
const { PanelBody, SelectControl, ToggleControl } = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
	render() {
		// Button style values
		const buttonStyleOptions = [
			{
				value: 'gb-share-icon-text',
				label: __( 'Icon and Text', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-icon-only',
				label: __( 'Icon Only', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-text-only',
				label: __( 'Text Only', 'genesis-blocks' ),
			},
		];

		// Button shape values
		const buttonShapeOptions = [
			{
				value: 'gb-share-shape-square',
				label: __( 'Square', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-shape-rounded',
				label: __( 'Rounded Square', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-shape-circular',
				label: __( 'Circular', 'genesis-blocks' ),
			},
		];

		// Button size values
		const shareButtonSizeOptions = [
			{
				value: 'gb-share-size-small',
				label: __( 'Small', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-size-medium',
				label: __( 'Medium', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-size-large',
				label: __( 'Large', 'genesis-blocks' ),
			},
		];

		// Button color values
		const shareButtonColorOptions = [
			{
				value: 'gb-share-color-standard',
				label: __( 'Standard', 'genesis-blocks' ),
			},
			{
				value: 'gb-share-color-social',
				label: __( 'Social Colors', 'genesis-blocks' ),
			},
		];

		return (
			<InspectorControls key="inspector">
				<RenderSettingControl id="gb_sharing_links">
					<PanelBody>
						<p>
							{ __(
								'Enable or disable the sharing links you want to output.',
								'genesis-blocks'
							) }
						</p>

						<ToggleControl
							label={ __( 'Twitter', 'genesis-blocks' ) }
							checked={ !! this.props.attributes.twitter }
							onChange={ () =>
								this.props.setAttributes( {
									twitter: ! this.props.attributes.twitter,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'Facebook', 'genesis-blocks' ) }
							checked={ !! this.props.attributes.facebook }
							onChange={ () =>
								this.props.setAttributes( {
									facebook: ! this.props.attributes.facebook,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'Pinterest', 'genesis-blocks' ) }
							checked={ !! this.props.attributes.pinterest }
							onChange={ () =>
								this.props.setAttributes( {
									pinterest: ! this.props.attributes
										.pinterest,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'LinkedIn', 'genesis-blocks' ) }
							checked={ !! this.props.attributes.linkedin }
							onChange={ () =>
								this.props.setAttributes( {
									linkedin: ! this.props.attributes.linkedin,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'Reddit', 'genesis-blocks' ) }
							checked={ !! this.props.attributes.reddit }
							onChange={ () =>
								this.props.setAttributes( {
									reddit: ! this.props.attributes.reddit,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'Email', 'genesis-blocks' ) }
							checked={ !! this.props.attributes.email }
							onChange={ () =>
								this.props.setAttributes( {
									email: ! this.props.attributes.email,
								} )
							}
						/>
					</PanelBody>
				</RenderSettingControl>

				<PanelBody
					title={ __( 'Sharing Button Options', 'genesis-blocks' ) }
					initialOpen={ false }
				>
					<RenderSettingControl id="gb_sharing_shareButtonStyle">
						<SelectControl
							label={ __( 'Button Style', 'genesis-blocks' ) }
							value={ this.props.attributes.shareButtonStyle }
							options={ buttonStyleOptions.map(
								( { value, label } ) => ( {
									value,
									label,
								} )
							) }
							onChange={ ( value ) => {
								this.props.setAttributes( {
									shareButtonStyle: value,
								} );
							} }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="gb_sharing_shareButtonShape">
						<SelectControl
							label={ __( 'Button Shape', 'genesis-blocks' ) }
							value={ this.props.attributes.shareButtonShape }
							options={ buttonShapeOptions.map(
								( { value, label } ) => ( {
									value,
									label,
								} )
							) }
							onChange={ ( value ) => {
								this.props.setAttributes( {
									shareButtonShape: value,
								} );
							} }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="gb_sharing_shareButtonSize">
						<SelectControl
							label={ __( 'Button Size', 'genesis-blocks' ) }
							value={ this.props.attributes.shareButtonSize }
							options={ shareButtonSizeOptions.map(
								( { value, label } ) => ( {
									value,
									label,
								} )
							) }
							onChange={ ( value ) => {
								this.props.setAttributes( {
									shareButtonSize: value,
								} );
							} }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="gb_sharing_shareButtonColor">
						<SelectControl
							label={ __( 'Button Color', 'genesis-blocks' ) }
							value={ this.props.attributes.shareButtonColor }
							options={ shareButtonColorOptions.map(
								( { value, label } ) => ( {
									value,
									label,
								} )
							) }
							onChange={ ( value ) => {
								this.props.setAttributes( {
									shareButtonColor: value,
								} );
							} }
						/>
					</RenderSettingControl>
				</PanelBody>
			</InspectorControls>
		);
	}
}
