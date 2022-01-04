/**
 * Inspector Controls.
 */

/**
 * Internal dependencies.
 */
import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

/* Setup the block. */
const { __ } = wp.i18n;
const { Component } = wp.element;

/* Import block components. */
const { InspectorControls, PanelColorSettings } = wp.blockEditor;

/* Import Inspector components. */
const { PanelBody, RangeControl, SelectControl, TextControl } = wp.components;

/* Create an Inspector Controls wrapper Component. */
export default class Inspector extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	render() {
		/* Setup the attributes. */
		const {
			profileFontSize,
			profileBackgroundColor,
			profileTextColor,
			profileLinkColor,
			twitter,
			facebook,
			instagram,
			pinterest,
			google,
			youtube,
			github,
			linkedin,
			wordpress,
			email,
			website,
			profileAvatarShape,
		} = this.props.attributes;
		const { setAttributes } = this.props;

		/* Avatar shape options. */
		const profileAvatarShapeOptions = [
			{ value: 'square', label: __( 'Square', 'genesis-blocks' ) },
			{ value: 'round', label: __( 'Round', 'genesis-blocks' ) },
		];

		/* Update color values. */
		const onChangeBackgroundColor = ( value ) =>
			setAttributes( { profileBackgroundColor: value } );
		const onChangeProfileTextColor = ( value ) =>
			setAttributes( { profileTextColor: value } );
		const onChangeSocialLinkColor = ( value ) =>
			setAttributes( { profileLinkColor: value } );

		return (
			<InspectorControls key="inspector">
				<PanelBody>
					<RenderSettingControl id="gb_author_profile_profileFontSize">
						<RangeControl
							label={ __( 'Font Size', 'genesis-blocks' ) }
							value={ profileFontSize }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									profileFontSize: value,
								} )
							}
							min={ 14 }
							max={ 24 }
							step={ 1 }
						/>
					</RenderSettingControl>

					<RenderSettingControl id="gb_author_profile_profileAvatarShape">
						<SelectControl
							label={ __( 'Avatar Shape', 'genesis-blocks' ) }
							description={ __(
								'Choose between a round or square avatar shape.',
								'genesis-blocks'
							) }
							options={ profileAvatarShapeOptions }
							value={ profileAvatarShape }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									profileAvatarShape: value,
								} )
							}
						/>
					</RenderSettingControl>

					<RenderSettingControl id="gb_author_profile_profileBackgroundColor">
						<PanelColorSettings
							title={ __( 'Background Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: profileBackgroundColor,
									onChange: onChangeBackgroundColor,
									label: __(
										'Background Color',
										'genesis-blocks'
									),
								},
							] }
						></PanelColorSettings>
					</RenderSettingControl>

					<RenderSettingControl id="gb_author_profile_profileTextColor">
						<PanelColorSettings
							title={ __( 'Text Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: profileTextColor,
									onChange: onChangeProfileTextColor,
									label: __( 'Text Color', 'genesis-blocks' ),
								},
							] }
						></PanelColorSettings>
					</RenderSettingControl>

					<RenderSettingControl id="gb_author_profile_profileLinkColor">
						<PanelColorSettings
							title={ __( 'Social Link Color', 'genesis-blocks' ) }
							initialOpen={ false }
							colorSettings={ [
								{
									value: profileLinkColor,
									onChange: onChangeSocialLinkColor,
									label: __(
										'Social Link Color',
										'genesis-blocks'
									),
								},
							] }
						></PanelColorSettings>
					</RenderSettingControl>
				</PanelBody>

				<RenderSettingControl id="gb_author_profile_socialLinks">
					<PanelBody
						title={ __( 'Social Links', 'genesis-blocks' ) }
						initialOpen={ false }
					>
						<p>
							{ __(
								'Add links to your social media site and they will appear in the bottom of the profile box.',
								'genesis-blocks'
							) }
						</p>

						<TextControl
							label={ __( 'Twitter URL', 'genesis-blocks' ) }
							type="url"
							value={ twitter }
							onChange={ ( value ) =>
								this.props.setAttributes( { twitter: value } )
							}
						/>

						<TextControl
							label={ __( 'Facebook URL', 'genesis-blocks' ) }
							type="url"
							value={ facebook }
							onChange={ ( value ) =>
								this.props.setAttributes( { facebook: value } )
							}
						/>

						<TextControl
							label={ __( 'Instagram URL', 'genesis-blocks' ) }
							type="url"
							value={ instagram }
							onChange={ ( value ) =>
								this.props.setAttributes( { instagram: value } )
							}
						/>

						<TextControl
							label={ __( 'Pinterest URL', 'genesis-blocks' ) }
							type="url"
							value={ pinterest }
							onChange={ ( value ) =>
								this.props.setAttributes( { pinterest: value } )
							}
						/>

						<TextControl
							label={ __( 'Google URL', 'genesis-blocks' ) }
							type="url"
							value={ google }
							onChange={ ( value ) =>
								this.props.setAttributes( { google: value } )
							}
						/>

						<TextControl
							label={ __( 'YouTube URL', 'genesis-blocks' ) }
							type="url"
							value={ youtube }
							onChange={ ( value ) =>
								this.props.setAttributes( { youtube: value } )
							}
						/>

						<TextControl
							label={ __( 'Github URL', 'genesis-blocks' ) }
							type="url"
							value={ github }
							onChange={ ( value ) =>
								this.props.setAttributes( { github: value } )
							}
						/>

						<TextControl
							label={ __( 'LinkedIn URL', 'genesis-blocks' ) }
							type="url"
							value={ linkedin }
							onChange={ ( value ) =>
								this.props.setAttributes( { linkedin: value } )
							}
						/>

						<TextControl
							label={ __(
								'WordPress Profile URL',
								'genesis-blocks'
							) }
							type="url"
							value={ wordpress }
							onChange={ ( value ) =>
								this.props.setAttributes( { wordpress: value } )
							}
						/>

						<TextControl
							label={ __( 'Email URL', 'genesis-blocks' ) }
							help={ __(
								'Supports a URL or an email link. Email links must be prefixed with "mailto:". Example: mailto:test@example.com',
								'genesis-blocks'
							) }
							type="url"
							value={ email }
							onChange={ ( value ) =>
								this.props.setAttributes( { email: value } )
							}
						/>

						<TextControl
							label={ __( 'Website URL', 'genesis-blocks' ) }
							type="url"
							value={ website }
							onChange={ ( value ) =>
								this.props.setAttributes( { website: value } )
							}
						/>
					</PanelBody>
				</RenderSettingControl>
			</InspectorControls>
		);
	}
}
