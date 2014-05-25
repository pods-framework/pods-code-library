<?php
/**
 * SEO Fields for Pods advanced content types. Using Static content.
 *
 * Goes in Pods Page precode field.
 */
//setup pods object
$params = array( 'limit' => 1 );
$pods = pods( 'spaceship', $params );

//meta title
$pods->meta['title'] = __( 'Your Meta Title Here', 'text-domain' );

//meta descrioption
$pods->meta['description'] = __( 'Your Meta Description Here', 'text-domain' );;



/**
 * SEO Fields for Pods advanced content types. Using dynamically generated content.
 *
 * Goes in Pods Page precode field.
 *
 * Be sure to note inline comments about fields that are presumed to exist that DO NOT exist by default.
 */
/**Setup Pods Object**/
//get current url
$slug = pods_v( 'last', 'url' );

//get pod name
$pod_name = pods_v( 0, 'url');

//get pods object for current item
$pods = pods( $pod_name, $slug );

/*title field*/
//assumes field name of meta_title exists
$pods->meta[ 'title' ] = __( $pods->field( 'meta_title' ), 'translation-domain' ). '&nbsp;|&nbsp;';

/*meta description*/
//presumes field name of 'meta_desc' exists
$pods->meta[ 'description' ] = __($pods->field( 'meta_desc' ), 'translation-domain' );
$pods->meta_properties[ 'og:description' ] = __($pods->field( 'meta_desc', 'translation-domain' ));

/**Google+ Profile Link**/
//Presumes users is extended with a field called 'google_plus'
//Also presumes ACT has a field called page_author, related to Users
$author = $pods->field('page_author');
echo '<link rel="author" href="'.esc_url( get_the_author_meta( 'google_plus', $author['ID'] ) ).' "/>';

/*OpenGrpah Image*/
//presumes image field called 'picture' exists
//Put the url/ height/ width of imagine into $img
$img = wp_get_attachment_image_src( $pods->field( 'picture.ID' ), 'full' );

//output values from the variables
$pods->meta_properties[ 'og:image' ] = $img[0];
$pods->meta_properties[ 'og:image:width' ] = $img[1];
$pods->meta_properties[ 'og:image:height' ] = $img[2];
