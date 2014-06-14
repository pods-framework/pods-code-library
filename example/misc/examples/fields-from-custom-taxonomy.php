<?php
/**
 * Get all taxonomy terms of a custom post type, and show custom fields for each term.
 *
 * Designed to be used in single item view of a post type Pod associated with a custom taxonomy.
 */
//set name of custom taxonomy we want to show fields of
$taxonomy = 'genre';

//get all terms of current post in that taxonomy
global $post;
$terms = wp_get_post_terms( $post->ID , $taxonomy );



//Put term ids in an array.
foreach ( $terms as $term ) {
	$ids[ ] = $term->term_id;
}

//query by term_id(s)
$params = array (
	'where' => 't.term_id IN( " ' . $ids . '" )',
	'limit' => 5,
);


//build pods object
$taxonomy = pods( 'CUSTOM_TAXONOMY_NAME', $params );

//loop if there are matching terms, if there are not something ver wrong has heppened.
if ( $taxonomy->total() > 0 ) {
	while ( $taxonomy->fetch() ) {

		//echo custom field of taxonomy
		echo $taxonomy->display( 'genre_name' );
	}

	//paginate if needed
	echo $taxonomy->pagination();

}
