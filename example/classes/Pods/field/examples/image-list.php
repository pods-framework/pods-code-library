<?php
/**
 * For use in single-{post-type}.php or similar situation to list image sources from a Pods multi-select image field. Useful, with a little modification for most jQuery image gallery slideshow plugins. Designed for use with a custom post type. For advanced content types you will probably need to change the index ID to id on.
 */
//get global $post object
global $post;

//get id for current item
$id = $post->ID;

//get pods object for current item.
$pod = pods( 'pod_name', $id);
?>

<ul>
<?php
//get array of all attatched images
$imgs = $pod->field( 'image_field_name');

//make sure there are attatched images
if ( ! empty( $imgs ) ) :
	//loop through the images
	foreach ($imgs as $img ) :

		//get id of the image and output its source url in an image tag
		$id = $img[ 'ID' ]; ?>
		<li>
			<img src="<?php echo wp_get_attachment_url( $id ); ?>" />
		</li>
	<?php
            //end the loop
			endforeach;

//end saftey test.
endif;
?>

</ul>