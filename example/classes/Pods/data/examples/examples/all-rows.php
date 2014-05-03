<?php
/**
 * Get all rows for an item and format its output.
 */
$params = array(
	'orderby' => 't.birth_date ASC',
	'where'   => 't.birth_date < "1972"',
	'limit'   => -1 // Return all rows
);

// find() will be called when you give an array to pods()
$people = pods( 'people', $params );

$all_rows = $people->data();

if ( !empty( $all_rows ) ) {
	foreach( $all_rows as $this_person ) {
		?>
		<h2><?php echo $this_person->name; ?></h2>
		<p>Favorite Color: <?php echo $this_person->favorite_color; ?></p>
		<br />
	<?php
	}
}
else
	echo '<strong>No people found.</strong>';