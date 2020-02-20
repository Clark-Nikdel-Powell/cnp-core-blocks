const { RichText } = wp.editor;
const { registerBlockType } = wp.blocks;

import './style.scss';
import './editor.scss';

registerBlockType('cnp-core-blocks/speedbump', {
	title: 'Speedbump',
	// icon: 'heart',
	category: 'common',
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: '.speedbump__title'
		}
	},
	edit({ attributes, className, setAttributes }) {
		return (
			<div className="speedbump"><RichText className="speedbump__title" multiline="p" formattingControls={[]} value={attributes.content} onChange={content => setAttributes({ content: content })} placeholder="Speedbump text." /></div>
		);
	},
	save({ attributes }) {
		return (
			<div className="speedbump"><div className="speedbump__title h1">{attributes.content}</div></div>
		);
	}
});
