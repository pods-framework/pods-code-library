<?php
/**
 * Change the title of the Pods custom fields meta box in post editor from the default "More Fields"
 */

add_filter( 'pods_meta_default_box_title', 'slug_pods_metabox_title' );
slug_pods_metabox_title( $title ) {
	$title = __( 'Return of The Jedi', 'pods' );
	return $title;
}
