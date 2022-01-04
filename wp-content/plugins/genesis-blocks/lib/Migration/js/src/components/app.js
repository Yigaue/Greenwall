/* global genesisBlocksMigration */
// @ts-check

/**
 * External dependencies
 */
import * as React from 'react';

/**
 * WordPress dependencies
 */
import { useState } from '@wordpress/element';

/**
 * Internal dependencies
 */
import { Intro } from './';
import { BackUpSite, MigrateBlocks, UpdateHooks } from './steps';
import { FIRST_STEP_NUMBER } from '../constants';

/**
 * The migration admin page.
 *
 * @return {React.ReactElement} The component for the admin page.
 */
const App = () => {
	const [ currentStepIndex, setStepIndex ] = useState( FIRST_STEP_NUMBER );

	/**
	 * Sets the step index to the previous step.
	 */
	const goToPrevious = () => {
		setStepIndex( currentStepIndex - 1 );
	};

	/**
	 * Sets the step index to the next step.
	 */
	const goToNext = () => {
		setStepIndex( currentStepIndex + 1 );
	};

	const steps = [
		BackUpSite,
		UpdateHooks,
		MigrateBlocks,
	];

	return (
		<div className="gb-migration__content-wrapper">
			<div className="container gb-migration__content-container gb-admin-plugin-container">
				<Intro />
				{
					steps.map( ( MigrationStep, index ) => {
						const stepIndex = FIRST_STEP_NUMBER + index;
						const isStepActive = currentStepIndex === stepIndex;
						const isStepComplete = currentStepIndex > stepIndex;

						return (
							<MigrationStep
								key={ `gb-migration-step-${ stepIndex }` }
								{ ...{ currentStepIndex, goToNext, goToPrevious, isStepActive, isStepComplete, stepIndex } }
							/>
						);
					} )
				}
			</div>
		</div>
	);
};

export default App;
