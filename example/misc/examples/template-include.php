<?php
/**
 * Use the template_includes filter to change template for first page of CPT archive
 */

//include a diffrent template if it the first page of tutorials post archive
add_filter( 'template_include', 'pods_tutorials_page_one_temp_inc' );
function pods_tutorials_page_one_temp_inc( $original_template ) {
	//get current page of posts
	global $wp_query;
	$page = $wp_query->query_vars['paged'];
	if ( is_post_type_archive( 'tutorial' ) && $page == 0  ) {
		return get_stylesheet_directory(). '/includes/tutorials-first-page.php';
	} else {
		return $original_template;
	}
}
?>
