<?php
/**
 * Set date time field date range to 30 years before and 20 years after today.
 */

add_action( 'pods_form_ui_field_datetime_args', 'slug_date_args' );
function slug_date_args( $args ) {

	$args[ 'maxDate' ] = '+20Y';
	$args[ 'minDate' ] = '-30Y';


	return $args;
}
