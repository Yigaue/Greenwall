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
 * Internal dependencies
 */
import { ButtonNext, ButtonPrevious, Step, StepContent, StepFooter, StepIcon } from '../';

/**
 * @typedef {Object} UpdateHooksProps The component props.
 * @property {boolean} isStepActive Whether this step is active.
 * @property {boolean} isStepComplete Whether this step is complete.
 * @property {number} stepIndex The step index of this step.
 * @property {React.EventHandler<React.MouseEvent<HTMLButtonElement, MouseEvent>>} goToNext Goes to the next step.
 * @property {React.EventHandler<React.MouseEvent<HTMLButtonElement, MouseEvent>>} goToPrevious Goes to the next step.
 */

/**
 * The step that prompts to update hooks.
 *
 * @param {UpdateHooksProps} Props The component props.
 * @return {React.ReactElement} The component to prompt to back up the site.
 */
const UpdateHooks = ( { isStepActive, isStepComplete, stepIndex, goToNext, goToPrevious } ) => {
	// TODO: Update these URLs.
	const cssDetailsUrl = 'https://wpeng.in/ab-gb-css/';
	const phpDetailsUrl = 'https://wpeng.in/ab-gb-php/';

	return (
		<Step isActive={ isStepActive } isComplete={ isStepComplete }>
			<StepIcon
				index={ stepIndex }
				isComplete={ isStepComplete }
			/>
			<StepContent
				heading={ __( 'Update CSS and PHP code', 'genesis-blocks' ) }
				isStepActive={ isStepActive }
			>
				<p><b>{ __( 'You will need to make manual changes if your theme, plugins or customizations include Atomic Blocks CSS or PHP:', 'genesis-blocks' ) }</b></p>
				<ul className="list-disc list-inside mt-2">
					<li>
						<b>{ __( 'CSS', 'genesis-blocks' ) }</b> - { __( 'CSS classes and HTML markup have changed.', 'genesis-blocks' ) }
						&nbsp;
						<a
							href={ cssDetailsUrl }
							target="_blank"
							rel="noopener noreferrer"
						>
							{ __( 'Check if you need to make CSS changes.', 'genesis-blocks' ) }
						</a>
					</li>
					<li>
						<b>{ __( 'PHP', 'genesis-blocks' ) }</b> - { __( 'Filter, function and block names have changed.', 'genesis-blocks' ) }
						&nbsp;
						<a
							href={ phpDetailsUrl }
							target="_blank"
							rel="noopener noreferrer"
						>
							{ __( 'Check if you need to make PHP changes.', 'genesis-blocks' ) }
						</a>
					</li>
				</ul>
				<StepFooter>
					<ButtonPrevious onClick={ goToPrevious } />
					<ButtonNext
						checkboxLabel={ __( "I have made necessary changes to PHP and CSS.", 'genesis-blocks' ) }
						onClick={ goToNext }
						stepIndex={ stepIndex }
					/>
				</StepFooter>
			</StepContent>
		</Step>
	);
};

export default UpdateHooks;
