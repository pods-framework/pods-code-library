<?php
/**
 * If $pieces is not returned post will not be updated.
 *
 * This example checks the value of a number field to ensure it is greater than zero. If it is greater than zero $pieces is returned, which allows the post to be updated. If not wp_die is used to throw an error and prevent post updating.
 *
 * Be sure to change 'frogs' at the end of the filter name to the name of your Pod.
 */
add_filter( 'pods_api_pre_save_pod_item_frogs', 'slug_num_not_zero', 10, 2);
function slug_num_not_zero($pieces, $is_new_item) {

	//get the value of the 'number_of_frogs' field into $num
	$num = $pieces[ 'fields' ][ 'number_of_frogs' ][ 'value' ];

	//if $num is greater than 0 return, which updates post.
	if ( $num > 0 ) {
		return $pieces;
	}
	else {
		//if not throw an error.
		wp_die( 'You shall not pass!');
	}

}