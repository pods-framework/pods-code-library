<?php
/**
 * Get all taxonomy terms of a custom post type, and show custom fields for each term.
 *
 * Designed to be used in single item view of a post type Pod associated with a custom taxonomy.
 */
//set name of custom taxonomy we want to show fields of
$taxonomy = 'genres';

//get all terms in taxonomy for current post
global $post;
$terms = wp_get_post_terms( $post->ID, $taxonomy );

//Put term ids in an array.
foreach ( $terms as $term ) {
	$ids[] = $term->term_id;
}

//build where clause to query by term_id(s)
$i = 0;
foreach( $ids as $id ) {
	if ( $i === 0 ) {
		$where = 't.term_id = "'.$id.'"';
	}
	else {
		$where .= ' OR t.term_id = "'.$id.'"';
	}

	$i++;

}

//build pods object
$params = array (
	'where' => $where,
	'limit' => 5,
);
$taxonomy = pods( $taxonomy, $params );

//loop if there are matching terms, if there are not something ver wrong has happened.
if ( $taxonomy->total() > 0 ) {
	while ( $taxonomy->fetch() ) {

		//echo custom field of taxonomy
		echo $taxonomy->display( 'genre_name' );
	}

	//paginate if needed
	echo $taxonomy->pagination();

}
