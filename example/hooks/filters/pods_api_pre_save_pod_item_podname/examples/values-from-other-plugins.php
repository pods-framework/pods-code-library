<?php
/**
 * Save custom meta fields from another plugin, in this case from WordPress SEO, into Pods fields.
 */
add_filter( 'pods_api_pre_save_pod_item_jedi', 'slug_fields_to_pod', 10, 2 );
function slug_seo_fields_to_pod($pieces, $is_new_item ) {

	$pieces[ 'fields' ][ 'seo_title' ][ 'value' ] = $pieces[ 'custom_fields' ][ '_yoast_wpseo_title' ];
	$pieces[ 'fields' ][ 'seo_description' ][ 'value' ] = $pieces[ 'custom_fields' ][ '_yoast_wpseo_metadesc' ];

	return $pieces;

}
