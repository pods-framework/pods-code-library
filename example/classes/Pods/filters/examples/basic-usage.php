<?php
$pod = pods( 'mypod' );

// Output a filter form with just a text box to search
echo $pod->filters();

// Output a filter form that shows two drop-downs for two relationship fields
echo $pod->filters( array(
	'fields' => array( 'pick_field1', 'another_pick' )
) );

// The same as above, except the submit button text says 'Go'
echo $pod->filters( array(
	'fields' => array( 'pick_field1', 'another_pick' ),
	'label' => 'Go'
) );

// Get the items, search is automatically handled
$pod->find();

// Output the list of the items found
echo '<ul>';

// Loop through items found
while ( $pod->fetch() ) {
	echo "<li>" . $pod->display( 'some_field' ) . '</li>';
}

echo '</ul>';

// Add some pagination
echo $pod->pagination();