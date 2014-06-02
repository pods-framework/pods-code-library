<script>
{
    "title": "Pods pre_save and post_save Hooks",
    "excerpt": "A series of posts explaining Pods pre and post save hooks."
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Pods pre_save and post_save Hooks - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "A series of posts explaining Pods pre and post save hooks."}
    ]
}
</script>

Pods has a series of hooks that run before and after an item is saved. These hooks, the pre_save filters and post_save actions are powerful tools for modifying the data that Pods saves, or triggering other actions based on what is being saved. There are multiple types of each hook, and each can be created to affect all Pods or just certain ones.

## When To Use pre_save filters or A post_save Action

Because the pre_save filters are run before an item is saved they can be used to change what is saved in the Pod. For this reason, if you are looking to change what is saved in the Pod, or save additional information, you should use a pre_save filter. Alternatively, if your goal is to do something with data that is being save you should use a post_save action so that the two processes can run one after the other.

For example, if you want to change the value of one field, based on the value of another, you would use a pre_save filter. Another reason to use a pre_save filter is because you can prevent saving based on certain conditions. On the other hand, if you want to take a value being saved, and pass it to another function, there is no reason not to wait till after the item is saved and use a post_save action. The post_save action may also be used to do things after an item is updated, no matter what data is being saved.

## Types Of Hooks
For both the pre_save and post_save hooks, there are three types of hooks. Each of which has a variant that affects all Pods, and a variant that is created for each Pod. The first and most general type `pods_api_pre_save_pod_item` and `pods_api_post_save_pod_item` runs whether an item is being created or updated. This type

The second type, `pods_api_pre_create_pod_item` and `pods_api_post_create_pod_item` run only when a new item is created, but not when an existing item is updated. The third type `pods_api_pre_edit_pod_item` and `pods_api_post_edit_pod_item` run when an existing item is edited, but not when a new item is created.

All three types can target specific Pods. For example, while `pods_api_post_save_pod_item` will run when any item, in any Pod is updated, `pods_api_post_save_pod_item_worlds` will only run when an item in the Pod 'worlds' is being edited.

## Parameters
Each of the pre_save filters and post_save actions has, as its parameter the `$pieces` array, which contains information about the Pod, as well as the values being saved as well as a parameter, `$id`, with the ID of the item being updated. The $pieces array is fairly complex and is covered in depth in its own article in this series. The general type `pods_api_pre_save_pod_item` and `pods_api_post_save_pod_item` also has a parameter, `$is_new_item` to determine if a the item being updated is new or not.
