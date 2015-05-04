<?php
/**
* Allow Pods Templates to use shortcodes
*
* NOTE: Will only work if the constant PODS_SHORTCODE_ALLOW_SUB_SHORTCODES is defiend and set to true, which by default it IS NOT.
*/
add_filter( 'pods_shortcode', function( $tags )  {
  $tags[ 'shortcodes' ] = true;
  
  return $tags;
  
});
