<?php
$person = pods( 'people', 'fred-flinstone' );

$all_fields = $person->export();

if ( !empty( $all_fields ) ) {
	foreach( $all_fields as $field => $value ) {
		// You can use pods_serial_comma to output values,
		// even if it's an array
		?>
		<h2><?php echo $person->fields[ $field ][ 'label' ]; ?></h2>
		<p>Value: <?php echo pods_serial_comma( $value, $field, $person->fields ); ?></p>
		<br />
	<?php
	}
}
else
	echo '<strong>No data found.</strong>';