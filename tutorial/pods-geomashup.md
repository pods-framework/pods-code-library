Pods user [Maiki](http://interi.org/) previously published an [excellent article](http://interi.org/2014/04/pods-maps/) on how to use the plugin [GeoMashup](http://wordpress.org/plugins/geo-mashup/) with Pods. In it he covered the basics of how to use Pods Fields as the source for the GeoCoding, and how to show all posts in custom post type (CPT) added by Pods on a map.

In this tutorial I will show you how to show a map using posts from a related CPT. An excellent example of when you would want to use this is when showing a single item in a product CPT, that has a related field for stores that have the item in stock. In this case we don't want to map the product, which is the default behaviour of GeoMashup. Instead, we want to display a map of where you can purchase the product.

### The Code

This is actually very easy, as I will show below. This example below assumes two CPTs, "product" and "store". In the product CPT, there is a field called "stores", which is related to the "store" CPT.

The first step, after building a Pods object for the current post in the product post type, is to get the values for the related field and turn it into a comma separated list of post IDs. These will be passed to GeoMashup and set which posts are outputted on the map. If you are unfamiliar with how to work with relationship fields in Pods, see [my tutorial on that subject](http://pods.io/tutorials/get-values-from-a-custom-relationship-field/).

Once we have the comma separated list of store IDs, we need to set up an array of arguments for GeoMashup. You can see the [GeoMashup documentation](https://code.google.com/p/wordpress-geo-mashup/wiki/TagReference#Map) for more information about these arguments. The important arguments for our needs are 'object_ids' and 'object_name'. For 'object_name' we will use 'post' as these are post IDs, not IDs for some other type of object, such as users. Setting this argument to 'post' is what allows will pass the list of post IDs from the store post type to 'object_ids.'

Here is the complete code to get the map into a variable `$map` which you can echo as needed to output the map.

```php
    //Get Pods object for current item
    global $post;
    $pods = pods( 'product', $post->ID );

    //get stores field
    $stores = $pods->field( 'stores' );

    //create a comma separated list of post IDs.
    foreach( $stores as $store ) {
        $$store_ids[] = $$store[ 'ID' ];
    }
    $store_ids = implode( ',', $$store );

    //setup map args
    $map_args = array (
        'zoom'			=> 8,
        'map_content'   => 'global',
        'object_name'   => 'post',
        'object_ids'    => $store_ids,
        'click_to_load' => false,
    );

    //put map in a variable
    $map = GeoMashup::map( $map_args );
```

### Where To Put This Code

The simplest way to use this code would be in the template for single posts of the product post type. That would be a template, in the active theme called 'single-product.php'.

You could also add this to a single product view using 'the_content' filter. You would want, in the callback to use the conditional test, `if ( is_singular( 'product' ) )`. That would assume that this code only ran on single post type views of the product CPT. When using 'the_content' filter, you could add that code in your theme's functions.php or in a plugin.

### Taking This Further

GeoMashup outputs the map in an iFrame. The iFrame's source url has all of the parameters from the map method of the GeoMashup class as url variables. That means that you can change them via JavaScript and refresh the map in real time. I detailed how I exploited this capability to update the map using the [proximity facet add-on](https://github.com/mgibbs189/facetwp-proximity) for [FacetWP](https://facetwp.com/) [here](https://facetwp.com/forums/questions/3035/recenter-google-map-based-on-location-entered-in-proximity-facet).

