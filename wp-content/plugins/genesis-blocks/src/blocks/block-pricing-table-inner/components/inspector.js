/**
 * Inspector Controls
 */

import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

// Setup the block
const { __ } = wp.i18n;
const { Component } = wp.element;

// Import block components
const { InspectorControls, PanelColorSettings } = wp.blockEditor;

// Import Inspector components
const { PanelBody, RangeControl } = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	render() {
		// Setup the attributes
		const {
			attributes: {
				borderWidth,
				borderColor,
				borderRadius,
				backgroundColor,
				padding,
			},
			setAttributes,
		} = this.props;

		const onChangeBorderColor = ( value ) =>
			setAttributes( { borderColor: value } );
		const onChangeBackgroundColor = ( value ) =>
			setAttributes( { backgroundColor: value } );

		return (
			<InspectorControls key="inspector">
				<PanelBody>
					<RenderSettingControl id="gb_pricing_inner_padding">
						<RangeControl
							label={ __(
								'Pricing Column Padding',
								'genesis-blocks'
							) }
							value={ padding }
							onChange={ ( value ) =>
								this.props.setAttributes( { padding: value } )
							}
							min={ 0 }
							max={ 20 }
							step={ 1 }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="gb_pricing_inner_borderWidth">
						<RangeControl
							label={ __(
								'Pricing Column Border',
								'genesis-blocks'
							) }
							value={ borderWidth }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									borderWidth: value,
								} )
							}
							min={ 0 }
							max={ 10 }
							step={ 1 }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="gb_pricing_inner_borderRadius">
						<RangeControl
							label={ __(
								'Pricing Column Border Radius',
								'genesis-blocks'
							) }
							value={ borderRadius }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									borderRadius: value,
								} )
							}
							min={ 0 }
							max={ 20 }
							step={ 1 }
						/>
					</RenderSettingControl>
				</PanelBody>
				{ 0 < borderWidth && (
					<RenderSettingControl id="gb_pricing_inner_borderColor">
						<PanelColorSettings
							title={ __(
								'Pricing Column Border Color',
								'genesis-blocks'
							) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: borderColor,
									onChange: onChangeBorderColor,
									label: __(
										'Border Color',
										'genesis-blocks'
									),
								},
							] }
						></PanelColorSettings>
					</RenderSettingControl>
				) }
				<RenderSettingControl id="gb_pricing_inner_colorSettings">
					<PanelColorSettings
						title={ __(
							'Pricing Column Background Color',
							'genesis-blocks'
						) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: backgroundColor,
								onChange: onChangeBackgroundColor,
								label: __(
									'Background Color',
									'genesis-blocks'
								),
							},
						] }
					></PanelColorSettings>
				</RenderSettingControl>
			</InspectorControls>
		);
	}
}
