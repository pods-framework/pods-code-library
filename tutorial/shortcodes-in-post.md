<script>
{
    "title": "Single Field and Template Shortcodes in a Pods Extended WordPress Post",
    "excerpt": "Learn how to add two custom fields to the native WordPress post object and insert the custom field data into the post content.",
    "author": "Phil Lewis",
    "termSlugs": {
        "tutorial_type": [
            "beginner"
        ]
    },
    "customFields": [
    {"key":"_yoast_wpseo_title", "value": "Pods Single Field and Template Shortcodes In Posts - Pods Framework"},
    {"key":"_yoast_wpseo_metadesc", "value": "Learn how to add two custom fields to the native WordPress post object and insert the custom field data into the post content."}
    ]
}

### Goal
Add two custom fields to the native WordPress post object and insert the custom field data into the post content. This screenshot shows where we want to end up:
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/marketting-site-export.jpeg"><img class="aligncenter size-medium wp-image-178511" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/marketting-site-export-300x245.jpeg" alt="Marketting Site" width="300" height="245" /></a>
<h5>Extend the WordPress Post</h5>
<ol>
	<li>Pods Admin -&gt; Add New</li>
	<li>Choose "Extend Existing"</li>
	<li>Select Content Type: 'Post Types (Posts, Pages, etc..)'</li>
	<li>Select Post Type: 'Posts'</li>
	<li>Click 'Next Step'</li>
</ol>
This should setup the extended post and take you to the Manage Fields screen. In our example scenario we want two extra fields, each with a drop-down list of a reasonable number of predetermined values. We create the fields as shown and click the "Save Pod" button:
<p style="text-align: center;"><a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d6734322f3833302f657874656e646564706f73742e6a7067.jpeg"><img class="size-medium wp-image-178512 aligncenter" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d6734322f3833302f657874656e646564706f73742e6a7067-264x300.jpeg" alt="Extend the WordPress Post" width="264" height="300" /></a></p>

### Insert Single Fields into the Post Content
We've done everything we need in order to extend WordPress posts to include our custom fields as drop-downs below the post content box. Inserting single fields by field name into our post content is easy with the pods shortcode:
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d673638372f333535312f706f73746669656c6473686f72636f6465732e6a7067.jpeg"><img class="aligncenter size-medium wp-image-178513" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d673638372f333535312f706f73746669656c6473686f72636f6465732e6a7067-297x300.jpeg" alt="Insert Single Fields into the Post Content" width="297" height="300" /></a>
<h5>Creating and Using a Pods Template</h5>
Inserting single fields wherever we want is easy and flexible but we may want a more complex presentation of the information. We might also like to reuse a common layout frequently. Pods Templates are very handy for this situation
<ol>
	<li>Enable "Templates" under the Pods Admin -&gt; Components menu.</li>
	<li>Create a new template as shown:</li>
</ol>
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d673834392f383932342f626173696374656d706c6174652e6a7067.jpeg"><img class="aligncenter size-medium wp-image-178514" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d673834392f383932342f626173696374656d706c6174652e6a7067-300x198.jpeg" alt="Creating and Using a Pods Template" width="300" height="198" /></a>

In our example, we want to put the information in an unordered list with a specific class we can target through CSS if needed. Pods <a title="Magic Tags" href="http://pods.io/docs/build/magic-tags/">Magic Tags</a> are used in Pods Templates as a placeholder for the field we want to insert. Magic Tags are in the format: {@field_name}.

### Insert the Pods Template into Post Content
Inserting the template output into a WordPress post is a simple shortcode with the name of the template:
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d6732322f383232352f706f737474656d706c61746573686f72636f64652e6a7067.jpeg"><img class="aligncenter size-medium wp-image-178515" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/10/687474703a2f2f696d616765736861636b2e75732f612f696d6732322f383232352f706f737474656d706c61746573686f72636f64652e6a7067-297x300.jpeg" alt="Insert the Pods Template into Post Content" width="297" height="300" /></a>
