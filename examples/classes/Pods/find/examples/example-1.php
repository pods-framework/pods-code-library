<?php
/*
Content: Example 1
*/

// Find can be called in one of three ways

// Example #1
$mypod = pods( 'mypod', $params );

// Example #2
$mypod = pods( 'mypod' )->find( $params );

// Example #3
$mypod = pods( 'mypod' );
$mypod->find( $params );

// Here's how to use find()
$params = array(
    'limit' => 3,
    'page' => 2,
    // Be sure to sanitize ANY strings going here
    'where'=>"category.name = 'My Category'"
);

// Run the find
$mypod = pods( 'mypod', $params );

// Loop through the records returned
while ( $mypod->fetch() ) {
    echo $mypod->display( 'name' ) . "\n";
}