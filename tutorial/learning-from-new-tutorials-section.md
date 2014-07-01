<script>
{
    "title": "Learning From The New Tutorials Section",
    "excerpt": "Code and strategies used in the tutorials section redesign you can use to help display custom post types and custom taxonomies in your WordPress theme.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced","using-custom-taxonomies","using-pods-in-themes","choosing-content-types","getting-started","using-pods-pages"
        ]
    },
    "customFields": [ 
    {"key":"_yoast_wpseo_title", "value": "Learning From The New Tutorials Section - Pods Framework"},
    {"key":"_yoast_wpseo_metadesc", "value": "Code and strategies used in the tutorials section redesign you can use to help display custom post types and custom taxonomies in your WordPress theme."}
    ]
}
</script>

As you might have noticed I did some work on the <a href="http://pods.io/tutorials">tutorials section</a> here on Pods.io recently to improve the organizing of the content. I added a new custom taxonomy, using Pods of course, to organize the tutorials--a custom post type--by user level and by subject. I then created a special template file for the first page of the tutorials section, as well as one for the tutorial_type archive in our theme, along with a handful of functions.

I wanted to share some highlights of the code I wrote, as it shows ways of implementing content from custom post types and custom taxonomies in the front-end. You should note that everything uses standard WordPress functions, and I never build a Pods object once. Even though these are Pods created content types, there is nothing about them that necessitates using special Pods functions, such as additional fields add to the taxonomy or table storage used with the custom post type.
<h3>A Little Background</h3>
<h5>The Pods Tutorials Section</h5>
The tutorial section of Pods.io was created last year to organize, in one place, all of the existing Pods tutorials created by the community, as well as those I was beginning to write. As you can imagine, the Pods website relies heavily on Pods. Back then we added a custom post type called tutorial. One of our developers, Phil Lewis, did some theme customizations to make a nice looking list of tutorials.

Since tutorial is a hierarchical post type, like pages, with parent and children, Phil also wrote some cool code to change the read more button in the post previews to say "View Tutorial" or "View Series" depending on if it was the parent post for a tutorial series or an individual tutorials. Here is the code, that is used in a the template part for tutorial archive post previews that sets the button text:

```php
@partial(/example/misc/examples/check-for-post-children.php)
```

This simple bit of code uses <code>get_post()</code> to get the number of children a post in the tutorial post has, and if it is greater than zero, changes the <code>$button_text</code> variable.
<h5>The New Problem</h5>
The tutorials section was created to solve the problem that there was no central location to find all Pods tutorials. Over time, we created a new problem--too many tutorials in one place. Having too many tutorials, each covering a broad variety of topics, and serving many user levels made it hard to find the right tutorial. To solve this problem, I created the 'tutorial_type' taxonomy.
<h3>Implementing The New Taxonomy</h3>
One goal of this project was to replace the giant list of tutorials with a list of tutorial topics. I wanted to replace the first page of the tutorials archive, with this list, but since I still needed the full list of tutorials and only needed to make a few changes to it the template file that controlled it, I decided to use a template_include filter to change which template file is loaded, based on which page of in the tutorial archive was being shown.

Mark Jaquith has <a href="http://markjaquith.wordpress.com/2014/02/19/template_redirect-is-not-for-loading-templates/" target="_blank">a great article on why template_include filters are a better choice then template_redirect filters</a> that I highly recommend you read.

The callback function for this filter uses the query_var page and the conditional template tag <code>is_post_type_archive()</code> to determine if we are on the first page of the post type archive for tutorial, and if so it includes the template "tutorials-first-page.php". Here is the complete code for the filter and its callback:

```php
@partial(/example/misc/examples/template-include.php)
```

The tutorials first page template is a little odd as it is shown as the tutorial archive, but most of the data comes from the tutorial_type taxonomy. This is why I didn't want to modify the template (archive.php) that would normally be used, as it was a completely different layout.

