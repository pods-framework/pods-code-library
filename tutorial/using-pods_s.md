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

##### Getting Items Based On WordPress Pagination

##### Caching Pods Objects


### Templating Options
If you are using the theme, the first thing you need to do is decide if you want to use Pods templates to output your content, or create template parts for your output. I will detail each approach separately below.

##### Using Smart Template Parts


##### Using Pods Templates

### Partial Page Caching
One of the cooler, yet most often overlooked features of Pods is its partial page caching system. I wrote in detail about [Pods' partial page caching capabilities here](http://pods.io/tutorials/partial-page-caching-smart-template-parts-pods/). Partial page caching, also known as fragment caching allows you to cache individual parts of your page separately.

In pods_s, the header, footer and sidebar are cached using `pods_view()`.

