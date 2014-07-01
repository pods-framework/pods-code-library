One of the most powerful features of Pods is the ability to create bi-directional relationships fields between Pods. This allow a field's value to be one or many items from another Pod, or other type of content type.

By default, when creating a Pods object for a Pod that has relationship fields, Pods retrives all of the fields of the realted items found. While this makes the returned data easy to work with, when your Pod has a large number of relationships this can become a performance issue.

As a way to deal with this issue, you can use the 'select' parameter for the find method of the Pods class. This argument allows you to customzie the SELECT statment in the database query that is used to build the Pods object. Through startegic use of the 'select' parameter Pods can query only the data you need, giving you the same end result, but with vast improvments in performance.


### Setting Selects
Setting up selects is actually very easy, as long as you preplan what fields you will need. In general it is best to setup your select parameters after you write the code that uses it so you will know exactly what fields you need to select.

As you can see in the example below, setting up your selects is as simple as creating an array of field names followed by an alias. That alias will be used as the parameter for `pods::display()` to output the field.

These selects are written in the form of 'relationship_field_name.field_in_related_item AS alias'. So, for example, if you had a realtionship field called 'books' that had a field called 'number_of_page' and wanted to select it with the alias 'books_pages' you would use `'books.number_of_pages AS books_pages'`

```php
@partial(example/classes/Pods/find/examples/multi-relationship-optimization.php#L7-19)
```

### Using Selects

Once you have built a Pods object using selects, outputting the pre-selected fields is easy using `pods::display()` with the alias set. So if you selected a field with the alias 'page_number' you would output the value with `display( 'page_number' );`.

Here is a complete example of building a Pods object using selects and outputting the values with display. Note that values of fields of non-relationship fields are still availble as they always are:

```php
@partial(example/classes/Pods/find/examples/multi-relationship-optimization.php)
```

### Profiling: Check Your Assumptions
Adding selects makes your coding more complicated and in certain cases can lead to decreased performance due to the number of individual queries involved. For this reason, it is important to measure both the number of queries and the time required to run the queries.

Testing your assumptions about whether adding selects will improve your site load time requires testing. There are many ways to test site load time and number of queries. One simple method is with this simple that shows total load time and number of queries in a page load in a page's footer:

```php
add_action( 'shutdown', function() {
echo get_num_queries().' queries in '.timer_stop(0,3).' seconds.';
}, 99 );
```

Other options include those discussed [here](http://wordpress.stackexchange.com/a/70853/25300) and using the [P3 plugin profiler](https://wordpress.org/plugins/p3-profiler/). Be sure to disable all caching before running tests to ensure accuarate results.


### Don't Forget To Cache
Pods find also includes an easy way to cache your queries with almost no effort. Object or transient caching, can be acomplished by simply setting one or two extra arguments in `pods::find()` parameters. As shown in this example:

```php
@partial(example/classes/Pods/find/examples/cache-query.php)
```

Combined with the [Pods Alternative Cache Plugin](http://wordpress.org/plugins/pods-alternative-cache/) and the [partial page caching capabilites](tutorial/parital-page-caching.md) of Pods, optomizing complex queries generated when querying Pods with multiple relationships can be highly efficent. That is with or without selects.
