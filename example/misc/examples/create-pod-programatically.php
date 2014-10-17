<?php
/**
 * Add a Pod and a field programmatically.
 *
 * In this case, a custom post type using table storage and a text field is being added.
 */
//set name of Pods
$pod_name = 'frogs';

//Set up the Pod.
//You probably want to set an array of labels
//For Custom Post Types you can choose meta or table storage.
//The latter option requires the table storage componenet.
$params = array(
	'storage' 	=> 'table',
	'type' 		=> 'post_type',
	'name' 		=> $pod_name,
);
//return ID of new Pod into a variable.
$pod_id = pods_api()->save_pod( $params );

//now add a field if it didn't return false.
if ( $pod_id ) {
	//set up field params for a text field. Setting pod name and ID with variables we already populated.
	$params = array(
		'pod_id' 	=> $pod_id,
		'pod' 		=> $pod_name,
		'name' 		=> 'latin_name',
		'type' 		=> 'text',
	);
	$field_id = pods_api()->save_field ( $params );

}

