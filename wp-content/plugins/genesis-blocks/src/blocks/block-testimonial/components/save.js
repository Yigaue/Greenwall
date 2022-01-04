/**
 * Internal dependencies
 */
import Testimonial from './testimonial';

/**
 * WordPress dependencies
 */
const { Component } = wp.element;
const { RichText } = wp.blockEditor;

export default class Save extends Component {
	render() {
		const {
			testimonialName,
			testimonialTitle,
			testimonialContent,
			testimonialAlignment,
			testimonialImgURL,
			testimonialImgAlt,
			testimonialTextColor,
		} = this.props.attributes;

		return (
			<Testimonial { ...this.props }>
				<RichText.Content
					tagName="div"
					className="gb-testimonial-text"
					style={ {
						textAlign: testimonialAlignment,
					} }
					value={ testimonialContent }
				/>

				<div className="gb-testimonial-info">
					{ testimonialImgURL && (
						<div className="gb-testimonial-avatar-wrap">
							<div className="gb-testimonial-image-wrap">
								<img
									className="gb-testimonial-avatar"
									src={ testimonialImgURL }
									alt={ testimonialImgAlt ? testimonialImgAlt : null }
								/>
							</div>
						</div>
					) }

					{ testimonialName && (
						<RichText.Content
							tagName="h2"
							className="gb-testimonial-name"
							style={ {
								color: testimonialTextColor
									? testimonialTextColor
									: '#32373c',
							} }
							value={ testimonialName }
						/>
					) }

					{ testimonialTitle && (
					<RichText.Content
						tagName="small"
						className="gb-testimonial-title"
						style={ {
							color: testimonialTextColor
								? testimonialTextColor
								: '#32373c',
						} }
						value={ testimonialTitle }
					/>
					) }
				</div>
			</Testimonial>
		);
	}
}
