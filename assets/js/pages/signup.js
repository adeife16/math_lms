$(document).ready(function(){

});


// sign up button click listener
$("#signup-btn").click(function(e){
	e.preventDefault();

	//  validate signup form inputs

	var fname = $("#first_name").val();
	var lname = $("#last_name").val();
	var email = $("#registration_email").val();
	var matric = $("#registration_matric").val();
	var dob = $("#dob").val();
	var faculty = $("#faculty").val();
	var dept = $("#dept").val();
	var pass = $("#registration-password").val();
	var con_pass = $("#confirm-password").val();


	if(fname == "" || lname == "" || email == "" || matric == "" || dob == "" || faculty == "" || dept == "" || pass == ""){
		$("#error_msg").removeClass("hidden");
		$("#error_msg").html("<h4>All Form Fields Are Required!</h4>");
	}
	else if(pass != con_pass){
		$("#error_msg").html("Passwords Do Not Match");
	}
	else{

		$("#error_msg").addClass("hidden");
		Signup();
	}

})


// password match event listener

$("#confirm-password").change(function(){
	var pass = $("#registration-password").val();
	var con_pass = $(this).val();

	if(pass != con_pass){
		$(this).addClass("border-red");
	}
	else{
		$(this).removeClass("border-red");
	}
})