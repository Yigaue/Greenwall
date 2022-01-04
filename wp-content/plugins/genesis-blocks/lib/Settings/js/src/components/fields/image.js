/**
 * Image field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

/**
 * External dependencies
 */
import { has } from 'lodash';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Button, Spinner, ResponsiveWrapper } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { withSelect, withDispatch } from '@wordpress/data';
import { MediaUpload } from '@wordpress/block-editor';

const ALLOWED_MEDIA_TYPES = ['image'];

// Defaults if developers do not define equivalent field settings.
const DEFAULT_LABEL = __('Image');
const DEFAULT_IMAGE_SIZE = 'thumbnail';
const DEFAULT_LABEL_MEDIA_MODAL = __('Select an image');
const DEFAULT_LABEL_BUTTON = __('Choose image');
const DEFAULT_LABEL_REPLACE = __('Replace image');
const DEFAULT_LABEL_REMOVE_IMAGE = __('Remove image');

function ImageFieldComponent({
	field,
	imageId,
	media,
	onUpdateImage,
	onRemoveImage,
}) {
	let imageWidth, imageHeight, imageUrl;
	if (media) {
		const imageSize = field.image_size || DEFAULT_IMAGE_SIZE;
		if (has(media, ['media_details', 'sizes', imageSize])) {
			// Use given thumbnail when size available.
			imageWidth = media.media_details.sizes[imageSize].width;
			imageHeight = media.media_details.sizes[imageSize].height;
			imageUrl = media.media_details.sizes[imageSize].source_url;
		} else {
			// Full image as fallback.
			imageWidth = media.media_details.width;
			imageHeight = media.media_details.height;
			imageUrl = media.source_url;
		}
	}

	return (
		<>
			<div className="genesis-blocks-settings-image">
				<p className="components-base-control__label">
					{field.label || DEFAULT_LABEL}
				</p>
				<MediaUpload
					title={field.label_media_modal || DEFAULT_LABEL_MEDIA_MODAL}
					onSelect={onUpdateImage}
					allowedTypes={ALLOWED_MEDIA_TYPES}
					render={({ open }) => (
						<div className="genesis-blocks-settings-image__container">
							<Button
								className={
									!imageId
										? 'genesis-blocks-settings-image__toggle'
										: 'genesis-blocks-settings-image__preview'
								}
								onClick={open}
								aria-label={field.label_button_aria || null}
								isSecondary
							>
								{!!imageId && media && (
									<ResponsiveWrapper
										naturalWidth={imageWidth}
										naturalHeight={imageHeight}
										isInline
									>
										<img src={imageUrl} alt="" />
									</ResponsiveWrapper>
								)}
								{!!imageId && !media && <Spinner />}
								{!imageId &&
									(field.label_button ||
										DEFAULT_LABEL_BUTTON)}
							</Button>
						</div>
					)}
					value={imageId}
				/>
				{!!imageId && media && !media.isLoading && (
					<MediaUpload
						title={
							field.label_media_modal || DEFAULT_LABEL_MEDIA_MODAL
						}
						onSelect={onUpdateImage}
						allowedTypes={ALLOWED_MEDIA_TYPES}
						modalClass="genesis-blocks-settings-image__media-modal"
						render={({ open }) => (
							<Button
								onClick={open}
								isSecondary
								aria-label={field.label_replace_aria || null}
							>
								{field.label_replace || DEFAULT_LABEL_REPLACE}
							</Button>
						)}
					/>
				)}
				{!!imageId && (
					<Button
						onClick={onRemoveImage}
						isLink
						isDestructive
						aria-label={field.label_remove_aria || null}
					>
						{field.label_remove || DEFAULT_LABEL_REMOVE_IMAGE}
					</Button>
				)}
				{!!field.help && (
					<p
						id={field.id + '__help'}
						className="components-base-control__help"
					>
						{field.help}
					</p>
				)}
			</div>
		</>
	);
}

const applyWithSelect = withSelect((select, ownProps) => {
	const { getMedia } = select('core');
	const imageId = ownProps.settings[ownProps.field.id];

	return {
		media: imageId ? getMedia(imageId) : null,
		imageId,
	};
});

const applyWithDispatch = withDispatch((dispatch, ownProps) => {
	const { updateSetting } = dispatch('genesis-blocks/global-settings');
	return {
		onUpdateImage(image) {
			updateSetting({
				key: ownProps.field.id,
				value: image.id,
			});
		},
		onRemoveImage() {
			updateSetting({
				key: ownProps.field.id,
				value: null,
			});
		},
	};
});

const ImageField = compose(
	applyWithSelect,
	applyWithDispatch
)(ImageFieldComponent);

export default ImageField;
