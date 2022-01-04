/**
 * BLOCK: Genesis Blocks Profile Box
 */

/**
 * Internal dependencies
 */
import Edit from './components/edit';
import Save from './components/save';
import './styles/style.scss';
import './styles/editor.scss';
import deprecated_array from './deprecated/deprecated-array';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

const blockAttributes = {
	clientId:{
		type: 'string',
		default: '',
	},
	profileName: {
		type: 'array',
		source: 'children',
		selector: '.gb-profile-name',
	},
	profileTitle: {
		type: 'array',
		source: 'children',
		selector: '.gb-profile-title',
	},
	profileContent: {
		type: 'array',
		selector: '.gb-profile-text',
		source: 'children',
	},
	profileAlignment: {
		type: 'string',
	},
	profileImgURL: {
		type: 'string',
		source: 'attribute',
		attribute: 'src',
		selector: 'img',
	},
	profileImgAlt: {
		type: 'string',
		source: 'attribute',
		selector: 'figure img',
		attribute: 'alt',
		default: '',
	},
	profileImgID: {
		type: 'number',
	},
	profileBackgroundColor: {
		type: 'string',
		default: '#f2f2f2',
	},
	profileTextColor: {
		type: 'string',
		default: '#32373c',
	},
	profileLinkColor: {
		type: 'string',
		default: '#392f43',
	},
	profileFontSize: {
		type: 'number',
		default: 18,
	},
	profileAvatarShape: {
		type: 'string',
		default: 'square',
	},
	twitter: {
		type: 'url',
	},
	facebook: {
		type: 'url',
	},
	instagram: {
		type: 'url',
	},
	pinterest: {
		type: 'url',
	},
	google: {
		type: 'url',
	},
	youtube: {
		type: 'url',
	},
	github: {
		type: 'url',
	},
	linkedin: {
		type: 'url',
	},
	email: {
		type: 'url',
	},
	wordpress: {
		type: 'url',
	},
	website: {
		type: 'url',
	},
};

/**
 * Register the block
 */
registerBlockType( 'genesis-blocks/gb-profile-box', {
	title: __( 'Profile Box', 'genesis-blocks' ),
	description: __(
		'Add a profile box with bio info and social media links.',
		'genesis-blocks'
	),
	icon: 'admin-users',
	category: 'genesis-blocks',
	keywords: [
		__( 'author', 'genesis-blocks' ),
		__( 'profile', 'genesis-blocks' ),
		__( 'atomic', 'genesis-blocks' ),
		__( 'genesis', 'genesis-blocks' ),
	],

	/* Setup the block attributes */
	attributes: blockAttributes,

	gb_settings_data: {
		gb_author_profile_profileFontSize: {
			title: __( 'Font Size', 'genesis-blocks' ),
		},
		gb_author_profile_profileAvatarShape: {
			title: __( 'Avatar Shape', 'genesis-blocks' ),
		},
		gb_author_profile_profileBackgroundColor: {
			title: __( 'Background Color', 'genesis-blocks' ),
		},
		gb_author_profile_profileTextColor: {
			title: __( 'Text Color', 'genesis-blocks' ),
		},
		gb_author_profile_profileLinkColor: {
			title: __( 'Social Link Color', 'genesis-blocks' ),
		},
		gb_author_profile_socialLinks: {
			title: __( 'Social Links', 'genesis-blocks' ),
		},
	},

	/* Render the block in the editor. */
	edit: ( props ) => {
		return <Edit { ...props } clientId={ props.clientId } />;
	},

	/* Save the block markup. */
	save: ( props ) => {
		return <Save { ...props } clientId={ props.attributes.clientId } />;
	},

	deprecated: deprecated_array,
} );
