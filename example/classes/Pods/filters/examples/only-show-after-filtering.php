<?php
/*
 * All options for additional args are shown for reference. Example gets raw value of first item in 'lightsabers' field.
 */
//setup Pods object
$pods = pods( 'books');
// set fields to be searched
echo $pods->filters( array(
	'fields' => array( 'author'),
) );

// Get the items, search is automatically handled
$pods->find();

//Don't display anything until search is submitted
if ( 0 < strlen( pods_v( 'search' ) ) ) {
	//loop through results, using Pods template for display.
	while ($pods->fetch()) {
		echo $pods->template( 'books_search');
	} //endwhile
} //endif