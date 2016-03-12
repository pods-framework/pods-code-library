<script>
{
    "title": "Using The pods_s Starter Theme"
    "excerpt": "An introduction to the pods_s, as starter theme or resource for your own theme development.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner","using-pods-in-themes"
        ]
    },
    "customFields": [
        {"key":"_yoast_wpseo_title", "value": "Using The pods_s Starter Theme - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "An introduction to the pods_s, as starter theme or resource for your own theme development."}
    ]
}
</script>

The pods_s starter theme is designed to make it easy to show your Pods content in a theme or to be a resource for how to modify your theme to display Pods-created content. In this tutorial I will show you how it builds Pods objects automatically in each template, without having to specify the Pod name, how its smart template part system works, and how it implements fragment caching, as well as Pods object caching for improved performance. In addition, I will show you how simple it is to use the theme as is, plus CSS for your Pods-powered site.

pods_s is forked from _s (underscores) by Automattic and like _s, it has very minimal CSS. Its stylesheet is full of classes and IDs that a theme will need to define, with little style added to those classes and IDs.


### How Pods Objects Are Built

##### Using 'pods()' Without Setting Content Type
Since Pods 2.4, Pods objects can be built without specifying the Pod name in `pods()`. When the name is not set, Pods will automatically detect the current content type being displayed and attempt to build a Pods object using the name of that content type. Since the current content type may not be a Pod, in pods_s `$strict` the third parameter of `pods()`, is set to true. In strict mode `pods()` will return false when a Pods object can not be built.

Because of the possibility that the variable the Pods object is saved in may be false, it is important to test that it is not before using it. In pods_s, each main template has a Pods object available in the variable `$pods`. Before using `$pods` always check that it is not false with `if ( $pods )` or similar test to avoid calling methods of the Pods class on a non-object and experiencing errors.

