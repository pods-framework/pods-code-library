<?php
/**
 * Pods::find() parameters for querying a custom post type 'professor' by a custom taxonomy's slug. Ordered by the value of a custom field.
 */

$params = array(
	'orderby' 	=> 'cf_last_name.meta_value ASC',
	'where'		=> 'faculty_type.slug = "dean" ',
	'limit'		=> -1,
);

$pods = pods( 'professor', $params );
