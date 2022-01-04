/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Internal dependencies
 */
import Edit from './components/edit';
import './styles/style.scss';
import './styles/editor.scss';

registerBlockType( 'genesis-blocks/gb-newsletter', {
	title: __( 'Email newsletter', 'genesis-blocks' ),
	description: __( 'Add an email newsletter sign-up form.', 'genesis-blocks' ),
	category: 'genesis-blocks',
	icon: 'email-alt',
	keywords: [
		__( 'Mailchimp', 'genesis-blocks' ),
		__( 'Subscribe', 'genesis-blocks' ),
		__( 'Newsletter', 'genesis-blocks' ),
	],
	edit: Edit,
	gb_settings_data: {
		gb_newsletter_mailingList: {
			title: __( 'Mailing List', 'genesis-blocks' ),
		},
		gb_newsletter_successMessage: {
			title: __( 'Success Message', 'genesis-blocks' ),
		},
		gb_newsletter_doubleOptIn: {
			title: __( 'Enable Double Opt-In', 'genesis-blocks' ),
		},
		gb_newsletter_containerPadding: {
			title: __( 'Form Padding', 'genesis-blocks' ),
		},
		gb_newsletter_containerMargin: {
			title: __( 'Form Margin', 'genesis-blocks' ),
		},
		gb_newsletter_colorOptions: {
			title: __( 'Color Options', 'genesis-blocks' ),
		},
	},
	save: () => {
		return null;
	},
} );