##### Getting Items Based On WordPress Pagination
Since, on non-single item views the Pods object is used in parallel with the WordPress loop, it makes sense to get only the items that will be used on the current page of results. This is accomplished by using the 'limit' and 'page' parameters of `Pods::find()`. Both of these options are added to the `Pods::find()` params array using the function [`pods_s_current_items_params()`](https://github.com/pods-framework/pods_s/blob/a0bb7f1ca7191c75430199d94821588eb6cd2b47/inc/pods_s.php#L289-L356), which also sets the cache arguments, which is discussed in the next section.

In order to get the same number of items, per page, the 'limit' parameter is set equal to the WordPress option 'posts_per_page', using `get_option'. Of course, we also need to make sure, if we are in paged results that we get the right set of results. [`pods_s_current_items_params()`](https://github.com/pods-framework/pods_s/blob/a0bb7f1ca7191c75430199d94821588eb6cd2b47/inc/pods_s.php#L289-L356) also determines the current set of results, based on the 'paged' query_var, using `get_query_var( 'paged' )`.

##### Caching Pods Objects

[`pods_s_current_items_params()`](https://github.com/pods-framework/pods_s/blob/a0bb7f1ca7191c75430199d94821588eb6cd2b47/inc/pods_s.php#L289-L356) also is used to set the cache mode and expiration for your Pods objects. This function sets the parameters 'cache_mode' and 'expires' which are required to cache Pods objects. Here is a general example of how to set these parameters:

```php
partial(/example/classes/Pods/find/examples/cache-query.php)
```

In pods_s, the two cache parameters are set using the functions `pods_s_cache_mode()` and `pods_s_cache_expires()`. For more information on these functions, see "Changing Cache Mode and Cache Expiration" below. You can also change cache mode, only for Pods object cache, without affecting the partial page caching system discussed below using the 'pods_s_current_items_params'. For example to prevent caching for the Pod 'trophies' you could use this filter and callback:

```php
add_filter( 'pods_s_current_items_params', 'slug_dont_cache_trophies', 10, 3 );
function slug_dont_cache_trophies( $params, $content_type, $pod ) {
    if ( $pod === 'trophies' ) {
        $params['expires'] = 0;
    }

    return $params;

}
```

### Templating Options
If you are using the theme, the first thing you need to do is decide if you want to use Pods templates to output your content, or create template parts for your output. I will detail each approach separately below.

##### Using `Pods::fetch()`
Both of these strategies require a slightly diffrent approach to looping and using `Pods::fetch()` then is typically used. Here is a typical example of how `fetch()` is typically used where it fetches each item in order, based on `Pods::find()` ordered the items:

```php
@partial( https://github.com/pods-framework/pods-code-library/blob/502e6c685a4b71911d12bb54d71b569bcc79eb26/example/classes/Pods/field/examples/basic-usage.php#L12-L24 )
```

We can also set an ID in `fetch()` to specify a specific item. This is useful when used inside of a normal WordPress loop, like you see in pods_s' templates. Here is a simplifeid version of the loop in pods_s templates:

```php
while ( have_posts() ) {
    if ( $pods ) {
        $pods = $pods->fetch( get_the_ID() );
    }
}```

Notice that `fetch()` is used inside of a test to ensure `$pods` isn't false. Since this theme builds Pods objects using strict mode, that variable could be false. As a result, that test is needed to prevent the possibility of attempting to use the method `fetch()` on a non-object, which would return an error.

Once the item is fetched, `$pods` can be used to output items from an individual item using `$pods->display()` or `$pods->find()` like you're used to, but that should be done inside of the template parts. Alternatively `$pods` can now be used to load an individual item using a Pods Template.

##### Using Smart Template Parts
By default pods_s is configured to use Pods smart templates. Pods smart templates work like `get_template_part()`, but allow you to scope variables from the main template into the template part. This allows you to build the Pods object in the main template, and use it in each template part without having to rebuild it in the template part or use global variables.

Here is an example of how a smart template part is loaded:

```php
pods_s_get_template_part( 'content', pods_s_part_by_post_type(), compact( array( 'pods' ) ) );
```

The function `pods_s_part_by_post_type()` is used much like `get_post_format()` is used in normal themes. This function will return the name of the content part, no matter what the content type is. With the default post type posts, it will return the value of `get_post_format()`. The point of this is the ability to name your template parts for your content part. I wrote about [how this system works in typical themes in this tutorial](http://code.tutsplus.com/articles/getting-the-most-of-post-formats-using-post-formats-in-the-loop--wp-34879).

For example, if this template was being used for a content type called 'fruits', it would attempt to load a template part called 'content-fruit.php' and if that doesn't exist, then content.php will be used. I created a sample child theme that shows how this works for two custom post types, one called 'book' and one called 'author' that [you can see here](https://github.com/pods-framework/pods-code-library/tree/master/example/misc/pods_s-child-themes/pods_s-child-smart-parts).

Note that you can pass other variables into your template parts as well. Simply define the variable before loading the template part and add the name of the variable to the array in the third parameter of `pods_s_get_template_part()`. For example to add the global post object:

```php
global $post;
pods_s_get_template_part( 'content', pods_s_part_by_post_type(), compact( array( 'pods', 'post' ) ) );
```

##### Using Pods Templates

Because of the filters available in `pods_s_get_template_part()`, the function that powers pods_s' smart template parts, you can easily output a Pods Template before, after or in place of a smart template part. How to accomplish each of these scenarios is shown below.

The first example uses the 'pods_s_template_part_override' filter, which replaces the part entirely. This filter is very useful for loading template parts from outside of the parent or child theme. The other two examples use the 'pods_s_template_part' filter which runs directly before the template part is outputted.

With both filters, the current Pods object is accessed via the array of data scoped into the template part. Since this variable `$data` is an array, we must select the index called 'pods'. If you have scoped any other data into the template part, it will also be accessible there.

In addition, both filters use the filter argument `$name` to set the name of the Pods Template to the current content type. This value is set, by default, using `pods_s_part_by_post_type()`.

```php

    /**
     * Replace template part with a Pods template of the name of the content type, if one exists.
     */
    add_filter( 'pods_s_template_part_override', 'slug_replace_template_part_with_pods_template', 10, 4 );
    function slug_replace_template_part_with_pods_template( $part, $slug, $name, $data ) {
        $pods = $data[ 'pods' ];
        $pods->ID = $pods->ID();

        $template = $pods->template( $name );
        if ( $template ) {
            return $template;

        }

    }

    /**
     * Output a Pods template of the same name of the content type, if one exists, before the template part.
     */
    add_filter( 'pods_s_template_part', 'slug_pods_template_before_template_part', 10, 4 );
    function slug_pods_template_before_template_part( $part, $slug, $name, $data ) {
        $pods = $data[ 'pods' ];
        $pods->ID = $pods->ID();
        $template = $pods->template( $name );
        if ( $template ) {
            return $template.$part;

        }

    }

    /**
     * Output a Pods template of the same name of the content type, if one exists, after the template part.
     */
    add_filter( 'pods_s_template_part', 'slug_pods_template_after_template_part', 10, 4 );
    function slug_pods_template_after_template_part( $part, $slug, $name, $data ) {
        $pods = $data[ 'pods' ];
        $pods->ID = $pods->ID();
        $template = $pods->template( $name );
        if ( $template ) {
            return $part.$template;

        }

    }
```

### Partial Page Caching
One of the cooler, yet most often overlooked features of Pods is its partial page caching system. I wrote in detail about [Pods' partial page caching capabilities here](http://pods.io/tutorials/partial-page-caching-smart-template-parts-pods/). Partial page caching, also known as fragment caching allows you to cache individual parts of your page separately.

Remember that these items can be cleared from the cache simply by clicking the "Clear Cache" button in Pods Settings. The cache will automatically be cleared whenever any Pods are updated or when Pods settings are changed. The cache mode, and cache expiration are set using the functions `pods_s_cache_mode()` and `pods_s_cache_expires()`. For more information on these functions, see "Changing Cache Mode and Cache Expiration" below.

##### Header, Footer & Sidebar

In pods_s, the header, footer and sidebar are cached using `pods_view()`. This is thanks to replacement functions for `get_header()`, `get_sidebar()` and `get_footer()`. These functions all feature a filter to override which header, sidebar or footer are to be used. Instead of including the header/sidebar/footer files directly, they pass the path for the file to `pods_view()` in order to cache the file directly.

This prevents the queries involved with building these parts of these pages from being run on every page load. When these files contain complex menus or lots of widgets that can add up to a lot of repetitive queries.

##### Smart Template Parts
The smart template parts in pods_s are loaded via the function `pods_s_get_template_part()` which is used the main template files much like `get_template_part()` is used in normal themes. In fact [the logic for finding the path for the template parts](https://github.com/pods-framework/pods_s/blob/5d2805893894f94f9eed6c47fb012c362afe4166/inc/pods_s.php#L242-L253) is copied directly from `pods_s_get_template_part()`. What makes `pods_s_get_template_part()` diffrent, beyond the ability to scope data into the parts, as I discussed above is that the template parts themselves are cached.

For caching these parts `pods_view()` can not be used, as we need to be able to define the key for each part seperately. For this we use `pods_view_set()` and `pods_view_get()`. While Pods has many other functions tied to specific cache types, such as `pods_transient_set()` for transient caching and `pods_cache_set()` for object caching. On the other hand, `pods_view_set()` and `pods_view_get()` allows us to set the cache type as a parameter, which in pods_s is set using the `pods_s_cache_mode()` function discussed above.

In `pods_s_get_template_part()` once we have the path to to the template part, that path is set to `pods_s_template_part_cache()` which creates a cache key and then attempts to retrieve the specified key from the cache. If the part isn't already cached, the smart template is created using `pods_template_part()` and is cached for next time before being returned.

```php
@partial( https://github.com/pods-framework/pods_s/blob/5d2805893894f94f9eed6c47fb012c362afe4166/inc/pods_s.php#L422-L479 )
```
### Changing Cache Mode and Cache Expiration
Both the Pods object caching and the partial page caching in pods_s rely on the functions `pods_s_cache_mode()` and `pods_s_cache_expires()` to set the cache_mode and maximum time to store the item in the cache. Pods can use the object cache, the transient cache or the site transient cache for multisite.

The cache mode and expiration can be changed in one of two ways, using an option and a filter. These options will not be used if the filter is being used. Both settings have an option 'pods_s_cache_mode' and 'pods_s_cache_expires' that can be set to change the value of each of the values globally.

The filters can be used to change these settings globally or conditionally. For example, this filter and callback would change the cache mode to transient globally.

```php
add_filter( 'pods_s_cache_mode', 'slug_use_transient_cache' );
function slug_user_transient_cache( $cache_mode ) {
    $cache_mode = 'transient';
    return $cache_mode;

}
```

This filter and callback, will change cache expiration to 0, which disables caching, only on single item views of a custom post type called 'sleeps':

```php
add_filter( 'pods_s_cache_expires', 'slug_dont_cache_sleeps' );
function slug_dont_cache_sleeps( $expires ) {
    $expires = '0';
    return $expires;

}
```
