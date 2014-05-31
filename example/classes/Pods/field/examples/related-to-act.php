<?php
/**
 * Get items from a related advanced content type and output titles of related items as links
 */

//build pods object
//NOTE: If in a Pods Template, skip this, $obj is already populated with the current Pods object.
$obj = pods( 'POD_NAME', pods_v( 'last', 'url' ) );

//get the value for the relationship field
$related = $obj->field( 'RELATED_FIELD' );

//loop through related field, creating links to their own pages
//only if there is anything to loop through
if ( ! empty( $related ) && is_array($related) ) {
	foreach ( $related as $rel ) {

		//get id for related post and put in id
		$id = $rel[ 'id' ];

		//get value of the field name
		$name = $rel[ 'name' ];

		//get related post permalink
		$permalink = $rel[ 'permalink' ];

    //echo the related post name as link
	//Be sure to change 'RELATED_POD_SLUG' to the slug for the related ACT
    echo '<a href="'.site_url( trailingslashit( 'RELATED_POD_SLUG' ) . $rel[ 'permalink' ] ).'">' . $name . '</a>';

  } //end of foreach

} //endif ! empty ( $related )

?>
