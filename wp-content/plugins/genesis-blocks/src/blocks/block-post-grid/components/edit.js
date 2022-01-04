/**
 * External dependencies
 */

import moment from 'moment';
import classnames from 'classnames';
import Inspector from './inspector';
import PostGridImage from './image';

const { useState, useEffect } = wp.element;

const { __ } = wp.i18n;

const { decodeEntities } = wp.htmlEntities;

const { Placeholder, Spinner, ToolbarGroup } = wp.components;

const { BlockAlignmentToolbar, BlockControls } = wp.blockEditor;

const { apiFetch } = wp;
const { addQueryArgs } = wp.url;

const inputDelay = [];

export default ( props ) => {
	
	const [latestPosts, setLatestPosts] = useState();
	const [initialAttributes, setInitialAttributes] = useState(props);
	const { attributes, setAttributes } = props;

	// If the props have changed, check the server for posts using the new arguments.
	if ( 
		props.attributes.postType !== initialAttributes.postType ||
		props.attributes.selectedPages !== initialAttributes.selectedPages ||
		props.attributes.categories !== initialAttributes.categories ||
		props.attributes.order !== initialAttributes.order ||
		props.attributes.orderby !== initialAttributes.orderby ||
		props.attributes.offset !== initialAttributes.offset ||
		props.attributes.postsToShow !== initialAttributes.postsToShow
	) {
		const delayName = 'handleUpdateAttributes';
	
			// Set up a delay which waits to until the user takes a .5 second break from typing.
			if( inputDelay[delayName] ) {
				// Clear the keypress delay if the user just typed
				clearTimeout( inputDelay[delayName] );
				inputDelay[delayName] = null;
			}

			// (Re)-Set up the save to fire in 500ms
			inputDelay[delayName] = setTimeout( () => {
				clearTimeout( inputDelay[delayName] );
				
				// Set the initial attributes to the new attributes, which triggers a acll to the API for new posts with the new attributes.
				setInitialAttributes(props.attributes);
			}, 500);
	}
	
	useEffect( () => {
		setLatestPosts(null);
	}, [initialAttributes] );
	
	useEffect(() => {
		if ( latestPosts ) {
			return;
		}
		if ( 'post' === props.attributes.postType ) {
			getPosts();
		}
		if ( 'page' === props.attributes.postType ) {
			getPages();
		}
	},[latestPosts]);

	function getPosts() {
		return new Promise( ( resolve ) => {
			const args = {
				order: props.attributes.order,
				orderby: props.attributes.orderBy,
				per_page: props.attributes.postsToShow,
				offset: props.attributes.offset,
			}

			// Only append the exclude if this block is sitting on a post. 
			if ( wp.data.select( 'core/editor' ) ) {
				const currentPostId = wp.data.select( 'core/editor' ).getCurrentPostId();
				if ( currentPostId ) {
					args.exclude = [ currentPostId ];
				}
			}
			
			// Only append the categories argument if at least 1 category has been selected.
			if ( props.attributes.categories ) {
				args.categories = props.attributes.categories;
			}

			apiFetch( {
				path: addQueryArgs( '/wp/v2/posts', args ),
			} ).then( ( response ) => {
				setLatestPosts( response );
				resolve();
				
			} ).catch( (response) => {
				console.log( response );
			} );
		});
	}
	
	function getPages() {
		return new Promise( ( resolve ) => {
			// Grab the page IDs from the array
			const pageIDs = props.attributes.selectedPages && props.attributes.selectedPages.length > 0 ? props.attributes.selectedPages.map(obj => obj.value) : null;
			
			const args = {
				per_page: 6,
			}

			const currentPostId = wp.data.select( 'core/editor' ).getCurrentPostId();
			
			// Only append the exclude if this block is sitting on a post. 
			if ( currentPostId ) {
				args.exclude = [ currentPostId ];
			}

			if ( pageIDs ) {
				delete args.per_page;
				args.include = pageIDs;
				args.orderby = 'include';
			}

			apiFetch( {
				path: addQueryArgs( '/wp/v2/pages', args ),
			} ).then( ( response ) => {
				setLatestPosts( response );
				resolve();
				
			} ).catch( (response) => {
				console.log( response );
			} );
		});
	}

	// Check if there are posts
	const hasPosts = Array.isArray( latestPosts ) && latestPosts.length;

	// Check the post type
	const isPost = 'post' === attributes.postType;

	if ( ! hasPosts ) {
		return (
			<>
				<Inspector { ...{ setAttributes, ...props } } />
				<Placeholder
					icon="admin-post"
					label={ __(
						'Genesis Blocks Post and Page Grid',
						'genesis-blocks'
					) }
				>
					{ ! Array.isArray( latestPosts ) ? (
						<Spinner />
					) : (
						__( 'No posts found.', 'genesis-blocks' )
					) }
				</Placeholder>
			</>
		);
	}

	// Add toolbar controls to change layout
	const layoutControls = [
		{
			icon: 'grid-view',
			title: __( 'Grid View', 'genesis-blocks' ),
			onClick: () => setAttributes( { postLayout: 'grid' } ),
			isActive: 'grid' === attributes.postLayout,
		},
		{
			icon: 'list-view',
			title: __( 'List View', 'genesis-blocks' ),
			onClick: () => setAttributes( { postLayout: 'list' } ),
			isActive: 'list' === attributes.postLayout,
		},
	];

	// Get the section tag
	const SectionTag = attributes.sectionTag
		? attributes.sectionTag
		: 'section';

	// Get the section title tag
	const SectionTitleTag = attributes.sectionTitleTag
		? attributes.sectionTitleTag
		: 'h2';

	// Get the post title tag
	const PostTag = attributes.postTitleTag
		? attributes.postTitleTag
		: 'h3';

	return (
		<>
			<Inspector { ...{ setAttributes, ...props } } />
			<BlockControls>
				<BlockAlignmentToolbar
					value={ attributes.align }
					onChange={ ( value ) => {
						setAttributes( { align: value } );
					} }
					controls={ [ 'center', 'wide', 'full' ] }
				/>
				<ToolbarGroup controls={ layoutControls } />
			</BlockControls>
			<SectionTag
				className={ classnames(
					props.className,
					'gb-block-post-grid'
				) }
			>
				{ attributes.displaySectionTitle &&
					attributes.sectionTitle && (
						<SectionTitleTag className="gb-post-grid-section-title">
							{ attributes.sectionTitle }
						</SectionTitleTag>
					) }

				<div
					className={ classnames( {
						'is-grid': 'grid' === attributes.postLayout,
						'is-list': 'list' === attributes.postLayout,
						[ `columns-${ attributes.columns }` ]:
							'grid' === attributes.postLayout,
						'gb-post-grid-items': 'gb-post-grid-items',
					} ) }
				>
					{ latestPosts.map( ( post, i ) => (
						<article
							key={ i }
							id={ 'post-' + post.id }
							className={ classnames(
								'post-' + post.id,
								post.featured_image_src &&
									attributes.displayPostImage
									? 'has-post-thumbnail'
									: null
							) }
						>
							{ attributes.displayPostImage &&
							post.featured_media ? (
								<PostGridImage
									{ ...props }
									imgAlt={
										decodeEntities(
											post.title.rendered.trim()
										) ||
										__( '(Untitled)', 'genesis-blocks' )
									}
									imgClass={ `wp-image-${ post.featured_media.toString() }` }
									imgID={ post.featured_media.toString() }
									imgSize={ attributes.imageSize }
									imgSizeLandscape={
										post.featured_image_src
									}
									imgSizeSquare={
										post.featured_image_src_square
									}
									imgLink={ post.link }
								/>
							) : null }

							<div className="gb-block-post-grid-text">
								<header className="gb-block-post-grid-header">
									{ attributes.displayPostTitle && (
										<PostTag className="gb-block-post-grid-title">
											<a
												href={ post.link }
												target="_blank"
												rel="bookmark noopener noreferrer"
											>
												{ decodeEntities(
													post.title.rendered.trim()
												) ||
													__(
														'(Untitled)',
														'genesis-blocks'
													) }
											</a>
										</PostTag>
									) }

									{ isPost && post.author_info && post.author_info.display_name && (
										<div className="gb-block-post-grid-byline">
											{ attributes.displayPostAuthor &&
												post.author_info
													.display_name && (
													<div className="gb-block-post-grid-author">
														<a
															className="gb-text-link"
															target="_blank"
															rel="noopener noreferrer"
															href={
																post
																	.author_info
																	.author_link
															}
														>
															{
																post
																	.author_info
																	.display_name
															}
														</a>
													</div>
												) }

											{ attributes.displayPostDate &&
												post.date_gmt && (
													<time
														dateTime={ moment(
															post.date_gmt
														)
															.utc()
															.format() }
														className={
															'gb-block-post-grid-date'
														}
													>
														{ moment(
															post.date_gmt
														)
															.local()
															.format(
																'MMMM DD, Y',
																'genesis-blocks'
															) }
													</time>
												) }
										</div>
									) }
								</header>

								<div className="gb-block-post-grid-excerpt">
									{ attributes.displayPostExcerpt &&
										post.excerpt && (
											<div
												dangerouslySetInnerHTML={ {
													__html: truncate(
														post.excerpt
															.rendered,
														attributes.excerptLength
													),
												} }
											/>
										) }

									{ attributes.displayPostLink && (
										<p>
											<a
												className="gb-block-post-grid-more-link gb-text-link"
												href={ post.link }
												target="_blank"
												rel="bookmark noopener noreferrer"
											>
												{ attributes.readMoreText }
											</a>
										</p>
									) }
								</div>
							</div>
						</article>
					) ) }
				</div>
			</SectionTag>
		</>
	);
}

// Truncate excerpt
function truncate( str, no_words ) {
	return str
		.split( ' ' )
		.splice( 0, no_words )
		.join( ' ' );
}
