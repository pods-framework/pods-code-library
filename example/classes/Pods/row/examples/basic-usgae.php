<?php
$people = pods( 'people', 1 );

$all_data = $people->row();

if ( !empty( $all_data ) ) {
	?>
	<p>Favorite Color: <?php echo $all_data[ 'favorite_color' ]; ?></p>
	<br />
	<p>Favorite Ice Cream: <?php echo $all_data[ 'favorite_ice_cream' ]; ?></p>
	<br />
<?php
}

else {
	echo '<strong>No row found.</strong>';
}
