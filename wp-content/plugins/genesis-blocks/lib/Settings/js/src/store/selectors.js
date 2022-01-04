/**
 * Selectors let components get data from the store.
 *
 * Components can use the methods you export here to load the subset of data
 * they care about from the Genesis Blocks settings store.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * Gets all settings.
 *
 * @example
 * ```js
 * wp.data.select('genesis-blocks/global-settings').getSettings();
 * ```
 *
 * @param {Object} state The current state of the store.
 * @return {Object} Settings state.
 */
export const getSettings = (state) => state.settings || {};

/**
 * Gets all custom values.
 * 
 * Custom values can be stored by React apps that load inside a 
 * tab via the SlotFill API. These apps can push state to the
 * settings app level, ensuring it persists when tabs are changed:
 * 
 * @example
 * ```js
 * wp.data.dispatch('genesis-blocks/global-settings').updateCustom({
 *     key: 'myname', value {},
 * });
 * ```
 * 
 * They can retrieve that state with the `getCustom()` function:
 *
 * @example
 * ```js
 * wp.data.select('genesis-blocks/global-settings').getCustom();
 * 
 * // => { myname: {} }
 * ```
 *
 * @param {Object} state The current state of the store.
 * @return {Object} Custom state.
 */
export const getCustom = (state) => state.custom || {};

/**
 * Gets form state.
 *
 * @example
 * ```js
 * wp.data.select('genesis-blocks/global-settings').getFormState();
 * ```
 *
 * @param {Object} state The current state of the store.
 * @return {Object} Form state.
 */
export const getFormInfo = (state) => state.form || {};

/**
 * Gets the sections to display on the settings page.
 *
 * @example
 * ```js
 * wp.data.select('genesis-blocks/global-settings').getSections();
 * ```
 *
 * @param {Object} state The current state of the store.
 * @return {Object} Named settings section containing fields.
 */
export function getSections(state) {
	if (state.hasOwnProperty('sections')) {
		return state.sections;
	}
	return {};
}

/**
 * Gets all settings the user has modified.
 *
 * @example
 * ```js
 * wp.data.select('genesis-blocks/global-settings').getModifiedSettings();
 * ```
 *
 * @param {Object} state The current state of the store.
 * @return {Object} Modified settings state.
 */
export const getModifiedSettings = (state) => state.modifiedSettings || [];
