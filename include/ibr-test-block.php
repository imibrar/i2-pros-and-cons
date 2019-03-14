<?php
function ibr_post_title_shortcode_handler($atts)
{
	$atts = shortcode_atts([
		'title' => 'Test Title',
		'heading' => 'h3',
	], $atts, 'ibr_post_title');

	if (!in_array($atts['heading'], ['h2', 'h3', 'h4'])) {
		$atts['heading'] = 'h2';
	}
	return "<{$atts['heading']}>{$atts['title']}</{$atts['heading']}>";
}
add_shortcode('ibr_post_title', 'ibr_post_title_shortcode_handler');

add_action('init', function () {
	// Skip block registration if Gutenberg is not enabled/merged.
	if (!function_exists('register_block_type')) {
		return;
	}
	$dir = dirname(__FILE__);

	$index_js = 'ibr-block.js';
	wp_register_script(
		'ibr-post-title',
		plugins_url($index_js, __FILE__),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components'
		),
		filemtime("$dir/$index_js")
	);

	register_block_type('ibr-test-blocks/post-title', array(
		'editor_script' => 'ibr-post-title',
		'render_callback' => 'ibr_post_title_shortcode_handler',
		'attributes' => [
			'title' => [
				'default' => 'Test Title'
			],
			'heading' => [
				'default' => 'h2'
			]

		]
	));
});