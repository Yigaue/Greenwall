/**
 * BLOCK: Genesis Blocks Advanced Columns InnerBlocks.
 */

/**
 * Internal dependencies.
 */
import Edit from './components/edit';
import Save from './components/save';
import deprecated from './deprecated/deprecated';
import './styles/style.scss';
import './styles/editor.scss';
import BackgroundAttributes from './../../utils/components/background-image/attributes';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register advanced columns block.
 */
registerBlockType( 'genesis-blocks/gb-column', {
	title: __( 'Column', 'genesis-blocks' ),
	description: __( 'Add a pre-defined column layout.', 'genesis-blocks' ),
	icon: 'editor-table',
	category: 'genesis-blocks',
	parent: [ 'genesis-blocks/gb-columns' ],
	keywords: [
		__( 'column', 'genesis-blocks' ),
		__( 'layout', 'genesis-blocks' ),
		__( 'row', 'genesis-blocks' ),
	],
	attributes: {
		...BackgroundAttributes,
		backgroundColor: {
			type: 'string',
		},
		customBackgroundColor: {
			type: 'string',
		},
		textColor: {
			type: 'string',
		},
		customTextColor: {
			type: 'string',
		},
		textAlign: {
			type: 'string',
		},
		marginSync: {
			type: 'boolean',
			default: false,
		},
		marginUnit: {
			type: 'string',
			default: 'px',
		},
		margin: {
			type: 'number',
			default: 0,
		},
		marginTop: {
			type: 'number',
			default: 0,
		},
		marginBottom: {
			type: 'number',
			default: 0,
		},
		paddingSync: {
			type: 'boolean',
			default: false,
		},
		paddingUnit: {
			type: 'string',
			default: 'px',
		},
		padding: {
			type: 'number',
			default: 0,
		},
		paddingTop: {
			type: 'number',
			default: 0,
		},
		paddingRight: {
			type: 'number',
			default: 0,
		},
		paddingBottom: {
			type: 'number',
			default: 0,
		},
		paddingLeft: {
			type: 'number',
			default: 0,
		},
		columnVerticalAlignment: {
			type: 'string',
		},
	},

	gb_settings_data: {
		gb_column_inner_marginPadding: {
			title: __( 'Margin and Padding', 'genesis-blocks' ),
		},
		gb_column_inner_colorSettings: {
			title: __( 'Color', 'genesis-blocks' ),
		},
		gb_column_inner_backgroundImagePanel: {
			title: __( 'Background Image', 'genesis-blocks' ),
		},
	},

	/* Render the block in the editor. */
	edit: ( props ) => {
		return <Edit { ...props } />;
	},

	/* Save the block markup. */
	save: ( props ) => {
		return <Save { ...props } />;
	},

	deprecated,
} );

/* Add the vertical column alignment class to the block wrapper. */
const withClientIdClassName = wp.compose.createHigherOrderComponent(
	( BlockListBlock ) => {
		return ( props ) => {
			const blockName = props.block.name;

			if (
				'genesis-blocks/gb-column' === blockName &&
				props.block.attributes.columnVerticalAlignment
			) {
				return (
					<BlockListBlock
						{ ...props }
						className={
							'gb-is-vertically-aligned-' +
							props.block.attributes.columnVerticalAlignment
						}
					/>
				);
			}
			return <BlockListBlock { ...props } />;
		};
	},
	'withClientIdClassName'
);

wp.hooks.addFilter(
	'editor.BlockListBlock',
	'genesis-blocks/add-vertical-align-class',
	withClientIdClassName
);
