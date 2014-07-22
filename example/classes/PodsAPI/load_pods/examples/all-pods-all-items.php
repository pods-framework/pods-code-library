<?php
/**
 * Get every item in every Pod.
 *
 * Use with caution, lots of memory and lots of caching. Could be a really massive query.
 */
//get names and labels of all Pods
$pods = pods_api()->load_pods( array( 'names' => true ) );

$params = array( 'limit' => -1 );
//output all items of each
foreach ( $pods as $name => $label ) {
	$pod = pods( $name, $params );
	if ( $pod->total() > 0 ) {
		//echo Pod label if there are items
		echo '$label';
		//echo titles of items
		while ( $pod->fetch() ) {
			//for ACTs, use $pod->display( 'name' );
			echo $pod->display( 'post_title' );
		}

	}

}
