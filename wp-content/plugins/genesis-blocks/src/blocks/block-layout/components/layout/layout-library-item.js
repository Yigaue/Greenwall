/**
 * Layout Library Section and Layout Item.
 */

/**
 * Dependencies.
 */
import LayoutLibraryItemCard from './layout-library-item-card';
import LayoutLibraryItemList from './layout-library-item-list';
import { Collections } from "./collections/views/Collections.js";

/**
 * WordPress dependencies.
 */
const { compose } = wp.compose;
const { rawHandler } = wp.blocks;
const { withSelect, withDispatch } = wp.data;
const { Component, Fragment } = wp.element;

class LayoutLibraryItem extends Component {
	constructor() {
		super( ...arguments );
	}

	layoutTabContent() {
		let component = [];

		if ('gb-layout-tab-reusable-blocks' === this.props.currentTab) {
			component = <LayoutLibraryItemList { ...this.props } />
		} else if ('gb-layout-tab-collections' === this.props.currentTab) {
			component = <Collections { ...this.props } />
		} else {
			component = <LayoutLibraryItemCard { ...this.props } />
		}

		return component;
	}

	render() {

		return (
			<Fragment>
				{ this.layoutTabContent() }
			</Fragment>
		);
	}
}

export default compose(
	/**
	 * Use rawHandler to parse html layouts to blocks
	 * See https://git.io/fjqGc for details
	 */
	withSelect( ( select, { clientId } ) => {
		const { getBlock } = select( 'core/block-editor' );
		let canUserUseUnfilteredHTML;

		// The core/editor package doesn't work on the widgets page, and thus doesn't exist there. Therefore this conditional exists.
		if ( select( 'core/editor' ) ) {
			canUserUseUnfilteredHTML = select( 'core/editor' ).canUserUseUnfilteredHTML;
			canUserUseUnfilteredHTML = canUserUseUnfilteredHTML();
		} else {
			canUserUseUnfilteredHTML = true;
		}

		const block = getBlock( clientId );
		return {
			block,
			canUserUseUnfilteredHTML,
		};
	} ),
	withDispatch( ( dispatch, { block, canUserUseUnfilteredHTML } ) => ( {
		import: ( blockLayout ) =>
			dispatch( 'core/block-editor' ).replaceBlocks(
				block.clientId,
				rawHandler( {
					HTML: blockLayout,
					mode: 'BLOCKS',
					canUserUseUnfilteredHTML,
				} )
			),
	} ) )
)( LayoutLibraryItem );
