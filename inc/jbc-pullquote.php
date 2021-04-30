<?php
// Pull Quotes
add_action( 'init', 'jbc_pullquotes' );
function jbc_pullquotes() {
	add_filter( 'mce_external_plugins', 'jbc_add_buttons' );
	add_filter( 'mce_buttons', 'jbc_register_buttons' );
}
function jbc_add_buttons( $plugin_array ) {
	$plugin_array['pullquote'] = get_template_directory_uri() . '/js/pullquote.js';
	return $plugin_array;
}
function jbc_register_buttons( $buttons ) {
	array_push( $buttons, 'pullquote' ); // pullquote'
	return $buttons;
}
