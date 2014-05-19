<?php
/**
 * Get items where a date field's value is after today.
 */
$params = array(
	'where' => "DATE(enddate) >= CURDATE() AND event_type.name='Training'",
	'limit' => 100
);
$Record = pods('event', $params); // find() will automatically be done with a param array supplied
