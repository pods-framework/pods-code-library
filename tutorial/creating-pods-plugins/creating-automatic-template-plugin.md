<script>
{
    "title": "Creating The Automatic Template Plugin",
    "excerpt": "A practical example of using Pods Extend to create a Pods Plugin and information about how to programmatically display Pods Templates in the front-end.",
    "menu_order": "3",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced", "using-pods-templates"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Using The Pods Extend Starter Plugin - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Creating a Pods plugin is a great way to contribute to the Pods project as well as to add functionality to your Pods-powered site."}
    ]
}

In this tutorial I am going to walk you through the creation of the automatic template display plugin that I created using <a title="Pods Extend starter plugin GitHub repository" href="https://github.com/pods-framework/pods-extend" target="_blank">Pods Extend</a>. The plugin <a title="Plugin GitHub repository" href="https://github.com/pods-framework/pods-frontier-auto-template" target="_blank">Pods Frontier Auto Template</a> adds a tab in the Pods editor to all custom post type and custom taxonomy Pods for the plugin's settings. Then, based on those settings, it automatically outputs a template when that Pod is being displayed.

I am doing this walk through for several reasons:
<ul>
	<li>Give a concrete example of using Pods Extend, the Pods Plugin starter plugin.</li>
	<li>Encourage you to contribute to this plugin or create your own.</li>
	<li>Show how to retrieve Pods settings using the Pods API.</li>
	<li>Show how to output Pods templates in the front-end without using this plugin.</li>
</ul>
This is an advanced tutorial that presumes an understanding of object-oriented PHP development. It covers how this plugin works "under the hood." <strong>If you are looking for simple instructions on how to use the plugin, <a href="http://pods.io/?p=182352" target="_blank">see this tutorial</a>.</strong>
<h3>Setting Up The Options</h3>
<h4>Adding An Options Tab</h4>
To add an options tab to the Pods editor for post types and custom taxonomies, but not any other type of Pod, I added two filter hooks. Both filters use the same callback. For post type Pods I used 'pods_admin_setup_edit_tabs_post_type' and for taxonomies I used "pods_admin_setup_edit_tabs_taxonomy". To add the tab to the editor for all content types I could have used 'pods_admin_setup_edit_tabs' instead.

These filters have three parameters, <code>$tabs</code>, <code>$pod</code> and <code>$addtl_args</code>. In the callback function, I only used <code>$tab</code>. This variable contains all of the tabs set by default in the method admin_setup_edit_tabs in the <a href="https://github.com/pods-framework/pods/blob/2.x/classes/PodsAdmin.php" target="_blank">PodsAdmin class</a>. That means that this filter could also be used to remove a default tab from the editor, or one set by another function hooked to this filter, using <a href="http://us2.php.net/unset" target="_blank"><code>unset()</code></a>.

In the callback, I added one new key to the <code>$tabs</code> array, like this:

```php
$tabs[ 'pods-pfat' ] = __( 'Frontier Auto Display Options', 'pods-pfat' );
```

The name of the key is important as it must match the key in in the options field array. The value of the key in this array sets the name of the tag.

<h4>Adding Option Fields</h4>
In order to add options to the tab I added another filter, 'pods_admin_setup_edit_options'. This filter type also supports adding content type, as well as the pod name to the end in order to target specific content types or specific Pods. For this filter I chose to address all content types and then use the variable <code>$pod</code> that is provided by the filter to determine the content type and modify the <code>$options</code> array separately for post type and taxonomy Pods.

The variable <code>$pod</code> is an array that has a key 'type' that contains the cotnent type of the current Pod. In the callback function, I created a conditional that if that key equals 'post_type' it adds a key of the same name that I added to the <code>$tabs</code> array, with three new fields. If that key's value is 'taxonomy' I add two fields, and if it is neither, I add nothing.

