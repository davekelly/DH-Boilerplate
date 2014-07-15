#Optional Packages

Useful additional packages that can be installed via composer:

- EasyRDF: `"easyrdf/easyrdf": "*"`
- Solarium: `"solarium/solarium": "*"`
- Guzzle: `"guzzle/guzzle": "3.*"`,
- GeoTools (for Laravel): `"toin0u/geotools-laravel": "@stable"`


###[Guzzle](https://github.com/guzzle/guzzle) 
A "PHP HTTP client & framework for building RESTful web service clients"

###[GeoTools](https://github.com/toin0u/Geotools)
"A geo-related library, built atop Geocoder and React libraries.". This can be removed by deleting `"toin0u/geotools-laravel": "@stable"` from `/composer.json`)

To enable GeoTools, you need to un-comment the GeoTools related lines in the `providers` and `aliases` sections of 
`/app/config/app.php`. You can also use the `/app/config/geo.php` file for any geo related API keys, etc.

