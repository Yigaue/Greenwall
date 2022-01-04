// @ts-check
/* global genesisBlocksMigration */
/**
 * External dependencies
 */
import * as React from 'react';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * The introduction to the migration.
 *
 * @return {React.ReactElement} The introduction to the migration.
 */
const Intro = () => {
	const developerNoticeUrl = 'https://wpeng.in/ab-gb-dev/';

	let headerText = __( 'Atomic Blocks has been renamed to Genesis Blocks', 'genesis-blocks' );
	if ( genesisBlocksMigration.isPro ) {
		headerText = __( 'We need to update your blocks to give you the latest features!', 'genesis-blocks' );
	}

	return (
		<>
			<div className="gb-migration-intro">
				<h2>{ headerText }</h2>
				<p>{ __( 'Same powerful blocks, same beautiful designs, same innovative team.', 'genesis-blocks' ) }</p>
				<p>{ __( 'To continue receiving the best of what our team is building, we encourage you to migrate. Our migration tool makes this nice and easy, and for the majority of use cases, completely automated.', 'genesis-blocks' ) }</p>
				<div className="inline-notice gb-info">
					<p>{ __( 'Need to let the developer for this site know about this? Send them this link.', 'genesis-blocks' ) }</p>
					<a href={ developerNoticeUrl } target="_blank" rel="noopener noreferrer" className="gb-admin-button-link aligned">
						<span>{ __( 'Developer Notice', 'genesis-blocks' ) }</span>
					</a>
				</div>
			</div>
			<h2>{ __( "Let’s Migrate", 'genesis-blocks' ) }</h2>
		</>
	);
};

export default Intro;
