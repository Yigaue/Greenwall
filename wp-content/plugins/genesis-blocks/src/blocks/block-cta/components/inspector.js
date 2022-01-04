/**
 * Inspector Controls
 */

/**
 * Internal dependencies.
 */
import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

// Setup the block
const { __ } = wp.i18n;
const { Component } = wp.element;

// Import block components
const { InspectorControls, PanelColorSettings, MediaUpload } = wp.blockEditor;

// Import Inspector components
const {
	Button,
	Icon,
	PanelBody,
	RangeControl,
	SelectControl,
	ToggleControl,
} = wp.components;

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
			buttonBackgroundColor,
			buttonTextColor,
			buttonSize,
			buttonShape,
			buttonTarget,
			titleFontSize,
			ctaTextFontSize,
			ctaBackgroundColor,
			ctaTextColor,
			dimRatio,
			imgURL,
			imgID,
		} = this.props.attributes;
		const { setAttributes } = this.props;

		// Button size values
		const buttonSizeOptions = [
			{ value: 'gb-button-size-small', label: __( 'Small' ) },
			{ value: 'gb-button-size-medium', label: __( 'Medium' ) },
			{ value: 'gb-button-size-large', label: __( 'Large' ) },
			{ value: 'gb-button-size-extralarge', label: __( 'Extra Large' ) },
		];

		// Button shape
		const buttonShapeOptions = [
			{ value: 'gb-button-shape-square', label: __( 'Square' ) },
			{ value: 'gb-button-shape-rounded', label: __( 'Rounded Square' ) },
			{ value: 'gb-button-shape-circular', label: __( 'Circular' ) },
		];

		// Change the image
		const onSelectImage = ( img ) => {
			setAttributes( {
				imgID: img.id,
				imgURL: img.url,
				imgAlt: img.alt,
			} );
		};

		// Clear the image
		const onRemoveImage = () => {
			setAttributes( {
				imgID: null,
				imgURL: null,
				imgAlt: null,
			} );
		};

		// Update color values
		const onChangeBackgroundColor = ( value ) =>
			setAttributes( { ctaBackgroundColor: value } );
		const onChangeTextColor = ( value ) =>
			setAttributes( { ctaTextColor: value } );
		const onChangeButtonColor = ( value ) =>
			setAttributes( { buttonBackgroundColor: value } );
		const onChangeButtonTextColor = ( value ) =>
			setAttributes( { buttonTextColor: value } );

		return (
			<InspectorControls key="inspector">
				<RenderSettingControl id="gb_cta_textOptions">
					<PanelBody
						title={ __( 'Text Options', 'genesis-blocks' ) }
						initialOpen={ true }
					>
						<RangeControl
							label={ __( 'Title Font Size', 'genesis-blocks' ) }
							value={ titleFontSize }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									titleFontSize: value,
								} )
							}
							min={ 24 }
							max={ 60 }
							step={ 2 }
						/>

						<RangeControl
							label={ __( 'Text Font Size', 'genesis-blocks' ) }
							value={ ctaTextFontSize }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									ctaTextFontSize: value,
								} )
							}
							min={ 14 }
							max={ 24 }
							step={ 2 }
						/>

						<PanelColorSettings
							title={ __( 'Text Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: ctaTextColor,
									onChange: onChangeTextColor,
									label: __( 'Text Color', 'genesis-blocks' ),
								},
							] }
						></PanelColorSettings>
					</PanelBody>
				</RenderSettingControl>

				<RenderSettingControl id="gb_cta_backgroundOptions">
					<PanelBody
						title={ __( 'Background Options', 'genesis-blocks' ) }
						initialOpen={ false }
					>
						<p>
							{ __(
								'Select a background image:',
								'genesis-blocks'
							) }
						</p>
						<MediaUpload
							onSelect={ onSelectImage }
							type="image"
							value={ imgID }
							render={ ( { open } ) => (
								<div>
									<Button
										className="gb-cta-inspector-media"
										label={ __(
											'Edit image',
											'genesis-blocks'
										) }
										onClick={ open }
									>
										<Icon icon="format-image" />
										{ __(
											'Select Image',
											'genesis-blocks'
										) }
									</Button>

									{ imgURL && !! imgURL.length && (
										<Button
											className="gb-cta-inspector-media"
											label={ __(
												'Remove Image',
												'genesis-blocks'
											) }
											onClick={ onRemoveImage }
										>
											<Icon icon="dismiss" />
											{ __( 'Remove', 'genesis-blocks' ) }
										</Button>
									) }
								</div>
							) }
						></MediaUpload>

						{ imgURL && !! imgURL.length && (
							<RangeControl
								label={ __( 'Image Opacity', 'genesis-blocks' ) }
								value={ dimRatio }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										dimRatio: value,
									} )
								}
								min={ 0 }
								max={ 100 }
								step={ 10 }
							/>
						) }

						<PanelColorSettings
							title={ __( 'Background Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: ctaBackgroundColor,
									onChange: onChangeBackgroundColor,
									label: __(
										'Overlay Color',
										'genesis-blocks'
									),
								},
							] }
						></PanelColorSettings>
					</PanelBody>
				</RenderSettingControl>

				<RenderSettingControl id="gb_cta_buttonOptions">
					<PanelBody
						title={ __( 'Button Options', 'genesis-blocks' ) }
						initialOpen={ false }
					>
						<ToggleControl
							label={ __(
								'Open link in new window',
								'genesis-blocks'
							) }
							checked={ buttonTarget }
							onChange={ () =>
								this.props.setAttributes( {
									buttonTarget: ! buttonTarget,
								} )
							}
						/>

						<SelectControl
							label={ __( 'Button Size', 'genesis-blocks' ) }
							value={ buttonSize }
							options={ buttonSizeOptions.map(
								( { value, label } ) => ( {
									value,
									label,
								} )
							) }
							onChange={ ( value ) => {
								this.props.setAttributes( {
									buttonSize: value,
								} );
							} }
						/>

						<SelectControl
							label={ __( 'Button Shape', 'genesis-blocks' ) }
							value={ buttonShape }
							options={ buttonShapeOptions.map(
								( { value, label } ) => ( {
									value,
									label,
								} )
							) }
							onChange={ ( value ) => {
								this.props.setAttributes( {
									buttonShape: value,
								} );
							} }
						/>

						<PanelColorSettings
							title={ __( 'Button Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: buttonBackgroundColor,
									onChange: onChangeButtonColor,
									label: __(
										'Button Color',
										'genesis-blocks'
									),
								},
							] }
						></PanelColorSettings>

						<PanelColorSettings
							title={ __( 'Button Text Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: buttonTextColor,
									onChange: onChangeButtonTextColor,
									label: __(
										'Button Text Color',
										'genesis-blocks'
									),
								},
							] }
						></PanelColorSettings>
					</PanelBody>
				</RenderSettingControl>
			</InspectorControls>
		);
	}
}
