/**
 * Collections
 * This is a render component that deals with rendering output, but not state management.
 */

/**
 * Dependencies.
 */
import LayoutLibraryItemCard from './../../layout-library-item-card';
import { importBlockPattern } from './../data/importBlockPattern.js';
import { useCollectionsVisualState } from './../data/useCollectionsVisualState.js';
import { CollectionCard } from './CollectionCard.js';

/**
 * WordPress dependencies.
 */
const { useDispatch, useSelect } = wp.data;
const { __ } = wp.i18n;
const { ButtonGroup } = wp.components;

export function Collections( props ) {
	const { currentCollection } = useSelect( ( select ) => select( 'core/block-editor' ).getSettings() );
	const collectionsView = useCollectionsVisualState( {
		view: !! currentCollection ? 'collection' : 'collections',
	} );
	const { updateSettings } = useDispatch( 'core/block-editor' );
	const setCurrentCollection = ( newCollection ) => updateSettings( { currentCollection: newCollection } );

	function renderCollections( collections ) {

		if ( collectionsView.currentView !== 'collections' ) {
			return '';
		}

		const mapper = [];

		for ( var collection in collections ) {
			mapper.push( <CollectionCard
				key={ collection }
				collectionSlug={ collection }
				collectionsView={ collectionsView }
				setCurrentCollection={ setCurrentCollection }
				{ ...props }
			/> );
		}

		return(
			<ButtonGroup
				className="gb-layout-choices"
				aria-label={ __( 'Collections Available', 'genesis-blocks' ) }
			>
			{ mapper }
			</ButtonGroup>
		);
	}

	function renderSingleCollectionItems( itemType = 'layouts' ) {

		const mapper = [];

		for ( var layoutKey in props.context[itemType] ) {
			const item = props.context[itemType][layoutKey];
			if ( item.hasOwnProperty( 'collection' ) && currentCollection === item.collection.slug ) {
				mapper.push(
					<LayoutLibraryItemCard
						key={item.key}
						itemKey={item.key}
						name={item.name}
						image={item.image}
						import={ importBlockPattern }
						content={ item.content }
						context={ props.context }
						clientId={ props.clientId }
					/>
				);
			}
		}

		if ( mapper.length === 0 ) {
			return '';
		}

		return(
			<>
				<h3 className="gb-collection-type-title">
					{(() => {
						if ( itemType === 'layouts' ) {
							return ( __( 'Page Layouts', 'genesis-blocks' ) );
						}

						if ( itemType === 'sections' ) {
							return ( __( 'Page Sections', 'genesis-blocks' ) );
						}
					})()}
				</h3>
				<ButtonGroup
					className="gb-layout-choices"
					aria-label={ __( 'Layout Options in this Collection', 'genesis-blocks' ) }
				>
				{ mapper }
				</ButtonGroup>
			</>
		);

	}

	function renderViewAllButton() {
		if ( collectionsView.currentView !== 'collection' ) {
			return '';
		}

		return (
			<div className="gb-collections-view-all-container">
				<button
					className="gb-collections-view-all-link"
					onClick={ () => {
						collectionsView.setCurrentView('collections');
						collectionsView.setCurrentCollection(null);
					} }
				>
					<span className="dashicons dashicons-arrow-left-alt"></span>
					{ __( 'View All Collections ', 'genesis-blocks' ) }
				</button>
			</div>
		);
	}

	function renderMainTitle() {

		if ( collectionsView.currentView === 'collections' ) {
			return (
				<h2 className="gb-collection-title">{ __( 'Collections ', 'genesis-blocks' ) }</h2>
			);
		}

		if ( collectionsView.currentView === 'collection' ) {
			return (
				<h2 className="gb-collection-title">{ __( 'Browsing ', 'genesis-blocks' ) + props.context.collections[currentCollection]?.label }</h2>
			);
		}

	}

	function renderSingleCollectionView(){

		if ( collectionsView.currentView !== 'collection' ) {
			return '';
		}

		return(
			<>
				{ renderSingleCollectionItems( 'sections' ) }
				{ renderSingleCollectionItems( 'layouts' ) }
			</>
		);
	}

	return(
		<div className="gb-collections">
			<div className="gb-collections-header">
				<div className="gb-collections-header-left">
					{ renderViewAllButton() }
					{ renderMainTitle() }
				</div>
				<a target="_blank" rel="noreferrer" href="https://developer.wpengine.com/genesis-blocks/layouts-block/#collections" tabIndex="0" className="gb-collections-link"><span className="dashicons dashicons-info"></span>{ __( 'Learn about Collections', 'genesis-blocks' ) }</a>
			</div>
			<div className="gb-collections-body">
				{ renderCollections(props.context.collections) }
				{ renderSingleCollectionView() }
			</div>
		</div>
	);
}