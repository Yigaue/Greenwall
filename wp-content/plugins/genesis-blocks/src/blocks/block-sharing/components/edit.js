/**
 * Internal dependencies
 */
import Inspector from './inspector';
import ShareLinks from './sharing';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const { AlignmentToolbar, BlockControls } = wp.blockEditor;

export default class Edit extends Component {
	constructor() {
		super( ...arguments );
		
		if ( ! this.props.attributes.clientId || this.props.attributes.clientId !== this.props.clientId ) {
			this.props.setAttributes( {clientId: this.props.clientId } );
		}
	}

	render() {
		return [
			// Show the alignment toolbar on focus
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ this.props.attributes.shareAlignment }
					onChange={ ( value ) =>
						this.props.setAttributes( { shareAlignment: value } )
					}
				/>
			</BlockControls>,

			// Show the block controls on focus
			<Inspector key={ 'gb-share-inspector-' + this.props.clientId } { ...this.props } />,

			// Show the button markup in the editor
			<ShareLinks key={ 'gb-share-links-' + this.props.clientId } { ...this.props }>
				<ul className="gb-share-list">
					{ this.props.attributes.twitter && (
						<li>
							<a className="gb-share-twitter">
								<svg aria-labelledby={ 'gb-link-twitter-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<title id={ 'gb-link-twitter-' + this.props.clientId }>{ __( 'Visit Twitter account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
								</svg>
								<span className={ 'gb-social-text' }>
									{ __(
										'Share on Twitter',
										'genesis-blocks'
									) }
								</span>
							</a>
						</li>
					) }

					{ this.props.attributes.facebook && (
						<li>
							<a className="gb-share-facebook">
								<svg aria-labelledby={ 'gb-link-facebook-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<title id={ 'gb-link-facebook-' + this.props.clientId }>{ __( 'Visit Facebook account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
								</svg>
								<span className={ 'gb-social-text' }>
									{ __(
										'Share on Facebook',
										'genesis-blocks'
									) }
								</span>
							</a>
						</li>
					) }

					{ this.props.attributes.pinterest && (
						<li>
							<a className="gb-share-pinterest">
								<svg aria-labelledby={ 'gb-link-pinterest-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-pinterest-' + this.props.clientId }>{ __( 'Visit Pinterest account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/>
								</svg>
								<span className={ 'gb-social-text' }>
									{ __(
										'Share on Pinterest',
										'genesis-blocks'
									) }
								</span>
							</a>
						</li>
					) }

					{ this.props.attributes.linkedin && (
						<li>
							<a className="gb-share-linkedin">
								<svg aria-labelledby={ 'gb-link-linkedin-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-linkedin-' + this.props.clientId }>{ __( 'Visit LinkedIn account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
								</svg>
								<span className={ 'gb-social-text' }>
									{ __(
										'Share on LinkedIn',
										'genesis-blocks'
									) }
								</span>
							</a>
						</li>
					) }

					{ this.props.attributes.reddit && (
						<li>
							<a className="gb-share-reddit">
								<svg aria-labelledby={ 'gb-link-reddit-' + this.props.clientId }  role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-reddit-' + this.props.clientId }>{ __( 'Share on Reddit', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z"/>
								</svg>
								<span className={ 'gb-social-text' }>
									{ __( 'Share on reddit', 'genesis-blocks' ) }
								</span>
							</a>
						</li>
					) }

					{ this.props.attributes.email && (
						<li>
							<a className="gb-share-email">
								<svg aria-labelledby={ 'gb-link-email-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<title id={ 'gb-link-email-' + this.props.clientId }>{ __( 'Email', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
								</svg>
								<span className={ 'gb-social-text' }>
									{ __( 'Share via Email', 'genesis-blocks' ) }
								</span>
							</a>
						</li>
					) }
				</ul>
			</ShareLinks>,
		];
	}
}
