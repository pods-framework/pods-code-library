<?php
// Pod is 'rabbits' Pod and it has 8 records

// Let's get 3 items ordered by name
$params = array(
	'limit'   => 3,
	'orderby' => 't.name'
);

$rabbits = pods( 'rabbits', $params );
?>

total_found(): <?php echo $rabbits->total_found(); ?>
total(): <?php echo $rabbits->total(); ?>