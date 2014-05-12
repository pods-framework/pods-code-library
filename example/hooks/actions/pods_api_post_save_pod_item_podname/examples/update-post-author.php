<?php
/**
 * Update Post Author To Current User
 */
add_action('pods_api_post_save_pod_item_inventory_request', 'slug_author_save_function', 10, 3);

function slug_author_save_function($pieces, $is_new_item, $id ) {

	if ( ! wp_is_post_revision( $id ) ){

		remove_action('pods_api_post_save_pod_item_inventory_request', 'slug_author_save_function');

		$user_ID = get_current_user_id();

		$my_args = array(
			'ID' => $id,
			'post_author' => $user_ID
		);

		wp_update_post( $my_args );

		add_action('pods_api_post_save_pod_item_inventory_request', 'slug_author_save_function');
	}

}