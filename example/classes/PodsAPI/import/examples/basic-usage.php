<?php
// Get the API object for 'event' Pod
$api = pods_api( 'event' );

// Setup the data to import 
$data = array(
	0 => array(
		'name' => 'My first event',
		'start_date' => '2009-10-30 08:24:30',
		'attendees' => array( 'Bill Gates', 'Steve Jobs', 'Mario Andretti' )
	),
	1 => array(
		'name' => 'My second event',
		'start_date' => '2012-12-25 06:45:00',
		'attendees' => array( 'Al Gore', 'Bill Clinton' )
	),
	2 => array(
		'name' => 'My third event',
		'start_date' => '2010-01-20 11:59:99',
		'attendees' => array( 'Rick Astley' )
	)
);

// Run the import 
$api->import( $data );


// Get CSV data 
$data = file_get_contents( 'path/to/events.csv' );

// Run the import and set the format to CSV 
$api->import( $data, false, 'csv' );