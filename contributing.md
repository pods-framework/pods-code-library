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

###  Submitting Tutorials
Submission of tutorials, either directly to Pods.io, or as links to posts on your own site are highly encouraged and are a great way to contribute to Pods. At this time tutorials are managed by the main WordPress install for Pods.io. For more information on submitting a tutorial, please see: [http://pods.io/submitting-tutorial-pods-io/](http://pods.io/submitting-tutorial-pods-io/)

## Code Library Submission Instructions
### Location For Code Examples
All code examples should be placed in a sub-directory of the [Examples](https://github.com/pods-framework/pods-code-library/tree/master/example) directory. This directory is organized as a mirror of the plugin itself. For examples, code examples for the find method of the Pods class, should go in the examples folder of the find folder, in the Pods folder of the classes folder. This path for this would be: [example/classes/Pods/find/examples](https://github.com/pods-framework/pods-code-library/tree/master/example/classes/Pods/find/examples)

Another example, for the save_field method of the PodsAPI class: The example would go in the example folder of the save_field folder in the PodsAPI folder, in the classes folder. The full path would be [example/classes/PodsAPI/save_field/examples](https://github.com/pods-framework/pods-code-library/tree/master/example/classes/PodsAPI/save_field/examples).

###  Submitting A Pull Request Via The GitHub Web Interface

1) Navigate to the correct directory, according to the steps listed above.

2) Click on the file you wish to edit, or add your own by clicking the add file button. If adding a new file, name it for the type of examples(s) you intend to add.

3) Begin the file with opening php tags. Start each example with a multi-line comment using `/**` and `*/` to describe the example. Use single line comments starting with `//` to explain the code as needed. If appropriate describe output in comments.

4) Save the file with a short commit message.

5) Submit a pull request against the master branch. If need be elaborate on the code example.

## About The Pods Code Library
The Pods code library, which is currently under development, is inspired by, and the code that generates the site is forked from the jQuery documentation. For more information see: [http://contribute.jquery.org/web-sites](http://contribute.jquery.org/web-sites). The excellent suggestion to use this approach came from [Naomi Bush](https://naomicbush.com/).

The Pods code library and code reference was created by [Dan Stefan Oprean](https://github.com/unknownnf) and the Pods Framework team and is generated using this repository as well as:

* https://github.com/pods-framework/pods-code-library-generator
* https://github.com/pods-framework/grunt-pods-code-library
* https://github.com/pods-framework/grunt-wordpress