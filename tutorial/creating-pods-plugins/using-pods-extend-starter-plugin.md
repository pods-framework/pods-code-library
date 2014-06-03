<script>
{
    "title": "Using The Pods Extend Starter Plugin",
    "excerpt": "Creating Pods plugins is a great way to either add custom functionality to your Pods-powered site or to contribute a new feature for all Pods users to take advantage of.",
    "menu_order": "0",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Using The Pods Extend Starter Plugin - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Creating a Pods plugin is a great way to contribute to the Pods project as well as to add functionality to your Pods-powered site."}
    ]
}

Creating a Pods plugin is a great way to contribute to the Pods project as well as to add functionality to your Pods-powered site. On our <a href="http://pods.io/plugins/" target="_blank">plugins page</a> there are many different types of plugins listed. There are three types of Pods Plugins that can be created:
<ul>
	<li><strong>Plugins that extend Pods' capabilities</strong>, such as <a href="http://wordpress.org/plugins/pods-seo/">Pods SEO</a> and <a href="https://github.com/pods-framework/pods-frontier-auto-template">Pods Frontier Auto Template</a></li>
	<li><strong>Plugins that make it easier to use Pods</strong>, such as <a title="CodePress Admin Columns" href="http://www.codepresshq.com/wordpress-plugins/admin-columns/" target="_blank">CodePress Admin Columns</a> and <a title="CSV Importer For Pods" href="http://wordpress.org/plugins/csv-importer-for-pods/" target="_blank">CSV Importer For Pods</a></li>
	<li><strong>Plugins for implementing Pods functionality in your site</strong>- These types of plugins are specific to a site and are used instead of modifying a theme or using the Pods backend functionality alone.</li>
</ul>
Pods Extend is mainly aimed at creating the first type of plugin on that list, one that extends Pods' functionality. Still, some aspects of it as well as parts of this tutorial may be useful for creating any type of Pods plugin that you may need for your own Pods-powered site.
<h3>When Not To Use Pods Extend And An Alternative</h3>
If you are not comfortable with object-oriented php or do not need as complete of a plugin architecture that this starter plugin provides, then Pods Extend may not be the best choice. In many cases you just need a plugin to house custom code for your site that will not be lost when switching themes, which would be the case if you added it to your theme's functions.php.

I have also created a <a href="https://gist.github.com/Shelob9/9979551">simple Pods plugin starter</a>. The main file simply includes a plugin header and one function to include another file. The file is included conditionally if the constant 'PODS_VERSION' is defined. That will evaluate to true if Pods is active and to false if Pods is not.

You can place all custom code in the file that it includes. This will ensure that if Pods is deactivated your custom plugin will gracefully stop working, instead of returning fatal errors because of its use of functions and classes from Pods that no longer exist.
<h3>Getting Started</h3>
Before you begin, you will need your own copy of Pods Extend. I recommend forking the repository on <a title="Pods Extend starter plugin" href="https://github.com/pods-framework/pods-extend" target="_blank">GitHub</a>. That way your plugin is already under version control and ready to be shared with the world when it is done. You can also download the starter plugin as a zip file.
<h4>Renaming</h4>
In the plugin's readme file there are instructions for changing the name of the files, classes, and plugin name. Be sure to follow those steps in order. You will also want to add your own url to the plugin's header in the plugin's main file. Be sure to put your name in the copyright line.
<h4>Choosing Your Hooks</h4>
If you look in the starter plugin's <code>__construct()</code> function, you will see that I have provided you with several example hooks. These cover various places to hook into Pods.

As of the first version, the examples mainly cover back-end functionality. Example hooks are given for adding tabs to the Pods editor, adding options to a tab in the Pods editor, and adding a submenu page to the Pods admin menu. For most front-end implementation you can use a hook from WordPress core.

If you use the included example hooks as starting points for creating your admin interface, be sure to uncomment the ones you need and delete those you do not need. I will cover each one in detail shortly.

There is also, in the classes folder, an example class for creating your own field type. Don't forget to include the file and initialize the class if you plan to use it. Creating custom field types will be the subject of a future tutorial. In the mean time, you can reference how the <a href="https://github.com/pods-framework/pods/tree/2.x/classes/fields" target="_blank">built-in field types are created</a> as examples of how to create your own.
<h4>Removing Code &amp; Resources Not Needed For Your Plugin</h4>
The Pods-Extend plugin is designed to be a starting point for lots of different types of plugins. Once you've planned what you need it is best to get rid of what you do not need. It is doubtful that you will need everything in this plugin.

For example, delete the blank javascript files if your plugin will not need any custom javascript. Don't forget to remove the action and callback function as well.
<h3 id="included-hooks">Using The Provided Hooks</h3>
There is <a href="https://github.com/pods-framework/pods-extend/blob/875e1abfa1129a25aaadac2afb0a55b97d56b514/pods-extend.php#L94-99" target="_blank">a complete example</a> in the starter plugin of how to add an admin tab to the editor for all post type Pods and how to add fields to that tab. There are also several examples of how to add tabs and options for specific Pods or other post types.

