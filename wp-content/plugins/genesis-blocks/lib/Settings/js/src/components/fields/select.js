/**
 * Select field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * WordPress dependencies
 */
import { SelectControl } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { dispatch, withDispatch } from '@wordpress/data';

function SelectComponent({ settings, field, onUpdate }) {
	function parseOptions(options) {
		const fieldOptions = [];
		for (const [value, label] of Object.entries(options)) {
			fieldOptions.push({ value, label });
		}
		return fieldOptions;
	}

	return (
		<SelectControl
			className={field.class}
			label={field.label}
			help={field.help ? field.help : ''}
			value={settings[field.id] ? settings[field.id] : false}
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

const Select = compose([
	// Pushes field changes to the data store.
	withDispatch(() => ({
		onUpdate(newValue) {
			dispatch('genesis-blocks/global-settings').updateSetting({
				key: newValue.key,
				value: newValue.value,
			});
		},
	})),
])(SelectComponent);

export default Select;
