$(document).ready(function(){
	// $('.completed-checkbox').change(function(){

	//     if($(this).is( ':checked' )){
	//           $(this).val('1');
	//      }else{
	//           $(this).val('0');
	//      }
	// });


	$('.recurring-checkbox').change(function(){

	    if($(this).is( ':checked' )){
	    		$(this).val('1');
	          $('.date-finish').fadeOut('slow');
	     }else{
	     		$(this).val('0');
	          $('.date-finish').fadeIn('slow');
	     }
	});

	$( '.start-date' ).datepicker({ dateFormat: 'dd-M-yy' }).val();
	$( '.target-date' ).datepicker({ dateFormat: 'dd-M-yy' }).val();

});


