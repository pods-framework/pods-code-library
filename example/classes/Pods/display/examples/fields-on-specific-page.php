<?php
/**
 * Add to page.php to show 2 fields from one Pod on a specific page only
 */
//check if we are on the right page
//CHANGE: $id to page id of page to show these fields on
if ( is_single($id) ) {
	//Put the pod into variable $pod.
	//CHANGE: 'pod_name' to the name of your pod.
	$pod = pods( 'pod_name');

	//check that we have entries in said pod
	if ( 0 < $pod->total() ) {
		while ( $pod->fetch() ) {
			//echo the value for 2 fields.
			//CHANGE: 'feild_1' and 'feild_2' to valid names of fields in your pod
			echo $pod->display( 'field_1' );
            echo $pod->display( 'field_2' );
        } // endwhile
	} // endif have entries
} //endif is_single()