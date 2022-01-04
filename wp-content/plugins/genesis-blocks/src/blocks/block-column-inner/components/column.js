/**
 * Column wrapper component.
 */

/**
 * WordPress dependencies.
 */
const { Component } = wp.element;

/**
 * Internal dependencies.
 */
import classnames from 'classnames';
import BackgroundImageClasses from './../../../utils/components/background-image/classes';
import BackgroundImageStyles from './../../../utils/components/background-image/styles';

/**
 * Create a Columns wrapper Component.
 */
export default class Column extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	render() {
		const { attributes } = this.props;

		/* Setup the margin styles. */
		let marginStyle;

		if ( attributes.marginSync ) {
			marginStyle = {
				marginTop:
					0 < attributes.margin
						? attributes.margin + attributes.marginUnit
						: null,
				marginBottom:
					0 < attributes.margin
						? attributes.margin + attributes.marginUnit
						: null,
			};
		} else {
			marginStyle = {
				marginTop:
					0 < attributes.marginTop
						? attributes.marginTop + attributes.marginUnit
						: null,
				marginBottom:
					0 < attributes.marginBottom
						? attributes.marginBottom + attributes.marginUnit
						: null,
			};
		}

		/* Setup the padding styles. */
		let paddingStyle;

		if ( attributes.paddingSync ) {
			paddingStyle = {
				padding:
					0 < attributes.padding
						? attributes.padding + attributes.paddingUnit
						: null,
			};
		} else {
			paddingStyle = {
				paddingTop:
					0 < attributes.paddingTop
						? attributes.paddingTop + attributes.paddingUnit
						: null,
				paddingRight:
					0 < attributes.paddingRight
						? attributes.paddingRight + attributes.paddingUnit
						: null,
				paddingBottom:
					0 < attributes.paddingBottom
						? attributes.paddingBottom + attributes.paddingUnit
						: null,
				paddingLeft:
					0 < attributes.paddingLeft
						? attributes.paddingLeft + attributes.paddingUnit
						: null,
			};
		}

		/* Misc styles. */
		const styles = {
			backgroundColor: this.props.backgroundColorValue
				? this.props.backgroundColorValue
				: null,
			color: this.props.textColorValue ? this.props.textColorValue : null,
			textAlign: attributes.textAlign ? attributes.textAlign : null,
			...BackgroundImageStyles( attributes ),
		};

		/* Setup the background color class. */
		let backgroundColorClass;

		if ( attributes.customBackgroundColor ) {
			backgroundColorClass = 'gb-has-custom-background-color';
		} else {
			backgroundColorClass = attributes.backgroundColor
				? 'has-' + attributes.backgroundColor + '-background-color'
				: null;
		}

		/* Setup the text color class. */
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
				className={ classnames(
					this.props.className,
					'gb-block-layout-column',
					attributes.columnVerticalAlignment
						? 'gb-is-vertically-aligned-' +
								attributes.columnVerticalAlignment
						: null
				) }
			>
				<div
					className={ classnames(
						'gb-block-layout-column-inner',
						backgroundColorClass,
						textColorClass,
						...BackgroundImageClasses( attributes )
					) }
					style={ Object.assign( marginStyle, paddingStyle, styles ) }
				>
					{ this.props.children }
				</div>
			</div>
		);
	}
}
