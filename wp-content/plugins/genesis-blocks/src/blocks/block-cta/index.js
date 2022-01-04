/**
 * BLOCK: Genesis Blocks Call-To-Action
 */

// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './components/inspector';
import CallToAction from './components/cta';

// Deprecated components
import deprecated from './deprecated/deprecated';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

// Register editor components
const {
	AlignmentToolbar,
	URLInput,
	BlockControls,
	BlockAlignmentToolbar,
	RichText,
} = wp.blockEditor;

// Register components
const { Button, Dashicon, Icon } = wp.components;

const blockAttributes = {
	buttonText: {
		type: 'string',
	},
	buttonUrl: {
		type: 'string',
		source: 'attribute',
		selector: 'a',
		attribute: 'href',
	},
	buttonAlignment: {
		type: 'string',
		default: 'center',
	},
	buttonBackgroundColor: {
		type: 'string',
		default: '#3373dc',
	},
	buttonTextColor: {
		type: 'string',
		default: '#ffffff',
	},
	buttonSize: {
		type: 'string',
		default: 'gb-button-size-medium',
	},
	buttonShape: {
		type: 'string',
		default: 'gb-button-shape-rounded',
	},
	buttonTarget: {
		type: 'boolean',
		default: false,
	},
	ctaTitle: {
		type: 'array',
		selector: '.gb-cta-title',
		source: 'children',
	},
	titleFontSize: {
		type: 'number',
		default: '32',
	},
	ctaTextFontSize: {
		type: 'number',
	},
	ctaText: {
		type: 'array',
		selector: '.gb-cta-text',
		source: 'children',
	},
	ctaWidth: {
		type: 'string',
	},
	ctaBackgroundColor: {
		type: 'string',
	},
	ctaTextColor: {
		type: 'string',
		default: '#32373c',
	},
	imgURL: {
		type: 'string',
		source: 'attribute',
		attribute: 'src',
		selector: 'img',
	},
	imgID: {
		type: 'number',
	},
	imgAlt: {
		type: 'string',
		source: 'attribute',
		attribute: 'alt',
		selector: 'img',
	},
	dimRatio: {
		type: 'number',
		default: 50,
	},

	// Deprecated
	ctaTitleFontSize: {
		type: 'string',
		default: '32',
	},
};

class GBCTGBlock extends Component {
	render() {
		// Setup the attributes
		const {
			attributes: {
				buttonText,
				buttonUrl,
				buttonAlignment,
				buttonBackgroundColor,
				buttonTextColor,
				buttonSize,
				buttonShape,
				ctaTitle,
				ctaText,
				titleFontSize,
				ctaTextFontSize,
				ctaWidth,
				ctaTextColor,
				imgURL,
				imgAlt,
				dimRatio,
			},
			isSelected,
			setAttributes,
		} = this.props;

		const onSelectImage = ( img ) => {
			setAttributes( {
				imgID: img.id,
				imgURL: img.url,
				imgAlt: img.alt,
			} );
		};

		return [
			// Show the alignment toolbar on focus
			<BlockControls key={ 'gb-cta-block-controls-' + this.props.clientId } >
				<BlockAlignmentToolbar
					value={ ctaWidth }
					onChange={ ( ctaWidth ) => setAttributes( { ctaWidth } ) }
					controls={ [ 'center', 'wide', 'full' ] }
				/>
				<AlignmentToolbar
					value={ buttonAlignment }
					onChange={ ( value ) => {
						setAttributes( { buttonAlignment: value } );
					} }
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-cta-inspector-' + this.props.clientId } { ...{ setAttributes, ...this.props } } />,

			// Show the button markup in the editor
			<CallToAction key={ 'gb-cta-' + this.props.clientId } { ...this.props }>
				{ imgURL && !! imgURL.length && (
					<div className="gb-cta-image-wrap">
						<img
							className={ classnames(
								'gb-cta-image',
								dimRatioToClass( dimRatio ),
								{
									'has-background-dim': 0 !== dimRatio,
								}
							) }
							src={ imgURL }
							alt={ imgAlt }
						/>
					</div>
				) }

				<div className="gb-cta-content">
					<RichText
						tagName="h2"
						placeholder={ __(
							'Call-To-Action Title',
							'genesis-blocks'
						) }
						keepPlaceholderOnFocus
						value={ ctaTitle }
						className={ classnames(
							'gb-cta-title',
							'gb-font-size-' + titleFontSize
						) }
						style={ {
							color: ctaTextColor,
						} }
						onChange={ ( value ) =>
							setAttributes( { ctaTitle: value } )
						}
					/>
					<RichText
						tagName="div"
						multiline="p"
						placeholder={ __(
							'Call To Action Text',
							'genesis-blocks'
						) }
						keepPlaceholderOnFocus
						value={ ctaText }
						className={ classnames(
							'gb-cta-text',
							'gb-font-size-' + ctaTextFontSize
						) }
						style={ {
							color: ctaTextColor,
						} }
						onChange={ ( value ) =>
							setAttributes( { ctaText: value } )
						}
					/>
				</div>
				<div className="gb-cta-button">
					<RichText
						tagName="span"
						placeholder={ __( 'Button text…', 'genesis-blocks' ) }
						value={ buttonText }
						allowedFormats={ [] }
						className={ classnames(
							'gb-button',
							buttonShape,
							buttonSize
						) }
						style={ {
							color: buttonTextColor,
							backgroundColor: buttonBackgroundColor,
						} }
						onChange={ ( value ) =>
							setAttributes( { buttonText: value } )
						}
					/>
					{ isSelected && (
						<form
							key="form-link"
							className={ `blocks-button__inline-link gb-button-${ buttonAlignment }` }
							onSubmit={ ( event ) => event.preventDefault() }
							style={ {
								textAlign: buttonAlignment,
							} }
						>
							<Dashicon icon={ 'admin-links' } />
							<URLInput
								className="button-url"
								value={ buttonUrl }
								onChange={ ( value ) =>
									setAttributes( { buttonUrl: value } )
								}
							/>
							<Button
								label={ __( 'Apply', 'genesis-blocks' ) }
								type="submit"
							>
								<Icon icon="editor-break" />
							</Button>
						</form>
					) }
				</div>
			</CallToAction>,
		];
	}
}

