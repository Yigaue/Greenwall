/**
 * Textarea field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { TextareaControl } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { dispatch, withDispatch } from '@wordpress/data';

function TextareaComponent({ settings, field, onUpdate }) {
	return (
		<TextareaControl
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

const Textarea = compose([
	// Pushes field changes to the data store.
	withDispatch(() => ({
		onUpdate(newValue) {
			dispatch('genesis-blocks/global-settings').updateSetting({
				key: newValue.key,
				value: newValue.value,
			});
		},
	})),
])(TextareaComponent);

export default Textarea;
