<?php
/**
 * Note: This is needed due to a bug issued here https://github.com/pods-framework/pods/issues/2284
 * The forum thread is: http://pods.io/forums/topic/some-lesson-learned/#post-185783
 *
 * Add Shortcode to generate a pods (template or form) that support a id passed vía GET (this is generic)
 * If we need to work with a related var (sub collection) you can indicate the "related pod" and a "where"
 * clause will be generated
 *    
 * @params
 *   id_get_var   is the id var passed via get that holds the id (i.e: give me a concrete author by its id
 *   related_pod  optional. If exists there's a related field to a one to many relation and is used in combination with id_get_var
 *                this is used to get a collection where subrelated field is equal to the id provided (i.e: all books from and author)
 * @usage
 *   [podsid name="author" form="1" id_get_var="author_id" fields="post_title, type_author" label="Save Author"/]
 *   [podsid name="books" id_get_var="author_id" related_pod="author" template="Books View" limit="10" pagination="1"/]
 */
function get_pod_id_shortcode( $atts, $content="" ) {
	// get the pods form user attributes
	extract( shortcode_atts( array(
		'id_get_var' => 'id',
		'related_pod' => '',
		'name' => '',
		'fields' => '',
		'form' => '0',
		'template' => '',
		'limit' => '',
		'pagination' => '',
		'label' => ''
	), $atts, 'podsid' ) );
	
	// get the id
	$id = pods_v( $id_get_var, 'get', null, true );
	// where
	if($related_pod == '') 
	{
		$where = $id > 0 ? 't.ID = '.$id : '';
	}
	else {
		$where = $id > 0 ? $related_pod.'.id = '.$id : '';
	}
	
	$params = array( 
	    'limit' => $limit,    
		'where' => $where
	);
	
	$_pod = pods( $name, $params );
	
	if($form == 1)
	{
		return $_pod->form( $fields, $label );
	} else {
		return $_pod->template($template, $content);
	}
}
add_shortcode( 'podsid', 'get_pod_id_shortcode' );