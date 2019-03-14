//const {registerBlockType} = wp.blocks; //Blocks API
//const {createElement} = wp.element; //React.createElement
//const {__} = wp.i18n; //translation functions
//const {InspectorControls} = wp.editor; //Block inspector wrapper
//const {TextControl,SelectControl,ServerSideRender} = wp.components; //WordPress form inputs and server-side renderer

registerBlockType( 'ibr-test-blocks/post-title', {
	title: __( 'Ibr Post Title' ), // Block title.
	category:  __( 'common' ), //category
	attributes:  {
		title : {
			default: 'Test Title',
		},
		heading: {
			default: 'h2'
		}
	},
	//display the post title
	edit(props){
		const attributes =  props.attributes;
		const setAttributes =  props.setAttributes;

		//Function to update id attribute
		function changeId(title){
			setAttributes({title});
		}

		//Function to update heading level
		function changeHeading(heading){
			setAttributes({heading});
		}

		//Display block preview and UI
		return createElement('div', {}, [
			//Preview a block with a PHP render callback
			createElement( ServerSideRender, {
				block: 'ibr-test-blocks/post-title',
				attributes: attributes
			} ),
			//Block inspector
			createElement( InspectorControls, {},
				[
					//A simple text control for post id
					createElement(TextControl, {
						value: attributes.title,
						label: __( 'Post Title' ),
						onChange: changeId,
						type: 'text'
					}),
					//Select heading level
					createElement(SelectControl, {
						value: attributes.heading,
						label: __( 'Heading' ),
						onChange: changeHeading,
						options: [
							{value: 'h2', label: 'H2'},
							{value: 'h3', label: 'H3'},
							{value: 'h4', label: 'H4'},
						]
					})
				]
			)
		] )
	},
	save(){
		return null;//save has to exist. This all we need
	}
});
