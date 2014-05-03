<?php
/**
 * Add a new applicant
 * Real life example of a function to create a new "applicant" record using data submitted from a form.
 *
 * IMPORTANT: Always sanitize data from forms.
 */

function add_new_applicant () {

	// Get field values from form submission
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];

	$fields = array(
		'first_name'    => $first_name,
		'last_name'        => $last_name,
		'telephone'        => $telephone,
		'email'            => $email
	);

	$new_id = pods( 'applicant' )->add( $fields );

	return $new_id;
}