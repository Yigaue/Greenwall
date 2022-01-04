/**
 * Social Media Icons
 */
const { __ } = wp.i18n;
const { Component } = wp.element;

/**
 * Create an SocialIcons wrapper Component
 */
export default class SocialIcons extends Component {
	constructor( props ) {
		super( ...arguments );
	}

	render() {
		return (
			<ul className="gb-social-links">
				{ this.props.attributes.website &&
					!! this.props.attributes.website.length && (
						<li>
							<a
								href={ this.props.attributes.website }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Website', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-website-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<title id={ 'gb-link-website-' + this.props.clientId }>{ __( 'Visit Website (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"></path>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.twitter &&
					!! this.props.attributes.twitter.length && (
						<li>
							<a
								href={ this.props.attributes.twitter }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Twitter', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-twitter-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<title id={ 'gb-link-twitter-' + this.props.clientId }>{ __( 'Visit Twitter account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.facebook &&
					!! this.props.attributes.facebook.length && (
						<li>
							<a
								href={ this.props.attributes.facebook }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Facebook', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-facebook-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<title id={ 'gb-link-facebook-' + this.props.clientId }>{ __( 'Visit Facebook account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.instagram &&
					!! this.props.attributes.instagram.length && (
						<li>
							<a
								href={ this.props.attributes.instagram }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Instagram', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-instagram-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-instagram-' + this.props.clientId }>{ __( 'Visit Instagram account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.pinterest &&
					!! this.props.attributes.pinterest.length && (
						<li>
							<a
								href={ this.props.attributes.pinterest }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Pinterest', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-pinterest-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-pinterest-' + this.props.clientId }>{ __( 'Visit Pinterest account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.google &&
					!! this.props.attributes.google.length && (
						<li>
							<a
								href={ this.props.attributes.google }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Google', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-google-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-google-' + this.props.clientId }>{ __( 'Visit Google account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.youtube &&
					!! this.props.attributes.youtube.length && (
						<li>
							<a
								href={ this.props.attributes.youtube }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'YouTube', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-youtube-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<title id={ 'gb-link-youtube-' + this.props.clientId }>{ __( 'Visit YouTube account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.linkedin &&
					!! this.props.attributes.linkedin.length && (
						<li>
							<a
								href={ this.props.attributes.linkedin }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'LinkedIn', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-linkedin-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-linkedin-' + this.props.clientId }>{ __( 'Visit LinkedIn account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.github &&
					!! this.props.attributes.github.length && (
						<li>
							<a
								href={ this.props.attributes.github }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Github', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-github-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-github-' + this.props.clientId }>{ __( 'Visit GitHub account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.wordpress &&
					!! this.props.attributes.wordpress.length && (
						<li>
							<a
								href={ this.props.attributes.wordpress }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'WordPress', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-wordpress-' + this.props.clientId } role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<title id={ 'gb-link-wordpress-' + this.props.clientId }>{ __( 'Visit WordPress account (opens in a new tab)', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.833-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61.001.014zM12 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"/>
								</svg>
							</a>
						</li>
					) }

				{ this.props.attributes.email &&
					!! this.props.attributes.email.length && (
						<li>
							<a
								href={ this.props.attributes.email }
								target="_blank"
								rel="noopener noreferrer"
								style={ {
									backgroundColor: this.props.attributes
										.profileLinkColor,
								} }
								aria-label={__( 'Email', 'genesis-blocks' )}
							>
								<svg aria-labelledby={ 'gb-link-email-' + this.props.clientId } role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<title id={ 'gb-link-email-' + this.props.clientId }>{ __( 'Email', 'genesis-blocks' ) }</title>
									<path fill="#fff" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
								</svg>
							</a>
						</li>
					) }
			</ul>
		);
	}
}
