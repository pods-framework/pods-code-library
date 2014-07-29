<?php

// Example 1: Using pods_image_url as shortcut

$pods = pods('books', 300);

// Put the entire array of an image field into a variable
$imgfield = $pods->field('image');

// Use var to get the image URL.
$imgurl = pods_image_url($imgfield);

// Outputs image to web page
echo '<img src="'.$imgurl .'">';


// Example 2: Drilling down array to image ID and outputting with a WordPress function

// Create a new object for Books with an ID of 300
$pods = pods('books', 300);

// Put the entire array of an image field into a variable
$imgfield = $pods->field('image');

// Assign a variable to image field ID key
$imgID = $imgfield[ID];

// Display image using the ID stored in $imgID
echo wp_get_attachment_image($imgID);


