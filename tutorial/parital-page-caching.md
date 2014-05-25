<script>
{
    "title": "Partial Page Caching and Smart Template Parts with Pods",
    "excerpt": "Learn to use pods_view for smart template loading and as a caching solution where regular WordPress page caching solutions are not practical.",
    "author": "Josh Pollock",
    "termSlugs": {
            "tutorial_type": [
                "advanced","using-pods-in-themes"
            ]
        },
        "customFields: [
            {"key":"_yoast_wpseo_title", "value": "Partial Page Caching and Smart Template Parts - Pods Framework"},
            {"key":"_yoast_wpseo_metadesc", "value": "Learn to use pods_view for smart template loading and as a caching solution where regular WordPress page caching solutions are not practical."}
        ]
}
</script>

<a href="http://pods.io/docs/code/pods-view/" target="_blank">pods_view()</a> can be used in a similar way to the WordPress function <a href="http://codex.wordpress.org/Function_Reference/get_template_part" target="_blank">get_template_part()</a>, but provides advanced options including the ability to utilize Partial Page Caching to cache the included output into the object cache or transients to improve performance. It can also pass data, such as all or part of your current $pods object to them. There's also a helpful filter that allows you to override what's returned for any instance of <code>pods_view()</code>, which is one of the reasons Pods core uses it for it's field type inputs and other admin / front-end views.
<h3>What Is Partial Page Caching?</h3>
Most of the time when we talk about caching in WordPress we are referring to page caching. Page caching  saves page load time by creating static copies of pages in a WordPress site, so your server doesn't have to run all of the various queries that go into building a page every time it is loaded. Page caching is the right tool for any site that only changes when a post is published or some change is made to the site's appearance, which triggers the page cache to rebuild itself.

For more dynamic sites, for example sites that generate lots of data specific to the currently logged in user, page caching is not a great solution. A good example of a type of site that is ill-served by page caching, is a membership site. Whole/full page caching for logged-in users would mean that "Bill" could see the header of the site and it could say "Welcome, Max" which can lead to a whole slew of bad things including privacy concerns.

<a title="Chris Lema" href="http://chrislema.com" target="_blank">Chris Lema</a> wrote <a title="Managing a High Performance WordPress Membership Site" href="http://chrislema.com/high-performance-wordpress-membership-site/">an article</a> on performance considerations for membership sites that advocates partial page caching, also known as fragment caching. The article provides a great non-technical introduction to partial page caching that I highly recommend, as well as some links to more technical articles on it.
<h3>Parameters For <code>pods_view()</code></h3>
<code>function pods_view( $view, $data = null, $expires = false, $cache_mode = 'cache', $return = false )</code>

The function <code>pods_view()</code> has only one required argument, the file to be included. The file is assumed to be in the theme directory or child theme directory if no path is specified. You can also specify a full path to a file in order to use a file from a plugin file.

<code>pods_view()</code> can pass a set of variables into the template part it is being used to include. This allows you to use a single Pods object, WP_Query object or some other data in both the dynamic, non-cached part of a page and in the cached portion. By using this functionality you can avoid using global variables that can create other types of issues. Use the syntax <code>compact( array( 'your_var_name' ) )</code> for an easy way of passing the variables through, they will be automatically scoped to the included file.

When you set an expiration time in seconds for the third parameter, the default is for <code>pods_view()</code> to use the WordPress object cache. Object caching is usually the best choice, but there are other options such as 'transient', 'site-transient', or 'options-transient'. Set the third parameter to "0" (zero) to cache it indefinitely, or false to disable caching (default).

Keep in mind that WordPress has pre-defined constants for various units of time in seconds, such as 'HOUR_IN_SECONDS'. You can see the <a title="Time constants" href="https://codex.wordpress.org/Easier_Expression_of_Time_Constants" target="_blank">full list of these constants in the codex</a>. The object cache is not persistent and will expire at the end of a request unless a <a href="http://wordpress.org/plugins/tags/caching" target="_blank">persistent cache plugin</a> is installed. I will cover this more fully at the end of this tutorial.

In general you will usually want to use <code>pods_view()</code> to echo the file it is including and that's the default behavior. By setting the final argument <code>$return</code> to true, the output will be returned as a string which allows for further processing before outputting, or for it to be stored in a variable and reused later.

Be sure to check out the documentation page for <a title="Pods View Documentation" href="http://pods.io/docs/code/pods-view/" target="_blank">pods_view</a> as well as <a href="https://github.com/pods-framework/pods/blob/2.x/includes/classes.php" target="_blank">the source</a> for the class itself.
<h3>Example Uses</h3>
<h4>Using Pods View to cache and output an RSS feed include</h4>
In a highly dynamic page that has some part of it generated by an outside source, for example an RSS feed, the outside data can be a major factor on page load times. This examples allows a page to include an RSS feed, included in its own file, that is regenerated every hour instead of on every page load. You can get around loading the external data by using transients or object caching, but this method will also handle all of the processing and markup build process too.

