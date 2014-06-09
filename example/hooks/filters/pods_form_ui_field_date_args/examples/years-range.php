<?php
/**
 * Set date field year range to 100 years before and 1 year after today (possible use: birthdays).
 */

add_action( 'pods_form_ui_field_date_args', 'slug_date_args' );
function slug_date_args( $args ) {

	$args[ 'yearRange' ] = '-100:+1';

	return $args;
}
