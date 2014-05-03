<?php
/**
 * Add my metaboxes for the Books pod
 *
 * $type (string)
 *   The type of object (post_type, taxonomy, media, user, or comment)
 *
 * $name (string)
 *   The name of the object (pod name, post type, taxonomy name,
 *   media, user, or comment)
 */
function my_metaboxes ( $type, $name ) {
	// Add a new meta group for the Books post type
	pods_group_add( 'books', 'Book Information', 'preface,isbn' );

	// Add a new shared meta group to the Books and Other Books post types
	pods_group_add( array( 'books', 'other_books' ), 'Book Information', 'preface,isbn' );
}

// Hook into Pods Metaboxes 
add_action( 'pods_meta_groups', 'my_metaboxes', 10, 2 );