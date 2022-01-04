// @ts-check
/* global genesisBlocksMigration */

/**
 * External dependencies
 */
import * as React from 'react';

/**
 * WordPress dependencies
 */
import { speak } from '@wordpress/a11y';
import apiFetch from '@wordpress/api-fetch';
import { useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { Step, StepContent, StepFooter, StepIcon, SubstepList } from '../';

/**
 * @typedef {Object} MigrateBlocksProps The component props.
 * @property {Function} goToNext Goes to the next step.
 * @property {boolean} isStepActive Whether this step is active.
 * @property {boolean} isStepComplete Whether this step is complete.
 * @property {number} stepIndex The step index of this step.
 */

/**
 * The step that migrates the blocks.
 *
 * @param {MigrateBlocksProps} Props The component props.
 * @return {React.ReactElement} The component to prompt to migrate the post content.
 */
const MigrateBlocks = ( { isStepActive, isStepComplete, stepIndex, goToNext } ) => {
	const [ currentBlockMigrationStep, setCurrentBlockMigrationStep ] = useState( 0 );
	const [ isInProgress, setIsInProgress ] = useState( false );
	const [ isError, setIsError ] = useState( false );
	const [ errorMessage, setErrorMessage ] = useState( '' );
	const [ isSuccess, setIsSuccess ] = useState( false );
	const [ postsMigrated, setPostsMigrated ] = useState( 0 );

	const migrationLabels = [
		__( 'Migrate block settings.', 'genesis-blocks' ),
		__( 'Migrate block content. Migrated: ', 'genesis-blocks' ) + ` ${ postsMigrated }.`,
		__( 'Migrate favorite blocks.', 'genesis-blocks' ),
		genesisBlocksMigration.isPro ? __( 'Clean up.', 'genesis-blocks' ) : __( 'Deactivate Atomic Blocks.', 'genesis-blocks' ),
	];

	/**
	 * Step 1: Migrates block settings, then triggers step 2.
	 */
	const migrateBlockSettings = async () => {
		await apiFetch( {
			path: '/genesis-blocks/migrate-settings',
			method: 'POST',
		} ).then( async () => {
			setCurrentBlockMigrationStep( 1 );
			await migrateProBlockSettings();
			await migratePostContent();
		} ).catch( ( result ) => {
			if ( result.hasOwnProperty( 'message' ) ) {
				setErrorMessage( result.message );
			}
			speak( __( 'The migration failed during settings migration.', 'genesis-blocks' ) );
			setIsError( true );
			setIsInProgress( false );
		} );
	};

	const migrateProBlockSettings = async () => {
		await apiFetch( {
			path: '/genesis-blocks/migrate-pro-settings',
			method: 'POST',
		} ).catch( ( result ) => {
			if ( result.hasOwnProperty( 'message' ) ) {
				setErrorMessage( result.message );
			}
			speak( __( 'The pro settings migration failed.', 'genesis-blocks' ) );
			setIsError( true );
		} );
	}

	/**
	 * Step 2: Migrates post content, then triggers step 3.
	 */
	const migratePostContent = async () => {
		// Used for a 504 Gateway Timeout Error, but could also be for other errors.
		const timeoutErrorCode = 'invalid_json';

		await apiFetch( {
			path: '/genesis-blocks/migrate-content',
			method: 'POST',
		} ).then( async ( response ) => {
			// Send migration requests until no posts with Atomic Blocks content are found.
			if ( response.results && response.results.postsFound > 0 ) {
				setPostsMigrated( postsMigrated => postsMigrated + response.results.postsFound );
				await migratePostContent();
				return;
			}
			setCurrentBlockMigrationStep( 2 );
			await migrateFavoriteBlocks();
		} ).catch( async ( result ) => {
			if ( result.hasOwnProperty( 'code' ) && timeoutErrorCode === result.code ) {
				await migratePostContent();
				return;
			} else if ( result.hasOwnProperty( 'message' ) ) {
				setErrorMessage( result.message );
			}

			speak( __( 'The migration failed during post content migration', 'genesis-blocks' ) );
			setIsError( true );
		} );
	};

	/**
	 * Step 3: Migrates favorite blocks, then triggers step 3.
	 */
	const migrateFavoriteBlocks = async () => {
		// Used for a 504 Gateway Timeout Error, but could also be for other errors.
		const timeoutErrorCode = 'invalid_json';

		await apiFetch( {
			path: '/genesis-blocks/migrate-user-meta',
			method: 'POST',
		} ).then( async () => {
			setCurrentBlockMigrationStep( 3 );
			await cleanup();
		} ).catch( async ( result ) => {
			if ( result.hasOwnProperty( 'code' ) && timeoutErrorCode === result.code ) {
				await migrateFavoriteBlocks();
				return;
			} else if ( result.hasOwnProperty( 'message' ) ) {
				setErrorMessage( result.message );
			}

			speak( __( 'The migration failed while migrating favorite blocks.', 'genesis-blocks' ) );
			setIsError( true );
		} );
	};

	/**
	 * Step 4: Deactivates Atomic Blocks and toggles migration options.
	 */
	const cleanup = async () => {
		/**
		 * Await responses before showing success state, but discard errors.
		 * - Plugin deactivation will 404 if Atomic Blocks is not present,
		 *   but no further action is required.
		 * - Option deletion can ‘fail’ if no option exists, like when the user
		 *   did not migrate via the prompt in Atomic Blocks.
		 */
		await apiFetch( {
			path: '/genesis-blocks/migrate-cleanup',
			method: 'POST',
		} ).then( () => {
			speak( __( 'The migration was successful!', 'genesis-blocks' ) );
			setIsSuccess( true );
			goToNext();
		} );
	};

	/**
	 * Sets initial migration state and begins migration step 1.
	 */
	const migrate = async () => {
		speak( __( 'The migration is now in progress', 'genesis-blocks' ) );
		setErrorMessage( '' );
		setIsInProgress( true );

		// Starts the first migration step. Subsequent steps are chained to this step.
		await migrateBlockSettings();

		setIsInProgress( false );
	};

	return (
		<Step isActive={ isStepActive } isComplete={ isStepComplete }>
			<StepIcon
				index={ stepIndex }
				isComplete={ isStepComplete }
			/>
			<StepContent
				heading={ __( 'Migrate Your Content', 'genesis-blocks' ) }
				isStepActive={ isStepActive }
				isLastStep={ true }
			>
				{ ! isSuccess && <p>{ __( "Okay! Everything is ready. Let’s do this. While the migration is underway, don’t leave this page.", 'genesis-blocks' ) }</p> }
				{ !! errorMessage && (
					<div className="gb-migration__error inline-notice gb-error">
						<p><span>{ __( 'The following error occurred:', 'genesis-blocks' ) }</span>
						{ errorMessage }</p>
					</div>
				) }
				{ ( isInProgress || isSuccess ) && (
					<>
						<SubstepList
							steps={migrationLabels}
							currentStep={currentBlockMigrationStep}
							complete={!isInProgress}/>
					</>
				) }
				{ ! isInProgress && ! isSuccess && (
					<button
						className="gb-admin-button-primary"
						onClick={ migrate }
					>
						{ isError ? __( 'Try Again', 'genesis-blocks' ) : __( 'Migrate Now', 'genesis-blocks' ) }
					</button>
				) }
				{ isSuccess && (
					<>
						{!genesisBlocksMigration.isPro && (
							<p>
								<span
									role="img"
									aria-label={__("party emoji", "genesis-blocks")}
								>
									🎉
								</span>
								&nbsp;
								{__(
									"The migration completed successfully! Time to say goodbye to Atomic Blocks (it’s been fun!) and step into the FUTURE",
									"genesis-blocks"
								)}
								&nbsp;
								<span className="message-future">
									{__("FUTURE", "genesis-blocks")}
								</span>
								&nbsp;
								<sub>{__("FUTURE", "genesis-blocks")}</sub>.
							</p>
						)}
						{genesisBlocksMigration.isPro && (
							<p>
								<span
									role="img"
									aria-label={__("party emoji", "genesis-blocks")}
								>
									🎉
								</span>
								&nbsp;
								{__(
									"The migration completed successfully!",
									"genesis-blocks"
								)}
							</p>
						)}
						<StepFooter>
							{ /* @ts-ignore */ }
							<a href={ genesisBlocksMigration.gbUrl } className="btn">
								{ __( 'Get started with Genesis Blocks', 'genesis-blocks' ) }
							</a>
						</StepFooter>
					</>
				) }
			</StepContent>
		</Step>
	);
};

export default MigrateBlocks;
