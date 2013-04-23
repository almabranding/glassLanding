$(document).ready(function() {
	
	// hide form
	$('.form').hide();
	$('#send').hide();
	
	// click button, hide this and show text and form
	$('.button_home').click(function(e) {
		
                $('.button_video').hide();
		$(this).hide();
		$('#home').hide();
		
		
		$('.form').show();
		$('#send').show();
		
		$("#mail").focus();
		
		e.preventDefault();
			
	});
	
	// validate
	$("#contactform").validate({
	  rules: {
		mail: {
		  required: true,
		  email: true
		}
		
	  }
	});
	
	
});