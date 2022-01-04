/**
 * BLOCK: Genesis Blocks Sharing
 */

// Import
import Edit from './components/edit';
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Register block
const { registerBlockType } = wp.blocks;

// Register the block
registerBlockType( 'genesis-blocks/gb-sharing', {
	title: __( 'Sharing', 'genesis-blocks' ),
	description: __(
		'Add sharing buttons to your posts and pages.',
		'genesis-blocks'
	),
	icon: 'admin-links',
	category: 'genesis-blocks',
	keywords: [
		__( 'sharing', 'genesis-blocks' ),
		__( 'social', 'genesis-blocks' ),
		__( 'atomic', 'genesis-blocks' ),
	],

	gb_settings_data: {
		gb_sharing_links: {
			title: __( 'Sharing Links', 'genesis-blocks' ),
		},
		gb_sharing_shareButtonStyle: {
			title: __( 'Button Style', 'genesis-blocks' ),
		},
		gb_sharing_shareButtonShape: {
			title: __( 'Button Shape', 'genesis-blocks' ),
		},
		gb_sharing_shareButtonSize: {
			title: __( 'Button Size', 'genesis-blocks' ),
		},
		gb_sharing_shareButtonColor: {
			title: __( 'Button Color', 'genesis-blocks' ),
		},
	},

	// Render the block components
	edit: ( props ) => {
		return <Edit { ...props } clientId={ props.clientId } />;
	},

	// Render via PHP
	save() {
		return null;
	},
} );
