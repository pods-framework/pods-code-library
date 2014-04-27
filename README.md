pods-code-library
=================

Working towards a Pods code library and improved documentation.

Goals
=====

* Create an easy to contribute to code library for Pods.io
* Automatically populate Pods documentation from inline documentation in code.
* Open source and document the process to help others in the WordPress community do this.

Inspiration
===========
http://contribute.jquery.org/web-sites
https://github.com/easydigitaldownloads


Road Map For This Project
========================
* @unknownnf Works on a prototype of the doc import [issue](https://github.com/pods-framework/pods-code-library/issues/1)
* shelob9 and naomicbush figure out the structure for the format of the code example library component. [issue](https://github.com/pods-framework/pods-code-library/issues/2)
* shelob9 lays out the example library and works with doc team to get some inital content in there.
* Build working example for code import and example code library on a new site in Pods.io wpengine account.

Structure
=========

Each root folder except `/resources` is the post type. `/resources` contains images and other resources that are uploaded to the server.

Currently `@posttype(path/to/post-file.md)` can be used for imports.

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