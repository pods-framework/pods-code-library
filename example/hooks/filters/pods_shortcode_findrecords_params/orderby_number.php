<?php
/**
* WordPress stores all meta fields as strings, which causes problems for ordering by numbers. When using Pods::find() directly, this issue can be addressed by casting the field as a decimal, as shown here: https://github.com/pods-framework/pods-code-library/blob/master/example/classes/Pods/find/examples/orderby-number.php
*
* In shortcodes, this strategy is not possible, as MySQL functions can not be used in the WordPress post editor. Instead, you can use the "pods_shortcode_findrecords_params" params filter, as shown below:
*/

/**
* Example to order by a price field properly.
*/
//SHORTCODE [pods name="ofertas" where="idprogram.meta_value='12011' and sessioncheck.meta_value='1'" limit="50" orderby="price.meta_value"  template="oferta"]

add_filter( 'pods_shortcode_findrecords_params', 'slug_orderby_by_price_pods_shortcode', 10, 2 );
function slug_orderby_by_price_pods_shortcode( $params, $pod ) {
  if ( 'ofertas' == $pod->pod && isset( $params[ 'orderby' ] ) && $params[ 'orderby' ] == 'price.meta_value' ) {
    $params[ 'orderby' ] = 'CAST(price.meta_value AS DECIMAL)';
  }
  
  return $params;
}
