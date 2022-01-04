/**
 * Inspector Controls
 */

// Setup the block
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;

import compact from 'lodash/compact';
import map from 'lodash/map';
import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

// Import block components
const { InspectorControls } = wp.blockEditor;

// Import Inspector components
const {
	PanelBody,
	QueryControls,
	RangeControl,
	SelectControl,
	TextControl,
	ToggleControl,
	FormTokenField,
	Spinner,
} = wp.components;

const { addQueryArgs } = wp.url;

const { apiFetch } = wp;

const MAX_POSTS_COLUMNS = 4;

const inputDelay = [];

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
	constructor() {
		super( ...arguments );
		this.state = {
			categoriesList: false,
			categoriesTitleToIdRelationships: false,
			categoriesIdToTitleRelationships: false,
			pagesList: false,
			pagesTitleToIdRelationships: false,
			pagesIdToTitleRelationships: false,
			waitingForApiResponse: false,
			
		};
	}

	componentDidMount() {
		this.stillMounted = true;
	}

	componentDidUpdate() {
		// If this block was just selected by the user, fetch the previously-selected category slugs from the server so we have something to show in the sidebar.
		if ( this.props.isSelected && ! this.state.waitingForApiResponse && this.props.attributes.categories && ! this.state.categoriesList && 'post' === this.props.attributes.postType ) {
			this.getCategoriesFromServer( this.props.attributes.categories ? this.props.attributes.categories : false, true );
		}

		// If this block was just selected by the user, fetch the previously-selected page slugs from the server so we have something to show in the sidebar.
		if ( this.props.isSelected && ! this.state.waitingForApiResponse && this.props.attributes.selectedPages.length > 0 && ! this.state.pagesList && 'page' === this.props.attributes.postType ) {
			const ids = [];
			for( const selectedPage in this.props.attributes.selectedPages ) {
				ids.push( this.props.attributes.selectedPages[selectedPage].value );
			}
			
			this.getPagesFromServer( ids ? ids : false, true );
		}
		
	}

	componentWillUnmount() {
		this.stillMounted = false;
	}

	getCategoriesFromServer( userInput, isInitial = false ) {
		return new Promise( ( resolve ) => {
			this.setState({
				waitingForApiResponse: true,
				categoriesList: false,
			});

			if ( ! userInput || userInput.length === 0 ) {
				if ( ! isInitial ) {
					this.setState({
						waitingForApiResponse: false,
					});
				}
				resolve();
				return;
			}

			let args = {
				per_page: 99,
				search: userInput,
			}

			if ( isInitial ) {
				args = {
					per_page: 99,
					include: userInput,
				}
			}

			this.fetchRequest = apiFetch( {
				path: addQueryArgs( '/wp/v2/categories', args ),
			} ).then( ( categoriesList ) => {
					
					// Store arrays for slug-to-id and id-to-slug to make them easy to reference in components and attributes.
					const categoriesTitleToIdRelationships = this.state.categoriesTitleToIdRelationships ? this.state.categoriesTitleToIdRelationships : {};
					const categoriesIdToTitleRelationships = this.state.categoriesIdToTitleRelationships ? this.state.categoriesIdToTitleRelationships : {};
					
					for( const category in categoriesList ) {
						categoriesTitleToIdRelationships[categoriesList[category].name + ' (' + categoriesList[category].slug + ')'] = categoriesList[category].id;
						categoriesIdToTitleRelationships[categoriesList[category].id] = categoriesList[category].name + ' (' + categoriesList[category].slug + ')';
					}

					this.setState( { 
						categoriesList,
						categoriesTitleToIdRelationships,
						categoriesIdToTitleRelationships,
						waitingForApiResponse: false,
					} );
					
					resolve();
				
			} ).catch( () => {
				console.log( `category request failure: ${ error.message }` );
				if ( this.stillMounted ) {
					this.setState( { categoriesList: [], waitingForApiResponse: false } );
					
					resolve();
				}
			} );
		});
	}

	getPagesFromServer( userInput, isInitial = false ) {
		return new Promise( ( resolve ) => {
			this.setState( {
				waitingForApiResponse: true,
				pagesList: false,
			});

			if ( ! userInput || userInput.length === 0 ) {
				if ( ! isInitial ) {
					this.setState({
						waitingForApiResponse: false,
					});
				}
				resolve();
				return;
			}

			let args = {
				per_page: -1,
				search: userInput,
			}

			if ( isInitial ) {
				args = {
					per_page: -1,
					include: userInput,
				}
			}

			this.fetchRequest = apiFetch( {
				path: addQueryArgs( '/wp/v2/pages', args ),
			} ).then( ( pagesList ) => {
					
				// Store arrays for slug-to-id and id-to-slug to make them easy to reference in components and attributes.
				const pagesTitleToIdRelationships = this.state.pagesTitleToIdRelationships ? this.state.pagesTitleToIdRelationships : {};
				const pagesIdToTitleRelationships = this.state.pagesIdToTitleRelationships ? this.state.pagesIdToTitleRelationships : {};
				
				for( const page in pagesList ) {
					pagesTitleToIdRelationships[pagesList[page].title.rendered + ' (' + pagesList[page].slug + ')'] = pagesList[page].id;
					pagesIdToTitleRelationships[pagesList[page].id] = pagesList[page].title.rendered + ' (' + pagesList[page].slug + ')';
				}

				this.setState( { 
					pagesList,
					pagesTitleToIdRelationships,
					pagesIdToTitleRelationships,
					waitingForApiResponse: false,
				} );

				resolve();
				
			} ).catch( () => {
				if ( this.stillMounted ) {
					this.setState( { pagesList: [], waitingForApiResponse: false } );
					resolve();
				}
			} );
		});
	}

	/* Get the available image sizes */
	imageSizeSelect() {
		const getSettings = wp.data.select( 'core/block-editor' ).getSettings();

		return compact(
			map( getSettings.imageSizes, ( { name, slug } ) => {
				return {
					value: slug,
					label: name,
				};
			} )
		);
	}

	render() {
		// Setup the attributes
		const { attributes, setAttributes, latestPosts } = this.props;

		const { order, orderBy } = attributes;

		const {
			categoriesList,
			categoriesTitleToIdRelationships,
			categoriesIdToTitleRelationships,
			pagesList,
			pagesTitleToIdRelationships,
			pagesIdToTitleRelationships,
		} = this.state;

		// Post type options
		const postTypeOptions = [
			{ value: 'post', label: __( 'Post', 'genesis-blocks' ) },
			{ value: 'page', label: __( 'Page', 'genesis-blocks' ) },
		];

		// Section title tags
		const sectionTags = [
			{ value: 'div', label: __( 'div', 'genesis-blocks' ) },
			{ value: 'header', label: __( 'header', 'genesis-blocks' ) },
			{ value: 'section', label: __( 'section', 'genesis-blocks' ) },
			{ value: 'article', label: __( 'article', 'genesis-blocks' ) },
			{ value: 'main', label: __( 'main', 'genesis-blocks' ) },
			{ value: 'aside', label: __( 'aside', 'genesis-blocks' ) },
			{ value: 'footer', label: __( 'footer', 'genesis-blocks' ) },
		];

		// Section title tags
		const sectionTitleTags = [
			{ value: 'h2', label: __( 'H2', 'genesis-blocks' ) },
			{ value: 'h3', label: __( 'H3', 'genesis-blocks' ) },
			{ value: 'h4', label: __( 'H4', 'genesis-blocks' ) },
			{ value: 'h5', label: __( 'H5', 'genesis-blocks' ) },
			{ value: 'h6', label: __( 'H6', 'genesis-blocks' ) },
		];

		// Check for posts
		const hasPosts = Array.isArray( latestPosts ) && latestPosts.length;

		// Check the post type
		const isPost = 'post' === attributes.postType;

		// Add instruction text to the select
		const abImageSizeSelect = {
			value: 'selectimage',
			label: __( 'Select image size', 'genesis-blocks' ),
		};

		// Add the landscape image size to the select
		const abImageSizeLandscape = {
			value: 'gb-block-post-grid-landscape',
			label: __( 'GB Grid Landscape', 'genesis-blocks' ),
		};

		// Add the square image size to the select
		const abImageSizeSquare = {
			value: 'gb-block-post-grid-square',
			label: __( 'GB Grid Square', 'genesis-blocks' ),
		};

		// Get the image size options
		const imageSizeOptions = this.imageSizeSelect();

		// Combine the objects
		imageSizeOptions.push( abImageSizeSquare, abImageSizeLandscape );
		imageSizeOptions.unshift( abImageSizeSelect );

		const imageSizeValue = () => {
			for ( let i = 0; i < imageSizeOptions.length; i++ ) {
				if ( imageSizeOptions[ i ].value === attributes.imageSize ) {
					return attributes.imageSize;
				}
			}
			return 'full';
		};

		return (
			<InspectorControls>
				<PanelBody
					title={ __(
						'Post and Page Grid Settings',
						'genesis-blocks'
					) }
					className={ isPost ? null : 'genesis-blocks-hide-query' }
				>
					<RenderSettingControl id="gb_postgrid_postType">
						<SelectControl
							label={ __( 'Content Type', 'genesis-blocks' ) }
							options={ postTypeOptions }
							value={ attributes.postType }
							onChange={ ( value ) =>
								this.props.setAttributes( { postType: value } )
							}
						/>
					</RenderSettingControl>
					{ 'page' === attributes.postType &&
						<RenderSettingControl id="gb_postgrid_selectedPages">
							<div className="components-base-control">
								<div className="components-base-control__field" style={{position:'relative'}}>
									<FormTokenField
										suggestions={ compact(
											map( pagesList, ( { title, slug } ) => {
												return title.rendered + ' (' + slug + ')';
											} ) )
										}
										label={ <>
											{ __( 'Enter page names to display', 'genesis-blocks' ) }
											{
												this.state.waitingForApiResponse ? <div style={{ position:'absolute', bottom: '30px', right: '0px' }}><Spinner /></div> : null
											}
										</>}
										placeholder={ __( 'Start typing page name…', 'genesis-blocks' ) }
										value={ (() => {
											if ( ! this.props.attributes.selectedPages ) {
												return [];
											}
	
											const values = [];
	
											for( const selectedPage in this.props.attributes.selectedPages ) {
												const pageId = this.props.attributes.selectedPages[selectedPage].value;
												
												if ( pagesIdToTitleRelationships[ pageId ] ) {
													values.push(pagesIdToTitleRelationships[ this.props.attributes.selectedPages[selectedPage].value ]);
												}
											}
	
											return values;
	
										})() }
										onInputChange={ ( userInput ) => {
											const delayName = 'getPagesFromServer';
	
											// Set up a delay which waits to search the api until the user takes a .5 second break from typing.
											if( inputDelay[delayName] ) {
												// Clear the keypress delay if the user just typed
												clearTimeout( inputDelay[delayName] );
												inputDelay[delayName] = null;
											}
								
											// (Re)-Set up the save to fire in 500ms
											inputDelay[delayName] = setTimeout( () => {
												clearTimeout( inputDelay[delayName] );
												
												// When the user types in the field, search the API for matching categories.
												this.getPagesFromServer( userInput );
								
											}, 500);
											
										}}
										onChange={ ( newPagesSlugs ) => {
	
											let selectedPages = [];
	
											// Loop through each category slug chosen by the user, and populate the selectedPages attribute.
											for ( const page in newPagesSlugs ) {
												selectedPages.push( { value: pagesTitleToIdRelationships[newPagesSlugs[page]] } );
											}
											
											if ( ! selectedPages ) {
												selectedPages = undefined;
											}
	
											setAttributes({ selectedPages })
										}}
									/>
								</div>
							</div>
						</RenderSettingControl>
					}

					{ 'post' === attributes.postType && (
						<RenderSettingControl id="gb_postgrid_categories">
							<div className="components-base-control">
								<div className="components-base-control__field" style={{position:'relative'}}>
									<FormTokenField
										suggestions={ compact(
											map( categoriesList, ( { name, slug } ) => {
												return name + ' (' + slug + ')';
											} ) )
										}
										label={ <>
											{ __( 'Enter category names to display', 'genesis-blocks' ) }
											{
												this.state.waitingForApiResponse ? <div style={{ position:'absolute', bottom: '30px', right: '0px' }}><Spinner /></div> : null
											}
										</>}
										placeholder={ __( 'Start typing category name…', 'genesis-blocks' ) }
										value={ (() => {
											if ( ! this.props.attributes.categories ) {
												return [];
											}
		
											// Convert the string of category IDs to an array.
											const categoryIdArray = this.props.attributes.categories.split(',');
		
											const values = [];
		
											// Convert each ID to its slug.
											for ( const categoryId in categoryIdArray ) {
												if ( categoriesIdToTitleRelationships[ categoryIdArray[categoryId] ] ) {
													values.push(categoriesIdToTitleRelationships[ categoryIdArray[categoryId] ]);
												}
											}
		
											return values;
										})() }
										onInputChange={ ( userInput ) => {
											const delayName = 'getCategoriesFromServer';
		
											// Set up a delay which waits to search the api until the user takes a .5 second break from typing.
											if( inputDelay[delayName] ) {
												// Clear the keypress delay if the user just typed
												clearTimeout( inputDelay[delayName] );
												inputDelay[delayName] = null;
											}
								
											// (Re)-Set up the save to fire in 500ms
											inputDelay[delayName] = setTimeout( () => {
												clearTimeout( inputDelay[delayName] );
												
												// When the user types in the field, search the API for matching categories.
												this.getCategoriesFromServer( userInput );
								
											}, 500);
											
										}}
										onChange={ ( newCategorySlugs ) => {
											let chosenCatIdString = '';
											
											// Loop through each category slug chosen by the user, and build a comma-separated string with each corresponding ID.
											for ( const category in newCategorySlugs ) {
												if ( categoriesTitleToIdRelationships[newCategorySlugs[category]] ) {
													chosenCatIdString = chosenCatIdString + categoriesTitleToIdRelationships[newCategorySlugs[category]] + ',';
												}
											}
		
											//Remove trailing comma and whitespace.
											chosenCatIdString = chosenCatIdString.replace(/,\s*$/, "");
											
											if ( ! chosenCatIdString ) {
												chosenCatIdString = undefined;
											}
		
											// Note that we parse the category id to be a string, as the attribute was originally defined as a string for this block.
											setAttributes({ categories: undefined !== chosenCatIdString ? chosenCatIdString : '' })
										}}
									/>
								</div>
							</div>
						</RenderSettingControl>
					)}

					{ 'post' === attributes.postType && (
						<>
							<RenderSettingControl id="gb_postgrid_queryControls">
								<QueryControls
									{ ...{ order, orderBy } }
									numberOfItems={ attributes.postsToShow }
									onOrderChange={ ( value ) => setAttributes({ order: value }) }
									onOrderByChange={ ( value ) => setAttributes({ orderBy: value }) }
									onNumberOfItemsChange={ ( value ) => setAttributes({ postsToShow: value }) }
								/>
							</RenderSettingControl>
							<RenderSettingControl id="gb_postgrid_offset">
								<RangeControl
									label={ __( 'Number of items to offset', 'genesis-blocks' ) }
									value={ attributes.offset }
									onChange={ ( value ) => setAttributes({ offset: value }) }
									min={ 0 }
									max={ 20 }
								/>
							</RenderSettingControl>
						</>
					) }

					{ 'grid' === attributes.postLayout && (
						<RenderSettingControl id="gb_postgrid_columns">
							<RangeControl
								label={ __( 'Columns', 'genesis-blocks' ) }
								value={ attributes.columns }
								onChange={ ( value ) =>
									setAttributes( { columns: value } )
								}
								min={ 1 }
								max={
									! hasPosts
										? MAX_POSTS_COLUMNS
										: Math.min(
												MAX_POSTS_COLUMNS,
												latestPosts.length
										  )
								}
							/>
						</RenderSettingControl>
					) }
				</PanelBody>
				<PanelBody
					title={ __(
						'Post and Page Grid Content',
						'genesis-blocks'
					) }
					initialOpen={ false }
				>
					<RenderSettingControl id="gb_postgrid_displaySectionTitle">
						<ToggleControl
							label={ __(
								'Display Section Title',
								'genesis-blocks'
							) }
							checked={ attributes.displaySectionTitle }
							onChange={ () =>
								this.props.setAttributes( {
									displaySectionTitle: ! attributes.displaySectionTitle,
								} )
							}
						/>
					</RenderSettingControl>
					{ attributes.displaySectionTitle && (
						<RenderSettingControl id="gb_postgrid_sectionTitle">
							<TextControl
								label={ __( 'Section Title', 'genesis-blocks' ) }
								type="text"
								value={ attributes.sectionTitle }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										sectionTitle: value,
									} )
								}
							/>
						</RenderSettingControl>
					) }
					<RenderSettingControl id="gb_postgrid_displayPostImage">
						<ToggleControl
							label={ __(
								'Display Featured Image',
								'genesis-blocks'
							) }
							checked={ attributes.displayPostImage }
							onChange={ () =>
								this.props.setAttributes( {
									displayPostImage: ! attributes.displayPostImage,
								} )
							}
						/>
					</RenderSettingControl>
					{ attributes.displayPostImage && (
						<RenderSettingControl id="gb_postgrid_imageSizeValue">
							<SelectControl
								label={ __( 'Image Size', 'genesis-blocks' ) }
								value={ imageSizeValue() }
								options={ imageSizeOptions }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										imageSize: value,
									} )
								}
							/>
						</RenderSettingControl>
					) }
					<RenderSettingControl id="gb_postgrid_displayPostTitle">
						<ToggleControl
							label={ __( 'Display Title', 'genesis-blocks' ) }
							checked={ attributes.displayPostTitle }
							onChange={ () =>
								this.props.setAttributes( {
									displayPostTitle: ! attributes.displayPostTitle,
								} )
							}
						/>
					</RenderSettingControl>
					{ isPost && (
						<RenderSettingControl id="gb_postgrid_displayPostAuthor">
							<ToggleControl
								label={ __(
									'Display Author',
									'genesis-blocks'
								) }
								checked={ attributes.displayPostAuthor }
								onChange={ () =>
									this.props.setAttributes( {
										displayPostAuthor: ! attributes.displayPostAuthor,
									} )
								}
							/>
						</RenderSettingControl>
					) }
					{ isPost && (
						<RenderSettingControl id="gb_postgrid_displayPostDate">
							<ToggleControl
								label={ __( 'Display Date', 'genesis-blocks' ) }
								checked={ attributes.displayPostDate }
								onChange={ () =>
									this.props.setAttributes( {
										displayPostDate: ! attributes.displayPostDate,
									} )
								}
							/>
						</RenderSettingControl>
					) }
					<RenderSettingControl id="gb_postgrid_displayPostExcerpt">
						<ToggleControl
							label={ __( 'Display Excerpt', 'genesis-blocks' ) }
							checked={ attributes.displayPostExcerpt }
							onChange={ () =>
								this.props.setAttributes( {
									displayPostExcerpt: ! attributes.displayPostExcerpt,
								} )
							}
						/>
					</RenderSettingControl>
					{ attributes.displayPostExcerpt && (
						<RenderSettingControl id="gb_postgrid_excerptLength">
							<RangeControl
								label={ __(
									'Excerpt Length',
									'genesis-blocks'
								) }
								value={ attributes.excerptLength }
								onChange={ ( value ) =>
									setAttributes( { excerptLength: value } )
								}
								min={ 0 }
								max={ 150 }
							/>
						</RenderSettingControl>
					) }
					<RenderSettingControl id="gb_postgrid_displayPostLink">
						<ToggleControl
							label={ __(
								'Display Continue Reading Link',
								'genesis-blocks'
							) }
							checked={ attributes.displayPostLink }
							onChange={ () =>
								this.props.setAttributes( {
									displayPostLink: ! attributes.displayPostLink,
								} )
							}
						/>
					</RenderSettingControl>
					{ attributes.displayPostLink && (
						<RenderSettingControl id="gb_postgrid_readMoreText">
							<TextControl
								label={ __(
									'Customize Continue Reading Text',
									'genesis-blocks'
								) }
								type="text"
								value={ attributes.readMoreText }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										readMoreText: value,
									} )
								}
							/>
						</RenderSettingControl>
					) }
				</PanelBody>
				<PanelBody
					title={ __( 'Post and Page Grid Markup', 'genesis-blocks' ) }
					initialOpen={ false }
					className="gb-block-post-grid-markup-settings"
				>
					<RenderSettingControl id="gb_postgrid_sectionTag">
						<SelectControl
							label={ __(
								'Post Grid Section Tag',
								'genesis-blocks'
							) }
							options={ sectionTags }
							value={ attributes.sectionTag }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									sectionTag: value,
								} )
							}
							help={ __(
								'Change the post grid section tag to match your content hierarchy.',
								'genesis-blocks'
							) }
						/>
					</RenderSettingControl>
					{ attributes.sectionTitle && (
						<RenderSettingControl id="gb_postgrid_sectionTitleTag">
							<SelectControl
								label={ __(
									'Section Title Heading Tag',
									'genesis-blocks'
								) }
								options={ sectionTitleTags }
								value={ attributes.sectionTitleTag }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										sectionTitleTag: value,
									} )
								}
								help={ __(
									'Change the post/page section title tag to match your content hierarchy.',
									'genesis-blocks'
								) }
							/>
						</RenderSettingControl>
					) }
					{ attributes.displayPostTitle && (
						<RenderSettingControl id="gb_postgrid_postTitleTag">
							<SelectControl
								label={ __(
									'Post Title Heading Tag',
									'genesis-blocks'
								) }
								options={ sectionTitleTags }
								value={ attributes.postTitleTag }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										postTitleTag: value,
									} )
								}
								help={ __(
									'Change the post/page title tag to match your content hierarchy.',
									'genesis-blocks'
								) }
							/>
						</RenderSettingControl>
					) }
				</PanelBody>
			</InspectorControls>
		);
	}
}
