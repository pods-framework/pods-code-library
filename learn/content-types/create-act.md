As well as the standard WordPress objects of Post Types, Taxonomies, and Fields, Pods lets you create Advanced Content Types. These Content Types are created <strong>in their own table in your database</strong>, meaning they have more flexibility than youget with standard Content Types. However, when you create them it means that <strong>you are reliant on Pods for using their functionality</strong>. Unless you are a developer with a specific need for Advanced Content Types, it's very unlikely that you'll need to use them. <a title="What are Advanced Content Types?" href="http://pods.io/docs/learn/what-are-advanced-content-types/">You can learn more in our guide to Advanced Content Types.</a>

Here are three examples of occasions when Advanced Content Types might be used:
<ol>
	<li><strong>You need your data to be separate from your WordPress database tables</strong>. This might be necessary, for example, if you are using another piece of software with which you wish to share the database. Advanced Content Types means that you can interface between WordPress and that software.</li>
	<li>You are <strong>querying many fields at once</strong> from the same table (typically, at least most than 15). This could be used for reporting and statistics.</li>
	<li>You have data that gets <strong>reset periodically</strong>.</li>
</ol>
Remember that in normal situations <strong>Custom Post Types are what you need</strong>. Advanced Content Types require <strong>advanced knowledge of database structures</strong>.

Sanity checked? If you're sure you want to go ahead, this guide will walk you through creating an Advanced Content Type.
<h3>Create your Advanced Content Type</h3>
First you'll need to enable the "Advanced Content Types" component under <strong>Pods Admin &gt; Components</strong> (Advanced Content Types are not enabled by default)

Next, navigate to <strong>Pods Admin &gt; Add New</strong>.

<strong>Click on the Create New button</strong>.

From the drop-down menu <strong>select Advanced Content Type</strong>.

Let's use an example.

A library has a database for all of its books, but it also wants to display them in its WordPress website. The library software keeps track of books and records them as being available of checked out. WordPress displays this information. Pods is used to interface between the two.

Give your Content Type a Plural and a Singular Label. For this example, the plural is books and the singular is book.

<img title="new pod" src="http://pods.io/files/2013/02/act1.png" alt="a screenshot of the create new pod options. Advanced content type is selected. The plural name is books, the singular is book" />

Click on the advanced tab to change the identifier. This is how your Advanced Content Type will be referred to in the code and in shortcodes.

When you're happy, <strong>click Next Step</strong>.
<h3>Add your Fields</h3>
Custom Fields let you associated data with your Advanced Content Type. <a title="What are Custom Fields?" href="http://pods.io/docs/learn/what-are-custom-fields/">Use our guide to learn more about Custom Fields.</a>

You'll see that some fields have already been created. <strong>You can use these if you wish, or you can remove them</strong>.

<img title="manage fields" src="http://pods.io/files/2013/02/act2.png" alt="a screenshot of the manage fields section" />

To add a field, <strong>click on the Add Field<strong> button.</strong></strong>

There are three tabs:
<ul>
	<li>Basic</li>
	<li>Advanced Field Options</li>
	<li>Advanced</li>
</ul>
Let's take a look at each of them.
<h4>Basic</h4>
This tab has the basic information that is required to create your field. Your options are:
<ul>
	<li><strong>Label</strong>: the field label that will appear in your user interface.</li>
	<li><strong>Name</strong>: the name of the field that you will use in your code and shortcodes.</li>
	<li><strong>Description</strong>: a description of the field. This could be an instruction for the user or just a description. It is not required.</li>
	<li><strong>Field type</strong>: this is where you determine the type of field. There are a number of options including email, website, color picker, and even a Visual editor.</li>
	<li><strong>Options - Required</strong>: if a field is required the user cannot save the post until it is completed.</li>
	<li><strong>Options - Unique</strong>: a unique field must have a unique value inserted into it.</li>
</ul>
Below is an example of the form completed for an ISBN field for the Book Advanced Content Type:

