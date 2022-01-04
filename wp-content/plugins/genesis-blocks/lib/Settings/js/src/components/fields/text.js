/**
 * Text field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { TextControl } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { dispatch, withDispatch } from '@wordpress/data';

function TextComponent({ settings, field, onUpdate }) {
	return (
		<TextControl
			className={field.class}
			label={field.label ? field.label : ''}
			help={field.help ? field.help : ''}
			onChange={(newValue) =>
				onUpdate({
					key: field.id,
					value: newValue,
				})
			}
			value={settings[field.id] ? settings[field.id] : ''}
		/>
	);
}

const Text = compose([
	// Pushes field changes to the data store.
	withDispatch(() => ({
		onUpdate(newValue) {
			dispatch('genesis-blocks/global-settings').updateSetting({
				key: newValue.key,
				value: newValue.value,
			});
		},
	})),
])(TextComponent);

export default Text;
