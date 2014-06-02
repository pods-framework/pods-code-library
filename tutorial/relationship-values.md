<script>
{
    "title": "Get Values From A Relationship Field",
    "excerpt": "Relationship fields can allow one post type (custom or not) to become a value for a field in another post type. The relationship can even be bi-directional.",
    "author": "josh412",
    "termSlugs": {
        "tutorial_type": [
            "advanced","using-pods-pages","using-pods-templates"
        ]
    },
    "customFields: [
    {"key":"_yoast_wpseo_title", "value": "Get Values From A Relationship Field - Pods Framework"},
    {"key":"_yoast_wpseo_metadesc", "value": "Relationship fields can allow one post type (custom or not) to become a value for a field in another post type. The relationship can even be bi-directional.."}
    ]
}
<a href="http://pods.io/wp-content/blogs.dir/2224/files/2013/04/relationship-multi-checkboxes.png"><img class="alignleft size-medium wp-image-1911" src="http://pods.io/wp-content/blogs.dir/2224/files/2013/04/relationship-multi-checkboxes-300x66.png" alt="relationship-multi-checkboxes" width="300" height="66" /></a>In this quick tutorial I will show you how to get values from a Pods' <a href="http://pods.io/docs/learn/field-types/relationship/">relationship</a> field, or a bi-directional relationship field between two different post types. There are many possible types of relationship fields, but one of the most common and powerful uses for them is to relate one type of post type to another. With these types of relationships posts in one post type (custom or not) become values for a field in another post type.

<strong>UPDATE: March 19, 2014- The code in this article assumes the related post is a custom post type, not an Advanced Content Type. I have added a new section and example code for use when the related post is an Advanced Content Type at the end of this article.</strong>

I am not going to cover how to create relationship fields or bi-directional fields as this is short tutorial and there are detailed instructions on creating relationship fields, including bi-directional relationships on the page for <a href="http://pods.io/docs/learn/field-types/relationship/#bi-directional-relationships" target="_blank">relationship fields</a>. For this tutorial I will be showing how to get the titles of related posts and show them as links along with the value of a related field.

You can see the complete code at the bottom, but I will go through it step by step for you first.

```php
$pod = pods( 'pod_name', get_the_id() );
```

The first thing we have to do is get our Pods object for the current post using <code>pods( 'pod_name', get_the_id() )</code> and store it in the variable <code>$pod</code>. In this example, we are using get_the_id() to use the ID of the current post in the loop. Depending on your needs you may need to set the ID differently.

Be sure to specify which Pod your relationship field is from. You might also choose to limit which posts are returned by adding additional parameters to <code><a href="http://pods.io/docs/code/pods/">pods</a>()</code>. See the <a href="http://pods.io/docs/code/pods/" target="_blank">docs for the Pods class</a> for more information.

```php
$related = $pod-&gt;field( 'relationship_field' );
```

From there we use <code><a href="http://pods.io/docs/code/pods/field/" target="_blank">Pods::field</a></code> to get the value for our relationship field and store it in the variable <code>$related</code> with this line: <code>$related = $pod-&gt;field( 'relationship_field' );</code>. Now would be a good time for you to <code>var_dump( $related )</code> and take a look at all of the values of that array. One thing you will see is that it is a multi-dimensional array of all of the items in the related field. The important key in each of these arrays we will need for this tutorial is post id. Once we have the post's ID we can feed that to simple WordPress functions like <code><a href="http://codex.wordpress.org/Function_Reference/get_permalink" target="_blank">get_permalink</a>()</code> and <code><a href="http://codex.wordpress.org/Function_Reference/get_the_title" target="_blank">get_the_title</a>()</code> and even use <code><a href="http://codex.wordpress.org/Function_Reference/get_post_meta" target="_blank">get_post_meta</a>()</code> to get fields from the related posts.

```php
if ( ! empty( $related ) ) {
foreach ( $related as $rel ) {
```

Because <code>$related</code> is a multi-dimensional array we will have to loop through each of the individual arrays to get the individual values. Before we start our foreach loop, it is important to make sure we have valid input for the loop. In order to avoid returning an error when there are no related posts we will wrap our foreach loop in a check to make sure <code>$related</code> is not empty.

```php
$id = $rel[ 'ID' ];
```

Once we've begun our foreach loop the first and most important thing we will do is get the ID for the related post by putting the index ID in a variable <code>$id</code> with. Remember when we checked out the var_dump of the $related array? You can get the values of any of the keys we saw there that might be useful to you with <code>$rel[ 'key' ]</code>.

```php
echo '<a href="'.get_permalink( $id ).'">'.get_the_title( $id ).'';
```

Once we have the post id, we can do pretty much whatever we want with it. There is no need to stick to Pods methods at this point. In fact it is easier to use regular WordPress functions that you know and love. In this example I am using <code>get_permalink( $id )</code> and <code>get_the_title( $id )</code> to make my list of posts.

```php
$someField = get_post_meta( $id, 'some_field', true );
echo $someField;
```

Because we now have the ID for the related post we can use <code><a href="http://codex.wordpress.org/Function_Reference/get_post_meta" target="_blank">get_post_meta</a>();</code> to get the value from any of its custom fields. Note that the last parameter is set to true so that we only get one value. By default it would return an array of values, which we could send through its own foreach loop. If I hadn't specified a specific field in the second parameter I would have gotten a multi-dimensional array of all of the meta values from the post that I could have looped through as well. I'm sure how you can see how this can get more complicated and more powerful quite quickly.

That's about it. Just be sure to end the foreach and the check to see if <code>$related</code> was empty. One thing to consider is putting this whole code snippet inside a function so that you can reuse it through out your theme or plugin. If you do, be sure to add a a parameter for Pod ID or slug. Here is the complete code:

```php
@partial(/example/classes/pods/field/examples/related-to-cpt.php)
```

<h3>Relationship Fields In Pods Templates</h3>
An almost identical approach can be used to get the values from related fields inside of a Pods Template. In a Pods Template, we can use php by opening php tags. The pods object is already available as <code>$obj</code>. As a result, we can use the above code snippet simply by skipping the first line, <code>$pod = pods( 'pod_name' );</code> and changing the second line to <code>$related = $obj-&gt;field( 'relationship_field' );</code>.

### Related Posts That Are Advanced Content Types

If the related post is an Advanced Content Type (ACT) the example code I showed above will need some adjustments. Because ACTs are not WordPress post types, you not make use of the functions from WordPress core with them. For example, <code>get_permalink()</code> can not be used to get a link to an ACT, as the ACT's ID is not the ID of a WordPress post. Instead the permalink will have to be built manually.

In the example code below be sure to read through the comments carefully, and also pay attention to any part of the code itself in all caps. The code in all caps, must be changed to match your Pods configuration. Also, note that the way the permalink is constructed matches the way I recommend in <a href="http://pods.io/tutorials/choosing-pods-advanced-content-types-and-pods-pages/">my tutorials on using ACTs</a>. Be sure that it outputs a link that matches your actual permalink structure.

```php
@partial(/example/classes/pods/field/examples/related-to-act.php)
```

This code follows the same basic pattern as I explained before. Note that I used the variable <code>$obj</code> for the Pods object. This is so that if you are using this code in a Pods Template, you can just skip the line that builds the Pods object as in a Pods Template, the Pods object is already available in <code>$obj</code>.
