<?php
/**
 * The usage here to target a specific Pod is for the purpose of illustration; if you are targeting a specific Pod it is better to use the pods_api_post_save_pod_item_{podname} filter.
 */
add_action('pods_api_post_save_pod_item', 'my_post_save_function', 10, 3);

function my_post_save_function($pieces, $is_new_item, $id ) {

	if ( $pieces['params']->pod == 'films' ) {

		//get the value of the 'genre' field
		$term = (int) $pieces[ 'fields' ][ 'genre' ][ 'value' ];

		//if there is nothing there set $term to null to avoid errors
		if ( empty( $term ) ) {
			$term = null;
		}

		//Set the term for taxonomy 'genres' with $term
		wp_set_object_terms( $id, $term, 'genres', false );
	}

}