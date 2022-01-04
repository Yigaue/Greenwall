/**
 * BLOCK: Genesis Blocks Drop Cap
 */

// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './components/inspector';
import DropCap from './components/dropcap';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Internationalization
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

// Register editor components
const { RichText, AlignmentToolbar, BlockControls } = wp.blockEditor;

class GBDropCapBlock extends Component {
	render() {
		// Setup the attributes
		const {
			attributes: { dropCapContent, dropCapAlignment, dropCapFontSize },
		} = this.props;

		return [
			// Show the alignment toolbar on focus
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ dropCapAlignment }
					onChange={ ( value ) =>
						this.props.setAttributes( { dropCapAlignment: value } )
					}
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-drop-cap-inspector-' + this.props.clientId } { ...this.props } />,

			// Show the block markup in the editor
			<DropCap key={ 'gb-drop-cap-' + this.props.clientId } { ...this.props }>
				<RichText
					tagName="div"
					multiline="p"
					placeholder={ __(
						'Add paragraph text…',
						'genesis-blocks'
					) }
					keepPlaceholderOnFocus
					value={ dropCapContent }
					allowedFormats={ [
						'core/bold',
						'core/italic',
						'core/strikethrough',
						'core/link',
					] }
					className={ classnames(
						'gb-drop-cap-text',
						'gb-font-size-' + dropCapFontSize
					) }
					onChange={ ( value ) =>
						this.props.setAttributes( { dropCapContent: value } )
					}
				/>
			</DropCap>,
		];
	}
}

// Register the block
registerBlockType( 'genesis-blocks/gb-drop-cap', {
	title: __( 'Drop Cap', 'genesis-blocks' ),
	description: __(
		'Add a styled drop cap to the beginning of your paragraph.',
		'genesis-blocks'
	),
	icon: 'format-quote',
	category: 'genesis-blocks',
	keywords: [
		__( 'drop cap', 'genesis-blocks' ),
		__( 'quote', 'genesis-blocks' ),
		__( 'genesis', 'genesis-blocks' ),
	],
	attributes: {
		dropCapContent: {
			type: 'array',
			selector: '.gb-drop-cap-text',
			source: 'children',
		},
		dropCapAlignment: {
			type: 'string',
		},
		dropCapBackgroundColor: {
			type: 'string',
			default: '#f2f2f2',
		},
		dropCapTextColor: {
			type: 'string',
			default: '#32373c',
		},
		dropCapFontSize: {
			type: 'number',
			default: 3,
		},
		dropCapStyle: {
			type: 'string',
			default: 'drop-cap-letter',
		},
	},

	gb_settings_data: {
		gb_dropcap_dropCapFontSize: {
			title: __( 'Drop Cap Size', 'genesis-blocks' ),
		},
		gb_dropcap_dropCapStyle: {
			title: __( 'Drop Cap Style', 'genesis-blocks' ),
		},
	},

	// Render the block components
	edit: GBDropCapBlock,

	// Save the attributes and markup
	save( props ) {
		const { dropCapContent } = props.attributes;

		// Save the block markup for the front end
		return (
			<DropCap { ...props }>
				{ // Check if there is text and output
				dropCapContent && (
					<RichText.Content
						tagName="div"
						className="gb-drop-cap-text"
						value={ dropCapContent }
					/>
				) }
			</DropCap>
		);
	},
} );
