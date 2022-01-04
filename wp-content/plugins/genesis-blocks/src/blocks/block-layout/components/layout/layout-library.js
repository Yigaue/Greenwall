/**
 * Layout Library UI.
 *
 * Interface for browsing, searching, filtering and inserting sections and layouts.
 */

/**
 * Dependencies.
 */
import map from 'lodash/map';
import classnames from 'classnames';
import LayoutLibraryItem from './layout-library-item';
import { LayoutsContext } from '../layouts-provider';
import { Collections } from "./collections/views/Collections.js";

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { addQueryArgs } = wp.url;
const { Component, Fragment } = wp.element;
const {
	ButtonGroup,
	TextControl,
	SelectControl,
} = wp.components;

const { debounce, GAClient } = window.GenesisAnalytics;
const gaSelectCategory = debounce( GAClient.send.bind( GAClient ), 500 );
const gaSearch = debounce( GAClient.send.bind( GAClient ), 500 );
const event_category = 'Layout Modal';

export default class LayoutLibrary extends Component {
	constructor() {
		super( ...arguments );

		this.state = {
			category: 'all',
			search: undefined,
			activeView: 'grid',
		};
	}

	/* Conditionally load the layout array based on the tab. */
	getLayoutArray() {
		let component = [];

		switch ( this.props.currentTab ) {
			case 'gb-layout-tab-layouts':
				component = this.props.context.layouts;
				break;
			case 'gb-layout-tab-sections':
				component = this.props.context.sections;
				break;
			case 'gb-layout-tab-favorites':
				component = this.props.context.favorites;
				break;
			case 'gb-layout-tab-reusable-blocks':
				component = this.props.context.reusableBlocks;
				break;
			case 'gb-layout-tab-collections':
				component = this.props.context.collections;
				break;
		}

		return component;
	}

	render() {
		/* Grab the layout array. */
		const blockLayout = this.getLayoutArray();

		/* Set a default category. */
		const cats = [ 'all' ];

		/* Build a category array. */
		if ( this.props.currentTab !== 'gb-layout-tab-collections' ) {
			for ( let i = 0; i < blockLayout.length; i++ ) {
				for ( let c = 0; c < blockLayout[ i ].category.length; c++ ) {
					if ( ! cats.includes( blockLayout[ i ].category[ c ] ) ) {
						cats.push( blockLayout[ i ].category[ c ] );
					}
				}
			}
		}

		/* Setup categories for select menu. */
		const catOptions = cats.map( ( item ) => {
			return {
				value: item,
				label: item.charAt( 0 ).toUpperCase() + item.slice( 1 ),
			};
		} );

		const data = this.props.data;
		
		// Handle the contents of the collections tab in the Collections component.
		if ( this.props.currentTab === 'gb-layout-tab-collections' ) {
			return( <Collections key={this.props.data.key} { ...this.props } /> );
		}

		return (
			<Fragment key={ 'layout-library-fragment-' + this.props.clientId }>
				{ /* Category filter and search header. */ }
				{ 'gb-layout-tab-reusable-blocks' !== this.props.currentTab ? (
					<Fragment>
						<div className="gb-layout-modal-header">
							<SelectControl
								key={
									'layout-library-select-categories-' +
									this.props.clientId
								}
								label={ __(
									'Layout Categories',
									'genesis-blocks'
								) }
								value={ this.state.category }
								options={ catOptions }
								onChange={ ( value ) => {
									gaSelectCategory( 'Select Category', { event_category, event_label: value } )
									this.setState( { category: value } )
								} }
							/>
							<TextControl
								key={
									'layout-library-search-layouts-' +
									this.props.clientId
								}
								type="text"
								value={ this.state.search }
								placeholder={ __(
									'Search Layouts',
									'genesis-blocks'
								) }
								onChange={ ( value ) => {
									if ( value.length ) {
										gaSearch( 'Search', { event_category, event_label: value } )
									}
									this.setState( { search: value } )
								} }
							/>
						</div>
					</Fragment>
				) : (
					<Fragment>
						{ /* Header for reusable blocks. */ }
						<div className="gb-layout-modal-header gb-layout-modal-header-reusable">
							<div>
								{ __( 'Reusable Blocks', 'genesis-blocks' ) }
							</div>
							<div className="gb-layout-modal-header-reusable-actions">
								<a
									className="editor-inserter__manage-reusable-blocks block-editor-inserter__manage-reusable-blocks"
									href={ addQueryArgs( 'edit.php', {
										post_type: 'wp_block',
									} ) }
									target="_blank"
									rel="noopener noreferrer"
								>
									{ __(
										'Manage All Reusable Blocks',
										'genesis-blocks'
									) }
								</a>
							</div>
						</div>
					</Fragment>
				) }

				<LayoutsContext.Consumer>
					{ ( context ) => (
						<ButtonGroup
							key={
								'layout-library-context-button-group-' +
								this.props.clientId
							}
							className={ classnames(
								'gb-layout-choices',
								'current-tab-' + this.props.currentTab,
								'full' === this.state.activeView
									? 'gb-layout-view-full'
									: null
							) }
							aria-label={ __( 'Layout Options', 'genesis-blocks' ) }
						>
							{ map(
								data,
								( {
									name,
									key,
									image,
									content,
									category,
									keywords,
									type,
								} ) => {

									if (
										( 'all' === this.state.category ||
											category.includes(
												this.state.category
											) ) &&
										( ! this.state.search ||
											( keywords &&
												keywords.some( ( x ) =>
													x
														.toLowerCase()
														.includes(
															this.state.search.toLowerCase()
														)
												) ) )
									) {
										return (
											/* Section and layout items. */
											<LayoutLibraryItem
												key={
													'layout-library-item-' + key
												}
												name={ name }
												type={ type }
												itemKey={
													key
												} /* 'key' is reserved, so we use itemKey. */
												image={ image }
												content={ content }
												context={ context }
												clientId={ this.props.clientId }
												currentTab={
													this.props.currentTab
												}
											/>
										);
									}
								}
							) }
						</ButtonGroup>
					) }
				</LayoutsContext.Consumer>
			</Fragment>
		);
	}
}
