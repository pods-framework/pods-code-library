<?php
/**
* Simple Example
*/
// get value from input to a form 
$keyword = like_escape( pods_v_sanitized( 'keyword', 'post' ) ); 

// set up find parameters, where meta field title matches $keyword 
$params = array( 
    'where' => 't.post_title LIKE "%' . $keyword . '%" OR my_field.meta_value = "%' . $keyword . '%"'
 ); 

//search in articles pod 
$pod = pods( 'articles', $params ); 

//loop through results 
if ( 0 < $pods->total() ) { 
    while ( $pods->fetch() ) { 
        echo $pods->display( 'issue' ); 
    } 
} 

/**
* Adding to where clause conditonally
*/
//set a complete where clause using value from a variable.
$where = 't.user = "'.$ID.'"';

//Add an AND, using a variable, if that variable isn't false
if ( $status ) {
	$where .= ' AND t.status = "'.$status.'"';
}
$params = array(
	'where', $where,
	'limit' => 1
);

//use with pods()
$pods = pods( 'pod_name', $params );
