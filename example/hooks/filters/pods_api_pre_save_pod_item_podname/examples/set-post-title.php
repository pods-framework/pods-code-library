<?php
/**
 * Set the title of a custom post type Pod, based on the value of other fields, in this case the fields "sandwich" and "beverage" in the Pod "meal"
 *
 * This function only acts when a new item is created, but can be modified to act on all saves.
 */
add_filter( 'pods_api_pre_save_pod_item_meal', 'slug_set_title', 10, 2);
function slug_set_title($pieces, $is_new_item) {
	//check if is new item, if not return $pieces without making any changes
	if ( ! $is_new_item ) {
		return $pieces;
	}

	//make sure that all three fields are active
	$fields = array( 'post_title', 'sandwich', 'beverage' );
	foreach( $fields as $field ) {
		if ( ! isset( $pieces[ 'fields_active' ][ $field ] ) ) {
			array_push ($pieces[ 'fields_active' ], $field );
		}
	}

	//set variables for fields empty first for saftey's sake
	$sandwich = $beverage = '';

	//get value of "sandwich" if possible
	if ( isset( $pieces[ 'fields' ][ 'sandwich' ] ) && isset( $pieces[ 'fields'][ 'sandwich' ][ 'value' ] ) && is_string( $pieces[ 'fields' ][ 'sandwich' ][ 'value' ] ) ) {
		$sandwich = $pieces[ 'fields' ][ 'sandwich' ][ 'value' ];
	}

	//get value of "beverage" if possible
	if ( isset( $pieces[ 'fields' ][ 'beverage' ] ) && isset( $pieces[ 'fields'][ 'beverage' ][ 'value' ] ) && is_string( $pieces[ 'fields' ][ 'beverage' ][ 'value' ] ) ) {
		$sandwich = $pieces[ 'fields' ][ 'sandwich' ][ 'value' ];
	}

	//set post title using $sandwich and $beverage
	$pieces[ 'fields' ][ 'post_title' ][ 'value' ] = $sandwich . ' and ' . $beverage;

	//return $pieces to save
	return $pieces;

}
