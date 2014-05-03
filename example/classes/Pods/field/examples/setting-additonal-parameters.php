<?php
//must specify item ID in $id or substitute pods::find() params
$pods = pods( 'jedi', $id);
$args = array(
	'name' => 'lightsabers',
	'orderby' => null,
	'single' => true,
	'params' => null,
	'in_form' => false,
	'raw' => true,
	'raw_display' => false,
	'display' => false,
	'get_meta' => false,
	'output' => null,
	'deprecated' => false,
	'args' => array() // extra data to send to field handlers
);
$ligthsabers = $pods->field( $args);