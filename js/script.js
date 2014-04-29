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
	  console.log("pret à slider");
	});

	$('#carousel-home').on('slid.bs.carousel', function () {
	  // do something…
	  console.log("fin du slide");
	});

});