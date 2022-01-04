export default {
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