<h3>Retrieving Pods Settings With The API</h3>
Now that all of the settings fields are added, it's time to use the <a title="Pods API" href="http://pods.io/docs/code/pods-api/" target="_blank">Pods API</a> to get those settings back, in order to use them to output the Pods Templates.
<h4>Getting The Names Of All Pods</h4>
If you look in the <a href="https://github.com/pods-framework/pods-frontier-auto-template/blob/master/classes/front-end.php" target="_blank">front-end class of the plugin</a> you will see it has only four methods, besides the <code>__construct()</code> function. This class is really a three step process as the last method, <code>load_template()</code> exists to eliminate redundant code in that third step.

The first step is to get the names of current post type and taxonomy Pods. The Pods API offers a method, <a title="load_pods" href="http://pods.io/docs/code/pods-api/load-pods/" target="_blank"><code>load_pods()</code></a>, that can be used to load the names of all Pods. The example code below shows how to use the function <a href="http://pods.io/docs/code/pods-api/" target="_blank"><code>pods_api()</code></a>to load the PodsAPI class, without specifying a specific Pod, and then use the <code>load_pods()</code> method to load just the names--using the "names" argument--and only taxonomy and post type Pods--using the "type" argument.

```php
@partial(https://github.com/pods-framework/pods-frontier-auto-template/blob/f1c8cbcf579613579c4b8e0a7396d6a08e8e3028/classes/front-end.php#L41-L48)
```

<h4>Getting and Working With Pods Settings</h4>
The second step is to build an array of Pods that have a the auto display mode enabled, along with the name of the templates to use for single and archive view. This method, <code>auto_pods(),</code> starts with the array created in step one and then passes the array through a foreach loop.

That loop builds a Pods API object for each Pod and then, if auto templates are enabled, uses <a href="http://pods.io/docs/code/data-functions/pods-v/" target="_blank"><code>pods_v()</code></a> to extract the values we need from one of the arrays in the Pods API object. All of the Pods' settings that we need are in the array 'pod_data' in the options key. I explained in <a href="http://pods.io/?p=182199" target="_blank">the previous article in this series</a> why <code>pods_v()</code> is the best tool for this sort of job.

Using it allows you to skip using <code>isset()</code> to check if a key exists, which in this case it will not if the setting has never been set. It also allows for a default value to be set, simplifying both the construction of this method's output array and working with it. Since the array is built using variables, and those variables are created with <code>pods_v()</code> if no value has been set, the variable, and therefore the value in the output array is false.
<h4>Using Transient Caching To Improve Performance</h4>
The two previous steps are necessary in this process, but doing them on every single page load doesn't make any sense, since the results will be the same every time, until the settings are changed. For this reason, I used the <a title="WordPress Transients API Documentation" href="http://codex.wordpress.org/Transients_API" target="_blank">transients API</a> in both of these methods to cache the results in the database.

As a result, after the first time these methods are called, instead of building a Pods API object, which involves a fair number of database calls, the plugin just gets the cached results from the database.

If you are new to the Transients API, I recommend you read <a href="http://www.doitwithwp.com/introduction-transients-wordpress/" target="_blank">this series of articles</a> about using it. The article mainly uses WP_Query in its example code, but you can easily substitute other classes, like PodsAPI or Pods, like I do in <a title="Link to relevant source code." href="https://github.com/pods-framework/pods-frontier-auto-template/blob/master/classes/front-end.php#L27-L101" target="_blank">the first two methods in the front-end class.</a>

Of course, whenever Pods settings are updated, it is possible that the cached values are no longer valid. For this reason it is important to clear this cache whenever updating Pods settings.

