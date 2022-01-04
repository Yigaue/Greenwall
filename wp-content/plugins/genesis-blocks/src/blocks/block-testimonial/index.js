/**
 * BLOCK: Testimonial
 */

// Import block dependencies and components
import Edit from './components/edit';
import Save from './components/save';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Internationalization
const { __ } = wp.i18n;

// Register block
const { registerBlockType } = wp.blocks;

// Register the block
registerBlockType( 'genesis-blocks/gb-testimonial', {
	title: __( 'Testimonial', 'genesis-blocks' ),
	description: __(
		'Add a user testimonial with a name and title.',
		'genesis-blocks'
	),
	icon: 'format-quote',
	category: 'genesis-blocks',
	keywords: [
		__( 'testimonial', 'genesis-blocks' ),
		__( 'quote', 'genesis-blocks' ),
		__( 'atomic', 'genesis-blocks' ),
	],
	attributes: {
		testimonialName: {
			type: 'array',
			selector: '.gb-testimonial-name',
			source: 'children',
		},
		testimonialTitle: {
			type: 'array',
			selector: '.gb-testimonial-title',
			source: 'children',
		},
		testimonialContent: {
			type: 'array',
			selector: '.gb-testimonial-text',
			source: 'children',
		},
		testimonialAlignment: {
			type: 'string',
		},
		testimonialImgURL: {
			type: 'string',
			source: 'attribute',
			attribute: 'src',
			selector: 'img',
		},
		testimonialImgID: {
			type: 'number',
		},
		testimonialImgAlt: {
			type: 'string',
			source: 'attribute',
			attribute: 'alt',
			selector: 'img',
		},
		testimonialBackgroundColor: {
			type: 'string',
			default: '#f2f2f2',
		},
		testimonialTextColor: {
			type: 'string',
			default: '#32373c',
		},
		testimonialFontSize: {
			type: 'number',
			default: 18,
		},
		testimonialCiteAlign: {
			type: 'string',
			default: 'left-aligned',
		},
	},
	gb_settings_data: {
		gb_testimonial_testimonialFontSize: {
			title: __( 'Font Size', 'genesis-blocks' ),
		},
		gb_testimonial_testimonialCiteAlign: {
			title: __( 'Cite Alignment', 'genesis-blocks' ),
		},
		gb_testimonial_testimonialBackgroundColor: {
			title: __( 'Background Color', 'genesis-blocks' ),
		},
		gb_testimonial_testimonialTextColor: {
			title: __( 'Text Color', 'genesis-blocks' ),
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
} );
