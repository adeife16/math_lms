$(document).ready(function(){

	getSession();
})

function getSession(){
	$.ajax({
		type: 'GET',
		url: 'backend/session.php',
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			data = data.data;
			for (var index in  data) {
				sessionStorage.setItem(index, data[index]);
			}
			$("#session-greet").html("Welcome, " + data.fname);
		}
		else{
			window.location.replace('logout.php');
		}		
	})
}