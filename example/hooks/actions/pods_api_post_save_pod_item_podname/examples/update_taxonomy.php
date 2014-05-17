<?php
/**
 * Update Taxonomy With Value Of Field Related To A Taxonomy
 * Takes the value of a single-select field 'genre' related to the taxonomy 'genres' and updates the taxonomy with the term set in the 'genre' field from the custom post type 'films'.
 */
add_action( 'pods_api_post_save_pod_item_films', 'my_tax_update', 10, 3 );

function my_tax_update( $pieces, $is_new_item, $id ) {

	//get the value of the 'genre' field
	$term = (int) $pieces[ 'fields' ][ 'genre' ][ 'value' ];

	//if there is nothing there set $term to null to avoid errors
	if ( empty( $term ) ) { $term = null; }

	//Set the term for taxonomy 'genres' with $term
	wp_set_object_terms( $id, $term, 'genres', false );
	
}
