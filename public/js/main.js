$(document).ready(function() {

	// Requirement that all external links open in 
	// a new tab
    $('a[href^="http://"]').filter(function() {
        return this.hostname && this.hostname !== location.hostname;
    }).attr('target', '_blank');  
});
