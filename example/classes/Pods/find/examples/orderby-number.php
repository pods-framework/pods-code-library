<?php
/**
 * Because WordPress stores post meta is always stored as a string since meta_value is a longtext field in wp_postmeta, to orderby a number with decimals, you must cast it as decimal in order to sort properly.
 *
 * @see http://dev.mysql.com/doc/refman/5.0/en/cast-functions.html#function_cast
 */
$params = array(
	'page' => 1,
	'limit' => 10,
	'orderby' => 'CAST(product_price.meta_value AS DECIMAL)',
);

$products = pods('products', $params );

