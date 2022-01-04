/**
 * Shared background image functions
 */

export function dimRatioToClass( ratio ) {
	return 100 > ratio
		? 'gb-has-background-dim-' + 10 * Math.round( ratio / 10 )
		: null;
}
