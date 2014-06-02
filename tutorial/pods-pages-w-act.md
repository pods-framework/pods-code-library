<script>
{
    "title": "Using Pods Pages With Advanced Content Types",
    "excerpt": "Pods Pages  are used to display content from Advanced Content Types (ACTs) and  should only be used with Advanced Content Types. Because ACTs exist outside of the main WordPress post table, they can not use regular WordPress functions, so attempting to display them with a normal WordPress theme template file would not work, because they can not be retrieved by the the_post(). Pods Pages handles the URL mapping necessary to create pages to display the ACT's content and provide a way to set the title for the page.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced","using-pods-pages"
        ]
    },
    "customFields: [
    {"key":"_yoast_wpseo_title", "value": "Using Pods Pages With Advanced Content Types - Pods Framework"},
    {"key":"_yoast_wpseo_metadesc", "value": "Learn how to use Pods pages to display items from a Pods Advanced Content Type."}
    ]
}
</script>
Pods Pages  are used to display content from Advanced Content Types (ACTs) and  should only be used with Advanced Content Types. Because ACTs exist outside of the main WordPress post table, they can not use regular WordPress functions, so attempting to display them with a normal WordPress theme template file would not work, because they can not be retrieved by the <code>the_post()</code>. Pods Pages handles the URL mapping necessary to create pages to display the ACT's content and provide a way to set the title for the page.
Be sure to check out the <a href="http://pods.io/?p=179973">screencast</a> where I walk you through this process.
<h3>First Steps</h3>
<h4>Enable Components</h4>
Before beginning be sure that you have activated the "Pods Pages" and "Advanced Content Types" components from the components sub menu of the Pods admin menu.
<h4>Set Detail Page URL For ACT</h4>
In the Pods editor, under the "Advanced Options" tab, you will need to set the permalink structure for your ACT's single item detail pages in the "Detail Page URL" field. I recommend that you use "<code>pod-name/{@permalink}</code>". Notice my use of the <code>{@permalink}</code><a href="http://pods.io/docs/build/using-magic-tags/"> magic tag</a> to get the value of the "permalink" field. You can substitute any field from your ACT there that you like, but this is the intended use for the "permalink" field.
<h3>Create Page Templates In Your Theme</h3>
Yes, that's right, we're going to start by creating Page Templates in our theme. In the next step we will create two Pods pages, one for the "list" page to act as an index page for the ACT and one for individual detail pages. These Pods pages will handle the URL mapping and the page titles for the ACT. The rest we will do in the page templates. Working in your theme template allows you to work in a familiar way and take advantage of your IDE. Pods Pages do have fields to handle templating, but writing code in the WordPress back-end is never a great experience, so let's skip it. The only situation I recommend using the precode field is for handling SEO. That process is detailed in my <a title="SEO For Pods Advanced Content Types" href="http://pods.io/?p=179842" target="_blank">tutorial on SEO for ACTs</a>, as well as <a href="http://pods.io/?p=179974">the screencast on the same topic</a>.
<h4>ACT List Page Templates</h4>
Like any WordPress page template you must start your page by identifying the name of the template.

```php
/*
 * Template Name: Pods Single
 */
 ```

You can start your template from scratch or you can use one of your theme files as a starting point. I personally prefer to start from my theme's page.php template and if necessary past the content of the content-page or similar template part into it.

Once you have your starting point, you're going to need to replace the WordPress loop, since functions like <code>get_posts()</code> and <code>have_posts()</code> are not able to return ACTs since they are not stored in the WordPress posts table. Similarly, <code>the_tile()</code> and <code>the_content()</code> are of no use to us.

Before creating our new loop, we will need to get the Pods object itself. For our list page this is easily accomplished with the Pods class. To get the first three items--don't worry there will be pagination later, we can do this:

```php
//set find parameters
$params = array( 'limit' =&gt; 3 );
//get pods object
$pods = pods( 'pod-name', $params );
```

Once we have our Pods object it's time to loop through the items. The beginning of the standard WordPress loop looks roughly like this:


```php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
```

Our Pods loop is going to look very similar. We will use the total method of the Pods class in place of have_posts() by testing that it is greater than zero, and the fetch method in place of the_post() to get each individual items data. Keep in mind that pods::total() is the total number of items returned given parameters. So with the limit we imposed before, the value of <code><a href="http://pods.io/docs/code/pods/total/" target="_blank">pods::total()</a></code> will be less than or equal to 3. On the other hand, the <code><a href="http://pods.io/docs/code/pods/total-found" target="_blank">total_found()</a></code> method will return the number of items in the Pod.

Our loop will begin by testing that <code>pods::total()</code> is greater than zero, which will allow us to return a "nothing found" message or nothing at all if there are no items, instead of a fatal error. After that we start the while loop. It looks like this:

```php
if ( $pods->total() &gt; 0 ) {
while ( $pods->fetch() ) {
```

