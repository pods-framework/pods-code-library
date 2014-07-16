<script>
{
    "title": "Understanding the $pieces Array In pre_save and post_save Hooks",
    "excerpt": "Information about the $pieces array parameter in Pods pre_save filters and post_save actions. Part of a series of posts explaining Pods pre and post save hooks.",
    "menu_order": "1",
    "author": "Josh Pollock",
    "termSlugs": {
                "tutorial_type": [
                    "advanced"
                ]
            },
    "customFields": [
        {"key":"_yoast_wpseo_title", "value": "The Pods Pre/Save Hooks $pieces Array- Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Understanding the contents and use of the $pieces array in pre_save and post_save Hooks."}
    ]
}
</script>
Each of the pre_save filters and post_save actions has a parameter `$pieces`, which is an array contains the values being saved as well as additional information about the Pod. In this article, I will walk you though the contents of this array, key by key.

Keep in mind that when using pre_save filters, in order for any saving to happen, `$pieces` must be returned. If not saving will be prevented. This is something you may choose to do intentionally.


## `$pieces[ 'fields' ]`
The first index of the array is 'fields' and it contains the field values being saved. The value to be saved is contained in the index 'value' of the index name for the field. So for example, if your Pod has a field called 'how_extreme', you cna access the value to be saved using `$pieces[ 'fields' ][ 'how_awesome' ][ 'value' ]`. When using a pre_save filter, you can change the value of the field by setting it equal to something. For example, `$pieces[ 'fields' ][ 'how_awesome' ][ 'value' ] = 'Unbelievably awesome.'`.


If saving via the WordPress editor, all fields in the Pod will be contained in this array. If saving via the Pods API, then only the specific fields being saved will be in this array. Fields can be added to the array of fields being used, via the `active_fields` index discussed below.

## `$pieces[ 'params' ]`
This index contains the parameters object sent to PodsAPI::save_pod_item. For example, ` $pieces['params']->pod` would return the name of the current Pod being saved.


## `$pieces[ 'pod' ]`
This index contains and array of information about the Pod, including Pod name, ID and its labels.

## `$pieces[ 'fields_active' ]`
As noted above, when saving via the API, only the specific fields being saved will be accessible via the `$fields` array. This is because only the fields being saved are in the `$pieces[ 'fields_active' ]` array. That means that you can make a change to a field not included in the save initially, by adding it to this index. Here is an example of how to add an item to the 'fields_active' array and then save a value in this field:

```php
@partial(/example/hooks/filters/pods_api_pre_save_pod_item_podname/examples/fields-not-being-saved.php)
```

## `$pieces[ 'object_fields' ]`
An array of fields for a WordPress Object, such as the users object[.

## `$pieces[ 'custom_fields' ]`
These are custom meta fields for content type Pods that are not added by Pods. Their values <em>can not</em> be changed by Pods.

## `$pieces[ 'custom_data' ]`
An array of custom field values being saved, you can change this to add other custom fields to the saving process. Only applies to meta-based content types.
