# Custom Responsive WordPress Theme

This is the theme I've developed for [El Blog de Manu](http://elblogdemanu.com/). It's very simple and it has many harcoded values and shortcuts to make it fast. It can be used as a base for your theme, changing some images, throwing some `bloginfo()` functions or changing some literals.

## Install

First, download WordPress and configure it. Then clone or download this repository and move the directory to `wp-content/themes`.

These plugins are used for optimal performance:

* [Post-Plugin Library](https://wordpress.org/plugins/post-plugin-library/) and [Similar Posts](https://wordpress.org/plugins/similar-posts/) to show related posts. If you don't want this functionality, you can remove the call to `similar_posts()` in single.php.
* [Proper Pagination](https://wordpress.org/plugins/proper-pagination/) to build the nav links near the bottom of the page.

## Notes

* All dates are formatted in spanish, and it's intended for a [WordPress ES](https://es.wordpress.org/) installation.
* There are two page templates: `archivo.php` for showing archives, and `enlaces.php` to show links. The last one is heavily customized to my needs.
* The stylesheet file is built using Compass. I've included the [Prepros](https://prepros.io/) configuration file.
* [Post thumbnails](http://codex.wordpress.org/Post_Thumbnails) are used to show my favourite posts under the "Destacados" header. The images should be 640 pixels wide by 200 pixels tall in order to look great both on mobile and retina screens.
* This theme makes use of the [Open Sans](https://www.google.com/fonts/specimen/Open+Sans) font, [Font Awesome](http://fortawesome.github.io/Font-Awesome/) icons, and [normalize-scss](https://github.com/JohnAlbin/normalize-scss).