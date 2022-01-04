/**
 * BLOCK: Genesis Blocks Pricing Table
 */

// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './components/inspector';
import PricingTable from './components/pricing';
import memoize from 'memize';
import _times from 'lodash/times';

// Internationalization
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

// Register editor components
const { BlockControls, BlockAlignmentToolbar, InnerBlocks } = wp.blockEditor;

const { dispatch } = wp.data;

// Set allowed blocks and media
const ALLOWED_BLOCKS = [ 'genesis-blocks/gb-pricing-table' ];

// Get the pricing template
const getPricingTemplate = memoize( ( columns ) => {
	return _times( columns, () => [ 'genesis-blocks/gb-pricing-table' ] );
} );

class GBPricingBlock extends Component {

	componentDidUpdate( prevProps ) {
		if( this.props.attributes.columns !== prevProps.attributes.columns ) {
			dispatch( 'core/block-editor' ).synchronizeTemplate();
		}
	}

	render() {
		// Setup the attributes
		const {
			attributes: { columns, columnsGap, align },
			setAttributes,
		} = this.props;

		return [
			// Show the alignment toolbar on focus
			<BlockControls key="controls">
				<BlockAlignmentToolbar
					value={ align }
					onChange={ ( align ) => setAttributes( { align } ) }
					controls={ [ 'center', 'wide', 'full' ] }
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-pricing-table-inspector-' + this.props.clientId } { ...{ setAttributes, ...this.props } } />,

			// Show the block markup in the editor
			<PricingTable key={ 'gb-pricing-table-' + this.props.clientId } { ...this.props }>
				<div
					className={ classnames(
						'gb-pricing-table-wrap-admin',
						'gb-block-pricing-table-gap-' + columnsGap
					) }
				>
					<InnerBlocks
						template={ getPricingTemplate( columns ) }
						templateLock="all"
						allowedBlocks={ ALLOWED_BLOCKS }
					/>
				</div>
			</PricingTable>,
		];
	}
}

// Register the block
registerBlockType( 'genesis-blocks/gb-pricing', {
	title: __( 'Pricing', 'genesis-blocks' ),
	description: __( 'Add a pricing table.', 'genesis-blocks' ),
	icon: 'cart',
	category: 'genesis-blocks',
	keywords: [
		__( 'pricing table', 'genesis-blocks' ),
		__( 'shop', 'genesis-blocks' ),
		__( 'purchase', 'genesis-blocks' ),
	],
	attributes: {
		columns: {
			type: 'number',
			default: 2,
		},
		columnsGap: {
			type: 'number',
			default: 2,
		},
		align: {
			type: 'string',
		},
	},

	gb_settings_data: {
		gb_pricing_columns: {
			title: __( 'Pricing Columns', 'genesis-blocks' ),
		},
		gb_pricing_columnsGap: {
			title: __( 'Pricing Columns Gap', 'genesis-blocks' ),
		},
	},

	// Add alignment to block wrapper
	getEditWrapperProps( { align } ) {
		if (
			'left' === align ||
			'right' === align ||
			'full' === align ||
			'wide' === align
		) {
			return { 'data-align': align };
		}
	},

	// Render the block components
	edit: GBPricingBlock,

	// Save the attributes and markup
	save( props ) {
		// Setup the attributes
		const { columnsGap } = props.attributes;

		// Setup the classes
		const className = classnames( [
			'gb-pricing-table-wrap',
			'gb-block-pricing-table-gap-' + columnsGap,
		] );

		// Save the block markup for the front end
		return (
			<PricingTable { ...props }>
				<div className={ className ? className : undefined }>
					<InnerBlocks.Content />
				</div>
			</PricingTable>
		);
	},
} );
