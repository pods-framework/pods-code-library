<?php
// Get the book pod object 
$pod = pods( 'book' );

// To add a new item, let's set the data first 
$data = array(
	'name' => 'New book name',
	'author' => 2, // User ID for relationship field
	'description' => 'Awesome book, read worthy!'
);

// Add the new item now and get the new ID 
$new_book_id = $pod->add( $data );


// If you're already using Pods for another item 
$pod = pods( 'book', 4 );

// You can still an add item without effecting anything 
$new_book_id = $pod->add( $data );