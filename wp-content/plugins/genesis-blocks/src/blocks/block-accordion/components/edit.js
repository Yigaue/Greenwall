/**
 * Internal dependencies
 */
import Inspector from './inspector';
import Accordion from './accordion';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const {
	RichText,
	AlignmentToolbar,
	BlockControls,
	InnerBlocks,
} = wp.blockEditor;

export default class Edit extends Component {
	constructor() {
		super( ...arguments );
	}

	render() {
		return [
			// Show the block alignment controls on focus
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ this.props.attributes.accordionAlignment }
					onChange={ ( value ) =>
						this.props.setAttributes( {
							accordionAlignment: value,
						} )
					}
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-accordion-inspector-' + this.props.clientId } { ...this.props } />,

			// Show the button markup in the editor
			<Accordion key={ 'gb-accordion-' + this.props.clientId } { ...this.props }>
				<RichText
					tagName="p"
					placeholder={ __( 'Accordion Title', 'genesis-blocks' ) }
					value={ this.props.attributes.accordionTitle }
					className="gb-accordion-title"
					onChange={ ( value ) =>
						this.props.setAttributes( { accordionTitle: value } )
					}
				/>

				<div className="gb-accordion-text">
					<InnerBlocks />
				</div>
			</Accordion>,
		];
	}
}
