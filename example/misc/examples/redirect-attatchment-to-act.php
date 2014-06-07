<?php
/**
 * Redirect image attachment page to ACT if attached to an ACT.
 *
 * For this to work, you must extend the media library post type, using meta storage and add a field to it called "act_permalink"
 *
 * Also assumes a permalink structure of pod_name/permalink
 *
 * This example uses an ACT called "frogs" and an image field called "img". Be sure to adjust according to your own needs.
 *
 * @see http://codex.wordpress.org/Function_Reference/wp_redirect
 */

//update the field in media when ACT is updated with the item's permalink
add_action( 'pods_api_post_save_pod_item_frogs', 'slug_act_img_rel' );
function slug_act_img_rel( $pieces ) {
	//get value of 'img' field
	$img = $pieces[ 'fields' ][ 'img' ][ 'value'];

	//if it has a value save the value of the permalink field in extended media
	if ( $img !== '' ) {
		$pods = pods( 'media', $img );
		$data = array( 'act_permalink' => $pieces[ 'fields' ][ 'permalink' ][ 'value'] );
		$pods->save( $data );

	}

}

//redirect attachment page to ACT
add_action( 'template_redirect', 'slug_attachment_redirect' );
function slug_attachment_redirect(){

	//only act on attachments
	if ( is_attachment() ){
		//get meta fields for image.
		$meta = get_post_meta( get_queried_object_id() );

		//get the field we set in post_save action
		$act_permalink = $meta[ 'act_permalink' ][0];

		//if it's not empty use to redirect
		if ( $act_permalink !== '' ) {
			wp_redirect( site_url( 'frogs/'.$act_permalink ), 301); exit;
		}
	}
}
