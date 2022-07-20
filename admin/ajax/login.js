function login(){
	var formdata = new FormData(document.getElementById('login-form'));
	$.ajax({
		type: 'POST',
		url: 'backend/access.php',
		data: formdata,
		contentType: false,
		processData: false,
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			for(let index in data.data){
				sessionStorage.setItem(index, data.data[index]);
			}

			window.location.replace("dashboard.php");
		}
	})
}