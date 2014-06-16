<?php
/**
 * pods_form_ui_field_{$type} filters target Pods Form fields by type of field
 *
 * This example adds autocomplete="off" to all text fields to prevent browsers from auto completeing form fields.
 *
 */
add_filter( 'pods_form_ui_field_text', 'slug_no_autocomplete' );
function slug_no_autocomplete( $output ) {
	$output = str_replace( '<input', '<input autocomplete="off"', $output );
	return $output;

}
