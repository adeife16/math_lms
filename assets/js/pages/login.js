$(document).ready(function(){

})

$("#login-btn").click(function(e){
	e.preventDefault();
	var matric = $("#login-matric").val();
	var pass = $("#password").val();

	if(matric == "" || password == ""){
		$("#error_msg").removeClass("hidden");
		$("#error_msg").html("<h4>All Form Fields Are Required!</h4>");
	}
	else{
		$("#error_msg").addClass("hidden");
		Login();
	}
})