/**
 * WordPress dependencies
 */
const { addFilter } = wp.hooks;

/**
 * Internal dependencies
 */
import { addResponsiveAttributes } from './utils';
import { withResponsiveSettings } from './components/with-responsive-settings';

addFilter(
	'blocks.registerBlockType',
	'genesis-blocks/add-responsive-controls-attributes',
	addResponsiveAttributes
);

addFilter(
	'editor.BlockEdit',
	'genesis-blocks/add-responsive-controls',
	withResponsiveSettings
);
