<?php
/**
 * For Pods using meta storage, the array returned by get_post_meta() can be used with pods_image()
 *
 * NOTE: This example uses get_the_ID(), which only works in the loop. If not in the loop, you must specify the attachment ID some other way.
 */
$img = get_post_meta( get_the_ID(), 'NAME_OF_IMAGE_FIELD', true );
echo '<img src="'. pods_image($img['ID'] ) .'" >';
