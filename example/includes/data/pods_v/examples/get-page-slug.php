<?php
/**
 * pods_v() can be very useful for retrieving the permalink or slug of an Advanced Content Type and  using it to set the Pods object for a single item. This examples presumes that the "Detail Page URL" field under the "Advanced Options" tab in the Pods Editor is set to "pod_name/{@permalink}/" or any other scheme where the permalink field is the final segment of the URL. Otherwise, you will need to specify the URL segment with an integer, starting from zero.
 */
// get current item
$slug = pods_v( 'last', 'url' );

// get pods object for current item
$pods = pods( 'pod_name', $slug );