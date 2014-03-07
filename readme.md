# DH-Boilerplate

A bare-bones (work-in-progress) [Laravel 4](http://laravel.com) app setup for Digital Humanities projects. This is not a completed app,
just a skeleton with useful back- and front-end libraries, etc included. It won't do much out-of-the-box.

Delete the stuff you don't need to use.


##Requirements
- Meet the [Laravel Requirements](http://laravel.com/docs/installation#server-requirements)
- Have [Composer](http://getcomposer.org/) installed (for managing the PHP dependencies)
- Have [Bower](http://bower.io/) installed (for managing the front-end dependencies)

##Configuration:

1. Run `composer install`
2. Run `php artisan key:generate` to generate a new application key
3. If using User Accounts, run `php artisan auth:reminders` and `php artisan migrate`
4. Fill in the details in `/app/config/author.php` (and, optionally, the config files for `geo.php` and `europeana.php`)
5. Visit `/public` and run `bower install` to install the suggested Javascript packages (you need to have [Bower](http://bower.io/) installed)


##Routes

####Static Pages
View files for these can be found in `/app/views/static`
- /about
- /about/team
- /about/contact
- /about/development

Routes are also declared for 
- `/docs` (see DocReader section below)
- `/api/v1` - this route group is intended as a starting point for the app's API

##Resources

There's a basic `catalogue` resource declared in `app/routes.php` as a starting point for building an item catalogue.

Take a look at `app/controllers/CatalogueController.php` for its setup. View templates are in `app/views/catalogue`, with localisation options
for headings, labels, etc held in `app/lang/en/catalogue.php` and `app/lang/en/messages.php`. 

To set it up, run the database migration provided (and optionally seed the database with a single test record). Alter the migration schema and update the Catalogue model at `app/models/Catalogue.php` to extend it.


##Front-end related

There is some [NUIG](http://nuigalway.ie) branding included (as this was created for NUIG projects) - you can delete that from the `app/views/layout/layout_main.blade.php` file if using for a non-NUIG project.

####LESS
The skeleton uses [LESS](http://lesscss.org) for stylesheets. You'll need to use a pre-processor on them to generate the CSS - ([CodeKit](http://incident57.com/codekit/) and [Prepos](http://alphapixels.com/prepros/) are worth a look). Large parts of the styling are built on Twitter Bootstrap 3.0.*

####JavaScript
It includes a number of JavaScript libraries at `/public/js/bower_components/`. Versions can be set/updated running `bower install` on `/public/bower.json`
- [d3](http://github.com/mbostock/d3) `d3/d3.min.js`
- [jQuery](https://github.com/jquery/jquery) `jquery/jquery.min.js`
- [Leaflet.js](https://github.com/Leaflet/Leaflet) `leaflet/dist/leaflet.js`
- [Modernizr](https://github.com/Modernizr/Modernizr) `modernizr/modernizr.js` (there's a .min.js version, but that's created by
CodeKit, and is not downloaded as part of the library)
- Google Code Prettify
- Backbone.js
- Underscore.js

#### Grunt
To use [Grunt](http://gruntjs.org), update `/public/package.json` and `/public/Gruntfile.js` as required, and run `npm install` in `/public`.

##External Components
	
###[DocsReader](https://github.com/daylerees/docs-reader)
The documentation is handled by the integrated [DocsReader](https://github.com/daylerees/docs-reader) which produces documentation from Markdown files. You can find the markdown source in `/docs`. (`/docs/documentation.md` contains the left side navigation).

###[Guzzle](https://github.com/guzzle/guzzle) 
A "PHP HTTP client & framework for building RESTful web service clients"

###[GeoTools](https://github.com/toin0u/Geotools)
"A geo-related library, built atop Geocoder and React libraries.". This can be removed by deleting `"toin0u/geotools-laravel": "@stable"` from `/composer.json`)

To enable GeoTools, you need to un-comment the GeoTools related lines in the `providers` and `aliases` sections of 
`/app/config/app.php`. You can also use the `/app/config/geo.php` file for any geo related API keys, etc.


Some other optional integrations are included in the [NOTES.md](NOTES.md) file.





