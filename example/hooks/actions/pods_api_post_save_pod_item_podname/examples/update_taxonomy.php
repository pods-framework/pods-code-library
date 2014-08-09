<?php
/**
 * Update Taxonomy With Value Of Field Related To A Taxonomy
 * Takes the value of a single- or multi-select field 'pods_genre' related to the taxonomy 'genre' and updates the taxonomy with the term set in the 'pods_genre' field from the custom post type 'films'.
 */
add_action( 'pods_api_post_save_pod_item_films', 'my_tax_update', 10, 3 );

function my_tax_update( $pieces, $is_new_item, $id ) {

	// get the values of the 'pods_genre' field
	$terms = $pieces[ 'fields' ][ 'pods_genre' ][ 'value' ];

	if ( empty( $terms ) ) {
		// if there is nothing there set $term to null to avoid errors
		$terms = null;
	} else {
		// create an array out of the comma separated values
		// use this code if you want to save a single item only, if you want to save entries from a multi-select field comment this line
		$terms = explode(',', $terms);
		
		// ensure all values in the array are integer (otherwise the numerical value is taken as a new taxonomy term instead of an ID)
        	$terms = array_map('intval', $terms);
	}

	// Set the term for taxonomy 'genre' with $terms
	wp_set_object_terms( $id, $term, 'genre', false );
	
}
