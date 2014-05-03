<?php
/**
 * We have a "books" Pod with "category" and "the_author" as single-select relationship fields, related to "categories" and "authors" Pods
 */

$params = array(
	'where'   => 't.name LIKE "%rings%"',
	'limit'   => -1  // Return all rows
);

// Create and find in one shot
$books = pods( 'books', $params );

if ( 0 < $books->total() ) {
	while ( $books->fetch() ) {
		?>
		<h2><?php echo $books->display( 'name' ); ?></h2>
		<p>Author: <?php echo $books->display( 'the_author' ); ?></p>
		<br />
		<p>Category: <?php echo $books->display( 'category' ); ?></p>
		<br />
	<?php
	} // end of books loop
} // end of found books