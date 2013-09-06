/**
 * Backbone application
 */

// app code can go here...

var Catalogue = Backbone.Model.extend({
	initialize: function(){
    	
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



var catalogueCollection = Backbone.Collection.extend({
	model: Catalogue,
	url : '/api/v1/catalogue'
});


var modelSuccess = function(model, response, options){
	// console.log(model.toJSON());
}

var iCatalogue = new Catalogue({ id: 1});
// iCatalogue.fetch({success: modelSuccess});

var fetchSuccess = function(c) {
	
	// console.log( c.toJSON());
	
};

var coll = new catalogueCollection();
// coll.fetch({success: fetchSuccess});



// 
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

// var single = new SingleCatalogueView();



var TableCatalogueView = Backbone.View.extend({
	model: Catalogue,
	el: '#catalogue-table'
});

