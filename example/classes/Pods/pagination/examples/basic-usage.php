<?php
$pod = pods( 'my_pod' );

$params = array( 'limit' => 15 );

$pod->find( $params );

// Advanced Pagination
echo $pod->pagination( array( 'type' => 'advanced' ) );

// Simple Pagination
echo $pod->pagination( array( 'type' => 'simple' ) );

// Paginate
echo $pod->pagination( array( 'type' => 'paginate' ) );