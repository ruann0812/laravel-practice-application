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
	          //$('.date-finish').fadeOut('slow');
	     }else{
	     		$(this).val('0');
	          //$('.date-finish').fadeIn('slow');
	     }
	});


	$(function () {
		$('#datetimepicker1').datetimepicker({
			format: 'DD-MMM-YYYY LT'
		});
		$('#datetimepicker2').datetimepicker({
			format: 'DD-MMM-YYYY LT'
		});

	});


});


