<?php
/**
 * Server-side rendering for the sharing block
 *
 * @since   1.1.2
 * @package Genesis\Blocks
 */

/**
 * Register the block on the server
 */
function genesis_blocks_register_sharing() {

	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	register_block_type(
		'genesis-blocks/gb-sharing',
		array(
			'style'           => 'genesis-blocks-style-css',
			'attributes'      => array(
				'clientId'         => array(
					'type'    => 'string',
					'default' => '',
				),
				'facebook'         => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'twitter'          => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'linkedin'         => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'pinterest'        => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'email'            => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'reddit'           => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'shareAlignment'   => array(
					'type' => 'string',
				),
				'shareButtonStyle' => array(
					'type'    => 'string',
					'default' => 'gb-share-icon-text',
				),
				'shareButtonShape' => array(
					'type'    => 'string',
					'default' => 'gb-share-shape-circular',
				),
				'shareButtonSize'  => array(
					'type'    => 'string',
					'default' => 'gb-share-size-medium',
				),
				'shareButtonColor' => array(
					'type'    => 'string',
					'default' => 'gb-share-color-standard',
				),
			),
			'render_callback' => 'genesis_blocks_render_sharing',
		)
	);
}
add_action( 'init', 'genesis_blocks_register_sharing' );


/**
 * Add the pop-up share window to the footer
 */
function genesis_blocks_social_icon_footer_script() {

	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return;
	}
	?>
	<script type="text/javascript">
		function genesisBlocksShare( url, title, w, h ){
			var left = ( window.innerWidth / 2 )-( w / 2 );
			var top  = ( window.innerHeight / 2 )-( h / 2 );
			return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=600, height=600, top='+top+', left='+left);
		}
	</script>
	<?php
}
add_action( 'wp_footer', 'genesis_blocks_social_icon_footer_script' );

/**
 * Render the sharing links
 *
 * @param array $attributes The block attributes.
 *
 * @return string The block HTML.
 */
