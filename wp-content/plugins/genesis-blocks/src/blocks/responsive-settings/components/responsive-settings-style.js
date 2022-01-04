/**
 * Internal dependencies
 */
import { camelToKebabCase } from '../utils';

/**
 * @typedef {Object} ResponsiveSettingStyleProps The component props.
 * @property {string} clientId The block's clientId.
 * @property {string} device The device of the styles.
 * @property {string} selectedDevice The selected device.
 * @property { 'fontSize' | 'lineHeight' } settingName The name of the setting.
 * @property {string} settingValue The value of the setting.
 */

/**
 * The styling of the responsive settings.
 *
 * @param {ResponsiveSettingStyleProps} props The component props.
 * @return {Function} The component.
 */
export const ResponsiveSettingStyle = ( {
	clientId,
	device,
	selectedDevice,
	settingName,
	settingValue,
} ) => (
	<>
		{ !! settingValue
			? `@media only screen and (max-width: ${ device }) {
				#block-${ clientId } {
					${ camelToKebabCase( settingName ) }: ${ settingValue } !important
				}
			}`
			: null
		}
		{ selectedDevice === device && !! settingValue
			? `#block-${ clientId } {
				${ camelToKebabCase( settingName ) }: ${ settingValue } !important
			}`
			: null
		}
	</>
);
