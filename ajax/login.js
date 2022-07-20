// Login API Functionality

function Login(){
	formdata = new FormData(document.getElementById('login-form'));

	$.ajax({
		url: 'backend/access/login.php',
    	type: 'POST',
    	cache: false,
    	processData: false,
        contentType: false,
    	data: formdata,
    	beforeSend: function(){
    		$("#login-btn").attr("disabled", "disabled");
    	}
	})
	.done(function(res){
		var data = JSON.parse(res);
		console.log(data);
		$("#login-btn").removeAttr("disabled");
		if(data.status === "success"){
			$("#success_msg").removeClass("hidden");
			$("#success_msg").html("<h4> Login successful. You are being redirected to your dashboard! </h4>");
			window.location.replace("student/index.php");
		}
		else{
			$("#error_msg").removeClass("hidden");
			$("#error_msg").html("<h4>Invalid Login Details! </h4>")
		}
	})
}