// Register the block
registerBlockType( 'genesis-blocks/gb-cta', {
	title: __( 'Call To Action', 'genesis-blocks' ),
	description: __(
		'Add a call to action section with a title, text, and a button.',
		'genesis-blocks'
	),
	icon: 'megaphone',
	category: 'genesis-blocks',
	keywords: [
		__( 'call to action', 'genesis-blocks' ),
		__( 'cta', 'genesis-blocks' ),
		__( 'atomic', 'genesis-blocks' ),
	],

	attributes: blockAttributes,

	gb_settings_data: {
		gb_cta_textOptions: {
			title: __( 'Text Options', 'genesis-blocks' ),
		},
		gb_cta_backgroundOptions: {
			title: __( 'Background Options', 'genesis-blocks' ),
		},
		gb_cta_buttonOptions: {
			title: __( 'Button Options', 'genesis-blocks' ),
		},
	},

	getEditWrapperProps( { ctaWidth } ) {
		if (
			'left' === ctaWidth ||
			'right' === ctaWidth ||
			'full' === ctaWidth
		) {
			return { 'data-align': ctaWidth };
		}
	},

	// Render the block components
	edit: GBCTGBlock,

	// Save the attributes and markup
	save( props ) {
		// Setup the attributes
		const {
			buttonText,
			buttonUrl,
			buttonBackgroundColor,
			buttonTextColor,
			buttonSize,
			buttonShape,
			buttonTarget,
			ctaTitle,
			ctaText,
			ctaTitleFontSize,
			titleFontSize,
			ctaTextColor,
			imgURL,
			imgAlt,
			dimRatio,
		} = props.attributes;

		// Save the block markup for the front end
		return (
			<CallToAction { ...props }>
				{ imgURL && !! imgURL.length && (
					<div className="gb-cta-image-wrap">
						<img
							className={ classnames(
								'gb-cta-image',
								dimRatioToClass( dimRatio ),
								{
									'has-background-dim': 0 !== dimRatio,
								}
							) }
							src={ imgURL }
							alt={ imgAlt }
						/>
					</div>
				) }

				<div className="gb-cta-content">
					{ ctaTitle && (
						<RichText.Content
							tagName="h2"
							className={ classnames(
								'gb-cta-title',
								'gb-font-size-' + titleFontSize
							) }
							style={ {
								color: ctaTextColor,
							} }
							value={ ctaTitle }
						/>
					) }
					{ ctaText && (
						<RichText.Content
							tagName="div"
							className={ classnames(
								'gb-cta-text',
								'gb-font-size-' + ctaTitleFontSize
							) }
							style={ {
								color: ctaTextColor,
							} }
							value={ ctaText }
						/>
					) }
				</div>
				{ buttonText && (
					<div className="gb-cta-button">
						<a
							href={ buttonUrl }
							target={ buttonTarget ? '_blank' : '_self' }
							rel="noopener noreferrer"
							className={ classnames(
								'gb-button',
								buttonShape,
								buttonSize
							) }
							style={ {
								color: buttonTextColor,
								backgroundColor: buttonBackgroundColor,
							} }
						>
							<RichText.Content value={ buttonText } />
						</a>
					</div>
				) }
			</CallToAction>
		);
	},

	deprecated,
} );

function dimRatioToClass( ratio ) {
	return 0 === ratio || 50 === ratio
		? null
		: 'has-background-dim-' + 10 * Math.round( ratio / 10 );
}
