function getEnrolled(){
	$.ajax({
		type: 'POST',
		url: 'backend/dashboard.php',
		data: {
			getEnrolled: ""
		},
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			showEnrolled(data.data);
		}
	})
}
