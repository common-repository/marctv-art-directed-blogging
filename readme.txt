=== MarcTV Art Directed Blogging ===
Contributors: MarcDK
Tags: custom css, art directed blogging, styled articles, uniques, css, marctv
Requires at least:
Tested up to: 4.4
Stable tag: 1.7.1

== Description ==

Adds the ability to add a custom field with a reference to a css file and generates a css namespace with the class '.artdirected'. This plugin also adds a jquery switch to the top right corner to deactivate and activate the custom styles.
A collection of articles which make use of this plugin can be found here: http://www.marc.tv/blog/tag/art-directed-blogging/

= Credits =

This plugin uses ideas and code snipplets from [codecandies](http://codecandies.de/2009/12/01/individuelle-artikelgestaltung-mit-wordpress/ "codecandies.de"). 

== Installation ==

* Activate plugin.
* Make a new directory called 'articlestyles' in your '/wp-content/' folder: `/wp-content/articlestyles/`
* Add a new custom field to the article you want to design and name it "extraCss".

Now you can put css files for each article in `/wp-content/articlestyles/[custom_field_value]/[custom_field_value].css`

= Example =

* Make a new custom field called "extraCss" within your article with the article editor. cf. [screenshot](http://wordpress.org/extend/plugins/marctv-art-directed-blogging/screenshots/ "screenshot1")
* Use the value "limbo" for example.
* Make a new directory called "limbo" with your '/wp-content/articlestyles/' folder: `/wp-content/articlestyles/limbo`
* Put a css file called `limbo.css` into this folder
* Start every css declaration with '.artdirected'. This works because this plugin adds this class to the body of the article.
* e.g. to change the color of the title to red just write '.artdirected .title {color: red;}' into this css file.
* You can also put your images for each article in this folder and reference them directly:

`.artdirected{
    // this adds a background image to the body tag.
    background:url("body_background.jpg") no-repeat scroll top center #000;
}`

The advantage of this 'css namespace' is that you can disable the styles easily if you don't want them anymore.

have fun!

articles which make use of this plugin can be found here: http://www.marctv.de/blog/tag/art-directed-blogging/

== Changelog ==

= 1.7 =

* fixed globals.
* added dashicons.
* cleaned up code

= 1.6.2 = 

* Switch works in Firefox again. 

= 1.6.1 = 

* Additional jQuery Selector for navigation menu.

= 1.5.1 = 

* Changed symbols and added help text. Re-added jump to header while switching adb on or off.

= 1.4.1 =
* fixed $id bug on archive pages


= 1.4 =
* removed the figure tag crap

= 1.2.2 =
* added figure tag

= 1.2 =
Fixed some typos

= 1.0 =
First version.

* Added option to the remove the js style switcher. You can find it in your blog settings panel.
* Added more infos to the installation section of the plugin's readme.txt. Thanks to Kim S. for helping me with potential theme problems ;-)

= 1.2.1 =

* added new plugin homepage






== Frequently Asked Questions ==

= Your plugin does not work! =

Look at the generated HTML source code of your article. Search for `id='extraCss-css'`. If you can not find it check your `header.php` of your theme and look for `<php wp_head(); ?>`. This function has to be present because the plugin add the css this way.

= It is still not working! =

If `id='extraCss-css'` is present in your source code please check the path in the css reference.

= Ok, the css is there but I am not able to use the prefix .artdirected. =

It seems that your theme is missing `<body <?php body_class(); ?>>` in your `header.php` instead of `<body>`;

== Screenshots ==

1. new custom field
2. directory listing of articlestyles
