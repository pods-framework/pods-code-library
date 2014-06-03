<script>
{
    "title": "Where Should I Put Code For Use With Pods?",
    "excerpt": "How and where to safely add code to extend Pods' functionality.",
    "menu_order": "2",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "beginner"
        ]
    },
    "customFields: [
        {"key":"_yoast_wpseo_title", "value": "Where Should I Put Code For Use With Pods? - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Where to safely add custom code for extending the functionality of Pods on your site."}
    ]
}
When you need to add custom code for extending the functionality of Pods on your site, where to add the code and how to do so safely are important questions to consider. I say safely because any code for use with Pods will use functions and classes from the core Pods plugin itself. As a result, your custom code can cause fatal errors if Pods becomes deactivated or if it is loaded before Pods. While we now have a full featured Pods starter plugin, <a title="Pods starter plugin GitHub repository" href="https://github.com/pods-framework/pods-extend" target="_blank">Pods Extend</a>, it is overkill for many cases.
<h3>Why Not Use Theme Functions File?</h3>
Many people add their Pods code to the active theme's functions.php file. While this works, it has several drawbacks. Putting site-specific code in your functions.php file keeps you from easily switching themes without losing essential site-functionality. While you may be using a theme that was custom designed for the site, and therefore assume it will never change, you may need to change to the default theme in the future for troubleshooting reasons. In addition, given changing trends in web design and the evolving nature of the Pods and WordPress code, a theme that looks and functions wonderfully by today's standards may not meet the design aesthetics three years from now or work properly with the current version of WordPress or Pods.
<h3>A Simple Pods Plugin</h3>
A simple Pods Plugin has two files. One contains a plugin header and a function to include a second file, if Pods is active. The second file contains code dependent on Pods. It could also be used to include multiple files if you need it to.

The function in the main file that includes the other file should be in a function hooked to '<a href="http://codex.wordpress.org/Plugin_API/Action_Reference/plugins_loaded">plugins_loaded</a>'. This means that any code you use in your custom code file can not be hooked to any hooks that precede 'plugins_loaded'. This is likely not an issue, as very few hooks precede 'plugins_loaded', not even 'init'.

The actual inclusion of the custom code file must be wrapped in a conditional that will only evaluate true if Pods is active. I prefer to test if the constant <code>PODS_VERSION</code> is defined.

&nbsp;

```php
@partial(/example/misc/examples/simple-pods-plugin.php)
```

