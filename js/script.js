/**
 * YUPPY SCRIPT
 */
/*
$(document).ready( function(){

	

});*/

jQuery.noConflict();


jQuery( document ).ready(function( $ ) {

	$('#carousel-home').on('slide.bs.carousel', function () {
	  // do something…
	  //$('#carousel-home').carousel('pause');
	  // console.log("pret à slider");
	});

	$('#carousel-home').on('slid.bs.carousel', function () {
	  // do something…
	  // console.log("fin du slide");
	});

	$('.whatsound-bloc .vignette').on('mouseenter mouseleave',function(event){
		//console.log(event.type);
		if(event.type == 'mouseenter'){
			$(this).parent().parent().find('h3 a').addClass('hover');
		}
		if(event.type == 'mouseleave'){
			$(this).parent().parent().find('h3 a').removeClass('hover');
		}

		// console.log($(this).parent().parent().find('h3 a').text());
	});

});