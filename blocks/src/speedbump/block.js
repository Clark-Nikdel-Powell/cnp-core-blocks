const { RichText } = wp.blockEditor;
const { registerBlockType } = wp.blocks;

import './style.scss';
import './editor.scss';

registerBlockType('cnp/speedbump', {
	title: 'Speedbump',
	icon: 'heart',
	category: 'common',
	attributes: {
		content: {
			type: 'string',
			source: 'text',
			selector: '.speedbump__title'
		},
		action: {
			type: 'string',
			source: 'html',
			selector: '.speedbump__action'
		}
	},
	edit({ attributes, className, setAttributes }) {
		return (
			<div className="speedbump">
				<RichText className="speedbump__title h1" tagName="p" allowedFormats={[]} value={attributes.content} onChange={content => setAttributes({ content: content })} placeholder="Speedbump text." />
				<RichText className="speedbump__action" tagName="p" allowedFormats={['core/link']} multiline="false" value={attributes.action} onChange={content => setAttributes({ action: content })} placeholder="Action!" keepPlaceholderOnFocus="true" />
			</div>
		);
	},
	save({ attributes }) {
		return (
			<div className="speedbump">
				<RichText.Content className="speedbump__title h1" tagName="p" value={attributes.content} />
				<RichText.Content className="speedbump__action" tagName="p" value={attributes.action} />
			</div>
		);
	}
});