In my first page template, I generated the two lists of tutorial types using a function reliant on <code>get_terms</code>. At the bottom of the page is a list of tutorial series, which I used WP_Query to create.

The two lists of tutorial types are created via this function:

```php
@partial(/example/misc/examples/list-taxonomy-terms.php)
```

I added this function to the theme's functions.php to avoid having to duplicate the markup in the actual template file. This function creates an object with all terms of the taxonomy 'tutorial_type', whose ids match an array of ids from one of the function arguments <code>$id</code> using <code>get_terms</code>. I then did a foreach loop to create the list of term names (<code>$term-&gt;name;</code>) as links to the term archives (<code>get_term_link( $term );</code>) and the description of the term (<code>term_description( $term-&gt;term_id, 'tutorial_type' );</code>). The idea to use the term description came from Lindsay Branscombe, who is the author of <a href="http://webdesignforidiots.net/tag/pods/">many great Pods tutorials.</a>

The last part of this page lists the series of tutorials. Specifically, I needed all posts in the tutorial custom post type that have child posts, since all tutorial series have a parent post, with the individual parts of the series as children of that post. There is no great way to do this. I ended up using WP_Query to get all tutorials, with parent posts and by looping through the results of that query, I created an array of IDs of their post parents. I then used <code>array_unique()</code> to remove the many duplicate IDs from that array, and used the result to create my output. Here is that function:

```php
@partial(/example/misc/examples/list-parent-posts-only.php)
```

Note that I used the <a href="https://codex.wordpress.org/Transients_API">transients API</a> to cache the final result in the database. This prevents WordPress from having to run the query and the loop to remove duplicate entries every time the page is loaded.
<h5>The Tutorial_Type Archive</h5>
I also created a copy of the theme's archive.php template and called it taxonomy-tutorial_type.php and made a few changes to tweak how the tutorial types are shown. Understanding what template in a theme will be used for a content part is the most important part of working with Pods in your theme. This is why I always recommend that those new to working with custom post types and custom taxonomies in the front-end familiarize themselves with these great resources on the WordPress template hierarchy:
<ul>
	<li><a href="http://wphierarchy.com/">Interactive Guide To The WordPress Hierarchy</a></li>
	<li><a href="https://codex.wordpress.org/Template_Hierarchy"> Codex: Template Hierarchy</a></li>
	<li><a href="http://www.chipbennett.net/themes/template-hierarchy/">Template Hierarchy Flowchart</a></li>
</ul>
<h3>Other Fun Stuff</h3>
<h5>Preventing The Addition Of New Terms</h5>
Since only certain terms from the tutorial_type taxonomy are shown, I didn't want anyone, myself included adding any new terms to the taxonomy. I often see Pods users solving this problem by creating a related field to a custom taxonomy, and updating the value of the taxonomy with a <a href="http://pods.io/docs/code/action-reference/pods_api_post_save_pod_item_podname/">post_save action</a>. That way only existing terms can be used.

That approach works, but it creates a whole new workflow. What I did was use WordPress' "pre_insert_term" filter to throw an error whenever a new term is added to the taxonomy. Here is the filter and callback function for how I did it:

```php
@partial(/example/misc/examples/no-new-terms.php)
```

<h5>Using Custom Rewrite Slugs</h5>
If you have a keen eye, you may notice that the tutorials section is located at pods.io/tutorials/ but the custom post type name is "tutorial." This is because we set, under the advanced options tab in the Pods editor for the tutorial custom post type, a custom rewrite slug of "tutorials." Also, when I created the custom taxonomy for organizing tutorials, I called it "tutorial_type," but when our lead developer Scott was reviewing the redesign he pointed out that the URLs would look better with "tutorial-series," so I created a custom rewrite slug for the taxonomy as well.
<h3>Let Us Know What You Think</h3>
As always, I'm looking for user feedback on how to improve our support resources. So let me know in the comments what you think about what we did and how we can improve. Also, if you have a tutorial of your own to contribute, <a href="http://pods.io/submitting-tutorial-pods-io/">click here to learn how</a>.
