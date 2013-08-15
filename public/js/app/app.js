/**
 * Backbone application
 */

// app code can go here...

var Catalogue = Backbone.Model.extend({
	initialize: function(){
    	console.log('This model has been initialized.');

    	this.on('change', function(){
	        console.log('- Values for this model have changed.');
	    });
  	},

  	urlRoot: '/api/v1/catalogue',

  	defaults: {
  		id: null,
  		title: '',
  		description: '',
  		location: '',
  		image_url: '',
  		geo_lat: '',
  		geo_lon: ''
  	},

});
