/**
 * Radio field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { RadioControl } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { dispatch, withDispatch } from '@wordpress/data';

function RadioComponent({ settings, field, onUpdate }) {
	// [
	// 	{ label: 'Big', value: 'big' },
	// 	{ label: 'Medium', value: 'medium' },
	// 	{ label: 'Small', value: 'small' },
	// ]
	function parseOptions(options) {
		const fieldOptions = [];
		for (const [value, label] of Object.entries(options)) {
			fieldOptions.push({ value, label });
		}
		return fieldOptions;
	}

	return (
		<RadioControl
			className={field.class}
			label={field.label}
			help={field.help}
			selected={settings[field.id] ? settings[field.id] : false}
			options={parseOptions(field.options)}
			onChange={(newValue) =>
				onUpdate({
					key: field.id,
					value: newValue,
				})
			}
		/>
	);
}

const Radio = compose([
	// Pushes field changes to the data store.
	withDispatch(() => ({
		onUpdate(newValue) {
			dispatch('genesis-blocks/global-settings').updateSetting({
				key: newValue.key,
				value: newValue.value,
			});
		},
	})),
])(RadioComponent);

export default Radio;
