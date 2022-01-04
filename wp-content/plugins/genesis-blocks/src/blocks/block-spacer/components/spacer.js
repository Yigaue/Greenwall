/**
 * Button Wrapper
 */

// Setup the block
const { Component } = wp.element;

// Import block dependencies and components
import classnames from 'classnames';

/**
 * Create a Button wrapper Component
 */
export default class Spacer extends Component {
	render() {
		// Setup the attributes
		const {
			spacerDivider,
			spacerDividerStyle,
			spacerDividerColor,
			spacerDividerHeight,
		} = this.props.attributes;

		return (
			<div
				style={ {
					color: spacerDividerColor,
				} }
				className={ classnames(
					this.props.className,
					'gb-block-spacer',
					spacerDividerStyle,
					{ 'gb-spacer-divider': spacerDivider },
					'gb-divider-size-' + spacerDividerHeight
				) }
			>
				{ this.props.children }
			</div>
		);
	}
}
