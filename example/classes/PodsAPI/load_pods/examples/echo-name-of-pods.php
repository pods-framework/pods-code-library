<?php
$all_pods = pods_api()->load_pods();
// or $api = pods_api(); and then $api->load_pods(); 

foreach ( $all_pods as $pod ) {
	echo '<p>' . $pod[ 'name ' ] . ' is awesome</p>' . "\n";
}