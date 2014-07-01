<script>
{
    "title": "Step 5: Creating A List Of Users and Profile Page",
    "excerpt": "Now it is time to create a user directory page on our page. This can be as simple as a list of names with links to author profile pages or a full fledged directory with all of the user's information.",
    "menu_order": "4",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner","adding-custom-fields","extending-existing-content-types","using-pods-in-themes"
        ]
    },
    "customFields": [
        {"key":"_yoast_wpseo_title", "value": "Creating A List Of Users and Profile Page - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Listing users and showing custom fields added with Pods. Part of a series on creating a user directory."}
    ]
}
</script>
For our last step, we will create a custom <a title="WordPress Codex: Custom Page Templates" href="http://codex.wordpress.org/Page_Templates" target="_blank">page template</a> to show a list of all users with links to their user profile pages. The simplest way to do this is with <a title="WordPress Codex: get_users" href="http://codex.wordpress.org/Function_Reference/get_users" target="_blank">get_users</a>. Create a new page template as a copy of page.php, and in place of the loop we will use <a title="Codex: WP_User_Query" href="http://codex.wordpress.org/Class_Reference/WP_User_Query" target="_blank">WP_User_Query</a>  to create a list of users, with their names as links to their user pages. Don't forget to create a new page in WordPress using your new page template.

```php
partial(example/misc/examples/list-users-orderby-meta.php)
```

This simple function gets the users first and last names as well as the links to their profile pages and creates a list of links, ordered by last name. <a title="User list template code" href="https://gist.github.com/Shelob9/6504376/raw/9d3adfc7c18c8755243921cfcec9218f86d00358/05.users-list-template1.php" target="_blank">Click here for the complete user's list template.</a>

Here is where we are going to run into the problem I mentioned above about users without published posts. This may not be an issue for those of you who are using this to show contributors to your site. If you want to show profiles for users that are not authors of posts you will need to add a function to your theme's function.php to show it. The content of this function is the same as the one we used in our author.php. In fact, you probably want to replace all of the identical code in author.php with a call to this function. Its one argument $user is intentionally identical to the variable $user we built in that step. Here is the complete function:

```php
partial(/example/misc/examples/user-display-function.php)
```

Once you've added that function you can use it in your users list template, like so:

```php
<ul>
    <?php
		$users = new WP_User_Query(array(
			'meta_key'=>'last_name',
			'orderby'=>'meta_value',
			'fields'=>'all_with_meta'
		));
		foreach ($users as $user) {
			pods_user_profile_display($user);
		}
	?>
</ul>
```

Here is our new <a title="updated user list template code" href="https://gist.github.com/Shelob9/6504376/raw/bca960da2a00df19fab9aaf5336123b26f92d90f/8.users-list-template1.php" target="_blank">users list template</a> and the updated <a title="Updated author.php code" href="https://gist.github.com/Shelob9/6504376/raw/b7ef6b1c5a9690542cd44e326d16a121cd2502bb/9.author.php" target="_blank">author.php</a>.
