<?php
/**
 * Search a multi-dimensional array returned by pods::field() query of a multi-select relationship for the index of a specific item ID.
 *
 * Since the key being searched ($search_key) can be changed this function can be used to search by other fields, for example, set $search_key = 'post_title' to search by post title.
 *
 * @param array $field_array The value returned by pods::field()
 * @param int $id Item ID to search for.
 * @param string|int $search_key Optional. Key to search for. Defaults to 'ID', change to other key to search by.
 *
 * @return mixed|string
 */
function slug_search_for_item_id( $field_array, $id, $search_key = 'ID' ) {

	$plucked = wp_list_pluck( $field_array, $search_key );
	$index = array_search( $id, $plucked );

	return $index;

}
