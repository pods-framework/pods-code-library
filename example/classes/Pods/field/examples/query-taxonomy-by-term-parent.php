<?php
/**
* Query a custom taxonomy Pod by term parent
* 
* Two methods are shown, which may or may not have identical results.
*
* If your taxonomy Pod has custom fields, then the first method, using the Pods class will return an object which can access those custom fields. If the taxonomy has custom fields, the object returned by the second method will not be able to access the custom fields.
*
* It your taxonomy Pod has no custom fields, then the two methods are essentially identical, and using get_terms() is probably better.
*
*/
//Using Pods class
$pods = pods( 'download_category', array( 'tt.parent = "6"' ) );

//Using get_terms()
$terms = get_terms( 'download_category', array( 'parent' => 6 ) );


/**
 * Examples illustrating the diffrences described, pressuming the existance of a custom field called "word_count"
 */
 //Using Pods class
$pods = pods( 'download_category', array( 'tt.parent = "6"' ) );
if ( $pods->total() > 0 ) {
  while( $pods->fetch()  {
    //echo the term name
    echo $pods->display( 'name' );
    
    //echo the custom field
    echo $pods->display( 'word_count' );
  }
  
}

//Using get_terms()  
/* IMPORTANT: For demonstration purposes only, will not work */
$terms = get_terms( 'download_category', array( 'parent' => 6 ) );
foreach( $terms as $term ) {
  //echo the term name
  echo $term->name;
  
  //try to echo the custom field like this and you will get an ERROR
  echo $term->word_count;
  
}
  
}
