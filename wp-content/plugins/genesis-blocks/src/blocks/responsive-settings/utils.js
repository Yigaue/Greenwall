/**
 * Internal dependencies
 */
import {
	BLOCKS_WITH_RESPONSIVE_SETTINGS,
	RESPONSIVE_SETTINGS_ATTRIBUTE,
} from './constants';

/**
 * Adds responsive control attributes.
 *
 * Props Phil Johnston.
 *
 * @param {Object} settings Settings for the block.
 * @param {string} name The name of the block.
 * @return {Object} settings Modified settings.
 */
export const addResponsiveAttributes = ( settings, name ) => {
	if ( ! BLOCKS_WITH_RESPONSIVE_SETTINGS.includes( name ) ) {
		return settings;
	}

	return {
		...settings,
		attributes: {
			...settings?.attributes,
			[ RESPONSIVE_SETTINGS_ATTRIBUTE ]: {
				type: 'object',
				default: {},
			},
		},
	};
};

/**
 * Gets a kebab-case string from a camelCase one.
 *
 * @param {string} camelCase A camelCase string.
 * @return {string} A kebab-case string.
 */
export const camelToKebabCase = ( camelCase ) =>
	camelCase.replace(
		/([a-z])([A-Z1-9])/g,
		( match, p1, p2 ) => p1 + '-' + p2
	).toLowerCase();

/**
 * Adds a px unit to the font-size size if it has no unit.
 *
 * If this receives '24', it will return '24px'.
 * If there's already a unit, like '24rem', it returns that.
 *
 * @param {string|undefined} size The size, either with or without a unit like px or rem, like 24px.
 * @return {string|undefined} The size with px if it didn't already have one.
 */
export const conditionallyAddPxUnit = ( size ) => {
	if ( 'string' !== typeof size ) {
		return size;
	}

	return size.match( /[A-Za-z]+$/ )
		? size
		: `${ size }px`;
}

/**
 * Gets the font as a slug.
 *
 * @param {string} fontSize The font size in px, em, or rem to look for, like '20px'.
 * @param {Object[]} fontSizes All of the possible font sizes.
 * @return {string|undefined} The font as a slug, like 'large'.
 */
export const getFontSlug = ( fontSize, fontSizes ) =>
	fontSizes.find( ( font ) => fontSize === font.size )?.slug;

/**
 * Gets the font size in px, em, or rem.
 *
 * @param {string} fontSlug The slug to look for, like 'normal'.
 * @param {Object[]} fontSizes All of the possible font sizes.
 * @return {string|undefined} The font size in px, em, rem.
 */
export const getFontSize = ( fontSlug, fontSizes ) =>
	fontSizes.find( ( font ) => fontSlug === font.slug )?.size;