This functionality relies on two groups of filters: 'pods_admin_setup_edit_tabs' and 'pods_admin_setup_edit_options'. Both of these filters allow you to target all Pods, Pods of a specific post type, or a specific name. For example, the hook 'pods_admin_setup_edit_options' can be used to add options to all Pods, while 'pods_admin_setup_edit_options_post_type' adds options to all post type Pods, and 'pods_admin_setup_edit_options_advanced_foo' adds options to all Advanced Content Type Pods called foo.

The complete example shows how to add a new tab to the options for all post type Pods. The <a href="https://github.com/pods-framework/pods-extend/blob/875e1abfa1129a25aaadac2afb0a55b97d56b514/pods-extend.php#L201-218" target="_blank">callback function</a> is simple, it just adds a new key to the array of tabs. The key is the name of the tab and the value is its label.

Adding options to that tab is a similar process: in the <a href="https://github.com/pods-framework/pods-extend/blob/875e1abfa1129a25aaadac2afb0a55b97d56b514/pods-extend.php#L219-264" target="_blank">callback function</a> for that, we add a new key to the $options array with the same name as the key we added to the tab array, and for that key's value we add a multi-dimensional array with one array per option.

In the starter plugin you will see examples for a regular boolean field and regular text field. There is also an example of how to create a boolean, that when checked, will reveal another text field. By simply setting the parameter 'dependency' to 'true' in the boolean's parameter array, we can set any number of other fields to be dependent on it via their 'depends-on' field. The hiding and showing of the fields in the Pods editor is handled automatically. No need for any custom JavaScript.
<h3>Adding Items To The Pods Menu Page</h3>
One other hook that you should take a look at is the 'pods_admin_menu' hook. This allows you to add a submenu page to the Pods admin menu for your plugin's admin page. This creates a logical grouping of settings pages, with all Pods related settings in one menu. The callback for that hook requires that you add your menu page to the <code>$admin_menus</code> array. Simply give your menu a name as the new key and then set three parameters. The 'function' parameter allows you to set another method in the class for the content of the options page. In that method, you can create an options page just like you would <a href="http://codex.wordpress.org/Creating_Options_Pages">an options page for any other WordPress plugin.</a>

For an example of a callback for this hook, see the one in <a href="https://github.com/Shelob9/pods-visualize/blob/713c02a89af03481b21076561d56003064383355/class-pods-visualize.php#L97-L113" target="_blank">pods-visualize</a>.
<h3>Retrieving Pods Settings</h3>
Now that you have added these settings you will need a way to retrive them. For this we turn to the Pods API. For each Pod's settings we can create an instance of the <a href="http://pods.io/docs/code/pods-api/">Pods API class.</a> Creating the instance is simple:
<code>$pods = pods_api( 'POD_NAME' );</code>

All of the Pod's settings will now be available in the array <code>$pods-&gt;pod_data[ 'options' ]</code>. Pods contains a great function, <a href="http://pods.io/docs/code/data-functions/pods-v/"><code>pods_v()</code></a>, that among its many uses can be used for safely returning data from this array. Using <code>pods_v()</code> prevents you from having to worry about any data validation issues. The simplest usage of <code>pods_v()</code> in this case would be to provide it with the value you are searching for. For example, to get the value of an option called 'foo' in a Pods options, you would do this:

```php
$pods = pods_api( 'POD_NAME' );
$foo = pods_v( 'foo', $pods->pod_data[ 'options' ] );
```

This handy function also allows you to set a default value to return if no value is set. This is very useful, as you can set your default to null or false, and later, you can check that the returned value isn't null or false before using it. One thing to keep in mind when setting a default value, is that you generally want to set the $strict parameter to true, so that empty values in the setting cause the default value to be returned.

For example:

```php
$pods = pods_api( 'POD_NAME' );
$foo = pods_v( 'foo', $pods->pod_data[ 'options' ], false, true );
```

Now you can safely test if <code>$foo</code> is false before using it. This strategy eliminates the need to check if a get or post variable is set before setting it in a variable and also ensures that it is safe to use.
<h3>What Can You Do?</h3>
In this tutorial, I have shown you how to add settings to the Pods editor and how to retrieve them. In the next article in this series I will show you what I did with this basic starting point. Whatever cool thing you create with it, we want to know. You can <a href="http://pods.io/submit-pods-plugin/">submit your plugin</a> to be included in our plugins listings. Also, if you have something you want to add to the starter plugin to help others get started with their own projects, please submit a <a href="https://github.com/pods-framework/pods-extend/pulls" target="_blank">pull request</a>.

Here are some ideas for possible plugins to get you started:
<ul>
	<li>A search widget</li>
	<li>Advanced content type search</li>
	<li>A field type that stored amounts of time</li>
	<li>An incremental number field</li>
	<li>A converter from advanced content types to custom post types</li>
</ul>
