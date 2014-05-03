<?php
/**
 * Grab the sidebar and pass a variable to it, without having to set it global (messy)
 */

$my_local = "I'm accessible in sidebar.php, unlike using get_template_part()";

pods_view( 'sidebar.php', compact( array_keys( get_defined_vars() ) );

/**
 * Echo the rss-feed.php file and cache it for future use as a transient for 3600 seconds (60 minutes)
 */
pods_view( 'rss-feed.php', null, 3600, 'transient' );