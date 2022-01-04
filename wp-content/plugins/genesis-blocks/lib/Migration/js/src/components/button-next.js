// @ts-check

/**
 * External dependencies
 */
import * as React from 'react';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';

/**
 * @typedef ButtonNextProps
 * @property {React.EventHandler<React.MouseEvent<HTMLButtonElement, MouseEvent>>} onClick The click handler.
 * @property {string} [checkboxLabel] The label of the checkbox, if there should be one.
 * @property {number} stepIndex The index of this button's step.
 */

/**
 * The next button.
 *
 * @param {ButtonNextProps} props The component props.
 * @return {React.ReactElement} The component for the step content.
 */
const ButtonNext = ( { onClick, checkboxLabel, stepIndex } ) => {
	const [ isCheckboxChecked, setCheckboxChecked ] = useState( false );

	// If there's no label for the 'confirmation' checkbox, return a simple button.
	if ( ! checkboxLabel ) {
		return <button className="btn" onClick={ onClick }>{ __( 'Next Step', 'genesis-blocks' ) }</button>;
	}

	const inputId = `gb-migration-check-${ stepIndex }`;
	return (
		<>
			<form>
				<input
					id={ inputId }
					type="checkbox"
					onClick={ () => {
						setCheckboxChecked( ! isCheckboxChecked );
					} }
				/>
				<label htmlFor={ inputId } className="gb-checkbox-label">{ checkboxLabel }</label>
			</form>
			<button
				className="gb-admin-button-primary"
				onClick={ onClick }
				disabled={ ! isCheckboxChecked }
			>
				{ __( 'Next Step', 'genesis-blocks' ) }
			</button>
		</>

	);
};

export default ButtonNext;
