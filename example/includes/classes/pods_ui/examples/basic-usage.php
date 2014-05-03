<?php
/**
 * Pass an array to pods_ui() with the name of the Pod in the 'pod' key
 */
$ui = array(
	'pod' => 'yourpod',
	'title' => 'My Pod',
	'add_fields' => array( 'name', 'body' ),
	'edit_fields' => array( 'name', 'body', 'approved' )
);

pods_ui( $ui );

/**
 * Pass an array to pods_ui() with a Pods object as the 'pod' key
 */
$object = pods( 'yourpod' );

$ui = array(
	'pod' => $object;
    'title' => 'My Pod',
    'add_fields' => array( 'name', 'body' ),
    'edit_fields' => array( 'name', 'body', 'approved' )
);

pods_ui( $ui );

/**
 * Pass a Pods object to pods_ui();  you can set the Pods->ui array directly on the Pods object
 */
$object = pods( 'yourpod' );

$object->ui = array(
	'title' => 'My Pod',
	'add_fields' => array( 'name', 'body' ),
	'edit_fields' => array( 'name', 'body', 'approved' )
);

pods_ui( $object );

/**
 * Pass a Pods object to pods_ui();  you can set the Pods->ui array directly on the Pods object
 */
pods_ui( 'pod=yourpod&title=My%20Pod&add_fields=name,body&edit_fields=name,body,approved' );

/**
 * All args in one line
 */
pods_ui( 'pod=yourpod&title=My%20Pod' );