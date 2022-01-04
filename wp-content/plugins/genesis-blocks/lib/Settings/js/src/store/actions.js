/**
 * Actions let components change store state by sending a payload of data.
 *
 * This file exposes methods to send actions of a given type to the Genesis Blocks
 * data store. The reducer (reducer.js) then determines how to update store
 * state based on the type of action it receives.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * Import WordPress dependencies.
 */
import '@wordpress/core-data';

/**
 * Update a named setting.
 *
 * @example
 * ```js
 * wp.data.dispatch('genesis-blocks/global-settings').updateSetting({
 * 	key: 'genesis_blocks_text_example',
 * 	value: 'My updated text',
 * });
 * ```
 * @param {Object} setting With `key` and `value` properties.
 * @return {Object} Action object for the reducer to update settings.
 */
export function updateSetting(setting) {
	return {
		type: 'UPDATE_SETTING',
		setting,
	};
}

/**
 * Update a named custom value.
 * 
 * Allows applications loaded in tabs to store state at the settings app level.
 *
 * @example
 * ```js
 * wp.data.dispatch('genesis-blocks/global-settings').updateCustom({
 * 	key: 'custom_key',
 * 	value: 'My updated text',
 * });
 * ```
 * @param {Object} setting With `key` and `value` properties.
 * @return {Object} Action object for the reducer to update settings.
 */
export function updateCustom(setting) {
	return {
		type: 'UPDATE_CUSTOM',
		setting,
	};
}

export function resetFormSaveState() {
	return {
		type: 'RESET',
	};
}

export function* saveSettings(settings) {
	yield { type: 'SAVING' };
	let success = null;

	try {
		wp.data.dispatch('core').saveSite(settings);
		success = true;
	} catch (err) {
		success = false;
	}

	return {
		type: 'SAVED',
		success,
	};
}
