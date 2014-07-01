<?php
/**
 * Basic breadcrumbs for custom post type Pod, using load_pod to get Pod labels.
 *
 * Someone should add handling for posts and pages as well as ACTs to this. Possibly make a plugin.
 */

function slug_post_type_breadcrumb( $divider = '&gt;&gt;' ) {
	$front = slug_link( site_url(), 'Home' );
	if ( is_home() || is_front_page() ) {
		return $front;

	}

	if( is_post_type_archive() || ( is_singular() && get_post_type() !== false ) ) {
		$post_type = get_post_type();
		$pod = pods_api()->load_pod( $post_type );
		if ( !is_string( $pod ) ) {
			$single = $pod->options[ 'single_label' ];
			$plural = slug_link( get_post_type_archive( $post_type ), $pod->label, 'All ' . $single );


			if ( is_post_type_archive() ) {
				return $front . $divider . $plural;

			}

			global $post;
			$single = slug_link( get_permalink( $post->ID ), get_the__title( $post->ID ), 'View '.$single );
			return $front . $divider . $single;

		}
		else {

			return;

		}
	}

}

function slug_link( $link, $text, $title = null ) {
	if ( is_null( $title ) ) {
		$title = $text;
	}
	return '<a href="'.$link.'" title="'.$title.'">'.$text.'</a>';
}


