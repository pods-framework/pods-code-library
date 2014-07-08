<?php
/**
 * Get all child of a specific in a hierarchical post type and output its children.
 *
 * Be sure to set ID of post in 'post_parent' and Pod name in 'post_type'
 */
$args = array(
	'post_parent' => 36,
	'post_type'   => 'jedi',
	'posts_per_page' => -1,
	'post_status' => 'any' );
$children = get_children( $args );
foreach ( $children as $post ){
	echo '<a href="'.get_permalink( $post->ID ).'" >'.$post->post_title.'</a>';
}
