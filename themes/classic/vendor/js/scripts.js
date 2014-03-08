$(window).load(function() 
{
	var thumb = $('.footer .post-list .featured-thumbnail a');
	var flickr = $('#flickr .flickr_li .thumbnail');
    
    addSpan(thumb);
    addSpan(flickr);
    
    function addSpan(object){
        for(var i=0; i < object.length; i++){
            object.eq(i).append('<span><b></b></span>');
        }
    }
    
})