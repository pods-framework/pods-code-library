<script>
{
    "title": "Using Pods To Create A User Directory",
    "excerpt": "In this tutorial series you will learn how to use Pods to make a user directory by adding new fields to the user profiles and outputting them in your theme.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner","adding-custom-fields","extending-existing-content-types","using-pods-in-themes",
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Using Pods To Create A User Directory - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "In this tutorial series you will learn how to use Pods to make a user directory by adding new fields to the user profiles and outputting them in your theme."}
    ]
}
</script>
[caption id="attachment_178189" align="alignleft" width="300"]<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/09/user_directory.png"><img class="size-medium wp-image-178189" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/09/user_directory-300x196.png" alt="An entry in the completed user directory." width="300" height="196" /></a> An entry in the completed user directory.[/caption]

One of the wonderful things you can do with Pods is to easily enhance and make use of the user fields in WordPress. Pods can extend the WordPress user profiles by adding custom fields in the same way it can extend post types. User fields are easy to play around with and understand when it comes to outputting the information. Once you understand this tutorial, it will be easy for you to adapt this for outputting your custom post types created in other Pods.

For this tutorial we will be creating a user directory with Pods. We will be using Pods to add new fields to the user profile editor in the WordPress back-end. We will then use this data to create a front-end members list and a profile page for each user. This tutorial could easily be adapted to serve several purposes, such as:
<ul>
	<li>A list of members of your organization.</li>
	<li>An employee directory.</li>
	<li>A list of guest authors on your blog.</li>
</ul>
I will discuss making these adaptations and other modifications, including restricting access to this information in the last section of the tutorial "Additional Options."

Our directory is going to show the user's name, email address, website, picture (separate from their Gravatar,) street address, phone number, email, Twitter profile and Linkedin profile. We will create new fields in the user profile editor for the options that don't exist and use the existing fields, such as email and website, when possible.
