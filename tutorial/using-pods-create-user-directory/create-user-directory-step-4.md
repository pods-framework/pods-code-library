<script>
{
    "title": "Step 4: Using Author.php To Show Custom Fields",
    "excerpt": "Now its time to display these fields in the front-end. In this step we will add to, or create the author.php template so it shows information about the author and their posts.",
    "menu_order": "3",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner","adding-custom-fields","extending-existing-content-types","using-pods-in-themes"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Using Author.php To Show Custom Fields - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Showing fields from an extended users Pod in a theme's author.php template. Part of a series on creating a user directory."}
    ]
}
</script>
Now its time to output all of the fun meta data we created in the previous step. If your theme has an author.php template, open it up in your editor. If not, copy author.php from Twenty Twelve, which is the theme I am editing for this tutorial. Normally author.php is used to display all of the posts by an author. Before you start, you should decide if you want to wipe out all of that or not. I will keep it in so that author.php can serve both its original purpose and its new role as a profile page. If you're keeping it, make sure to do everything we are about to do between <a title="WordPress Codex: the_post" href="http://codex.wordpress.org/Function_Reference/the_post" target="_blank">the_post</a> and <a title="WordPress Codex: rewind_posts" href="http://codex.wordpress.org/Function_Reference/rewind_posts" target="_blank">rewind_posts</a>.

Before we start let's get all of the information we need together. To get all of our user meta data we will pass the ID of the current author to <a title="WordPress Codex:  get_userdata" href="http://codex.wordpress.org/Function_Reference/get_userdata" target="_blank">get_userdata</a> using <a title="WordPress Codex: get_the_author_meta" href="http://codex.wordpress.org/Function_Reference/get_the_author_meta" target="_blank">get_the_author_meta</a> and store the information in an array called $user. From there we will put all of the different pieces of data we need into variables we can echo later. To do this, right after the familiar if ( have_posts () ) : at the beginning of the loop let's do this:

```php
partial(example/misc/examples/user-fields-loop.php#L1-L21)
```

We could be using <a title="Pods Code Refence: pods_display" href="http://pods.io/docs/code/pods/display/" target="_blank">pods_display</a> to return the value of the fields we created with Pods. The reason I chose to use <a title="WordPress Codex: get_userdata" href="http://codex.wordpress.org/Function_Reference/get_userdata" target="_blank">get_userdata</a> to populate $user is that it has all of the meta values we need from WordPress generated fields and those we added with Pods. This is possible because Pods, with the exception of when we are using <a title="Advanced Content Types" href="http://pods.io/docs/learn/what-are-advanced-content-types/" target="_blank">Advanced Content Types</a> uses the standard WordPress tables to store data.

Now that we have all of the information about the user we need in these variables we can echo them as needed to create a profile. Below is an example of how to do this with minimal styling.  The only thing out of the ordinary is the working with the avatar field. I am using <a title="Pods Code Reference: pods_image_url" href="http://pods.io/docs/code/field-functions/pods-image-url/" target="_blank">pods_image_url</a> to get the address of the large version of the image that I am using to create a link to the image itself, and <a title="Pods Code Reference: pods_image" href="http://pods.io/docs/code/field-functions/pods-image/" target="_blank">pods_image</a> to return an image tag for the thumbnail that is displayed in the profile.

```php
partial(example/misc/examples/user-fields-loop.php#L22-L48)
```

After that you can rewind_posts and loop through the author's posts, or you can end your loop and be done. Your complete author.php will look something like <a title="complete code for author.php template" href="https://gist.github.com/Shelob9/6504376/raw/becacfc5de3662bb04fbbc0fd4212f7a19a887ee/03.author.php" target="_blank">this</a>. IMPORTANT NOTE: Only users that have published posts have author pages. We will address this in the next step.
