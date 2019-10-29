$(document).ready(function(){
	$('.completed-checkbox').change(function(){

	    if($(this).is( ':checked' )){
	          $(this).val('1');
	     }else{
	          $(this).val('0');
	     }
	});
});


