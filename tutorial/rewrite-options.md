<script>
{
    "title": "Rewrite Options For Pods Custom Post Types and Taxonomies",
    "excerpt": "Learn how URL rewrite rules settings in Pods to customize the URLs for your custom post types and custom taxonomies in order to fit your needs.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced","using-pods-in-themes"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Pods Rewrite Options For Post Types and Taxonomies - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Learn how URL rewrite rules settings in Pods to customize the URLs for your custom post types and custom taxonomies in order to fit your needs."}
    ]
}
</script>
Pods provides several URL rewrite options that allow you to customize the URLs for items in your custom post types and custom taxonomies in order to fit your needs. In this tutorial, I will go over the various options and what changes they result in.

All of these options are available in the "Advanced Options" tab of the Pods editor.
<h3>Custom Post Types</h3>
[caption id="attachment_180198" align="alignright" width="211"]<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/cpt-rewrite-options.png"><img class="size-medium wp-image-180198" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/cpt-rewrite-options-211x300.png" alt="Rewrite options in Pods editor for custom post type." width="211" height="300" /></a> Rewrite options in Pods editor for custom post type.[/caption]

If you disable the "Rewrite" option, no matter what your WordPress permalink settings are, the permalink structure for your custom post type will be in the form of "example.com/?pod_name=post_slug/". So, for example, if you had a Pod called "foo", with a post, that had the slug "bar" the url would be "example.com/?foo=bar/".  This configuration may be useful to you if you want to make use of the PHP get method. When pretty permalinks are enabled, as is usually the case, you will want to keep the option "Rewrite" enabled, in order to mimic the permalink structure of posts and pages.

A typical "pretty permalinks" setup for WordPress posts will take the form of "http://example.com/blog/post_slug/". With "Rewrite" enabled, and "rewrite with front" enabled, your custom post type's url will be in the form of "http://example.com/blog/pod_name/post_slug/". So, for example, if you had a Pod called "foo", with a post, that had the slug "bar" the url would be "http://example.com/blog/foo/bar". Alternatively, if you disable "rewrite with front" you will get "http://example.com/foo/bar/" which is probably what you wanted.

You do not have to have the Pod name as the first segment of the URL. You can customize what that segment is using the "Custom Rewrite Slug" field. If you were to enter "fighter" in that field, your URL would become "http://example.com/fighter/bar/".

There are also options for "Rewrite With Page Numbers," which adds page numbers for paged posts and "Rewrite Feeds," which enables the rewrite options in your RSS feeds. Note: "Rewrite With Page Numbers" was known as "Rewrite Feeds" prior to Pods 3.0.
<h3>Taxonomies</h3>
[caption id="attachment_180199" align="alignleft" width="320"]<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/tax-rewrite-options.png"><img class="size-grid_4 wp-image-180199 " src="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/tax-rewrite-options-320x200.png" alt="tax-rewrite-options" width="320" height="200" /></a> Rewrite options in Pods editor for custom taxonomy.[/caption]

Custom taxonomies have three rewrite options that function the same way as they do for custom post types. These options are "Rewrite," "Custom Rewrite Slug" and "Allow Front Prepend." Custom taxonomies have one option that custom post types do not have called "Hierarchical Permalinks."

"Hierarchical Permalinks" match the structure of a hierarchical taxonomy. If you have a term in your taxonomy called "foo" with the child term "foo" and select this option the url for the term bar, will be "http://example.com/foo/bar/". If not selected the url for bar will be "http://example.com/bar/". This option has no effect on non-hierarchical  taxonomies.

