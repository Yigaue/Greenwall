/**
 * BLOCK: Genesis Blocks Pricing Table InnerBlocks
 */

// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './components/inspector';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Internationalization
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

// Register editor components
const { InnerBlocks, AlignmentToolbar, BlockControls } = wp.blockEditor;

const { Fragment } = wp.element;

const ALLOWED_BLOCKS = [
	'genesis-blocks/gb-pricing-table-description',
	'genesis-blocks/gb-pricing-table-price',
	'genesis-blocks/gb-pricing-table-subtitle',
	'genesis-blocks/gb-pricing-table-title',
	'genesis-blocks/gb-pricing-table-button',
	'core/paragraph',
	'core/image',
	'core/html',
	'core/shortcode',
];

class GBPricingTableBlock extends Component {
	render() {
		// Setup the attributes
		const {
			attributes: {
				borderWidth,
				borderColor,
				borderRadius,
				backgroundColor,
				padding,
				alignment,
			},
			setAttributes,
		} = this.props;

		const styles = {
			borderWidth: borderWidth ? borderWidth : null,
			borderStyle: 0 < borderWidth ? 'solid' : null,
			borderColor: borderColor ? borderColor : null,
			borderRadius: borderRadius ? borderRadius : null,
			backgroundColor: backgroundColor ? backgroundColor : null,
			padding: padding ? padding + '%' : null,
		};

		return [
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ alignment }
					onChange={ ( nextAlign ) => {
						setAttributes( { alignment: nextAlign } );
					} }
				/>
			</BlockControls>,
			<Inspector key={ 'gb-pricing-table-inner-inspector-' + this.props.clientId } { ...{ setAttributes, ...this.props } } />,
			<Fragment key={ 'gb-pricing-table-inner-fragment-' + this.props.clientId } >
				<div
					className={ classnames(
						alignment
							? 'gb-block-pricing-table-' + alignment
							: 'gb-block-pricing-table-center',
						'gb-block-pricing-table'
					) }
					itemScope
					itemType="http://schema.org/Product"
				>
					<div
						className="gb-block-pricing-table-inside"
						style={ styles }
					>
						<InnerBlocks
							template={ [
								// Add placeholder blocks
								[
									'genesis-blocks/gb-pricing-table-title',
									{
										title: '<strong>Price Title</strong>',
										fontSize: 'medium',
										paddingTop: 30,
										paddingRight: 20,
										paddingBottom: 10,
										paddingLeft: 20,
									},
								],
								[
									'genesis-blocks/gb-pricing-table-subtitle',
									{
										subtitle: 'Price Subtitle Description',
										customFontSize: 20,
										paddingTop: 10,
										paddingRight: 20,
										paddingBottom: 10,
										paddingLeft: 20,
									},
								],
								[
									'genesis-blocks/gb-pricing-table-price',
									{
										price: '49',
										currency: '$',
										customFontSize: 60,
										term: '/mo',
										paddingTop: 10,
										paddingRight: 20,
										paddingBottom: 10,
										paddingLeft: 20,
									},
								],
								[
									'genesis-blocks/gb-pricing-table-features',
									{
										features:
											'<li>Product Feature One</li><li>Product Feature Two</li><li>Product Feature Three</li>',
										multilineTag: 'li',
										ordered: false,
										customFontSize: 20,
										paddingTop: 15,
										paddingRight: 20,
										paddingBottom: 15,
										paddingLeft: 20,
									},
								],
								[
									'genesis-blocks/gb-pricing-table-button',
									{
										buttonText: 'Buy Now',
										buttonBackgroundColor: '#272c30',
										paddingTop: 15,
										paddingRight: 20,
										paddingBottom: 35,
										paddingLeft: 20,
									},
								],
							] }
							templateLock={ false }
							allowedBlocks={ ALLOWED_BLOCKS }
							templateInsertUpdatesSelection={ false }
						/>
					</div>
				</div>
			</Fragment>,
		];
	}
}

// Register the block
registerBlockType( 'genesis-blocks/gb-pricing-table', {
	title: __( 'Pricing Column', 'genesis-blocks' ),
	description: __( 'Add a pricing column.', 'genesis-blocks' ),
	icon: 'cart',
	category: 'genesis-blocks',
	parent: [ 'genesis-blocks/gb-pricing' ],
	keywords: [
		__( 'pricing', 'genesis-blocks' ),
		__( 'shop', 'genesis-blocks' ),
		__( 'buy', 'genesis-blocks' ),
	],
	attributes: {
		borderWidth: {
			type: 'number',
			default: 2,
		},
		borderColor: {
			type: 'string',
		},
		borderRadius: {
			type: 'number',
			default: 0,
		},
		backgroundColor: {
			type: 'string',
		},
		alignment: {
			type: 'string',
		},
		padding: {
			type: 'number',
		},
	},

	gb_settings_data: {
		gb_pricing_inner_padding: {
			title: __( 'Pricing Column Padding', 'genesis-blocks' ),
		},
		gb_pricing_inner_borderWidth: {
			title: __( 'Pricing Column Border', 'genesis-blocks' ),
		},
		gb_pricing_inner_borderRadius: {
			title: __( 'Pricing Column Border Radius', 'genesis-blocks' ),
		},
		gb_pricing_inner_borderColor: {
			title: __( 'Pricing Column Border Color', 'genesis-blocks' ),
		},
		gb_pricing_inner_colorSettings: {
			title: __( 'Pricing Column Background Color', 'genesis-blocks' ),
		},
	},

	// Render the block components
	edit: GBPricingTableBlock,

	// Save the attributes and markup
	save( props ) {
		// Setup the attributes
		const {
			borderWidth,
			borderColor,
			borderRadius,
			backgroundColor,
			alignment,
			padding,
		} = props.attributes;

		const styles = {
			borderWidth: borderWidth ? borderWidth : null,
			borderStyle: 0 < borderWidth ? 'solid' : null,
			borderColor: borderColor ? borderColor : null,
			borderRadius: borderRadius ? borderRadius : null,
			backgroundColor: backgroundColor ? backgroundColor : null,
			padding: padding ? padding + '%' : null,
		};

		// Save the block markup for the front end
		return (
			<div
				className={ classnames(
					alignment
						? 'gb-block-pricing-table-' + alignment
						: 'gb-block-pricing-table-center',
					'gb-block-pricing-table'
				) }
				itemScope
				itemType="http://schema.org/Product"
			>
				<div className="gb-block-pricing-table-inside" style={ styles }>
					<InnerBlocks.Content />
				</div>
			</div>
		);
	},
} );
