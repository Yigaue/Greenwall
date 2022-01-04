/**
 * BLOCK: Layout
 */

/**
 * Import dependencies.
 */
import Edit from './components/edit';
import LayoutsProvider from './components/layouts-provider';
import './styles/style.scss';
import './styles/editor.scss';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register the Layout block
 */
registerBlockType( 'genesis-blocks/gb-layouts', {
	title: __( 'Layouts', 'genesis-blocks' ),
	description: __(
		'Add a pre-defined section or layout to posts and pages.',
		'genesis-blocks'
	),
	icon: 'layout',
	category: 'genesis-blocks',
	keywords: [
		__( 'layout', 'genesis-blocks' ),
		__( 'column', 'genesis-blocks' ),
		__( 'section', 'genesis-blocks' ),
	],

	/* Render the block components. */
	edit: ( props ) => {
		return (
			<LayoutsProvider>
				<Edit { ...props } />
			</LayoutsProvider>
		);
	},

	/* Save the block markup. */
	save: () => {
		return null;
	},
} );

/**
 * Add a Layout button to the toolbar.
 */
let genesisBlocksLayoutButtonAdded = false;
wp.data.subscribe( () => {
	appendImportButton();
});

/**
 * Build the layout inserter button.
 */
function appendImportButton() {
	if ( genesisBlocksLayoutButtonAdded ) {
		return;
	}
	const toolbar = document.querySelector( '.edit-post-header__toolbar' );
	if ( ! toolbar ) {
		return;
	}
	const buttonDiv = document.createElement( 'div' );
	let html = '<div class="gb-toolbar-insert-layout">';
	html += `<button id="gbLayoutInsertButton" class="components-button components-icon-button" aria-label="${ __(
		'Insert Layout',
		'genesis-blocks'
	) }"><i class="dashicons dashicons-layout gb-toolbar-insert-layout-button"></i> ${ __(
		'Layouts',
		'genesis-blocks'
	) }</button>`;
	html += '</div>';
	buttonDiv.innerHTML = html;
	toolbar.appendChild( buttonDiv );

	// Remove flex:grow CSS
	const innerToolbar = document.querySelector( '.components-accessible-toolbar.edit-post-header-toolbar' );
	if ( innerToolbar ) {
		innerToolbar.style.flexGrow = 0;
	}

	document
		.getElementById( 'gbLayoutInsertButton' )
		.addEventListener( 'click', gbInsertLayout );
		
	genesisBlocksLayoutButtonAdded = true;
}

/**
 * Add the Layout block on click.
 */
function gbInsertLayout() {
	const block = wp.blocks.createBlock( 'genesis-blocks/gb-layouts' );
	wp.data.dispatch( 'core/block-editor' ).insertBlocks( block );
	window.GenesisAnalytics.GAClient.send( 'Open Modal', { event_category: 'Layout Modal' });
}
