/**
 * Collections Card.
 * This is a render component that deals with rendering output, but not logic or state management.
 */

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Button } = wp.components;

const { GAClient } = window.GenesisAnalytics;
const event_category = 'Layout Modal';

export function CollectionCard( props ) {

	return (
		<>
			<div className="gb-layout-design">
				<div className="gb-layout-design-inside">
					<div className="gb-layout-design-item">
						<Button
							className="gb-layout-insert-button gb-layout-collection-button"
							isSmall
							onClick={ () => {
								props.collectionsView.setCurrentView( 'collection' );
								props.setCurrentCollection( props.collectionSlug );
								GAClient.send( 'Select Collection', { event_category, event_label: props.collectionSlug } );
							} }
						>
							<div className="gb-layout-collection-cover">
								<img
									src={ props.context.collections[props.collectionSlug].thumbnail ? props.context.collections[props.collectionSlug].thumbnail : genesis_blocks_globals.pattern_fallback_image }
									alt={ props.context.collections[props.collectionSlug].label }
									onError={(event) => {
										event.target.src = genesis_blocks_globals.pattern_fallback_image;
									}}
								/>
							</div>
							<div className="gb-layout-design-info">
								<div className="gb-layout-design-title">
									<span className="gb-layout-collection-label">{ props.context.collections[props.collectionSlug].label }</span>
								</div>
							</div>
						</Button>
					</div>
				</div>
			</div>
		</>
	);
}