This is accomplished in the main plugin class, not the front-end class, since that class isn't active when in the admin. <a title="Filter hook in source code." href="https://github.com/pods-framework/pods-frontier-auto-template/blob/3a11a1c5ca876a4ea224879d9cf2f0324eb3f74a/pods-frontier-auto-template.php#L99-L100" target="_blank">The plugin uses WordPress' 'update_option' hook</a> and <a title="Callback function in source code" href="https://github.com/pods-framework/pods-frontier-auto-template/blob/3a11a1c5ca876a4ea224879d9cf2f0324eb3f74a/pods-frontier-auto-template.php#L259-L276" target="_blank">a callback function</a> that checks if one of the options that is always updated when Pods settings are updated is being updated. If so, the transients set by these two methods are deleted.
<h3>Outputting Pods Templates In The Front End</h3>
The result of the first two steps is an array containing the names of each Pod that has auto templates enabled, and the names of the templates to use. The third step is to use that data to retrieve and output the Pods Templates.
<h4>Using A Content Filter To Output Pods Templates</h4>
The method that creates the output for this plugin, <a href="https://github.com/pods-framework/pods-frontier-auto-template/blob/7459093d3fc5ee0f7592299b9085fb6f4450aa1b/classes/front-end.php#L103-185"><code>front()</code></a>, is hooked to <a href="https://codex.wordpress.org/Plugin_API/Filter_Reference/the_content" target="_blank">the_content</a> filter. It determines the current post type and if a single or archive view is called for, and then it attempts to load a template to append to the post's content. The template loader method simply takes the <code>$content</code> variable from the filter, the template name, and the current Pods object and uses <a href="http://pods.io/docs/code/pods/template/" target="_blank">pods::template()</a> to retrieve that template. In order to prevent errors, the result is checked to ensure it is not null before returning it. You can how this works here:

```php
@partial(https://github.com/pods-framework/pods-frontier-auto-template/blob/f1c8cbcf579613579c4b8e0a7396d6a08e8e3028/classes/front-end.php#L198-L226)
```
<h4>How It Works In Pods Frontier Auto Display</h4>
For one of my screencasts, I wrote an example plugin for appending a template to the  post content. It served as the genesis for this project. It is very simple, as it has the post type name and template name hardcoded. It also does not differentiate between the single or archive view. The <a href="https://github.com/pods-framework/pods-frontier-auto-template/blob/7459093d3fc5ee0f7592299b9085fb6f4450aa1b/classes/front-end.php#L103-185">front() method</a> in the front-end class of Pods Auto Display does essentially the same thing as this simple plugin, just with a lot of conditional logic.  It's a good place to start, both for understanding how the more complicated version works and for doing your own version.

```php
@partial(example/classes/Pods/template/examples/post-type-template-plugin.php)
```

If you look <a href="https://github.com/pods-framework/pods-frontier-auto-template/blob/7459093d3fc5ee0f7592299b9085fb6f4450aa1b/classes/front-end.php#L103-185">in the source</a> you can follow the conditional logic. I will not walk you through it here, as determining what post type or taxonomy is currently being displayed is a different topic and the logic should be obvious. It simply determines the current content type being displayed, and if it is a single or archive view of that content, and then attempts to load the template set by the plugin, if one was set.
<h4>Doing This Manually</h4>
This plugin is designed to make it very easy to output Pods Templates in the front-end and every effort has been made to make it as efficient as possible, but if you didn't need the flexibility and interface you could implement the same functionality more efficiently with hardcoded values. If you only had a few post types and templates, you could create one function to handle each condition. With a lot of post types and templates that would create a lot of redundant code. Instead you could turn the front-end class into its own plugin for your site, remove the <code>the_pods()</code> method, and turn the <code>auto_pods()</code> method into an array of the post type and templates. This would greatly increase the efficiency of the plugin.

Also keep in mind that the same system could work without using Pods Templates. Instead of appending Pods Templates to the content, you could append the value of another function where you outputted the custom fields using <code>pods()</code> or <a title="WordPress Codex: get_post_meta" href="https://codex.wordpress.org/Function_Reference/get_post_meta" target="_blank"><code>get_post_meta()</code></a>. You might even want to add a views folder and instead of conditionally appending Templates, append the files in that folder, using <a href="http://us2.php.net/file_get_contents" target="_blank"><code>file_get_contents()</code></a>
