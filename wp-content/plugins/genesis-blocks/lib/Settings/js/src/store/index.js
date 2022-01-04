/**
 * Registers the 'genesis-blocks/global-settings' WordPress data store.
 *
 * @see docs/modules/settings.md
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { registerStore } from '@wordpress/data';
import { controls } from '@wordpress/data-controls';

/**
 * Internal dependencies
 */
import reducer from './reducer';
import * as selectors from './selectors';
import * as actions from './actions';

const settingsStore = {
	selectors,
	actions,
	reducer,
	controls,
};

const store = registerStore('genesis-blocks/global-settings', settingsStore);

export default store;
