/**
 * BLOCK: Genesis Blocks Button
 */

// Import block dependencies and components
import classnames from 'classnames';
import Inspector from './components/inspector';
import CustomButton from './components/button';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

// Register editor components
const { RichText, AlignmentToolbar, BlockControls, URLInput } = wp.blockEditor;

// Register components
const { Button, Dashicon, Icon } = wp.components;

class GBButtonBlock extends Component {
	render() {
		// Setup the attributes
		const {
			attributes: {
				buttonText,
				buttonUrl,
				buttonAlignment,
				buttonBackgroundColor,
				buttonTextColor,
				buttonSize,
				buttonShape,
			},
			isSelected,
			setAttributes,
		} = this.props;

		return [
			// Show the alignment toolbar on focus
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ buttonAlignment }
					onChange={ ( value ) => {
						setAttributes( { buttonAlignment: value } );
					} }
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-button-inspector-' + this.props.clientId } { ...this.props } />,

			// Show the button markup in the editor
			<CustomButton key={ 'gb-button-custombutton-' + this.props.clientId } { ...this.props }>
				<RichText
					tagName="span"
					placeholder={ __( 'Button text…', 'genesis-blocks' ) }
					keepPlaceholderOnFocus
					value={ buttonText }
					allowedFormats={ [] }
					className={ classnames(
						'gb-button',
						buttonShape,
						buttonSize
					) }
					style={ {
						color: buttonTextColor ? buttonTextColor : '#ffffff',
						backgroundColor: buttonBackgroundColor
							? buttonBackgroundColor
							: '#3373dc',
					} }
					onChange={ ( value ) =>
						setAttributes( { buttonText: value } )
					}
				/>
			</CustomButton>,
			isSelected && (
				<form
					key="form-link"
					className={ `blocks-button__inline-link gb-button-${ buttonAlignment }` }
					onSubmit={ ( event ) => event.preventDefault() }
					style={ {
						textAlign: buttonAlignment,
					} }
				>
					<Dashicon icon={ 'admin-links' } />
					<URLInput
						className="button-url"
						value={ buttonUrl }
						onChange={ ( value ) =>
							setAttributes( { buttonUrl: value } )
						}
					/>
					<Button
						label={ __( 'Apply', 'genesis-blocks' ) }
						type="submit"
					>
						<Icon icon="editor-break" />
					</Button>
				</form>
			),
		];
	}
}

// Register the block
registerBlockType( 'genesis-blocks/gb-button', {
	title: __( 'Button', 'genesis-blocks' ),
	description: __( 'Add a customizable button.', 'genesis-blocks' ),
	icon: 'admin-links',
	category: 'genesis-blocks',
	keywords: [
		__( 'button', 'genesis-blocks' ),
		__( 'link', 'genesis-blocks' ),
		__( 'genesis', 'genesis-blocks' ),
	],
	attributes: {
		buttonText: {
			type: 'string',
		},
		buttonUrl: {
			type: 'string',
			source: 'attribute',
			selector: 'a',
			attribute: 'href',
		},
		buttonAlignment: {
			type: 'string',
		},
		buttonBackgroundColor: {
			type: 'string',
		},
		buttonTextColor: {
			type: 'string',
		},
		buttonSize: {
			type: 'string',
			default: 'gb-button-size-medium',
		},
		buttonShape: {
			type: 'string',
			default: 'gb-button-shape-rounded',
		},
		buttonTarget: {
			type: 'boolean',
			default: false,
		},
	},

	gb_settings_data: {
		gb_button_buttonOptions: {
			title: __( 'Button Options', 'genesis-blocks' ),
		},
	},

	// Render the block components
	edit: GBButtonBlock,

	// Save the attributes and markup
	save( props ) {
		// Setup the attributes
		const {
			buttonText,
			buttonUrl,
			buttonBackgroundColor,
			buttonTextColor,
			buttonSize,
			buttonShape,
			buttonTarget,
		} = props.attributes;

		// Save the block markup for the front end
		return (
			<CustomButton { ...props }>
				{ // Check if there is button text and output
				buttonText && (
					<a
						href={ buttonUrl }
						target={ buttonTarget ? '_blank' : null }
						rel={ buttonTarget ? 'noopener noreferrer' : null }
						className={ classnames(
							'gb-button',
							buttonShape,
							buttonSize
						) }
						style={ {
							color: buttonTextColor
								? buttonTextColor
								: '#ffffff',
							backgroundColor: buttonBackgroundColor
								? buttonBackgroundColor
								: '#3373dc',
						} }
					>
						<RichText.Content value={ buttonText } />
					</a>
				) }
			</CustomButton>
		);
	},
} );
