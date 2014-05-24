<?php
/**
 * Checks if a post in the tutorial post type has children, and if so changes the values of variables used to create a button.
 */
	global $post;
    global $location;
    global $content;

    // Set the button text and title for single tutorials or series
    $button_text = "View Tutorial";
    $title = get_the_title();
    $params = array(
		'post_type' => 'tutorial',
		'post_parent' => $post->ID
	);
    $children = get_posts( $params );
    if( count( $children ) > 0 ) {
		$button_text = "View Series";
		$title = "Series: " . $title;
	}
?>
