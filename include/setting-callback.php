<?php
if ( ! defined( 'ABSPATH' ) ) {	
	exit;	
}
// callback: text field
function myplugin_callback_field_text( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="myplugin_options_'. $id .'">'. $label .'</label>';
	
}