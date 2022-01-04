// @ts-check

/**
 * External dependencies
 */
import * as React from 'react';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * @typedef ButtonPreviousProps
 * @property {React.EventHandler<React.MouseEvent<HTMLButtonElement, MouseEvent>>} onClick The click handler.
 */

/**
 * The previous button.
 *
 * @param {ButtonPreviousProps} props The component props.
 * @return {React.ReactElement} The component for the step content.
 */
const ButtonPrevious = ( { onClick } ) => {
	return (
		<button className="gb-admin-button-secondary" onClick={ onClick }>
			{ __( 'Previous', 'genesis-blocks' ) }
		</button>
	);
};

export default ButtonPrevious;
