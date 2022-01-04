// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './inspector';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { compose } = wp.compose;
const { Component, Fragment } = wp.element;

const { RichText, withFontSizes, withColors } = wp.blockEditor;

class Edit extends Component {
	constructor() {
		super( ...arguments );
	}

	render() {
		// Setup the attributes
		const {
			attributes: {
				price,
				currency,
				term,
				showTerm,
				showCurrency,
				paddingTop,
				paddingRight,
				paddingBottom,
				paddingLeft,
			},
			isSelected,
			className,
			setAttributes,
			fallbackFontSize,
			fontSize,
			backgroundColor,
			textColor,
		} = this.props;

		// Setup wrapper class names
		const editClassWrapperName = classnames( {
			'gb-pricing-table-price-wrap': true,
			'has-text-color': textColor.color,
			'has-background': backgroundColor.color,
			[ backgroundColor.class ]: backgroundColor.class,
			[ textColor.class ]: textColor.class,
			'gb-pricing-has-currency': showCurrency,
		} );

		// Setup price class names
		const editClassName = classnames( {
			'gb-pricing-table-price': true,
			[ fontSize.class ]: fontSize.class,
		} );

		// Setup wrapper styles
		const editWrapStyles = {
			backgroundColor: backgroundColor.color,
			color: textColor.color,
			paddingTop: paddingTop ? paddingTop + 'px' : undefined,
			paddingRight: paddingRight ? paddingRight + 'px' : undefined,
			paddingBottom: paddingBottom ? paddingBottom + 'px' : undefined,
			paddingLeft: paddingLeft ? paddingLeft + 'px' : undefined,
		};

		// Setup price styles
		const editStyles = {
			fontSize: fontSize.size ? fontSize.size + 'px' : undefined,
		};

		// Setup currency styles
		const currencySize = Math.floor( fontSize.size / 2.5 );
		const currencyStyles = {
			fontSize: fontSize.size ? currencySize + 'px' : undefined,
		};

		// Setup term styles
		const termSize = Math.floor( fontSize.size / 2.5 );
		const termStyles = {
			fontSize: fontSize.size ? termSize + 'px' : undefined,
		};

		return [
			<Fragment key={ 'gb-pricing-table-inner-component-price-' + this.props.clientId }>
				<Inspector { ...this.props } />
				<div
					className={
						editClassWrapperName ? editClassWrapperName : undefined
					}
					style={ editWrapStyles }
				>
					<div
						itemProp="offers"
						itemScope
						itemType="http://schema.org/Offer"
					>
						{ showCurrency && (
							<RichText
								tagName="span"
								itemProp="priceCurrency"
								placeholder={ __( '$', 'genesis-blocks' ) }
								keepPlaceholderOnFocus
								value={ currency }
								onChange={ ( value ) =>
									setAttributes( { currency: value } )
								}
								className="gb-pricing-table-currency"
								style={ currencyStyles }
							/>
						) }
						<RichText
							tagName="div"
							itemProp="price"
							placeholder={ __( '49', 'genesis-blocks' ) }
							keepPlaceholderOnFocus
							value={ price }
							onChange={ ( value ) =>
								setAttributes( { price: value } )
							}
							style={ editStyles }
							className={
								editClassName ? editClassName : undefined
							}
						/>
						{ showTerm && (
							<RichText
								tagName="span"
								value={ term }
								placeholder={ __( '/mo', 'genesis-blocks' ) }
								keepPlaceholderOnFocus
								onChange={ ( value ) =>
									setAttributes( { term: value } )
								}
								className="gb-pricing-table-term"
								style={ termStyles }
							/>
						) }
					</div>
				</div>
			</Fragment>,
		];
	}
}

export default compose( [
	withFontSizes( 'fontSize' ),
	withColors( 'backgroundColor', { textColor: 'color' } ),
] )( Edit );
