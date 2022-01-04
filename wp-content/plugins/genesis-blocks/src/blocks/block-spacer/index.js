/**
 * BLOCK: Spacer
 */

// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './components/inspector';
import Spacer from './components/spacer';
import { Resizable } from 're-resizable';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// WordPress dependencies
const { __ } = wp.i18n;
const { Component } = wp.element;
const { registerBlockType } = wp.blocks;

class GBSpacerBlock extends Component {
	render() {
		// Setup the attributes
		const {
			attributes: { spacerHeight, spacerDividerColor },
			className,
			setAttributes,
			toggleSelection,
		} = this.props;

		return [
			// Show the block controls on focus
			<Inspector key={ 'gb-spacer-inspector-' + this.props.clientId } { ...this.props } />,

			// Show the button markup in the editor
			<Spacer key={ 'gb-spacer-editor-' + this.props.clientId } { ...this.props }>
				<Resizable
					className={ classnames( className, 'gb-spacer-handle' ) }
					style={ {
						color: spacerDividerColor,
					} }
					size={ {
						width: '100%',
						height: spacerHeight,
					} }
					minWidth={ '100%' }
					maxWidth={ '100%' }
					minHeight={ '100%' }
					handleClasses={ {
						bottomLeft: 'gb-spacer-control__resize-handle',
					} }
					enable={ {
						top: false,
						right: false,
						bottom: true,
						left: false,
						topRight: false,
						bottomRight: false,
						bottomLeft: true,
						topLeft: false,
					} }
					onResizeStart={ () => {
						toggleSelection( false );
					} }
					onResizeStop={ ( event, direction, elt, delta ) => {
						setAttributes( {
							spacerHeight: parseInt(
								spacerHeight + delta.height,
								10
							),
						} );
						toggleSelection( true );
					} }
				></Resizable>
			</Spacer>,
		];
	}
}

// Register the block
registerBlockType( 'genesis-blocks/gb-spacer', {
	title: __( 'Spacer', 'genesis-blocks' ),
	description: __(
		'Add a spacer and divider between your blocks.',
		'genesis-blocks'
	),
	icon: 'image-flip-vertical',
	category: 'genesis-blocks',
	keywords: [
		__( 'spacer', 'genesis-blocks' ),
		__( 'divider', 'genesis-blocks' ),
		__( 'atomic', 'genesis-blocks' ),
	],
	attributes: {
		spacerHeight: {
			type: 'number',
			default: 30,
		},
		spacerDivider: {
			type: 'boolean',
			default: false,
		},
		spacerDividerStyle: {
			type: 'string',
			default: 'gb-divider-solid',
		},
		spacerDividerColor: {
			type: 'string',
			default: '#ddd',
		},
		spacerDividerHeight: {
			type: 'number',
			default: 1,
		},
	},

	gb_settings_data: {
		gb_spacer_spacerHeight: {
			title: __( 'Spacer Height', 'genesis-blocks' ),
		},
		gb_spacer_spacerDivider: {
			title: __( 'Add Divider', 'genesis-blocks' ),
		},
		gb_spacer_spacerDividerStyle: {
			title: __( 'Divider Style', 'genesis-blocks' ),
		},
		gb_spacer_spacerDividerHeight: {
			title: __( 'Divider Height', 'genesis-blocks' ),
		},
		gb_spacer_dividerColor: {
			title: __( 'Divider Color', 'genesis-blocks' ),
		},
	},

	// Render the block components
	edit: GBSpacerBlock,

	// Save the attributes and markup
	save( props ) {
		// Setup the attributes
		const { spacerHeight } = props.attributes;

		// Save the block markup for the front end
		return (
			<Spacer { ...props }>
				<hr
					style={ {
						height: spacerHeight ? spacerHeight + 'px' : undefined,
					} }
				></hr>
			</Spacer>
		);
	},
} );
