/**
 * Layout Library Card Item.
 */

/**
 * Dependencies.
 */
import classnames from 'classnames';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { Button, Dashicon, Tooltip } = wp.components;

const { GAClient } = window.GenesisAnalytics;
const event_category = 'Layout Modal';

export default class LayoutLibraryItemCard extends Component {
	constructor() {
		super( ...arguments );
	}
	
	addDefaultSrc(event) {
		event.target.src = genesis_blocks_globals.pattern_fallback_image;
	}

	render() {
		return (
			<Fragment>
				<div
					key={ 'gb-layout-design-' + this.props.itemKey }
					className="gb-layout-design"
				>
					<div className="gb-layout-design-inside">
						<div className="gb-layout-design-item">
							<Button
								key={ this.props.itemKey }
								className="gb-layout-insert-button"
								isSmall
								onClick={ () => {
									GAClient.send( `Select ${this.props.type}`, { event_category, event_label: this.props.name } );
									this.props.import( this.props.content, this.props.clientId );
								} }
							>
								<img
									src={ this.props.image ? this.props.image : genesis_blocks_globals.pattern_fallback_image }
									alt={ this.props.name }
									onError={this.addDefaultSrc}
								/>
							</Button>

							<div className="gb-layout-design-info">
								<div className="gb-layout-design-title">
									{ this.props.name }
									{
										<Tooltip
											text={
												this.props.context.favoriteKeys.includes(
													this.props.itemKey
												)
													? __(
															'Remove from Favorites',
															'genesis-blocks'
													  )
													: __(
															'Add to Favorites',
															'genesis-blocks'
													  )
											}
										>
											<Button
												key={ 'buttonFavorite' }
												className="gb-layout-favorite-button"
												isSmall
												onClick={ () => {
													this.props.context.toggleFavorite(
														this.props.itemKey
													);
												} }
											>
												<Dashicon
													icon={ 'heart' }
													className={ classnames(
														'gb-layout-icon-favorite',
														this.props.context.favoriteKeys.includes(
															this.props.itemKey
														) &&
															'gb-layout-icon-favorite-active'
													) }
												/>
											</Button>
										</Tooltip>
									}
								</div>
							</div>
						</div>
					</div>
				</div>
			</Fragment>
		);
	}
}
