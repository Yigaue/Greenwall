/**
 * BLOCK: Genesis Blocks Advanced Columns.
 */

/**
 * Components and dependencies.
 */
import Edit from './components/edit';
import Save from './components/save';
import BackgroundAttributes from './../../utils/components/background-image/attributes';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register advanced columns block InnerBlocks.
 */
registerBlockType( 'genesis-blocks/gb-columns', {
	title: __( 'Advanced Columns', 'genesis-blocks' ),
	description: __( 'Add a pre-defined column layout.', 'genesis-blocks' ),
	icon: 'editor-table',
	category: 'genesis-blocks',
	keywords: [
		__( 'column', 'genesis-blocks' ),
		__( 'grid', 'genesis-blocks' ),
		__( 'row', 'genesis-blocks' ),
	],
	attributes: {
		...BackgroundAttributes,
		columns: {
			type: 'number',
		},
		layout: {
			type: 'string',
		},
		columnsGap: {
			type: 'number',
			default: 2,
		},
		align: {
			type: 'string',
		},
		responsiveToggle: {
			type: 'boolean',
			default: true,
		},
		marginSync: {
			type: 'boolean',
			default: false,
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
		marginUnit: {
			type: 'string',
			default: 'px',
		},
		paddingSync: {
			type: 'boolean',
			default: false,
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
		paddingUnit: {
			type: 'string',
			default: 'px',
		},
		textColor: {
			type: 'string',
		},
		customTextColor: {
			type: 'string',
		},
		backgroundColor: {
			type: 'string',
		},
		customBackgroundColor: {
			type: 'string',
		},
		columnMaxWidth: {
			type: 'number',
		},
		centerColumns: {
			type: 'boolean',
			default: true,
		},
	},

	gb_settings_data: {
		gb_column_columns: {
			title: __( 'Column Count', 'genesis-blocks' ),
		},
		gb_column_columnLayouts: {
			title: __( 'Column Layout', 'genesis-blocks' ),
		},
		gb_column_columnsGap: {
			title: __( 'Column Gap', 'genesis-blocks' ),
		},
		gb_column_columnMaxWidth: {
			title: __( 'Column Inner Max Width', 'genesis-blocks' ),
		},
		gb_column_centerColumns: {
			title: __( 'Center Columns In Container', 'genesis-blocks' ),
		},
		gb_column_responsiveToggle: {
			title: __( 'Responsive Columns', 'genesis-blocks' ),
		},
		gb_column_marginPadding: {
			title: __( 'Margin / Padding', 'genesis-blocks' ),
		},
		gb_column_colorSettings: {
			title: __( 'Color Settings', 'genesis-blocks' ),
		},
		gb_column_backgroundImagePanel: {
			title: __( 'Background Settings', 'genesis-blocks' ),
		},
	},

	/* Add alignment to block wrapper. */
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

	/* Render the block components. */
	edit: ( props ) => {
		return <Edit { ...props } />;
	},

	/* Save the block markup. */
	save: ( props ) => {
		return <Save { ...props } />;
	},
} );
