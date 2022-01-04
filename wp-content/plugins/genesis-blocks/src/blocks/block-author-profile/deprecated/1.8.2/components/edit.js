/**
 * Internal dependencies
 */
import classnames from 'classnames';
import Inspector from './inspector';
import ProfileBox from './profile';
import SocialIcons from './social';
import AvatarColumn from './avatar';
import icons from './../../../utils/components/icons';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;

const { Component, Fragment } = wp.element;

const {
	RichText,
	AlignmentToolbar,
	BlockControls,
	MediaUpload,
} = wp.blockEditor;

const { Button, Dashicon } = wp.components;

const ALLOWED_MEDIA_TYPES = [ 'image' ];

export default class Edit extends Component {
	constructor() {
		super( ...arguments );
	}

	render() {
		const {
			attributes: {
				profileName,
				profileTitle,
				profileContent,
				profileAlignment,
				profileImgURL,
				profileImgID,
				profileImgAlt,
				profileTextColor,
			},
			setAttributes,
		} = this.props;

		return [
			/* Show the block alignment controls on focus */
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ profileAlignment }
					onChange={ ( value ) =>
						setAttributes( { profileAlignment: value } )
					}
				/>
			</BlockControls>,

			/* Show the block controls on focus */
			<Inspector key={ 'gb-author-profile-inspector-' + this.props.clientId } { ...{ setAttributes, ...this.props } } />,

			/* Show the block markup in the editor */
			<ProfileBox key={ 'gb-author-profile-' + this.props.clientId } { ...this.props }>
				<AvatarColumn { ...this.props }>
					<figure className="gb-profile-image-square">
						<MediaUpload
							buttonProps={ {
								className: 'change-image',
							} }
							onSelect={ ( img ) =>
								setAttributes( {
									profileImgID: img.id,
									profileImgURL: img.url,
									profileImgAlt: img.alt,
								} )
							}
							allowed={ ALLOWED_MEDIA_TYPES }
							type="image"
							value={ profileImgID }
							render={ ( { open } ) => (
								<Fragment>
									<Button onClick={ open }>
										{ ! profileImgID ? (
											icons.upload
										) : (
											<img
												className={ classnames(
													'gb-profile-avatar',
													'gb-change-image',
													'wp-image-' + profileImgID
												) }
												src={ profileImgURL }
												alt={ profileImgAlt }
											/>
										) }
									</Button>
									{ profileImgID && (
										<Button
											className="gb-remove-image"
											onClick={ () => {
												setAttributes( {
													profileImgID: null,
													profileImgURL: null,
													profileImgAlt: null,
												} );
											} }
										>
											<Dashicon icon={ 'dismiss' } />
										</Button>
									) }
								</Fragment>
							) }
						></MediaUpload>
					</figure>
				</AvatarColumn>

				<div
					className={ classnames(
						'gb-profile-column gb-profile-content-wrap'
					) }
				>
					<RichText
						tagName="h2"
						placeholder={ __( 'Add name', 'genesis-blocks' ) }
						keepPlaceholderOnFocus
						value={ profileName }
						className="gb-profile-name"
						style={ {
							color: profileTextColor,
						} }
						onChange={ ( value ) =>
							setAttributes( { profileName: value } )
						}
					/>

					<RichText
						tagName="p"
						placeholder={ __( 'Add title', 'genesis-blocks' ) }
						keepPlaceholderOnFocus
						value={ profileTitle }
						className="gb-profile-title"
						style={ {
							color: profileTextColor,
						} }
						onChange={ ( value ) =>
							setAttributes( { profileTitle: value } )
						}
					/>

					<RichText
						tagName="div"
						className="gb-profile-text"
						multiline="p"
						placeholder={ __(
							'Add profile text…',
							'genesis-blocks'
						) }
						keepPlaceholderOnFocus
						value={ profileContent }
						allowedFormats={ [
							'core/bold',
							'core/italic',
							'core/strikethrough',
							'core/link',
						] }
						onChange={ ( value ) =>
							setAttributes( { profileContent: value } )
						}
					/>

					<SocialIcons { ...this.props } />
				</div>
			</ProfileBox>,
		];
	}
}
