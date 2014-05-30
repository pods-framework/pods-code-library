<script>
{
    "title": "Setting Pods Custom Menu Icons",
    "excerpt": "Learn to set custom menu icons for Pods content types using the Dashicon font or any image of your choice.",
    "author": "Josh Pollock",
    "termSlugs": {
        "tutorial_type": [
            "beginner"
        ]
    },
    "customFields: [
    {"key":"_yoast_wpseo_title", "value": "Setting Pods Custom Menu Icons - Pods Framework"},
    {"key":"_yoast_wpseo_metadesc", "value": "Learn to set custom menu icons for Pods content types using the Dashicon font or any image of your choice."}
    ]
}
</script>
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/fancy-menu.png"><img class="alignright size-medium wp-image-180236" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/fancy-menu-138x300.png" alt="fancy-menu" width="138" height="300" /></a>
The WordPress back-end saw a major overhaul in WordPress 3.8 that gave a much needed, modern makeover to the admin interface. One of the key components of the new re-design is the inclusion of the Dashicons font created by Automattic UI designer, <a href="http://choycedesign.com/" target="_blank">Mel Choyce.</a> As a result, in addition to using an image file of your own, you can use any of the icons in the Dashicon font as the menu icon for your Pod. By setting the name of the icon in the "Menu Icon" field under the "Admin UI" tab in the pods editor.

In this tutorial I will walk you through choosing an icon, getting its name and setting it as the menu icon. I will also be showing you how to use a image file as the icon. <strong>Note:</strong> Before Pods 3.0 the "Menu Icon" field was called "Menu Icon URL."
<h3>Using A Dashicon</h3>
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/video-choice.png"><img class="alignleft size-medium wp-image-180237" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/12/video-choice-300x151.png" alt="video-choice" width="300" height="151" /></a>
The first step is to choose an icon and get its name. Go to see all of the icons, go to <a href="http://melchoyce.github.io/dashicons/" target="_blank">the Dashicon page</a> and click on the icon you want. Once you've clicked on the icon, its proper name will be shown at the top of the page. In the screenshot on the left, I've selected the name of the video icon, which is "dashicons-format-video." Select and copy the name of the icon you chose.

Once you've selected an icon, you will need to go to the Pods editor--accessible from Pods menu-&gt;Editor--for the content type you want to change the menu icon for. Once your there, go to the "Admin UI" tab. In that tab you will find the "Menu Icon" field. Paste in the name of the Dashicon that you selected. Once you've done that, save the Pod. Once it has saved, refresh the page and you will see the icon is now being used as the icon for your Pod in the menu.

Setting a custom menu icon is a great way to make it easy to find the right content type, which can get tricky when you add a lot of them. Using a Dashicon ensures that the icon you chose fits right in with the rest of the menu. Of course there will not always have the perfect icon for your needs. Don't worry, Pods still has you covered as you can use any image file on your site as the menu icon.
<h3>Using A Custom Icon</h3>
In the same "Menu Icon" field you can also enter the URL to any file in your site in order to use it as a custom icon. It is not wise to hardcode the full link as directory structures for WordPress sites can change. Instead you should use one of the site tag type <a href="http://pods.io/docs/build/special-magic-tags/#site-tags" target="_blank">special magic tags</a>. These tags, allow you to set the URL programmatically, just like you would in a WordPress template or plugin file. If you were using an image in a plugin file, you can use the special magic tag {@plugins-url} to get the location of the plugins directory of your site, just like you would use <a href="http://codex.wordpress.org/Function_Reference/plugins_url" target="_blank"><code>plugins_url()</code></a> you can use the special magic tag <code>{@plugins-url}</code>. There is a <a href="http://pods.io/docs/build/special-magic-tags/#site-tags" target="_blank">big list of other site tag special magic tags</a> like <code>{@template-url}</code> for files in the active theme's directory.

For example, if you wanted to use a file called "cpt-icon.png" in a sub directory of your theme called "img" you would enter "<code>{@template-url}/img/cpt-icon.png</code>" into the "Menu Icon" field.

WordPress will allow you to use any size icon for your custom menu icon, but it will not scale the image to fit. For that reason it is best to use a 20 pixel by 20 pixel image.
