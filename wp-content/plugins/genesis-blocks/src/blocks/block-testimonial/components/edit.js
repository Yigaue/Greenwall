/**
 * Internal dependencies
 */
import classnames from 'classnames';
import Inspector from './inspector';
import Testimonial from './testimonial';
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
	render() {
		// Setup the attributes
		const {
			attributes: {
				testimonialName,
				testimonialTitle,
				testimonialContent,
				testimonialAlignment,
				testimonialImgURL,
				testimonialImgID,
				testimonialImgAlt,
				testimonialTextColor,
			},
			setAttributes,
		} = this.props;

		const onRemoveImage = () => {
			setAttributes( {
				testimonialImgURL: null,
				testimonialImgID: null,
				testimonialImgAlt: null,
			} );
		};

		return [
			// Show the alignment toolbar on focus
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ testimonialAlignment }
					onChange={ ( value ) =>
						setAttributes( { testimonialAlignment: value } )
					}
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-testimonial-inspector-' + this.props.clientId } { ...{ setAttributes, ...this.props } } />,

			// Show the block markup in the editor
			<Testimonial key={ 'gb-testimonial-editor-' + this.props.clientId } { ...this.props }>
				<RichText
					tagName="div"
					multiline="p"
					placeholder={ __(
						'Add testimonial text…',
						'genesis-blocks'
					) }
					keepPlaceholderOnFocus
					value={ testimonialContent }
					allowedFormats={ [
						'core/bold',
						'core/italic',
						'core/strikethrough',
						'core/link',
					] }
					className={ classnames( 'gb-testimonial-text' ) }
					style={ {
						textAlign: testimonialAlignment,
					} }
					onChange={ ( value ) =>
						setAttributes( { testimonialContent: value } )
					}
				/>

				<div className="gb-testimonial-info">
					<div className="gb-testimonial-avatar-wrap">
						<div className="gb-testimonial-image-wrap">
							<MediaUpload
								buttonProps={ {
									className: 'change-image',
								} }
								onSelect={ ( img ) =>
									setAttributes( {
										testimonialImgID: img.id,
										testimonialImgURL: img.sizes.thumbnail.url,
										testimonialImgAlt: img.alt,
									} )
								}
								allowed={ ALLOWED_MEDIA_TYPES }
								type="image"
								value={ testimonialImgID }
								render={ ( { open } ) => (
									<Fragment>
										<Button
											className={
												testimonialImgID
													? 'gb-change-image'
													: 'gb-add-image'
											}
											onClick={ open }
										>
											{ ! testimonialImgID ? (
												icons.upload
											) : (
												<img
													className="gb-testimonial-avatar"
													src={ testimonialImgURL }
													alt={ testimonialImgAlt ? testimonialImgAlt : null }
												/>
											) }
										</Button>
										{ testimonialImgID && (
											<Button
												className="gb-remove-image"
												onClick={ onRemoveImage }
											>
												<Dashicon icon={ 'dismiss' } />
											</Button>
										) }
									</Fragment>
								) }
							></MediaUpload>
						</div>
					</div>

					<RichText
						tagName="h2"
						placeholder={ __( 'Add name', 'genesis-blocks' ) }
						keepPlaceholderOnFocus
						value={ testimonialName }
						className="gb-testimonial-name"
						style={ {
							color: testimonialTextColor,
						} }
						onChange={ ( value ) =>
							this.props.setAttributes( {
								testimonialName: value,
							} )
						}
					/>

					<RichText
						tagName="small"
						placeholder={ __( 'Add title', 'genesis-blocks' ) }
						keepPlaceholderOnFocus
						value={ testimonialTitle }
						className="gb-testimonial-title"
						style={ {
							color: testimonialTextColor,
						} }
						onChange={ ( value ) =>
							this.props.setAttributes( {
								testimonialTitle: value,
							} )
						}
					/>
				</div>
			</Testimonial>,
		];
	}
}
