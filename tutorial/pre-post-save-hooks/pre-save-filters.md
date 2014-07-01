<script>
{
    "title": "Using Pods pre_save Filters",
    "excerpt": "When to use Pods pre_save filters and examples of how they can be used. Part of a series of posts explaining Pods pre and post save hooks.",
    "menu_order": "2",
    "author": "Josh Pollock",
    "termSlugs": {
            "tutorial_type": [
                "advanced"
            ]
        },
        "customFields": [
            {"key":"_yoast_wpseo_title", "value": "Using Pods pre_save Filters - Pods Framework"},
            {"key":"_yoast_wpseo_metadesc", "value": "When to use Pods pre_save filters and examples of how they can be used."}
        ]
}
</script>

Pods pre_save actions are a powerful feature of Pods that allows to modify what is saved in your Pod whenever the Pod is updated, either from the WordPress backend or via the Pods API. In this tutorial I will walk you through some practical uses for pre_save filter. These examples make use of the `$pieces` array that is the primary parameter fo all pre_save filters. If you are not familiar with its contents, you should see [the article in this series that walks you through its contents](/tutorial/pre-post-save-hooks/the-pieces-array.md).


# Examples Of How To Use Pods pre_save Filters
## Changing A Field's Value And Targeting Specific Pods
This is the most basic example of how we change a field's value with a pre_save filter:


```php
@partial(/example/hooks/filters/pods_api_pre_save_pod_item/examples/basic-example.php)
```

The most important thing this illustrates is that each fields value can be set by simply setting `$pieces[ 'fields' ][ 'NAME_OF_FIELD' ][ 'value' ]` equal to a value of your choice. This generic example also shows how to target specific Pods using the params key of the `$pieces` array, which is an object that among other information, contains the name of the Pod being updated. Of course, it would be better to use a pre_save filter that was named for the Pod it was targeting. Targeting a specific Pod this way only makes sense if you want to target two or more Pods, but not all Pods.

This next example shows how to more efficiently target a single Pod:

```php
@partial(/example/hooks/filters/pods_api_pre_save_pod_item_podname/examples/change-field-value.php)
```

The two examples I have shown so far are functionally identical, but the second one is preferable, as it is ignored when all other Pods are being saved.

## Using pre_save Filters To Restrict Values That Can Be Saved
Because pre_save filters must return `$pieces` in order for the item to be updated, you can intentionally prevent it from being returned if certain conditions are not met. This next example, instead of using  `$pieces[ 'fields' ][ 'NAME_OF_FIELD' ][ 'value' ]` to set the value of a field, passes the value being saved into a new variable that is evaluated. If this evaluation returns true, `$pieces` is returned, and the item is updated. On the other hand, if the conditional returns false, an error message is shown to the user instead.

```php
@partial(/example/hooks/filters/pods_api_pre_save_pod_item_podname/examples/prevent-update.php)
```

Keep in mind that `wp_die()` can not be used to throw error messages when the Pod is being saved via AJAX, which is the case when a Pod is created or edited via a Pods Form. In these cases `pods_error()` should be used instead.

## Saving Values From Another Plugin's Custom Fields Into Pods' Fields
Pods is probably not the only plugin which is adding custom fields to your posts. In some cases it might be useful to have these fields as Pods fields. For example, if you wish to use Pods to export all fields from a post into a JSON array, the values set by other plugins will not be included. If they are needed, you can add fields to Pods, without adding them to the post editor,a nd update their values using a pre_save filter.

This example shows how to get the values of the SEO Title and SEO meta description fields that are added by the WordPress SEO by Yoast plugin into Pods fields:

```php
@partial(/example/hooks/filters/pods_api_pre_save_pod_item_podname/examples/values-from-other-plugins.php)
```



