<script>
{
    "title": "Step 6: Additional Options",
    "excerpt": "Before finishing we will learn how to restrict access to the user directory and limit which users will be in the directory. We will also cover other methods for getting the values of fields that are better suited for when we only need one or two of the fields at a time.",
    "menu_order": "5",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner","adding-custom-fields","extending-existing-content-types","using-pods-in-themes"
        ]
    },
    "customFields": [
        {"key":"_yoast_wpseo_title", "value": "Creating A User Directory: Additional Options - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Additional options including access restrictions when creating a user directory with Pods. Part of a series."}
    ]
}
</script>
<h3>Only Show Certain Users In User's List</h3>
You may only want to show users with a certain role in your directory if, for example, your site allows for subscribers, but you want a directory of contributors. If this is the case, you just need to specify which role in the <a title="WordPress Codex: get_users" href="http://codex.wordpress.org/Function_Reference/get_users" target="_blank">get_users</a> function we are using to build our list. Another option you can employ is to add a boolean field to the user profile called 'Hide Directory'. Here is an example of how to only show users with the role of contributor or higher that we have chosen not to hide from the directory:

```php
<ul>
    <?php
        $args = array(
            'orderby'       => 'user_lastname',
            'role'          => 'contributor'
            'meta_key'      => 'hide_from_directory',
            'meta_value'    => '',
        );
    	$users = get_users($args);
		foreach ($users as $user) {
			echo '<li><a href="' . esc_url( get_author_posts_url($user->ID) ) . '">' . esc_attr($user->user_lastname) . ', ' . esc_attr($user->user_firstname) . '</a></li>';
		}
	?>
</ul>
```

Other fun options you can try include exclude specific users with the 'exclude' argument or filter the list with <a title="WordPress Codex: WP_Query" href="http://codex.wordpress.org/Function_Reference/WP_Query#Custom_Field_Parameters" target="_blank">WP_Query</a>.
<h3>Restrict Access</h3>
In my example we are listing some fairly personal information that you may not want to be made public to just anyone on the internet. You can restrict access to logged in users, with specific roles, by wrapping the profile in a check like this:

```php
<?php
$current_user_id = get_current_user_id();
$current_user = new WP_User ( $current_user_id );

    if ($current_user->roles[0] == 'contributor' || 'administrator') {
		//show profile
    }
    elseif ( ! is_user_logged_in() ) {
        echo '<p><strong>You must be logged in to view the user directory.</strong></p>'
		else {
        echo '<p><strong>Sorry, but you do not have sufficient privileges to view the user directory.</p></strong>'
	}
?>
```

<h3>Getting One Field At A Time</h3>
In previous examples we were getting all of the meta fields for a user at once, which made sense since were using almost all of them. This is overkill if you only need the value of one field. If we need to get a meta value for a post's author we can use <a title="WordPress Codex: get_the_author_meta" href="http://codex.wordpress.org/Function_Reference/get_the_author_meta" target="_blank">get_the_author_meta</a> to show a field's value. Inside the loop we don't even have to specify an ID. When we are listing the value for a field for several users it is better to use <a title="WordPress Codex: get_user_meta" href="http://codex.wordpress.org/Function_Reference/get_user_meta" target="_blank">get_user_meta</a>, which is a very similar function. Here are examples of both functions in action:

```php
@partial(/example/misc/examples/pods-user-fields-twitter.php)
```

The first function uses <a title="WordPress Codex: get_the_author_meta" href="http://codex.wordpress.org/Function_Reference/get_the_author_meta" target="_blank">get_the_author_meta</a> to get the author's twitter profile url and uses it to create a Twitter follow button. This function must be used in the loop and only works for users who are post authors. The second example can be used outside of the loop and for any registered user. It displays a link to their Twitter profile. This function can be easily adapted to show any type of field and can be used inside of other functions as needed.
