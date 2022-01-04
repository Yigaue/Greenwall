/**
 * Reducer for the Genesis Blocks data store.
 *
 * The reducer handles actions sent to the data store. Reducers must be pure so
 * they should have no side effects. Do not put API calls into the reducer.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

const initialState = {
	// Helps set button and update status state.
	form: {
		fail: false,
		success: false,
		is_saving: false,
	},
	// To store state at the top level from custom applications loaded into tabs.
	// Allows state to persist when tab focus changes.
	custom: [],
	// To store settings the user modifies to persist to the database.
	modifiedSettings: [],
	// eslint-disable-next-line no-undef
	...genesisBlocksSettingsData,
};

const reducer = (state = initialState, action) => {
	if ('UPDATE_CUSTOM' === action.type) {
		return {
			...state,
			custom: {
				...state.custom,
				[action.setting.key]: action.setting.value,
			},
		};
	}
	
	if ('UPDATE_SETTING' === action.type) {
		return {
			...state,
			// So the field state updates on screen.
			settings: {
				...state.settings,
				[action.setting.key]: action.setting.value,
			},
			// So that only modified settings are sent to the database.
			modifiedSettings: {
				...state.modifiedSettings,
				[action.setting.key]: action.setting.value,
			},
		};
	}

	if ('SAVING' === action.type) {
		return {
			...state,
			form: {
				...state.form,
				fail: false,
				success: false,
				is_saving: true,
			},
		};
	}

	if ('SAVED' === action.type) {
		return {
			...state,
			form: {
				...state.form,
				success: action.success === true,
				fail: action.success !== true,
				is_saving: false,
			},
			modifiedSettings: action.success ? [] : state.modifiedSettings,
		};
	}

	if ('RESET' === action.type) {
		return {
			...state,
			form: {
				...state.form,
				fail: false,
				success: false,
				is_saving: false,
			},
		};
	}

	return state;
};

export default reducer;
