// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './inspector';

// Import Button settings
import CustomButton from './../../../block-button/components/button';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { compose } = wp.compose;
const { Component, Fragment } = wp.element;

const {
	RichText,
	withFontSizes,
	withColors,
	InnerBlocks,
	URLInput,
} = wp.blockEditor;

const { Button, Dashicon, Icon } = wp.components;

class Edit extends Component {
	constructor() {
		super( ...arguments );
	}

	render() {
		// Setup the attributes
		const {
			attributes: {
				subtitle,
				paddingTop,
				paddingRight,
				paddingBottom,
				paddingLeft,
				buttonText,
				buttonUrl,
				buttonAlignment,
				buttonBackgroundColor,
				buttonTextColor,
				buttonSize,
				buttonShape,
				buttonTarget,
			},
			isSelected,
			className,
			setAttributes,
			backgroundColor,
		} = this.props;

		// Setup class names
		const editClassName = classnames( {
			'gb-pricing-table-button': true,
		} );

		// Setup styles
		const editStyles = {
			backgroundColor: backgroundColor.color,
			paddingTop: paddingTop ? paddingTop + 'px' : undefined,
			paddingRight: paddingRight ? paddingRight + 'px' : undefined,
			paddingBottom: paddingBottom ? paddingBottom + 'px' : undefined,
			paddingLeft: paddingLeft ? paddingLeft + 'px' : undefined,
		};

		return [
			<Fragment key={ 'gb-pricing-table-inner-component-button-' + this.props.clientId }>
				<Inspector { ...this.props } />
				<div
					className={ editClassName ? editClassName : undefined }
					style={ editStyles }
				>
					<CustomButton { ...this.props }>
						<RichText
							tagName="span"
							placeholder={ __(
								'Button text…',
								'genesis-blocks'
							) }
							keepPlaceholderOnFocus
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
					</CustomButton>
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
			</Fragment>,
		];
	}
}

export default compose( [
	withFontSizes( 'fontSize' ),
	withColors( 'backgroundColor', { textColor: 'color' } ),
] )( Edit );
