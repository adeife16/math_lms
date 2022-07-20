function getContents(tid){
	$.ajax({
		type: 'POST',
		url: 'backend/topic.php',
		data: {
			getContents: tid 
		},
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		console.log(data);
		if(data.status === "success"){
			$("#topicName").html(data.data[0].topic_name)
			showContents(data.data);

		}

	})
}

// create a new content
function createContent(title, topic){
	$.ajax({
		type: 'POST',
		url: 'backend/content.php',
		data: {
			createContent: title,
			topic: topic
		},
		beforeSend: function(){

		}
	})
	.done(function(res){
		let data = JSON.parse(res);
		if(data.status === "success"){
			window.location.assign('topic_end.php?topic_id='+topic+'&course_id='+course);
		}
	})
}

// delete a content
function deleteContent(index, topic){
	$.ajax({
		type: 'POST',
		url: 'backend/topic.php',
		data: {
			deleteContent: index,
			topic: topic
		},
		beforeSend: function(){
			$("#delete-confirm").attr("disabled", "disabled")
		}
	})
	.done(function(res){
		$("#delete-confirm").removeAttr("disabled");
		let data = JSON.parse(res);
		if(data.status === "success"){
			$("#deleteModal").click();
			alert_success("Content has been deleted");
			getContents(topic);

		}
	})
}