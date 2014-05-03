<?php
// Get the book item with an ID of 5
$pod = pods( 'book', 5 );

// Set the author (a user relationship field)
// to a user with an ID of 2
$pod->save( 'author', 2 );

// Set a group of fields to specific values
$data = array(
	'name' => 'New book name',
	'author' => 2,
	'description' => 'Awesome book, read worthy!'
);

// Save the data as set above
$pod->save( $data );


// Let's save another book's data..
// Save the same data from above,
// but for the book with an ID of 4
$pod->save( $data, null, 4 );