/**
 * Html field
 *
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

function Html({ field }) {
	return <div dangerouslySetInnerHTML={{ __html: field.content }} />;
}

export default Html;
