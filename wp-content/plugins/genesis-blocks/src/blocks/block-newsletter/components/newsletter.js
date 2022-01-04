/**
 * Newsletter Wrapper
 */

/**
 * WordPress dependencies
 */
const { Component } = wp.element;
const { getColorClassName } = wp.blockEditor;

/**
 * External dependencies
 */
import classnames from 'classnames';

/**
 * Newsletter Container class
 */
export default class NewsletterContainer extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	render() {
		const { attributes, backgroundColor, textColor } = this.props;

		/* Setup button background color class */
		let backgroundColorClass;

		if ( attributes.customBackgroundColor ) {
			backgroundColorClass = 'gb-has-custom-background-color';
		} else {
			backgroundColorClass = attributes.backgroundColor
				? 'has-' + attributes.backgroundColor + '-background-color'
				: null;
		}

		/* Setup button text color class */
		let textColorClass;

		if ( attributes.customTextColor ) {
			textColorClass = 'gb-has-custom-text-color';
		} else {
			textColorClass = attributes.textColor
				? 'has-' + attributes.textColor + '-color'
				: null;
		}

		return (
			<div
				style={ {
					backgroundColor: backgroundColor.color,
					padding: attributes.containerPadding
						? attributes.containerPadding
						: undefined,
					marginTop: attributes.containerMarginTop
						? attributes.containerMarginTop
						: undefined,
					marginBottom: attributes.containerMarginBottom
						? attributes.containerMarginBottom
						: undefined,
					color: textColor.color,
				} }
				className={ classnames( [ this.props.className ], {
					'gb-block-newsletter': true,
					'gb-form-styles': true,
					'has-background':
						attributes.backgroundColor ||
						attributes.customBackgroundColor,
					[ backgroundColorClass ]: backgroundColorClass,
					[ textColorClass ]: textColorClass,
				} ) }
			>
				{ this.props.children }
			</div>
		);
	}
}
