/**
 * Inspector Controls
 */

import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

// Setup the block
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;

// Import block components
const { InspectorControls, PanelColorSettings } = wp.blockEditor;

// Import Inspector components
const { PanelBody, RangeControl, ToggleControl, SelectControl } = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
	render() {
		// Setup the attributes
		const {
			attributes: {
				spacerHeight,
				spacerDivider,
				spacerDividerStyle,
				spacerDividerColor,
				spacerDividerHeight,
			},
			setAttributes,
		} = this.props;

		// Button size values
		const spacerStyleOptions = [
			{
				value: 'gb-divider-solid',
				label: __( 'Solid', 'genesis-blocks' ),
			},
			{
				value: 'gb-divider-dashed',
				label: __( 'Dashed', 'genesis-blocks' ),
			},
			{
				value: 'gb-divider-dotted',
				label: __( 'Dotted', 'genesis-blocks' ),
			},
		];

		// Divider color
		const dividerColor = [
			{ color: '#ddd', name: 'white' },
			{ color: '#333', name: 'black' },
			{ color: '#3373dc', name: 'royal blue' },
			{ color: '#22d25f', name: 'green' },
			{ color: '#ffdd57', name: 'yellow' },
			{ color: '#ff3860', name: 'pink' },
			{ color: '#7941b6', name: 'purple' },
		];

		// Update color values
		const onChangeDividerColor = ( value ) =>
			setAttributes( { spacerDividerColor: value } );

		return (
			<InspectorControls key="inspector">
				<PanelBody>
					<RenderSettingControl id="gb_spacer_spacerHeight">
						<RangeControl
							label={ __( 'Spacer Height', 'genesis-blocks' ) }
							value={ spacerHeight || '' }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									spacerHeight: value,
								} )
							}
							min={ 30 }
							max={ 600 }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="gb_spacer_spacerDivider">
						<ToggleControl
							label={ __( 'Add Divider', 'genesis-blocks' ) }
							checked={ spacerDivider }
							onChange={ () =>
								this.props.setAttributes( {
									spacerDivider: ! spacerDivider,
								} )
							}
						/>
					</RenderSettingControl>
				</PanelBody>
				{ spacerDivider ? (
					<Fragment>
						<PanelBody>
							<RenderSettingControl id="gb_spacer_spacerDividerStyle">
								<SelectControl
									label={ __(
										'Divider Style',
										'genesis-blocks'
									) }
									value={ spacerDividerStyle }
									options={ spacerStyleOptions.map(
										( { value, label } ) => ( {
											value,
											label,
										} )
									) }
									onChange={ ( value ) => {
										this.props.setAttributes( {
											spacerDividerStyle: value,
										} );
									} }
								/>
							</RenderSettingControl>
							<RenderSettingControl id="gb_spacer_spacerDividerHeight">
								<RangeControl
									label={ __(
										'Divider Height',
										'genesis-blocks'
									) }
									value={ spacerDividerHeight || '' }
									onChange={ ( value ) =>
										this.props.setAttributes( {
											spacerDividerHeight: value,
										} )
									}
									min={ 1 }
									max={ 5 }
								/>
							</RenderSettingControl>
						</PanelBody>
						<RenderSettingControl id="gb_spacer_dividerColor">
							<PanelColorSettings
								title={ __( 'Divider Color', 'genesis-blocks' ) }
								initialOpen={ false }
								colorSettings={ [
									{
										colors: dividerColor,
										value: spacerDividerColor,
										onChange: onChangeDividerColor,
										label: __(
											'Divider Color',
											'genesis-blocks'
										),
									},
								] }
							></PanelColorSettings>
						</RenderSettingControl>
					</Fragment>
				) : null }
			</InspectorControls>
		);
	}
}
