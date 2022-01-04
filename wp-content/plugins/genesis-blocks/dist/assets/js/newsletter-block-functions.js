'use strict';

var $ = jQuery;

var GenesisBlocksNewsletterSubmission = {
	init() {
		$( '.gb-newsletter-submit' ).on( 'click', function( event ) {
			var button = $( this );

			var button_text_original = button.val();

			var form = $( this ).parents( 'form' );

			var nonce = button
				.parent()
				.find( "[name='gb-newsletter-form-nonce']" )
				.val();

			var email = button
				.parent()
				.find( "[name='gb-newsletter-email-address']" )
				.val();

			var provider = button
				.parent()
				.find( "[name='gb-newsletter-mailing-list-provider']" )
				.val();

			var list = button
				.parent()
				.find( "[name='gb-newsletter-mailing-list']" )
				.val();

			var successMessage = button
				.parent()
				.find( "[name='gb-newsletter-success-message']" )
				.val();

			var errorMessageContainer = button
				.parents( '.gb-block-newsletter' )
				.find( '.gb-block-newsletter-errors' );

			var ampEndpoint = button
				.parent()
				.find( "[name='gb-newsletter-amp-endpoint-request']" )
				.val();

			var doubleOptIn = button
				.parent()
				.find( "[name='gb-newsletter-double-opt-in']" )
				.val();

			event.preventDefault();

			wp.a11y.speak(
				genesis_blocks_newsletter_vars.l10n.a11y.submission_processing
			);

			button
				.val(
					genesis_blocks_newsletter_vars.l10n.button_text_processing
				)
				.prop( 'disabled', true );

			if ( ! email ) {
				setTimeout( function() {
					button
						.val( button_text_original )
						.prop( 'disabled', false );
					wp.a11y.speak(
						genesis_blocks_newsletter_vars.l10n.a11y
							.submission_failed
					);
				}, 400 );
				return;
			}

			if ( ! provider || ! list ) {
				form.html(
					'<p class="gb-newsletter-submission-message">' +
						genesis_blocks_newsletter_vars.l10n
							.invalid_configuration +
						'</p>'
				);
				return;
			}

			$.ajax( {
				data: {
					action: 'genesis_blocks_newsletter_submission',
					'gb-newsletter-email-address': email,
					'gb-newsletter-mailing-list-provider': provider,
					'gb-newsletter-mailing-list': list,
					'gb-newsletter-form-nonce': nonce,
					'gb-newsletter-success-message': successMessage,
					'gb-newsletter-amp-endpoint-request': ampEndpoint,
					'gb-newsletter-double-opt-in': doubleOptIn,
				},
				type: 'post',
				url: genesis_blocks_newsletter_vars.ajaxurl,
				success( response ) {
					if ( response.success ) {
						form.html(
							'<p class="gb-newsletter-submission-message">' +
								response.data.message +
								'</p>'
						);
						wp.a11y.speak(
							genesis_blocks_newsletter_vars.l10n.a11y
								.submission_succeeded
						);
					}

					if ( ! response.success ) {
						errorMessageContainer
							.html( '<p>' + response.data.message + '</p>' )
							.fadeIn();
						button
							.val( button_text_original )
							.prop( 'disabled', false );
						wp.a11y.speak(
							genesis_blocks_newsletter_vars.l10n.a11y
								.submission_failed
						);
					}
				},
				failure( response ) {
					errorMessageContainer
						.html( '<p>' + response.data.message + '</p>' )
						.fadeIn();
				},
			} );
		} );

		$( '.gb-newsletter-email-address-input' ).on( 'keyup', function(
			event
		) {
			$( '.gb-block-newsletter-errors' )
				.html( '' )
				.fadeOut();
		} );
	},
};

$( document ).ready( function() {
	GenesisBlocksNewsletterSubmission.init();
} );
