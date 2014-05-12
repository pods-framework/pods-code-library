<?php
/**
 * All field values are stored in $pieces [ 'fields' ]
 * You can change value before saving by setting the key 'value' for the field.
 */
add_filter('pods_api_pre_save_pod_item_', 'my_pre_save_function', 10, 2);
function my_pre_save_function($pieces, $is_new_item) {

	$pieces[ 'fields' ][ 'my_field' ][ 'value' ] = "some value";

	return $pieces;

}