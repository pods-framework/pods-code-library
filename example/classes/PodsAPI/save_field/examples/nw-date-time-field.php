<?php
/**
 * Add a date/time field.
 */
$params = array(
	'pod' => 'children',
	'pod_id' => 42,
	'name' => 'birthdate',
	'type' => 'datetime',
);

$field_id = pods_api()->save_field ( $params );
