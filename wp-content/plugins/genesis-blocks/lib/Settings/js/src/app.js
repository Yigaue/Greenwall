/**
 * The React application for the Genesis Blocks settings page.
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { render } from '@wordpress/element';

/**
 * Internal dependencies
 */
import { Settings } from './components/settings';

render(<Settings />, document.getElementById('root'));
