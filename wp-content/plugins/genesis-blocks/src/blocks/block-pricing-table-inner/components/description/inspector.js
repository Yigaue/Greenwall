/**
 * Inspector Controls
 */

// Import Inspector settings
import Padding from './../../../../utils/components/padding';

// Import block dependencies and components
const { __ } = wp.i18n;
const { Component } = wp.element;
const { compose } = wp.compose;

const {
	InspectorControls,
	FontSizePicker,
	withFontSizes,
	withColors,
	ContrastChecker,
	PanelColorSettings,
	ColorPalette,
} = wp.blockEditor;

const {
	withFallbackStyles,
	PanelBody,
	PanelRow,
	SelectControl,
	BaseControl,
	RangeControl,
} = wp.components;

// Apply fallback styles
const applyFallbackStyles = withFallbackStyles( ( node, ownProps ) => {
	const {
		textColor,
		backgroundColor,
		fontSize,
		customFontSize,
	} = ownProps.attributes;
	const editableNode = node.querySelector( '[contenteditable="true"]' );
	const computedStyles = editableNode
		? getComputedStyle( editableNode )
		: null;
	return {
		fallbackBackgroundColor:
			backgroundColor || ! computedStyles
				? undefined
				: computedStyles.backgroundColor,
		fallbackTextColor:
			textColor || ! computedStyles ? undefined : computedStyles.color,
		fallbackFontSize:
			fontSize || customFontSize || ! computedStyles
				? undefined
				: parseInt( computedStyles.fontSize ) || undefined,
	};
} );

/**
 * Create an Inspector Controls wrapper Component
 */
class Inspector extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	render() {
		// Setup the attributes
		const {
			attributes: {
				borderStyle,
				borderColor,
				borderWidth,
				paddingTop,
				paddingRight,
				paddingBottom,
				paddingLeft,
			},
			isSelected,
			setAttributes,
			fallbackFontSize,
			fontSize,
			setFontSize,
			backgroundColor,
			textColor,
			setBackgroundColor,
			setTextColor,
			fallbackBackgroundColor,
			fallbackTextColor,
		} = this.props;

		// Border styles
		const borderStyles = [
			{ value: 'gb-list-border-none', label: __( 'None' ) },
			{ value: 'gb-list-border-solid', label: __( 'Solid' ) },
			{ value: 'gb-list-border-dotted', label: __( 'Dotted' ) },
			{ value: 'gb-list-border-dashed', label: __( 'Dashed' ) },
		];

		const onChangeBorderColor = ( value ) =>
			setAttributes( { borderColor: value } );

		return (
			<InspectorControls key="inspector">
				<PanelBody title={ __( 'Text Settings', 'genesis-blocks' ) }>
					<FontSizePicker
						fallbackFontSize={ fallbackFontSize }
						value={ fontSize.size }
						onChange={ setFontSize }
					/>
					<SelectControl
						label={ __( 'List Border Style', 'genesis-blocks' ) }
						value={ borderStyle }
						options={ borderStyles.map( ( { value, label } ) => ( {
							value,
							label,
						} ) ) }
						onChange={ ( value ) => {
							this.props.setAttributes( { borderStyle: value } );
						} }
					/>
					{ 'gb-list-border-none' !== borderStyle && (
						<RangeControl
							label={ __( 'List Border Width', 'genesis-blocks' ) }
							value={ borderWidth }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									borderWidth: value,
								} )
							}
							min={ 1 }
							max={ 5 }
							step={ 1 }
						/>
					) }
					{ 'gb-list-border-none' !== borderStyle && (
						<PanelRow>
							<BaseControl
								label={ __(
									'List Border Color',
									'genesis-blocks'
								) }
								id={ 'gb-list-border-color-' + this.props.clientId }
							>
								<ColorPalette
									initialOpen={ false }
									value={ borderColor }
									onChange={ onChangeBorderColor }
								></ColorPalette>
							</BaseControl>
						</PanelRow>
					) }
				</PanelBody>
				<PanelBody
					title={ __( 'Padding Settings', 'genesis-blocks' ) }
					initialOpen={ false }
				>
					<Padding
						// Top padding
						paddingEnableTop={ true }
						paddingTop={ paddingTop }
						paddingTopMin="0"
						paddingTopMax="100"
						onChangePaddingTop={ ( paddingTop ) =>
							setAttributes( { paddingTop } )
						}
						// Right padding
						paddingEnableRight={ true }
						paddingRight={ paddingRight }
						paddingRightMin="0"
						paddingRightMax="100"
						onChangePaddingRight={ ( paddingRight ) =>
							setAttributes( { paddingRight } )
						}
						// Bottom padding
						paddingEnableBottom={ true }
						paddingBottom={ paddingBottom }
						paddingBottomMin="0"
						paddingBottomMax="100"
						onChangePaddingBottom={ ( paddingBottom ) =>
							setAttributes( { paddingBottom } )
						}
						// Left padding
						paddingEnableLeft={ true }
						paddingLeft={ paddingLeft }
						paddingLeftMin="0"
						paddingLeftMax="100"
						onChangePaddingLeft={ ( paddingLeft ) =>
							setAttributes( { paddingLeft } )
						}
					/>
				</PanelBody>
				<PanelColorSettings
					title={ __( 'Color Settings', 'genesis-blocks' ) }
					initialOpen={ false }
					colorSettings={ [
						{
							value: backgroundColor.color,
							onChange: setBackgroundColor,
							label: __( 'Background Color', 'genesis-blocks' ),
						},
						{
							value: textColor.color,
							onChange: setTextColor,
							label: __( 'Text Color', 'genesis-blocks' ),
						},
					] }
				>
					<ContrastChecker
						{ ...{
							textColor: textColor.color,
							backgroundColor: backgroundColor.color,
							fallbackTextColor,
							fallbackBackgroundColor,
						} }
						fontSize={ fontSize.size }
					/>
				</PanelColorSettings>
			</InspectorControls>
		);
	}
}

export default compose( [
	applyFallbackStyles,
	withFontSizes( 'fontSize' ),
	withColors( 'backgroundColor', { textColor: 'color' } ),
] )( Inspector );
