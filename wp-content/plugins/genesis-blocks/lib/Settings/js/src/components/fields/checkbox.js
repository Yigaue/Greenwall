/**
 * Checkbox field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { CheckboxControl } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { dispatch, withDispatch } from '@wordpress/data';

function CheckboxComponent({ settings, field, onUpdate }) {
	return (
		<CheckboxControl
			className={field.class}
			heading={field.heading}
			label={field.label}
			help={field.help}
			checked={settings[field.id] ? settings[field.id] : false}
			onChange={(newValue) =>
				onUpdate({
					key: field.id,
					value: newValue,
				})
			}
		/>
	);
}

const Checkbox = compose([
	// Pushes field changes to the data store.
	withDispatch(() => ({
		onUpdate(newValue) {
			dispatch('genesis-blocks/global-settings').updateSetting({
				key: newValue.key,
				value: newValue.value,
			});
		},
	})),
])(CheckboxComponent);

export default Checkbox;
