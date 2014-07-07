<?php
/**
 * Using fetch() with a specified ID to use pods for current item in the loop
 */
if ( have_posts() ) {

	//build pods find params
	//cache so this can be reused on each page of results
	//If not using persistent object caching, set 'cache_mode' => 'transient'
	$params = array(
		'limit' 	=> -1,
		'expires' 	=> DAY_IN_SECONDS,
	);

	//build Pods object without specifying a Pod name
	//in Pods 2.4.1 or later pods() can figure out current post type or taxonomy, etc. on its own.
	$pods = pods( null, $params );

	// Start the Loop.
	while ( have_posts() ) {
		//put $post in a variable
		$post = the_post();

		//fetch current item and store in $pods
		$pods = $pods->fetch( $post->ID );

		//reset pods ID
		$pods->id = $post->ID;

		//include template part from theme
		//this is the equivalent of get_template_part( 'content', 'single' ); except $post and $pods are available for use in the template part now
		pods_template_part( 'content-single', compact( array( 'post', 'pods' ) ) );

		//output a pods template of the same name as this Pod as well
		$template = $pods->template( $pods->api->pod_data[ 'name' ] );
		if ( $template ) echo $template;

	} //end wp loop
} //end if have posts
