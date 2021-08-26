$(document).ready(function(){
 jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");
jQuery.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^\w+$/i.test(value);
}, "Letters, numbers, and underscores only please");

	
	$("#register_form").validate({
		submitHandler : function(e) {
		    $(form).submit();
		},
		rules : {
			name : {
				required : true
			},
			email : {
				required : true,
				email: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
			},
			username : {
				required : true,
				noSpace: true,
				alphanumeric: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#username" ).val();
						}
					}
				}
			},
			password : {
				required : true
			},
			title : {
				required : true
			},
			confirm_password : {
				required : true,
				equalTo: "#password"
			}
		},
		messages : {
			name : {
				required : "Please enter full name"
			},
			name : {
				required : "Please enter title like 'Web Developer'"
			},
			username : {
				required : "Please enter username",
				remote : "username already exists",
				noSpace : "No space please and don't leave it empty",
				alphanumeric : "please use only alphanumeric or alphabetic characters"
			},
			email : {
				required : "Please enter email",
				remote : "Email already exists"
			},
			password : {
				required : "Please enter password"
			},
			confirm_password : {
				required : "Please enter confirm password",
				equalTo: "Password and confirm password doesn't match"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});

	$("#login_form").validate({
		submitHandler : function(e) {
		    $(form).submit();
		},
		rules : {
			username : {
				required : true
			},
 			password : {
				required : true
			},
		},
		messages : {
			username : {
				required : "Please enter username",
 			},
			password : {
				required : "Please enter password"
			},
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	
	$("#forget_form").validate({
		submitHandler : function(e) {
		    $(form).submit();
		},
		rules : {
			username : {
				required : true
			},
 		},
		messages : {
			username : {
				required : "Please enter Username or Email",
 			},
 		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	

	$("#contactform").validate({
		rules : {
			name : {
				required : true
			},
			email : {
				required : true,
				email: true
 			},
 		},
		messages : {
			name : {
				required : "Please enter full name"
			},
 			email : {
				required : "Please enter email",
 			},
 		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		},
		submitHandler : function(e) {
		//	console.log($("#contactform").serialize());
		$.ajax({
		   type: "POST",
		   url: "contact.php",
		   data: $("#contactform").serialize(),
		   success: function(msg)
		   {
			   console.log(msg);
			   var arr = explode('$#$',msg);
				if(arr[0] == 'SEND'){
				$.bootstrapGrowl(arr[1], {
							type: 'success',
							align: 'right',
							width: '300',
							allow_dismiss: false
						}); 
				swal("Sent..", arr[1], "success");		
				}
				else{
					$.bootstrapGrowl(arr[1], {
							type: 'danger',
							align: 'right',
							width: '300',
							allow_dismiss: false
						}); 
					swal("Oops...",arr[1],"error");	
					//response = '<div class="error">'+ arr[1] +'</div>';
				}
				//	$("#contactform")[0].reset();
				// Hide any previous response text
				//$(".error,.success").remove();
				// Show response message
				//$('#contact-status').html(response);
			}
		 });
		return false;


		},
	});

	
});
function explode(delimiter, string, limit) {
  //  discuss at: http://phpjs.org/functions/explode/
  // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  //   example 1: explode(' ', 'Kevin van Zonneveld');
  //   returns 1: {0: 'Kevin', 1: 'van', 2: 'Zonneveld'}

  if (arguments.length < 2 || typeof delimiter === 'undefined' || typeof string === 'undefined') return null;
  if (delimiter === '' || delimiter === false || delimiter === null) return false;
  if (typeof delimiter === 'function' || typeof delimiter === 'object' || typeof string === 'function' || typeof string ===
    'object') {
    return {
      0: ''
    };
  }
  if (delimiter === true) delimiter = '1';

  // Here we go...
  delimiter += '';
  string += '';

  var s = string.split(delimiter);

  if (typeof limit === 'undefined') return s;

  // Support for limit
  if (limit === 0) limit = 1;

  // Positive limit
  if (limit > 0) {
    if (limit >= s.length) return s;
    return s.slice(0, limit - 1)
      .concat([s.slice(limit - 1)
        .join(delimiter)
      ]);
  }

  // Negative limit
  if (-limit >= s.length) return [];

  s.splice(s.length + limit);
  return s;
}