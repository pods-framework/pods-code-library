<?php
/**
 * Get posts from a related post type and output titles of related posts as links
 */

//get Pods object for current post
//get_the_id() only works inside the WordPress loop, if not using inside loop set post ID manually or using global $post
$pod = pods( 'pod_name', get_the_id() );

//get the value for the relationship field
$related = $pod->field( 'relationship_field' );

//loop through related field, creating links to their own pages
//only if there is anything to loop through
if ( ! empty( $related ) ) {
	foreach ( $related as $rel ) {

		//get id for related post and put in ID
		//for advanced content types use $id = $rel[ 'id' ];
		$id = $rel[ 'ID' ];

		//show the related post name as link
		echo '<a href="'.get_permalink($id).'">'.get_the_title( $id ).'</a>';

		//get the value for some_field in related post and echo it
		$someField = get_post_meta( $id, 'some_field', true );
		echo $someField;

	} //end of foreach

} //endif ! empty ( $related )

?>
