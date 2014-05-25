<script>
{
   "title": "Using Pods post_save Actions",
   "excerpt": "When to use Pods post_save actions and examples of how they can be used. Part of a series of posts explaining Pods pre and post save hooks.",
   "menu_order": "3",
   "author": Josh Pollock,
   "termSlugs": {
               "tutorial_type": [
                   "advanced"
               ]
           },
           "customFields: [
               {"key":"_yoast_wpseo_title", "value": "Using Pods post_save Filters - Pods Framework - Pods Framework"},
               {"key":"_yoast_wpseo_metadesc", "value": "When to use Pods post_save filters and examples of how they can be used."}
           ]
}
</script>

Pods post_save actions offer the same parameters as their pre_save counterparts, but are not able to change the values being saved, as the run too late. Instead, post-save actions are best serve for when a value being saved is passed to some other function or to the Pods API to update another item. These examples make use of the `$pieces` array that is the primary parameter fo all pre_save filters. If you are not familiar with its contents, you should read [the article in this series that walks you through its contents](/tutorial/pre-post-save-hooks/the-pieces-array.md).

## Basic Examples

This basic example, uses the none specific type of post_save action to use the value of a Pods field to set that items taxonomy terms:

```php
@partial(/example/hooks/actions/pods_api_post_save_pod_item/examples/basic-example.php)
```

This example uses `$pieces['params']->pod` to target specific Pods. This strategy really only makes sense if you wanted to target two or more Pods. This next example accomplishes the same thing, but does not run when any Pods, except the 'films' Pod is run:

```php
@partial(/example/hooks/actions/pods_api_post_save_pod_item_podname/examples/update_taxonomy.php)
```

In both examples, we can get the value of a field that was just saved using `$pieces[ 'fields' ][ 'NAME_OF_FIELD' ][ 'value' ]`.

## Updating Built-In Post Fields
Another good use for post_save actions is to update fields in the wp_posts table. This next example doesn't make use of the `$pieces` array at all. Instead it uses the third parameter,`$id` to get the ID of the post being updated and uses it with a standard WordPress function. In this case, that function is `wp_update_post()`, which is being used to set the post's author to the current logged in user.

```php
@partial(/example/hooks/actions/pods_api_post_save_pod_item_podname/examples/update-post-author.php)
```

This next example is similar, except we use the value of a Pods field to set a field in the wp_posts table. Specifically we take the first image in a multi-select image field and save it as the post's featured image:

```php
@partial(/example/hooks/actions/pods_api_post_save_pod_item_podname/examples/set-featured-image.php)
```