<code>pods_view( 'rss-feed.php', null, HOUR_IN_SECONDS, 'transient' );</code>

Note that transient caching must be used to maintain the cache after the request is finished, unless you have a persistent caching plugin installed.
<h4>Using Pods View as a Partial Page Cache</h4>
<code>pods_view()</code>, which can be used with any type of WordPress data, not just Pods data, is an easy way to section off the less dynamic parts of a otherwise highly dynamic page into a separate template part that can be cached. This reduces the demands on your server, allowing it to more quickly run the database queries for the rest of the site.

A basic example of moving a secondary WP_Query request and caching the content can be seen below, in a Before / After example, with the new WP_Query request going on in the new file, which can now utilize Partial Page Caching.

```php
@partial(/example/includes/pods_view/examples/cache-loop-example.php)
```

Some WordPress template files have a very small amount of user specific data that makes them incapable of using page cache when the majority of the page could be cached. For example, you might want to show posts that are of the most interest to the current user as featured posts, using categories that the user set as favorites, followed by a regular WordPress loop.

The query for favorite posts must be generated based on the logged in user and is omitted for users who are not logged in making page caching impossible. By moving the that block into it's own file and caching using <strong>Cache Keys</strong>, we can cache that list of category posts based on the user's categories. If other users have those same favorite categories, that loop won't have to be re-run or content rebuilt.

Here are before and after examples of how this works:

```php
@partial(/example/includes/pods_view/examples/cache-user-specific.php)
```

<h4>Output Buffering is built-in</h4>
With <code>get_template_part()</code>, you had to hack around the content include and use output buffering, which isn't very complex, but is also prone to error for new developers.

```php
@partial(/example/includes/pods_view/examples/instead-of-ob.php)
```

<code>pods_view()</code> also includes a 5th parameter called $return which you can set to true to return the content instead of the default of automatically echoing onto the page. This is useful if you want to apply filters, evaluate shortcodes, or replace custom template tags in the generated content.

<h4>Cache Keys and caching content from a template based on a variable</h4>
By default, when you use <code>pods_view()</code> caching, it will return that same content anywhere in your theme that you call that cached file. To get around this and to differentiate the file in different ways on different pages or parts of the theme, we've built Cache Keying into Pods 3.0. It works by appending a ?query or #hash to the file name, with how you want the cache grouped. For example, you can use the same restricted content include but cache it based on the user role.

```php
@partial(/example/includes/pods_view/examples/cache-keys.php)
```

<h3>Which Cache Method To Use</h3>
<code>pods_view()</code> supports four options for caching, which are only utilized if <code>$expires</code> is not <code>false</code>.
<ul>
	<li>'cache' (default) uses the WordPress Object Cache (further augmented by <a href="http://codex.wordpress.org/Class_Reference/WP_Object_Cache#Persistent_Cache_Plugins" target="_blank">Persistent Caching plugins</a>) to store the content in memory</li>
	<li>'transient' uses the WordPress <a href="http://codex.wordpress.org/Transients_API" target="_blank">Transients API</a> to store the content in the database (which uses the Object Cache if a Persistent Caching plugin is active), you normally won't want to use Transients for template includes that are large, though the object cache is generally the better option in most cases</li>
	<li>'site-transient' uses the WordPress Transient API to store the content in the database for the whole WordPress network (When WordPress Multisite is configured)</li>
	<li>'option-cache' is new to Pods 2.3.x and operates like an actual option, but can expire like a transient. The difference between the Transient API and this cache type is it can avoid being deleted if a callback returns false (content could not be retrieved) which keeps content still showing even if there was an issue getting the template built. Callbacks are not utilized by <code>pods_view()</code> itself currently, so it will function no different from Transients if used. It exists as a new option for use via new functions <code>pods_option_cache_set( $key, $value, $expires, $group )</code> and <code>pods_option_cache_get( $key, $group, $callback )</code></li>
</ul>
<h3>Different Expirations for Different Folks</h3>
If a different expiration is needed for a logged in user versus an anonymous visitor, <code>pods_view()</code> has that covered too, with Advanced <code>$expires</code> handling.

```php
@partial(/example/includes/pods_view/examples/user-specific-experation.php)
```

<h3>More Information About Partial Page Caching</h3>
<a href="http://tollmanz.com/partial-page-templating-in-wordpress/" target="_blank">Towards a Partial Page Templating System in WordPress</a> by Zack Tollman
<a title="Fragment Caching in WordPress" href="http://markjaquith.wordpress.com/2013/04/26/fragment-caching-in-wordpress/" target="_blank">Fragment Caching In WordPress</a> by Mark Jaquith
