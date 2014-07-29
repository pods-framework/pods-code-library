<?php
/**
 * Order posts in a post type Pod by reverse order post creation
 */
$params = array(
	'limit' 	=> -1,
	'orderby' 	=> 't.post_date ASC'
);

$pods = pods( 'book', $params );

if ( $pods->total() > 0 ) {
	while ( $pods->fetch() ) {
		echo $pods->display( 'post_title' );
		echo '<br>';
	}
	
}
