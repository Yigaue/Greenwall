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
const { Button, Icon, PanelBody, RangeControl } = wp.components;

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
			containerPaddingTop,
			containerPaddingRight,
			containerPaddingBottom,
			containerPaddingLeft,
			containerMarginTop,
			containerMarginBottom,
			containerMaxWidth,
			containerBackgroundColor,
			containerDimRatio,
			containerImgURL,
			containerImgID,
		} = this.props.attributes;
		const { setAttributes } = this.props;

		const onSelectImage = ( img ) => {
			setAttributes( {
				containerImgID: img.id,
				containerImgURL: img.url,
				containerImgAlt: img.alt,
			} );
		};

		const onRemoveImage = () => {
			setAttributes( {
				containerImgID: null,
				containerImgURL: null,
				containerImgAlt: null,
			} );
		};

		// Update color values
		const onChangeBackgroundColor = ( value ) =>
			setAttributes( { containerBackgroundColor: value } );

		return (
			<InspectorControls key="inspector">
				<RenderSettingControl id="gb_container_containerOptions">
					<PanelBody
						title={ __( 'Container Options', 'genesis-blocks' ) }
						initialOpen={ true }
					>
						<RangeControl
							label={ __( 'Padding Top (%)', 'genesis-blocks' ) }
							value={ containerPaddingTop }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerPaddingTop: value,
								} )
							}
							min={ 0 }
							max={ 30 }
							step={ 0.5 }
						/>

						<RangeControl
							label={ __(
								'Padding Bottom (%)',
								'genesis-blocks'
							) }
							value={ containerPaddingBottom }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerPaddingBottom: value,
								} )
							}
							min={ 0 }
							max={ 30 }
							step={ 0.5 }
						/>

						<RangeControl
							label={ __( 'Padding Left (%)', 'genesis-blocks' ) }
							value={ containerPaddingLeft }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerPaddingLeft: value,
								} )
							}
							min={ 0 }
							max={ 30 }
							step={ 0.5 }
						/>

						<RangeControl
							label={ __( 'Padding Right (%)', 'genesis-blocks' ) }
							value={ containerPaddingRight }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerPaddingRight: value,
								} )
							}
							min={ 0 }
							max={ 30 }
							step={ 0.5 }
						/>

						<RangeControl
							label={ __( 'Margin Top (%)', 'genesis-blocks' ) }
							value={ containerMarginTop }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerMarginTop: value,
								} )
							}
							min={ 0 }
							max={ 30 }
							step={ 1 }
						/>

						<RangeControl
							label={ __( 'Margin Bottom (%)', 'genesis-blocks' ) }
							value={ containerMarginBottom }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerMarginBottom: value,
								} )
							}
							min={ 0 }
							max={ 30 }
							step={ 0.5 }
						/>

						<RangeControl
							label={ __(
								'Inside Container Max Width (px)',
								'genesis-blocks'
							) }
							value={ containerMaxWidth }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									containerMaxWidth: value,
								} )
							}
							min={ 500 }
							max={ 1600 }
							step={ 1 }
						/>
					</PanelBody>
				</RenderSettingControl>

				<RenderSettingControl id="gb_container_backgroundOptions">
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
							value={ containerImgID }
							render={ ( { open } ) => (
								<div>
									<Button
										className="gb-container-inspector-media"
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

									{ containerImgURL &&
										!! containerImgURL.length && (
											<Button
												className="gb-container-inspector-media"
												label={ __(
													'Remove Image',
													'genesis-blocks'
												) }
												onClick={ onRemoveImage }
											>
												<Icon icon="dismiss" />
												{ __(
													'Remove',
													'genesis-blocks'
												) }
											</Button>
										) }
								</div>
							) }
						></MediaUpload>

						{ containerImgURL && !! containerImgURL.length && (
							<RangeControl
								label={ __( 'Image Opacity', 'genesis-blocks' ) }
								value={ containerDimRatio }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										containerDimRatio: value,
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
									value: containerBackgroundColor,
									label: __(
										'Background Color',
										'genesis-blocks'
									),
									onChange: onChangeBackgroundColor,
								},
							] }
						></PanelColorSettings>
					</PanelBody>
				</RenderSettingControl>
			</InspectorControls>
		);
	}
}
