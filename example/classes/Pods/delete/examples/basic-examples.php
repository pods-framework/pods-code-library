<?php
// Get the book item with an ID of 5 
$pod = pods( 'book', 5 );

// Delete the current pod item 
$pod->delete();

// Delete a book pod item with the ID of 2 
$pod->delete( 2 );