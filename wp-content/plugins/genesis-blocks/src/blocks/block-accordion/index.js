/**
 * BLOCK: Genesis Blocks Accordion Block
 */

// Import block dependencies and components
import Edit from './components/edit';
import Save from './components/save';
import Deprecated from './deprecated/deprecated';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

const blockAttributes = {
	accordionTitle: {
		type: 'array',
		selector: '.gb-accordion-title',
		source: 'children',
	},
	accordionText: {
		type: 'array',
		selector: '.gb-accordion-text',
		source: 'children',
	},
	accordionAlignment: {
		type: 'string',
	},
	accordionFontSize: {
		type: 'number',
		default: undefined,
	},
	accordionOpen: {
		type: 'boolean',
		default: false,
	},
};

// Register the block
registerBlockType( 'genesis-blocks/gb-accordion', {
	title: __( 'Accordion', 'genesis-blocks' ),
	description: __(
		'Add accordion block with a title and text.',
		'genesis-blocks'
	),
	icon: 'editor-ul',
	category: 'genesis-blocks',
	keywords: [
		__( 'accordion', 'genesis-blocks' ),
		__( 'list', 'genesis-blocks' ),
		__( 'genesis', 'genesis-blocks' ),
	],
	attributes: blockAttributes,

	gb_settings_data: {
		gb_accordion_accordionFontSize: {
			title: __( 'Title Font Size', 'genesis-blocks' ),
		},
		gb_accordion_accordionOpen: {
			title: __( 'Open by default', 'genesis-blocks' ),
		},
	},

	// Render the block components
	edit: ( props ) => {
		return <Edit { ...props } />;
	},

	// Save the attributes and markup
	save: ( props ) => {
		return <Save { ...props } />;
	},

	deprecated: Deprecated,
} );
