//  Sign up API functionality

function Signup(){
	var formdata = new FormData(document.getElementById('signup-form'));

	$.ajax({
		url: 'backend/access/signup.php',
    	type: 'POST',
    	cache: false,
    	processData: false,
        contentType: false,
    	data: formdata,
    	beforeSend: function(){
    		$("#signup-btn").attr("disabled", "disabled");
    	}
	})
	.done(function(res){
		var data = JSON.parse(res);
		$("#signup-btn").removeAttr("disabled");
		if(data.status === "success"){
			$("#success_msg").removeClass("hidden");
			$("#success_msg").html("<h4> Signup successful. You'll be notified when your account gets activated! </h4>");
		}
		else{
			$("#error_msg").removeClass("hidden");
			$("#error_msg").html("<h4>An error occured when trying to sign you up please try again! </h4>")
		}
	})

}