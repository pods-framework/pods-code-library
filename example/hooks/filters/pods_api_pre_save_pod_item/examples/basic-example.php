<?php
/**
 * The usage here to target a specific Pod is for the purpose of illustration; if you are targeting a specific Pod it is probably better to use the pods_api_pre_save_pod_item_{podname} filter.
 */
add_filter( 'pods_api_pre_save_pod_item', 'my_pre_save_function', 10, 2 );
function my_pre_save_function($pieces, $is_new_item) {

	if ( $pieces['params']->pod == 'target_pod_name' ) {
		$pieces[ 'fields' ][ 'my_field' ][ 'value' ] = "some value";
	}

	return $pieces;

}