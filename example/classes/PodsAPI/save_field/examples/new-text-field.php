<?php
/*
 * Add a text field to a Pod.
 */
$params = array(
	'pod' => 'jedi',
	'pod_id' => 42,
	'name' => 'species',
	'type' => 'text',
);

$field_id = pods_api()->save_field ( $params );
