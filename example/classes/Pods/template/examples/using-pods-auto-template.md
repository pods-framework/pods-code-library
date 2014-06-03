<script>
{
    "title": "Using Pods Frontier Auto Template",
    "excerpt": "How to use this plugin to output Pods Templates for your Pods custom post types and custom taxonomies with out any PHP code.",
    "menu_order": "4",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner", "using-pods-templates"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Using Pods Frontier Auto Template - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "How to use this plugin to output Pods Templates for your Pods custom post types and custom taxonomies with out any PHP code.
    ]
}
<em>This post was updated on May 19th, 2014 to reflect changes in Pods Frontier Auto Template version 0.2.0</em>

Pods Frontier Auto Display is a plugin that allows you to easily output Pods Templates for your Pods custom post types, extended posts and pages and taxonomies. With this plugin, Pods provides a complete solution for creating custom content types, adding fields to them and outputting the custom fields for your custom content types without writing any PHP code or modifying your theme file. With this plugin and Pods, WordPress as a CMS now requires only a basic knowledge of html and CSS.

This tutorial covers the usage of this plugin. For an in depth look at how it works, and how to implement a similar system manually, <a href="http://pods.io/?p=182351">see this tutorial</a>.
<h3>Installing The Plugin</h3>
You can install Pods Frontier Auto Template via the WordPress plugin installer, like any other plugin. Alternatively, you can download the latest development version or clone the plugin from <a href="https://github.com/pods-framework/pods-frontier-auto-template">its GitHub repository</a>.
<h3>Setting Your Templates</h3>
Once the plugin is active a new tab will appear in the Pods editor for all custom post types and custom taxonomies called "Frontier Auto Display Options". Check the box next to the first option to enable auto template display. This will reveal two more options on custom post types and one on custom taxonomies.
<h4>Custom Post Types</h4>
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2014/04/auto-template-0.2.0-cpt.png"><img class="aligncenter wp-image-183707 size-full" title="Using Pods Frontier Auto Template plugin for post type Pods. " src="http://pods.io/wp-content/blogs.dir/2224/files/2014/04/auto-template-0.2.0-cpt.png" alt="auto-template-0.2.0-cpt" width="800" height="456" /></a>

For custom post types and extended posts and pages, four option fields will be revealed, one each to set the template name for single and archive view, and one each to choose to append the Pods Template to the post content or to replace the post content.

In the field, "Single item view template", enter the name of the Pods Template that you want to use for individual items in this custom post type. If you wish to replace the post content, for single items, with your Pods Template, instead of appending the template to the post content, uncheck "<span style="color: #444444;">Append template to content or replace content?".</span>

Next, in the field,  "Archive view template", enter the name of the template to be used in the archive (list view) for this post type. If you wish to replace the post content, in the archive view, with your Pods Template, instead of appending the template to the post content, uncheck "<span style="color: #444444;">Append template to content or replace content?".</span>

Note that the archive view will only work if you have enabled archives for the post type. Archives can be enabled under the "Advanced Options" tab using the option "Enable Archive Page". By default archives are not enabled. Note that before Pods 2.4 this option was called "Has Archive."
<h4>Custom Taxonomies</h4>
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2014/04/auto-template-0.2.0-taxonomy.png"><img class="aligncenter size-full wp-image-183708" src="http://pods.io/wp-content/blogs.dir/2224/files/2014/04/auto-template-0.2.0-taxonomy.png" alt="Using Pods Frontier Auto Templates for custom taxonomy Pods." width="800" height="438" /></a>

&nbsp;

For custom taxonomies only one template can be set. It is set in the "Taxonomy Template" field. In this field, you can enter the name of the template for the taxonomy. There is also an option to choose if you wish to append or replace the the post content with the Pods Template in taxonomy archives.
<h3>More Information</h3>
<h4>Using The Same Template For Both Single and Archive View</h4>
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2014/04/auto-template-0.2.0-same-archive.png"><img class="aligncenter wp-image-183709 size-full" title="Pods Frontier Auto Template set to use the same template for both single and archive view of a content type Pod." src="http://pods.io/wp-content/blogs.dir/2224/files/2014/04/auto-template-0.2.0-same-archive.png" alt="auto-template-0.2.0-same-archive" width="800" height="443" /></a>

If you would like to use the same template for both views, simply set the same name in both fields.
<h4>What If The Template Doesn't Exist?</h4>
If the template name that you specify is not the name of a Pods Template in your site nothing happens. There will simply be no output. There will also be no error.
<h4>What Exactly Is The Difference Between Appending and Replacing Post Content?</h4>
By default Pods Frontier Auto Template adds the Pods Template after the post's content. Optionally you can replace the post content with the Pods Template. This is useful if you do not want to show the post content field. Or wish to show other fields first. You can add the post content in your Pods Template using the magic tag <code>{@post_content}</code>
<h4>What If I Have Another Question?</h4>
Ask it in our <a href="http://pods.io/forums/">support forums</a> or in our <a href="http://pods.io/forums/chat/">irc channel.</a>
