<script>
{
    "title": "SEO For Pods Advanced Content Types",
    "excerpt": "Pods Advanced Content Types (ACT) do not work automatically with Yoast's WordPress SEO or any other SEO plugin since they are not WordPress content types. Custom Post Types on the other hand do not share these issues. In this tutorial you will learn search engine optimization for Pods Advanced Content Types, including how to add your ACT to an XML Site Map and generateMeta tags--such as title and description--and Open Graph tags using Pods Pages precode.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced","using-pods-pages"
        ]
    },
    "customFields": [
        {"key":"_yoast_wpseo_title", "value": "Partial Page Caching and Smart Template Parts - Pods Framework"},
        {"key":"_yoast_wpseo_metadesc", "value": "Search Engine Optimization (SEO) for Pods Advanced Content Types. Covering: XML Site Maps, Meta tags--such as title and description--and Open Graph tags."}
        ]
}
</script>

Pods Advanced Content Types (ACT) do not work automatically with Yoast's WordPress SEO or any other SEO plugin since they are not WordPress content types. Custom Post Types on the other hand do not share these issues. This tutorial is only applicable to ACTs and Pods Pages. I will be addressing three separate SEO concerns:
<ol>
	<li>XML Site Maps</li>
	<li>Meta fields, such as title and description</li>
	<li>Open graph fields.</li>
</ol>
Be sure to also check out my screencast on <a href="http://pods.io/?p=179974" target="_blank">SEO for Advanced Content Types</a>.
<h3>XML Site Maps</h3>
XML site maps is the easiest issue to solve. There is a plugin called <a href="http://wordpress.org/plugins/pods-seo/">Pods SEO </a>that will allow Yoast's WordPress SEO plugin to include ACTs in XML site maps. The plugin also enables you to choose which of your ACTs to include in the site map. You must  have a detail page created for each ACT. For more information on how to do this, see my <a title="Using Pods Pages With Advanced Content Types" href="http://pods.io/?p=179774" target="_blank">tutorial </a>or <a href="http://pods.io/?p=179973">screencast</a> on creating Pods Pages.
<h3>Creating Meta Tags and Open Graph Tags In Pods Pages</h3>
You can handle meta/ open graph in the Pods Pages precode. In this section I will be explaining how to manually create these fields manually so you understand how they work. These techniques are fine for Pods list pages, but for detail pages they are inadequate for the job. In the next section we will build on what we are learning in this section to allow you to set the values of the meta tags and open graph tags from custom fields or dynamically.

The two most important meta tags to include for SEO purposes are meta title and meta description. You can output these fields by setting their values in the precode section of the Pods Page. To create the meta tag for meta title, simply add `$pods-&gt;meta[  'title'  ] = 'Title You Want';  to your Pods Page precode. To output any meta tag, you use <code>$pods-&gt;meta[ 'meta_tag_name' ] = 'meta tag content';</code>

For example,<code> $pods-&gt;meta[ 'description' ] = 'This page is about apples.';</code> will create this meta tag: <code>&lt;meta name="description" content="This page is about apples." /&gt;</code> in the header of the page. Similarly, you can output an open graph tag like this: <code>$pods-&gt;meta_properties[ 'og:tag_name' ] = 'tag content';</code> which becomes  <code>&lt;meta property="og:tag_name" content="tag content" /&gt;</code>.
<h3>Dynamically Generated Meta Tags</h3>
In order to be able to set these values separately for each post in the ACT, you can create fields and use their values to output the meta content. So for example, you could create a field called meta_description, and then in the precode do: <code> $pods-&gt;meta[ 'description' ] = $pods-&gt;field( 'meta_description' ); $pods-&gt;meta_properties[ 'og:description' ] = $pods-&gt;field( 'meta_description' ); </code> You can also use existing fields to populate the meta tags. For example, if you have a create a field to act like the post thumbnail called 'page_thumbnail' in regular WordPress posts and wanted to use it as the open graph image, you could. The precode to do this would be: <code>$pods-&gt;meta_properties[ 'og:image' ] = wp_get_attachment_image( $pods-&gt;field( 'page_thumbnail' ), 'full' );</code> This code will use the original image size, opposed to the default size, which is thumbnail. You can optionally specify the image dimensions in an array, in the form of <code>array( width, height );</code>.

Please keep in mind that before you can do any of this you must put a Pods object in $pods <em>in the precode</em>. I describe how to create a Pods object with Pods pages in <a title="Using Pods Pages With Advanced Content Types" href="http://pods.io/?p=179774" target="_blank">the Pods Pages tutorial</a> and you can use the same process in the precode.
<h3>Example</h3>
The example code below shows you how to output meta title and meta descriptions in the head of your document as well as open graph tags for image and description. It also shows how to output the proper link for author's Google+ profile. It's not WordPress SEO by Yoast, but it's a start.

You will need to add two text fields to your ACT. Call one 'meta' title and give it a maximum length of 70 characters. Call the other one 'meta_desc' and give it a max length of 154 characters. Those lengths are what Yoast uses for those fields in their plugin.

In this example I'm using an image field called 'picture' that functions like a post thumbnail for the open graph image tag og:image. Be sure to create a comparable field. Even if you don't use the image anywhere on your site, it's important to be able to control what image shows up when the page is shared on Facebook.

The other important thing to do is to extend Users and add a Google+ field to it. You can learn how to do this in the first two steps of my tutorial on creating a <a title="Creating A Users Directory With Pods" href="http://pods.io/tutorials/using-pods-create-user-directory/" target="_blank">users directory with Pods</a>. Once that new field exists, you<a href="http://pods.io/docs/learn/field-types/relationship/" target="_blank"> can create a relationship field</a> in your ACT to it called 'page_author'. This allows you to get the ID of the page's author and then get the value of that field with <code>get_the_author_meta( 'google_plus', $author['ID'] );</code>. For some people the link to the Google+ profile may be better set statically, it depends on your needs.

Here is the complete precode, with both the static content method and dynamically generated content:

```php
@partial(/example/misc/examples/act-seo.php)
```
