$(document).ready(function () {

	function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
	};

     validPass = false;
     validEmail = false;
	$(document).on("keyup", "input[type='password']", function() {
		pass = $(this).val();
     	if (pass.length < 8) {
     		if(!$(this).hasClass('notValid')) {
     			$(this).addClass('notValid');
     		}
     		if($(this).hasClass('Valid')) {
     			$(this).removeClass('Valid');
     		}
     		validPass = false;
     	} else {
     		if($(this).hasClass('notValid')) {
     			$(this).removeClass('notValid');
     		}
     		if(!$(this).hasClass('Valid')) {
     			$(this).addClass('Valid');
     		}
     		validPass = true;
		}
		if(validPass && validEmail) {
			$('input[type=submit]').prop( "disabled", false );
		} else {
			$('input[type=submit]').prop( "disabled", true );
		}
	});

	$(document).on("keyup", "input[type='email']", function() {	
		email = $(this).val();
		if(ValidateEmail(email)) {
			if($(this).hasClass('notValid')) {
     			$(this).removeClass('notValid');
     		}
     		if(!$(this).hasClass('Valid')) {
     			$(this).addClass('Valid');
     		}
     		validEmail = true;
		} else {
			if(!$(this).hasClass('notValid')) {
     			$(this).addClass('notValid');
     		}
     		if($(this).hasClass('Valid')) {
     			$(this).removeClass('Valid');
     		}
     		validEmail = false;
		}
		if(validPass && validEmail) {
			$('input[type=submit]').prop( "disabled", false );
		} else {
			$('input[type=submit]').prop( "disabled", true );
		}
	});
});