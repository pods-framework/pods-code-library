pods-code-library
=================

Working towards a Pods code library and improved documentation.

Goals
=====

* Create an easy to contribute to code library for Pods.io
* Automatically populate Pods documentation from inline documentation in code.
* Open source and document the process to help others in the WordPress community do this.

Structure
=========

Each root folder except `/resources` and `/example` is the post type. `/resources` contains images and other resources that are uploaded to the server while `/examples` contains code examples to be used as partials.

Wordpress post files are generated out of .md or .html files, partials are always skipped.

### Partials

`@partial(/path/to/file)` import a file with a full path.

`@partial(./relative/to/current/file)` import a file relative to the current file.

### Pages `/pages`
Post type: page

### Learn `/learn`

Custom post type: ???

### Tutorials `/tutorials`

Custom post type: tutorial

### Cookbook `/cookbook`

Custom post type: cookbook-recipe

### Examples `/examples`

Custom post type: example

Installing Locally
=================
## Before Installing
Installing locally requires nodejs, Grunt  and npm.

* You can download a packaged installer for nodejs at: http://nodejs.org/download/

* Once nonejs is installed, you can install grunt and npm from the Terminal:
`$ npm install -g grunt-cli`

For more information see: http://gruntjs.com/getting-started

## Installing
* Clone this repository:

`$ git clone https://github.com/pods-framework/pods-code-library-generator.git`

* Change into its directory:
`$ cd pods-code-library-generator`

* Change config.sample.json to config.json
`$ mv config.sample.json config.json`

* Update npm
`$ npm update`

* Run Grunt
`$ grunt`
