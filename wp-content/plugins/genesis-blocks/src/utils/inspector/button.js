/**
 * Internal dependencies.
 */
import RenderSettingControl from '../../utils/components/settings/renderSettingControl';

const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { SelectControl, ToggleControl } = wp.components;
const { PanelColorSettings } = wp.blockEditor;

export default function ButtonSettings( props ) {
	const {
		enableButtonBackgroundColor,
		buttonBackgroundColor,
		onChangeButtonColor = () => {},
		enableButtonTextColor,
		buttonTextColor,
		onChangeButtonTextColor = () => {},
		enableButtonSize,
		buttonSize,
		onChangeButtonSize = () => {},
		enableButtonShape,
		buttonShape,
		onChangeButtonShape = () => {},
		enableButtonTarget,
		buttonTarget,
		onChangeButtonTarget = () => {},
	} = props;

	// Button size values
	const buttonSizeOptions = [
		{
			value: 'gb-button-size-small',
			label: __( 'Small', 'genesis-blocks' ),
		},
		{
			value: 'gb-button-size-medium',
			label: __( 'Medium', 'genesis-blocks' ),
		},
		{
			value: 'gb-button-size-large',
			label: __( 'Large', 'genesis-blocks' ),
		},
		{
			value: 'gb-button-size-extralarge',
			label: __( 'Extra Large', 'genesis-blocks' ),
		},
	];

	// Button shape
	const buttonShapeOptions = [
		{
			value: 'gb-button-shape-square',
			label: __( 'Square', 'genesis-blocks' ),
		},
		{
			value: 'gb-button-shape-rounded',
			label: __( 'Rounded Square', 'genesis-blocks' ),
		},
		{
			value: 'gb-button-shape-circular',
			label: __( 'Circular', 'genesis-blocks' ),
		},
	];

	return (
		<Fragment>
			<RenderSettingControl id="gb_button_buttonOptions">
				{ false !== enableButtonTarget && (
					<ToggleControl
						label={ __(
							'Open link in new window',
							'genesis-blocks'
						) }
						checked={ buttonTarget }
						onChange={ onChangeButtonTarget }
					/>
				) }
				{ false !== enableButtonSize && (
					<SelectControl
						selected={ buttonSize }
						label={ __( 'Button Size', 'genesis-blocks' ) }
						value={ buttonSize }
						options={ buttonSizeOptions.map(
							( { value, label } ) => ( {
								value,
								label,
							} )
						) }
						onChange={ onChangeButtonSize }
					/>
				) }
				{ false !== enableButtonShape && (
					<SelectControl
						label={ __( 'Button Shape', 'genesis-blocks' ) }
						value={ buttonShape }
						options={ buttonShapeOptions.map(
							( { value, label } ) => ( {
								value,
								label,
							} )
						) }
						onChange={ onChangeButtonShape }
					/>
				) }
				{ false !== enableButtonBackgroundColor && (
					<PanelColorSettings
						title={ __( 'Button Color', 'genesis-blocks' ) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: buttonBackgroundColor,
								onChange: onChangeButtonColor,
								label: __( 'Button Color', 'genesis-blocks' ),
							},
						] }
					></PanelColorSettings>
				) }
				{ false !== enableButtonTextColor && (
					<PanelColorSettings
						title={ __( 'Button Text Color', 'genesis-blocks' ) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: buttonTextColor,
								onChange: onChangeButtonTextColor,
								label: __(
									'Button Text Color',
									'genesis-blocks'
								),
							},
						] }
					></PanelColorSettings>
				) }
			</RenderSettingControl>
		</Fragment>
	);
}
