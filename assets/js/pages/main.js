function getSession(){
	$.ajax({
		type: 'POST',
		url: 'backend/session.php',
		cache: false,
		beforeSend: function(){
			
		}

	})
	.done(function(res){
		console.log(res);
	})
}
alert("done")