function genesis_blocks_render_sharing( $attributes ) {
	global $post;

	$uuid = isset( $attributes['clientId'] ) && ! empty( $attributes['clientId'] ) ? $attributes['clientId'] : uniqid();

	if ( has_post_thumbnail() ) {
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail    = $thumbnail_id ? current( wp_get_attachment_image_src( $thumbnail_id, 'large', true ) ) : '';
	} else {
		$thumbnail = null;
	}

	$is_amp_endpoint = function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();

	$twitter_url = 'http://twitter.com/share?text=' . get_the_title() . '&url=' . get_the_permalink() . '';

	$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&title=' . get_the_title() . '';

	$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . get_the_title() . '';

	$pinterest_url = 'https://pinterest.com/pin/create/button/?&url=' . get_the_permalink() . '&description=' . get_the_title() . '&media=' . esc_url( $thumbnail ) . '';

	$email_url = 'mailto:?subject=' . get_the_title() . '&body=' . get_the_title() . '&mdash;' . get_the_permalink() . '';

	$reddit_url = 'https://www.reddit.com/submit?url=' . get_the_permalink() . '';

	$share_url = '';

	$icons_url = plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'dist/assets/social-icons/';

	if ( isset( $attributes['twitter'] ) && $attributes['twitter'] ) {

		$href_format = sprintf( 'href="javascript:void(0)" onClick="javascript:genesisBlocksShare(\'%1$s\', \'%2$s\', \'600\', \'600\')"', esc_url( $twitter_url ), esc_html__( 'Share on Twitter', 'genesis-blocks' ) );

		if ( $is_amp_endpoint ) {
			$href_format = sprintf( 'href="%1$s"', esc_url( $twitter_url ) );
		}

		$share_url .= sprintf(
			'<li>
			<a
				%1$s
				class="gb-share-twitter"
				title="%2$s">
				%3$s <span class="gb-social-text">%2$s</span>
			</a>
		</li>',
			$href_format,
			esc_html__( 'Share on Twitter', 'genesis-blocks' ),
			genesis_blocks_get_svg( 'twitter', 'ui', '', $uuid, __( 'Share on Twitter', 'genesis-blocks' ) )
		);
	}

	if ( isset( $attributes['facebook'] ) && $attributes['facebook'] ) {

		$href_format = sprintf( 'href="javascript:void(0)" onClick="javascript:genesisBlocksShare(\'%1$s\', \'%2$s\', \'600\', \'600\')"', esc_url( $facebook_url ), esc_html__( 'Share on Facebook', 'genesis-blocks' ) );

		if ( $is_amp_endpoint ) {
			$href_format = sprintf( 'href="%1$s"', esc_url( $facebook_url ) );
		}

		$share_url .= sprintf(
			'<li>
				<a
					%1$s
					class="gb-share-facebook"
					title="%2$s">
					%3$s <span class="gb-social-text">%2$s</span>
				</a>
			</li>',
			$href_format,
			esc_html__( 'Share on Facebook', 'genesis-blocks' ),
			genesis_blocks_get_svg( 'facebook', 'ui', '', $uuid, __( 'Share on Facebook', 'genesis-blocks' ) )
		);
	}

	if ( isset( $attributes['pinterest'] ) && $attributes['pinterest'] ) {

		$href_format = sprintf( 'href="javascript:void(0)" onClick="javascript:genesisBlocksShare(\'%1$s\', \'%2$s\', \'600\', \'600\')"', esc_url( $pinterest_url ), esc_html__( 'Share on Pinterest', 'genesis-blocks' ) );

		if ( $is_amp_endpoint ) {
			$href_format = sprintf( 'href="%1$s"', esc_url( $pinterest_url ) );
		}

		$share_url .= sprintf(
			'<li>
				<a
					%1$s
					class="gb-share-pinterest"
					title="%2$s">
					%3$s <span class="gb-social-text">%2$s</span>
				</a>
			</li>',
			$href_format,
			esc_html__( 'Share on Pinterest', 'genesis-blocks' ),
			genesis_blocks_get_svg( 'pinterest', 'ui', '', $uuid, __( 'Share on Pinterest', 'genesis-blocks' ) )
		);
	}

	if ( isset( $attributes['linkedin'] ) && $attributes['linkedin'] ) {

		$href_format = sprintf( 'href="javascript:void(0)" onClick="javascript:genesisBlocksShare(\'%1$s\', \'%2$s\', \'600\', \'600\')"', esc_url( $linkedin_url ), esc_html__( 'Share on LinkedIn', 'genesis-blocks' ) );

		if ( $is_amp_endpoint ) {
			$href_format = sprintf( 'href="%1$s"', esc_url( $linkedin_url ) );
		}

		$share_url .= sprintf(
			'<li>
				<a
					%1$s
					class="gb-share-linkedin"
					title="%2$s">
					%3$s <span class="gb-social-text">%2$s</span>
				</a>
			</li>',
			$href_format,
			esc_html__( 'Share on LinkedIn', 'genesis-blocks' ),
			genesis_blocks_get_svg( 'linkedin', 'ui', '', $uuid, __( 'Share on LinkedIn', 'genesis-blocks' ) )
		);
	}

	if ( isset( $attributes['reddit'] ) && $attributes['reddit'] ) {

		$href_format = sprintf( 'href="javascript:void(0)" onClick="javascript:genesisBlocksShare(\'%1$s\', \'%2$s\', \'600\', \'600\')"', esc_url( $reddit_url ), esc_html__( 'Share on Reddit', 'genesis-blocks' ) );

		if ( $is_amp_endpoint ) {
			$href_format = sprintf( 'href="%1$s"', esc_url( $reddit_url ) );
		}

		$share_url .= sprintf(
			'<li>
				<a
					%1$s
					class="gb-share-reddit"
					title="%2$s">
					%3$s <span class="gb-social-text">%2$s</span>
				</a>
			</li>',
			$href_format,
			esc_html__( 'Share on Reddit', 'genesis-blocks' ),
			genesis_blocks_get_svg( 'reddit', 'ui', '', $uuid, __( 'Share on Reddit', 'genesis-blocks' ) )
		);
	}

	if ( isset( $attributes['email'] ) && $attributes['email'] ) {
		if ( ! $is_amp_endpoint ) {
			$share_url .= sprintf(
				'<li>
					<a
						href="%1$s"
						class="gb-share-email"
						title="%2$s">
						%3$s <span class="gb-social-text">%2$s</span>
					</a>
				</li>',
				esc_url( $email_url ),
				esc_html__( 'Share via Email', 'genesis-blocks' ),
				genesis_blocks_get_svg( 'email', 'ui', '', $uuid, __( 'Share via Email', 'genesis-blocks' ) )
			);
		}
	}

	$block_content = sprintf(
		'<div class="wp-block-genesis-blocks-gb-sharing gb-block-sharing %2$s %3$s %4$s %5$s %6$s">
			<ul class="gb-share-list">%1$s</ul>
		</div>',
		$share_url,
		isset( $attributes['shareButtonStyle'] ) ? $attributes['shareButtonStyle'] : null,
		isset( $attributes['shareButtonShape'] ) ? $attributes['shareButtonShape'] : null,
		isset( $attributes['shareButtonSize'] ) ? $attributes['shareButtonSize'] : null,
		isset( $attributes['shareButtonColor'] ) ? $attributes['shareButtonColor'] : null,
		isset( $attributes['shareAlignment'] ) ? 'gb-align-' . $attributes['shareAlignment'] : null
	);

	return $block_content;
}
