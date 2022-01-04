/**
 * SaveButton component
 *
 * Shows an adjacent notice with the result of the save operation.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { speak } from '@wordpress/a11y';
import { Button } from '@wordpress/components';
import { dispatch, withSelect } from '@wordpress/data';
import { compose } from '@wordpress/compose';
import { useRef } from '@wordpress/element';
import { doAction } from '@wordpress/hooks';

function SaveButtonComponent({
	form,
	settings,
	custom,
	children,
	successMessage,
	failMessage,
	messageDuration,
}) {
	// Reference to the message timer that persists across re-renders.
	const messageTimerRef = useRef();
	const { GAClient } = window.GenesisAnalytics;

	/**
	 * Saves the current settings state to the database.
	 * 
	 * @note Calls GAClient.enableAnalytics to makes sure that any opt in settings
	 *   are applied immediately, instead of waiting on a page refresh.
	 */
	function saveSettings() {
		GAClient.enableAnalytics(settings.genesis_blocks_analytics_opt_in);
		doAction('genesisBlocks.savingSettings', settings, custom);
		clearTimeout(messageTimerRef.current); // Existing timers must not remove new messages prematurely.
		dispatch('genesis-blocks/global-settings').saveSettings(settings);
	}

	/**
	 * Shows a success or failure message.
	 *
	 * Speaks successMessage or failureMessage text, then resets the form state
	 * in the Genesis Blocks data store after messageDuration.
	 */
	function showMessage() {
		messageTimerRef.current = setTimeout(
			() =>
				dispatch('genesis-blocks/global-settings').resetFormSaveState(),
			messageDuration * 1000
		);

		const message = form.success ? successMessage : failMessage;

		speak(message, 'polite');

		const classes =
			'genesis-blocks-save-notice' +
			`${form.success ? ' success' : ''}` +
			`${form.fail ? ' fail' : ''}`;

		return <span className={classes}>{message}</span>;
	}

	return (
		<>
			<Button
				isPrimary
				isBusy={form.is_saving}
				disabled={form.is_saving}
				onClick={saveSettings}
				className="genesis-blocks-settings-save has-notices"
			>
				{children}
			</Button>
			{form.success || form.fail ? showMessage() : ''}
		</>
	);
}

export const SaveButton = compose([
	withSelect((select) => ({
		form: select('genesis-blocks/global-settings').getFormInfo(),
		settings: select(
			'genesis-blocks/global-settings'
		).getModifiedSettings(),
		custom: select(
			'genesis-blocks/global-settings'
		).getCustom(),
	})),
])(SaveButtonComponent);
