<?php
/**
 * pods_view() has built-in output buffering.
 */

/** WITHOUT pods_view */
// Get file.php content
ob_start();
get_template_part( 'file' );
$content = ob_get_clean();

// Apply a filter
$content = apply_filters( 'filter_name', $content );

// Do shortcodes
$content = do_shortcode( $content );

// Replace a custom tag like {MY_TAG} with something dynamic, great for things specific to the current user or other cases
$content = str_replace( '{MY_TAG}', 'Cool content', $content );

// Output the content
echo $content;


/** WITH pods_view */
// Get file.php and cache it
$content = pods_view( 'file.php', null, HOUR_IN_SECONDS, 'cache', true );

// Apply a filter
$content = apply_filters( 'filter_name', $content );

// Do shortcodes
$content = do_shortcode( $content );

// Replace a custom tag like {MY_TAG} with something dynamic, great for things specific to the current user or other cases
$content = str_replace( '{MY_TAG}', 'Cool content', $content );

// Output the content
echo $content;
