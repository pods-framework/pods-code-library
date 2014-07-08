<?php
/**
 * Get one random item from a Pod. In this case display post_title.
 */
$pods = pods( 'cpt', array( 'orderby' => 'RAND()', 'limit' => 1 )  );
echo $pods->display( 'post_title' );
