$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: 'backend/session.php',
		cache: false
	})
	.done(function(res){
		var data = JSON.parse(res);
		console.log(data);
		if(data.status === "success"){
			data = data.data;
			for (var index in  data) {
				sessionStorage.setItem(index, data[index]);
			}
		}
	})
})