// @ts-check

/**
 * External dependencies
 */
import * as React from 'react';

/**
 * @typedef SubstepListProps
 * @property {Array} steps The sub-step labels to display in the list.
 * @property {boolean} currentStep Current step, starting at 0.
 * @property {boolean} complete Have steps completed? 
 */

/**
 * A list of sub-steps with their status.
 *
 * @param {SubstepListProps} props The component props.
 * @return {React.ReactElement} SubstepList component.
 */
const SubstepList = ( { steps, currentStep, complete } ) => {
	const stepList = steps.map( ( label, index ) => {
		let listClass = '';
		if ( currentStep === index ) listClass = 'active';
		if ( currentStep > index || ( complete && currentStep === steps.length - 1 ) ) {
			listClass = 'done';
		}
		return (
			<li key={ index } className={ listClass }>
				{ label }
				{ currentStep === index && !complete && <div className="gb-migration-progress" role="progressbar"><div className="gb-migration-progress-inside"></div><div className="gb-migration-progress-inside gb-migration-progress-animate2"></div></div> }
			</li>
		);
	});

	return (
		<ul className="substeps">
			{ stepList }
		</ul>
	);
};

export default SubstepList;
