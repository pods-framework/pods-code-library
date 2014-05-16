<?php
/**
 * Set date field date range to 11 years before and 17 years after today.
 */

add_action( 'pods_form_ui_field_date_args', 'slug_date_args' );
function slug_date_args( $args ) {

	$args[ 'maxDate' ] = '+17Y';
	$args[ 'minDate' ] = '-11Y';


	return $args;
}
