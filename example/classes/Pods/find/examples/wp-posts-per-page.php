<?php
/**
 * Build a Pods object per page of results, based on WordPress pagination.
 *
 * Excellent for building Pods objects on paged archives for CPTs and Taxonomies.
 */
//get current page
$page = get_query_var( 'paged' );

//set to 1 if the query var wasn't set
if ( ! $page ) {
	$page = 1;
}

//build params array, cache for a week.
$params = array(
	//use WordPress setting 'posts_per_page to limit. Fallback to ten if no option is set.
	'limit' 		=> get_option( 'posts_per_page', 10 ),
	'page'			=> $page,
	'expires'		=> WEEK_IN_SECONDS,
);

//build Pods object
$pods = pods( 'jedi', $params );

//loop if we have items
if ( $pods->total() > 0 ) {
	while ( $pods->fetch() ) {
		echo $pods->display( 'post_title' ).'<br />';
		echo $pods->display( 'lightsaber_description' );
	}

	//paginate
	echo $pods->pagination();

}
