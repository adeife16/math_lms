// get course code
function getCourses(){
	$.ajax({
		type: 'GET',
		url: 'backend/topic.php',
		cache: false
	})
	.done(function(res){
		var data = JSON.parse(res);
		// console.log(res)
		if(data.status === "success"){
			showCourses(data.data);
		}
		else{

		}
	})
}

// create new topic
function createTopic(){
	var formdata = new FormData(document.getElementById('topic-form'));
	$.ajax({
		type: 'POST',
		url: 'backend/topic.php',
		data: formdata,
		contentType: false,
		processData: false,
		cache: false,
		beforeSend: function(){
			$("#create-btn").attr("disabled", "disabled");
		}
	})
	.done(function(res){
		$("#create-btn").removeAttr("disabled");
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success("Topic created successfully. You are being redirected to the content page");
			setTimeout(function(){
					window.location.replace("edit_topic.php?topic_id="+data.data);
			}, 2000);
		}
		else{
			alert_failure("Topic already exists for this course");
		}
	})
}
// get all Topics
function getTopics(){
	$.ajax({
		type: 'POST',
		url: 'backend/topic.php',
		data: {
			getTopics: 'get',
		},
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		console.log(data);
		if(data.status === "success"){
			showTopics(data.data);
		}
		else {

		}
	})
}
// delete a topic
function deleteTopic(tid){
	$.ajax({
		url: 'backend/topic.php',
		type: 'POST',
		cache: false,
		data: {delete: tid},
		beforeSend: function(){
			$("#delete-confirm").attr("disabled", "disabled");
		}
	})
	.done(function(res) {
		$("#delete-confirm").removeAttr('disabled');
		var data = JSON.parse(res);
		if(data.status === "success"){
			$("#deleteModal").click();
			getTopics();
			alert_success("Topic Deleted!");
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

}
