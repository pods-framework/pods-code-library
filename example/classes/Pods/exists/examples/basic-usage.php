<?php
/**
 * Test if item with the slug 'my-item-slug' exists.
 */

$slug = 'my-item-slug';

$pod = pods( 'your_pod', $slug );

if ( $pod->exists() ) {
	// the item exists
}
else {
	// the item does not exist
}


/**
 * Test if item with the id of 7 exists
 */

$pod = pods( 'your_pod', 7 );

if ( $pod->exists() ) {
	// the item exists
}
else {
	// the item does not exist
}