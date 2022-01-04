/**
 * Layout modal window with tab panel.
 */

import LayoutLibrary from './layout-library';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Fragment, useState } = wp.element;
const { Button, Dashicon, Modal, TabPanel } = wp.components;
const { useDispatch } = wp.data;

const { debounce, GAClient } = window.GenesisAnalytics;
const gaSelectTab = debounce( GAClient.send.bind( GAClient ), 500 ); 
const event_category = 'Layout Modal';

function LayoutModal(props) {
	const [currentTab, setCurrentTab] = useState( 'gb-layout-tab-collections' );
	const [modalOpen, setModalOpen] = useState( true );
	const { removeBlock } = useDispatch( 'core/block-editor' );

	const tabs = [];

	if ( Object.keys( props.context.collections ).length > 0 ) {
		tabs.push( {
			name: 'gb-layout-tab-collections',
			title: __( 'Collections', 'genesis-blocks' ),
			className: 'gb-layout-tab-collections',
		} );
	}

	if ( props.context.sections.length > 0 ) {
		tabs.push( {
			name: 'gb-layout-tab-sections',
			title: __( 'Sections', 'genesis-blocks' ),
			className: 'gb-layout-tab-sections',
		} );
	}
	
	if ( props.context.layouts.length > 0 ) {
		tabs.push( {
			name: 'gb-layout-tab-layouts',
			title: __( 'Layouts', 'genesis-blocks' ),
			className: 'gb-layout-tab-layouts',
		} );
	}

	tabs.push( {
		name: 'gb-layout-tab-favorites',
		title: __( 'Favorites', 'genesis-blocks' ),
		className: 'gb-layout-tab-favorites',
	} );

	if ( props.context.reusableBlocks.length ) {
		tabs.push( {
			name: 'gb-layout-tab-reusable-blocks',
			title: __( 'Reusable Blocks', 'genesis-blocks' ),
			className: 'gb-layout-tab-reusable-blocks',
		} );
	}

	return (
		<Fragment key={ 'layout-modal-fragment-' + props.clientId }>
			{ /* Launch the layout modal window */ }
			<Button
				key={ 'layout-modal-library-button-' + props.clientId }
				isPrimary
				className="gb-layout-modal-button"
				onClick={ () => {
					setModalOpen( true )
				} }
			>
				{ __( 'Layout Library', 'genesis-blocks' ) }
			</Button>
			{ modalOpen ? (
				<Modal
					key={
						'layout-modal-modal-component-' +
						props.clientId
					}
					className="gb-layout-modal"
					title={ __( 'Layout Selector', 'genesis-blocks' ) }
					onRequestClose={ () => {
						setModalOpen( false );
						setCurrentTab( null );
						removeBlock( props.clientId );
					} }
				>
					{ genesis_blocks_globals.pro_activated && (
						<div className="gb-layout-modal-footer">
							<Dashicon icon={ 'editor-help' } />
							<a
								href={
									'https://developer.wpengine.com/genesis-pro/genesis-page-builder/layouts-block/'
								}
								target="_blank"
								rel="noopener noreferrer"
							>
								{ __(
									'Add Custom Layouts',
									'genesis-blocks'
								) }
							</a>
							<span>&middot;</span>
							<a
								href={
									'https://developer.wpengine.com/genesis-pro/genesis-page-builder/reusable-blocks/'
								}
								target="_blank"
								rel="noopener noreferrer"
							>
								{ __( 'Reusable Blocks', 'genesis-blocks' ) }
							</a>
							<a
								href={
									'https://www.research.net/r/XFQYFPP'
								}
								target="_blank"
								rel="noopener noreferrer"
								className="gb-pro-feedback"
							>
								<Dashicon icon={ 'admin-comments' } />{ ' ' }
								{ __( 'Send Feedback', 'genesis-blocks' ) }
							</a>
						</div>
					) }
					<TabPanel
						key={
							'layout-modal-tabpanel-' + props.clientId
						}
						className="gb-layout-modal-panel"
						activeClass="gb-layout-modal-active-tab"
						onSelect={ ( tabName ) => {
							gaSelectTab( 'Select Tab', { event_category, event_label: tabName } );
							setCurrentTab( tabName )
						} }
						tabs={ tabs }
					>
						{ ( tab ) => {
							const tabContent = __(
								'Default tab content',
								'genesis-blocks'
							);

							if ( tab.name ) {
								if (
									'gb-layout-tab-sections' === tab.name
								) {
									return [
										<LayoutLibrary
											key={
												'layout-library-sections-' +
												props.clientId
											}
											clientId={ props.clientId }
											currentTab={
												currentTab
											}
											data={
												props.context.sections
											}
											context={ props.context }
										/>,
									];
								}

								if (
									'gb-layout-tab-layouts' === tab.name
								) {
									return [
										<LayoutLibrary
											key={
												'layout-library-layouts-' +
												props.clientId
											}
											clientId={ props.clientId }
											currentTab={
												currentTab
											}
											data={
												props.context.layouts
											}
											context={ props.context }
										/>,
									];
								}

								if (
									'gb-layout-tab-collections' === tab.name
								) {
									return [
										<LayoutLibrary
											key={
												'layout-library-collections-' +
												props.clientId
											}
											clientId={ props.clientId }
											currentTab={
												currentTab
											}
											data={
												props.context.collections
											}
											context={ props.context }
										/>,
									];
								}

								if (
									'gb-layout-tab-favorites' === tab.name
								) {
									return [
										<LayoutLibrary
											key={
												'layout-library-favorites-' +
												props.clientId
											}
											clientId={ props.clientId }
											currentTab={
												currentTab
											}
											data={
												props.context.favorites
											}
											context={ props.context }
										/>,
									];
								}

								if (
									'gb-layout-tab-reusable-blocks' ===
									tab.name
								) {
									return [
										<LayoutLibrary
											key={
												'layout-library-reusable-blocks-' +
												props.clientId
											}
											clientId={ props.clientId }
											currentTab={
												currentTab
											}
											data={
												props.context
													.reusableBlocks
											}
											context={ props.context }
										/>,
									];
								}
							}
							return <div>{ tabContent }</div>;
						} }
					</TabPanel>
				</Modal>
			) : null }
		</Fragment>
	)
}
export default LayoutModal;
