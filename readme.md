# DH-Boilerplate

A bare-bones Laravel 4 app setup for projects.

##Configuration:

1. Run `composer install`
2. Run `php artisan key:generate` to generate a new application key
3. Fill in the details in `/app/config/author.php`


It includes:
	
###[DocsReader](https://github.com/daylerees/docs-reader)
The documentation is handled by the integrated [DocsReader](https://github.com/daylerees/docs-reader) which produces documentation from
Markdown files. You can find the files in `/docs`

###[Solarium](https://github.com/basdenooijer/solarium) 
Support for [Solr](http://lucene.apache.org/solr/). This can be removed by deleting `"solarium/solarium": "2.4.0"` from `/composer.json`

###[GeoTools](https://github.com/toin0u/Geotools)
"A geo-related library, built atop Geocoder and React libraries.". This can be removed by deleting `"toin0u/geotools-laravel": "@stable"` from `/composer.json`)

To enable GeoTools, you need to un-comment the GeoTools related lines in the `providers` and `aliases` sections of 
`/app/config/app.php`. You can also use the `/app/config/geo.php` file for any geo related API keys, etc.


##Front-end related

####LESS
The skeleton uses [LESS](http://lesscss.org) for stylesheets. You'll need to use a process them using something (CodeKit is 
good).

####JavaScript
It includes a number of JavaScript libraries at `/public/js/bower_components/`. Versions can be set/updated using `/public/js/bower.json`
- [d3](http://github.com/mbostock/d3) `d3/d3.min.js`
- [jQuery]https://github.com/jquery/jquery) `jquery/jquery.min.js`
- [Leaflet.js](https://github.com/Leaflet/Leaflet) `leaflet/dist/leaflet.js`
- [Modernizr](https://github.com/Modernizr/Modernizr) `modernizr/modernizr.js` (there's a .min.js version, but that's created by
CodeKit, and is not downloaded as part of the library)




