By default, post type Pods use the same storage method as any WordPress post type. The "main" fields that make up the post object are stored in the "wp_post" table, while all custom fields are stored in the wp_postmeta table. The wp_postmeta table stores each entry as a key value pair, in a separate row.

When a post type Pod uses table storage, which requires a that the table storage component be activate, the "main fields" are still stored in the wp_post table in exactly the same way. This means they are accessible via standard WordPress functions and ensures maximum compatibility with WordPress themes and plugins.

What is diffrent about table post types that use table storage is how the custom fields added by Pods are stored. Instead of using the wp_postmeta table, Pods stores that data in a separate table. All custom fields for each post are stored in one row. This storage is similar to how Advanced Content Types (ACT) work. It gives you much of the performance benefits of using and ACT, with less compatibility issues.

When using table storage, you can not retrieve your custom fields using `get_post_meta()`or similar functions, you must use the Pods class.
