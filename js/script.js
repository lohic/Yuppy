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

	/*$('#newsletter-sign').popover({
		content:$("#mailchimp").html(),
	});*/	


	/**
	 * GESTION DES ROLLOVERS DE LA HOME
	 * @param  {[type]} event [description]
	 * @return {[type]}       [description]
	 */
	$('.whatsound-bloc .vignette').on('mouseenter mouseleave',function(event){
		//console.log(event.type);
		if(event.type == 'mouseenter'){
			$(this).parent().parent().find('h3 a').addClass('hover');
		}
		if(event.type == 'mouseleave'){
			$(this).parent().parent().find('h3 a').removeClass('hover');
		}
	});


	$('.yuppyyap-bloc .vignette').on('mouseenter mouseleave',function(event){
		//console.log(event.type);
		if(event.type == 'mouseenter'){
			$(this).parent().parent().find('h3 a').addClass('hover');
			$(this).parent().parent().find('.extrait a').addClass('hover');
		}
		if(event.type == 'mouseleave'){
			$(this).parent().parent().find('h3 a').removeClass('hover');
			$(this).parent().parent().find('.extrait a').removeClass('hover');
		}
	});

	$('.yuppyyap-bloc .extrait').on('mouseenter mouseleave',function(event){
		//console.log(event.type);
		if(event.type == 'mouseenter'){
			$(this).parent().parent().find('h3 a').addClass('hover');
		}
		if(event.type == 'mouseleave'){
			$(this).parent().parent().find('h3 a').removeClass('hover');
		}
	});

	$('.yuppyyap-bloc h3 a').on('mouseenter mouseleave',function(event){
		//console.log(event.type);
		if(event.type == 'mouseenter'){
			$(this).parent().parent().parent().find('.extrait a').addClass('hover');
		}
		if(event.type == 'mouseleave'){
			$(this).parent().parent().parent().find('.extrait a').removeClass('hover');
		}
	});

});