import { dimRatioToClass } from './shared';

/**
 * Background image classes.
 *
 * @param {Object} attributes
 */
function BackgroundImageClasses( attributes ) {
	return [
		attributes.backgroundDimRatio !== undefined &&
		100 !== attributes.backgroundDimRatio
			? 'gb-has-background-dim'
			: null,
		dimRatioToClass( attributes.backgroundDimRatio ),
		attributes.backgroundImgURL &&
		attributes.backgroundSize &&
		'no-repeat' === attributes.backgroundRepeat
			? 'gb-background-' + attributes.backgroundSize
			: null,
		attributes.backgroundImgURL && attributes.backgroundRepeat
			? 'gb-background-' + attributes.backgroundRepeat
			: null,
		attributes.hasParallax ? 'gb-has-parallax' : null,
	];
}

export default BackgroundImageClasses;
