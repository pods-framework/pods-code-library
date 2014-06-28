# Help Improve Pods Documentation

## Ways To Contribute

You can contribute to Pods documentation in one of three ways:

* Adding to our code library.

* Improving inline documentation for functions or hooks

* Writing a tutorial.

### Adding To Our Code Library
The code examples on our documentation site (coming soon) are generated from this repository. You can submit a new code example or propose a change to an existing example by submitting a pull request. Instructions on submitting a pull request via the GitHub web interface, as well as were to put the example are below. You can also clone or fork this repository like any other GitHub repository using the command line or a Git GUI client.

### Improving Inline Documentation For Functions Or Hooks
The documentation for all functions, including their definitions parameters, location, and description are automatically generated from the plugin's inline documentation. Any improvements to the inline docs are greatly appreciated and should be submitted to the active development branch of the main [Pods GitHub repository](https://github.com/pods-framework/pods) and should follow the [inline documentation standards for WordPress core development](http://make.wordpress.org/core/handbook/inline-documentation-standards/php-documentation-standards/).

More information regarding contributing to inline documentation for hooks, which is our greatest area of need can be found here:

http://pods.io/inline-documentation-filters-actions/

* The current development branch is [3.0-unstable](https://github.com/pods-framework/pods/tree/3.0-unstable) all pull requests should be submit against that branch.

###  Writing Tutorials
Submission of tutorials, either the full text, or as a link to a post on your own page is encouraged. You are also welcome to submit pull requests to improve or update existing tutorials.

#### Creating Full Text Tutorials
All tutorials, whether they are single post, or a multi-post series must have a file in the tutorial directory. This may be the full text of the tutorial, or an introduction to a multi-post series. If it is a multi-post series, each part should be contained in a subfolder or tutorial with the same name as the parent article.

All posts should include a header with the title, excerpt, author and if it is a part of a multi-part series, the order of the post in the series. The order for multi-part tutorial series is set using the "menu_order" field. This field should be omitted for parent posts. For example:

```no-highlight
<script>{
    "title": "Using Pods post_save Actions",
    "excerpt": "",
    "menu_order": "3",
    "author": Josh Pollock
    }
</script>
```

A tutorial post can embed content from anywhere in the code library, for example a code example, or from another GitHub repo, for example the source code of Pods or a Pods plugin. In both cases you use the three ticks, followed by the language method from the markdown language to set syntax highlighting around a `@partial()` statement.

To embed example code from the Pods Code Library, you would give the full file path, relative to the root of this repository. For example,

<code>
&#96;&#96;&#96;php
@partial(/example/hooks/actions/pods_api_post_save_pod_item_podname/examples/update_taxonomy.php)
&#96;&#96;&#96;
</code>

To embed lines of code from another GitHub repository, you would give the full path to the repository, optionally with line numbers. For example:


<code>
&#96;&#96;&#96;php
@partial(https://github.com/pods-framework/pods/blob/2.x/classes/Pods.php#L261-L275)
&#96;&#96;&#96;
</code>

#### Creating Links To External Tutorials
To add a link to a post on an external site, you will need to create a file in the tutorials, just like with full-text tutorials. The only difference is that you will need to add a "link" field in the header script, with a link to the tutorial. You should also add a few lines about the tutorial in the body of the file, so users will know what the tutorial is about. There is no need to add a link in that text to the article, as the link will be outputted automatically.

Here is an example of a header script for a link post:

```no-highlight
<script>
{
    "title": "Creating Embedded Video Players From Custom Fields",
    "excerpt": "Learn how to take a link to a video directly from a Pods generated custom field and use wp_oembed_get() to display the video in an embedded video player anywhere in your theme.",
    "author": "lindsayanng",
    "link": "http://webdesignforidiots.net/2014/01/pulling-a-video-from-a-posts-content-and-displaying-it/",
    "termSlugs": {
        "tutorial_type": [
            "adding-custom-fields", "beginner", "media-handling-with-pods",
        ]
    },
    "customFields: [
    {"key":"_yoast_wpseo_title", "value": "Creating Embedded Video Players From Custom Fields - Pods Framework"},
    {"key":"_yoast_wpseo_metadesc", "value": "Learn to use a Pods field and wp_oembed_get() to display an embedded video player anywhere in your WordPress theme."}
    ]
}
</script>
```

## Code Library Submission Instructions
### Location For Code Examples
All code examples should be placed in a sub-directory of the [Examples](https://github.com/pods-framework/pods-code-library/tree/master/example) directory. This directory is organized as a mirror of the plugin itself. For examples, code examples for the find method of the Pods class, should go in the examples folder of the find folder, in the Pods folder of the classes folder. This path for this would be: [example/classes/Pods/find/examples](https://github.com/pods-framework/pods-code-library/tree/master/example/classes/Pods/find/examples)

Another example, for the save_field method of the PodsAPI class: The example would go in the example folder of the save_field folder in the PodsAPI folder, in the classes folder. The full path would be [example/classes/PodsAPI/save_field/examples](https://github.com/pods-framework/pods-code-library/tree/master/example/classes/PodsAPI/save_field/examples).

###  Submitting A Pull Request Via The GitHub Web Interface

1) Navigate to the correct directory, according to the steps listed above.

2) Click on the file you wish to edit, or add your own by clicking the add file button. If adding a new file, name it for the type of examples(s) you intend to add.

![Add file](http://i.imgur.com/TcRfQaa.png "Adding a new file")


3) Begin the file with opening php tags. Start each example with a multi-line comment using `/**` and `*/` to describe the example. Use single line comments starting with `//` to explain the code as needed. If appropriate describe output in comments.

4) Save the file with a short commit message.

![New example](http://i.imgur.com/Od53Bgb.png "Creating new code example")


5) Submit a pull request against the master branch. If need be elaborate on the code example.

![Submitting pull request](http://i.imgur.com/33LmA9W.png "Submitting a new pull request")


## About The Pods Code Library
The Pods code library, which is currently under development, is inspired by, and the code that generates the site is forked from the jQuery documentation. For more information see: [http://contribute.jquery.org/web-sites](http://contribute.jquery.org/web-sites). The excellent suggestion to use this approach came from [Naomi Bush](https://naomicbush.com/).

The Pods code library and code reference was created by [Dan Stefan Oprean](https://github.com/unknownnf) and the Pods Framework team and is generated using this repository as well as:

* https://github.com/pods-framework/pods-code-library-generator
* https://github.com/pods-framework/grunt-pods-code-library
* https://github.com/pods-framework/grunt-wordpress