<img title="manage fields" src="http://pods.io/files/2013/02/act3.png" alt="a screenshot of the new ISBN field" />
<h4>Additional Field Options</h4>
The additional field options tab gives you <strong>options that are contextual to the field type you have selected. Let's take a look at some examples.</strong>

For the plain number field that was selected in the above example, options are provided for format, decimals, and maximum length.

<img src="http://pods.io/files/2013/02/plain_number.png" alt="a screenshot of the plain number advanced options " />

The currency field has options for currency sign, currency placement, format, decimals, and maximum length.

<img src="http://pods.io/files/2013/02/currency.png" alt="a screenshot of the currency advanced options " />

The WYSIWYG Visual Editor field has options for different editors, output options, allowed html tags, and maximum length

<img src="http://pods.io/files/2013/02/wysiwyg.png" alt="a screenshot of the wysiwyg advanced options " />

Whatever field you choose, it's <strong>worth checking out the additional field options</strong> to see how you can customize the field.
<h4>Advanced</h4>
The Advanced tab gives you even more options that you may wish to use to <strong>control design and defaults</strong> and to <strong>control who sees the field</strong>.
<ul>
	<li>Visual
<ul>
	<li><strong>Additional CSS Classes</strong> - use to style your fields</li>
</ul>
</li>
	<li>Values
<ul>
	<li><strong>Default value</strong> - set a default value for your field</li>
	<li><strong>Set Default Value via Parameter</strong> - if you wish to use a parameter to set your default value, set it here</li>
</ul>
</li>
	<li>Visibility
<ul>
	<li><strong>Show to Admins Only?</strong> to restrict the field visibility to your site admins</li>
	<li><strong>Restrict access by Capability</strong> to select which capabilities have access to the field</li>
</ul>
</li>
</ul>
When you're happy with your field <strong>click Update Field</strong>
<h3><span style="font-size: 1em;">Labels</span></h3>
<img class="alignnone size-full wp-image-1511" src="http://pods.io/files/2013/05/admin-tabs-labels.png" alt="Admin tabs: Labels" width="562" height="48" />

The "Labels" tab lets you adjust the Advanced Content Type labels across your admin. These are pre-populated with the name of your Content Type. However, you can adjust them if you want to. Adding a new label to the first two fields will update all of your labels, or you can adjust every label individually.
<h3 id="admin-ui">Admin UI</h3>
<img class="alignnone size-full wp-image-1509" src="http://pods.io/files/2013/05/admin-tabs-admin.png" alt="Admin tabs: Admin UI" width="562" height="48" />

The "Admin UI" tab gives you fine-tuning options for your Advanced Content Type's admin menu appearance:
<ul>
	<li>Choose whether to show your ACT in the Admin Menu, assign a name and an icon</li>
	<li>Specify the menu's position or parent menu ID</li>
	<li>Select which actions are available (Add New, Edit, Duplicate, Delete, Reorder, Export)</li>
	<li>Select the columns to be shown in the admin table</li>
	<li>Select which fields should provide search filters</li>
</ul>
<em>Note: Specifying the location for a custom menu icon can be aided by the use of <a title="Using Special Magic Tags" href="http://pods.io/docs/build/special-magic-tags/">special magic tags</a>.</em>
<h3>Advanced Options</h3>
<img class="alignnone size-full wp-image-1510" src="http://pods.io/files/2013/05/admin-tabs-advanced.png" alt="Admin tabs: Advanced Options" width="562" height="48" />

The "Advanced Options" tab gives you fine-tuning options for your Advanced Content Type.  The defaults usually suffice here, but there are a few things you may wish to adjust:
<ul>
	<li>Use the Detail Page URL to create <strong>advanced URL structures and rewrites</strong>. To use this option you must have the Pages component activated.</li>
	<li>Select which field should be used as the "title" field</li>
	<li>Set the ACT to be hierarchical</li>
</ul>
&nbsp;

Whenever you're finished with your fields and your options <strong>click Save Pod</strong>.
