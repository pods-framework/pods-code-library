<?php
/**
 * Set the featured image of a post to the first image from a multi-select image field
 *
 * Note: Pods must be a post type Pod that supports featured images.
 *
 */

//be sure to change "frogs" to the name of your post
add_action( 'pods_api_post_save_pod_item_frogs', 'slug_auto_featured_img', 10, 3 );

function slug_auto_featured_img( $pieces, $is_new_item, $id ) {

	//get the values of the 'img' field
	$imgs = $pieces[ 'fields' ][ 'img' ][ 'value' ];

	//get ID of first index in array
	$img = $imgs[0][ 'ID'];

	//if there is nothing there set $img to null to avoid errors
	if ( empty( $img ) ) { $img = null; }

	//Prepare to update the post's featured image.
	$my_post = array(
		'ID'              => $id,
		'post_thumbnail'  => $img
	);

	//Update the post
	wp_update_post( $my_post );

}