Be sure to end the loop with two brackets, one for each conditional. In between what you do is up to you. Personally I prefer to use first get all of the field values I need into variables and then output them in inside of my html markup. Remember that pods::display is best for variables that will be echoed or escaped directly and pods::field is best for getting raw data that needs further manipulation.
For example, to get the name of a item, I will do <code>$name = $pods-&gt;display_name();</code> and then I can echo $name, or pass it to a function like or do <code>_e( $name, 'text-domain');</code> later on. On the other hand, when working with images I will use pods::field to get the raw value of the field like this <code>$picture = $pods-&gt;field('picture');</code>. I can then pass <code>$picture</code> to <code>pods_image()</code> or use <code>$picture['ID'];</code> with a WordPress image attachment, for example, <code>echo wp_get_attachment_image( $picture['ID'] );</code>.

```php
@partial(/example/misc/examples/pods-pages-list.php)
```

<h5>Pagination</h5>
Once you've closed the loop, you will want to include pagination. The standard WordPress pagination will not work, but luckily the Pods class includes a pagination method. You can check out the <a href="http://pods.io/docs/code/pods/pagination/">documentation for pods::pagination</a> to learn how to customize it, but for the most part you can just use the defaults. <code>$pods-&gt;pagination()</code> will output the pagination with first, last, next and previous links. Next and previous will link to the same number of items as set in the limit parameter when the Pods object was created.
<h4>ACT Single Item Detail Page Template</h4>
Pretty much everything I explained in the section for the list page applies to the page template for the single item view. The major difference is how we setup the Pods object. We will need to specify a specific item to get and we will have to set it dynamically. Earlier on we set the detail page url to <code>pod_name/{@permalink}</code> and we can now use the value of <code>@permalink</code> to specify the pods item when creating our Pods object.

Pods has a very useful function <code>pods_v()</code>, which among the many other useful things it can do, can give us the last segment of the current URL, which in this case is the permalink. This means we can set up our Pods object like this:

```php
@partial(/example/includes/data/pods_v/examples/get-page-slug.php)
```

Since our permalink structure is 'pod_name/permalink/' we could even set the Pod name dynamically allowing one Page Template to be used in multiple Pods Pages for different ACTs. Presuming you're url works out to be example.com/pod_name/permalink, your code would look like this:

```php
@partial(/example/includes/data/pods_v/examples/dynamic-pod-name.php)
```

Note that if your URL structure is example.com/WordPress/pod_name/permalink then you will need to get the 2nd URL segment, instead of the first, to get the Pod's name. The second URL segment is retrievable with <code>pods_v( 1, 'url');</code> as the numbering begins at 0. With this type of URL structure you would use <code>$pod_name = pods_v( 1, 'url');</code>.
<h3>The Pods Pages</h3>
<h4>ACT List Page Templates</h4>
For your list Pods Page if your ACT is called salads, you will want to call the Pods Page salads. This will allow it to display at example.com/salads. The only other things you need to do in this Pods page is give the page a name in the "Page Title", set the "Page Template" field to the page template you created for this purpose and set the "Associated Pod" field to the Pod it is designed to work with.
<h4>ACT Single Item Detail Page Template</h4>
The single Pods Page will handle the rewrites for you by simply appending /* to the end of the pod name. So continuting with the example of a pod named salads, you would call the single item Pods Page salads/*. The star will be replaced by the value of the "Wildcard Slug" field. To set this value dynamically we can use the <code>{@url.2}</code> special magic tag, which is the equivalent of <code>pods_var( 2, 'url);</code> to get the third (remember we started counting at zero) url segment.

Besides that, the fields we need to set are the same as with the list Pods Page. You will probably want to set the page title dynamically with the <code>{@name}</code> magic tag.

Keep in mind that if you are going to use on Page Template for multiple ACTs, you will need to have identical fields or retrieve your fields inside a test of the value of $pod_name. For example:

```php
if ( $pod_name = 'pod_A' ) {
    $field_value = $pods-&gt;display('some_field_in_pod_A');
}
elseif ( $pod_name = 'pod_B' ) {
    $field_value = $pods-&gt;display('some_field_in_pod_B');
}
else {
$   field_value = null;
}
```

This will also allow you to use <code>if ( ! is_null( $field_value) )</code> as a a safety check to ensure that you have actually gotten the Pods item you wanted and the field is properly populated.

Alternatively you can create a template part for each Pod and include it by passing the <code>$pod_name</code> variable to <code>get_template_part()</code>.

For example:

```php
get_template_part( 'pod', $pod_name );
```

<h3>What About Magic Tags For The Content?</h3>
Don't worry, if you want to use the magic of Pods Templates (see what I did there?) to output your content you can create a Pods Template, just like normal and then show it by using the template method of the Pods class. This is as simple as doing <code>echo $pods-&gt;template( 'template_name' );</code> in the page content field of the Pods page or in the page template.
Here is an example that sets the Pod name automatically, stored in <code>$pod_name</code> like I showed earlier. That variable is then used to output a Pods template of the same name. Please note that I am taking the extra step to to store the Pods template in a variable before echoing it. This allows me to test if anything is set for that variable or not before echoing it, preventing a possible fatal error if there was not a template by the same name as the Pod available.

```php
@partial(/example/misc/examples/pods-page-template.php)
```
