<?php
/**
 * You can change the type of a field in the form
 *
 * In this example, a text field called "make" is outputted as a pick field, with custom values. This is useful if you want the ability to add any value in the back-end but only want certain values add via a front-end form.
 *
 */

//array of options
//in each key is what will be saved to DB, value is what will be shown in the select
$pick_option = array(
	'ford' => 'Ford',
	'fiat' => 'Fiat',
	'porsche' => 'Porsche'

);

//set up an array of fields
$fields = array(
	'make' => array(
		'type'=> 'pick',
		'pick_object' => 'custom-simple',
		'data' => $pick_options,
	),
	//add additional fields here
);

echo pods( 'cars' )->form( $fields );
