/**
 * BLOCK: Genesis Blocks Post and Page Grid
 */

// Import block dependencies and components
import edit from './components/edit';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Register block controls
const { registerBlockType } = wp.blocks;

// Register alignments
const validAlignments = [ 'center', 'wide', 'full' ];

// Register the block
registerBlockType( 'genesis-blocks/gb-post-grid', {
	title: __( 'Post and Page Grid', 'genesis-blocks' ),
	description: __(
		'Add a grid or list of customizable posts or pages.',
		'genesis-blocks'
	),
	icon: 'grid-view',
	category: 'genesis-blocks',
	keywords: [
		__( 'post', 'genesis-blocks' ),
		__( 'page', 'genesis-blocks' ),
		__( 'grid', 'genesis-blocks' ),
		__( 'atomic', 'genesis-blocks' )
	],

	edit,

	gb_settings_data: {
		gb_postgrid_postType: {
			title: __( 'Content Type', 'genesis-blocks' ),
		},
		gb_postgrid_queryControls: {
			title: __( 'Query Controls', 'genesis-blocks' ),
		},
		gb_postgrid_offset: {
			title: __( 'Post Offset', 'genesis-blocks' ),
		},
		gb_postgrid_columns: {
			title: __( 'Columns', 'genesis-blocks' ),
		},
		gb_postgrid_displaySectionTitle: {
			title: __( 'Display Section Title', 'genesis-blocks' ),
		},
		gb_postgrid_sectionTitle: {
			title: __( 'Section Title', 'genesis-blocks' ),
		},
		gb_postgrid_displayPostImage: {
			title: __( 'Display Featured Image', 'genesis-blocks' ),
		},
		gb_postgrid_imageSizeValue: {
			title: __( 'Image Size', 'genesis-blocks' ),
		},
		gb_postgrid_displayPostTitle: {
			title: __( 'Display Post Title', 'genesis-blocks' ),
		},
		gb_postgrid_displayPostAuthor: {
			title: __( 'Display Post Author', 'genesis-blocks' ),
		},
		gb_postgrid_displayPostDate: {
			title: __( 'Display Post Date', 'genesis-blocks' ),
		},
		gb_postgrid_displayPostExcerpt: {
			title: __( 'Display Post Excerpt', 'genesis-blocks' ),
		},
		gb_postgrid_excerptLength: {
			title: __( 'Excerpt Length', 'genesis-blocks' ),
		},
		gb_postgrid_displayPostLink: {
			title: __( 'Display Continue Reading Link', 'genesis-blocks' ),
		},
		gb_postgrid_readMoreText: {
			title: __( 'Read More Text', 'genesis-blocks' ),
		},
		gb_postgrid_sectionTag: {
			title: __( 'Post Grid Section Tag', 'genesis-blocks' ),
		},
		gb_postgrid_sectionTitleTag: {
			title: __( 'Section Title Heading Tag', 'genesis-blocks' ),
		},
		gb_postgrid_postTitleTag: {
			title: __( 'Post Title Heading Tag', 'genesis-blocks' ),
		},
	},

	// Render via PHP
	save() {
		return null;
	},
} );
