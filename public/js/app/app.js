/**
 * Backbone application
 */

// Sample application code using the pre-set /catalogue
// api 

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
  		geo_long: ''
  	},

});

var iCatalogue = new Catalogue({ id: 7});

var fetchSuccess = function() {
	console.log(iCatalogue.get('title'));
};

// 

var SingleCatalogueView = Backbone.View.extend({
	tagName:  'article',

	el: '#catalogue-holder',

	template: _.template('#catalogue-item'),

	render: function() {
	    this.$el.html(this.template(this.model.attributes));
	    return this;
	}
});

var ListCatalogueView = Backbone.View.extend({
	tagName: 'article',
	el: '#catalogue-list'
});
