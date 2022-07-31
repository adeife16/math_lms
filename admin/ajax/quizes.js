// get all quizes
function getQuizes(){
	$.ajax({
		type: 'GET',
		url: 'backend/quiz.php?quiz=all',
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		let data = JSON.parse(res);
		console.log(data.data);
		if(data.status === "success"){
			showQuizes(data.data);
		}
	})
}

// get all courses
function getCourses(){
	$.ajax({
		type: 'GET',
		url: 'backend/quiz.php?course=all',
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			showCourses(data.data);
		}

	})
}

// get topics
function getTopics(cCode){
	$.ajax({
		type: 'GET',
		url: 'backend/quiz.php?course='+cCode+'&topic=all',
		cache: false,
		beforeSend: function() {
			$("#topic").html(`<option value="">Please Wait...</option>`)
		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			showTopics(data.data);
		}

	})
}

// create Quiz
function createQuiz(course, topic){
	$.ajax({
		type: 'POST',
		url: 'backend/quiz.php',
		data: {
			createQuiz: 'get',
			course: course,
			topic: topic
			
		},
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success(`Quiz has been created`)
			data = data.data;
					setTimeout(function(){
					window.location.replace("create_quiz.php?quiz="+data.quiz+"&topic="+data.topic+"&course="+data.course);
			}, 2000);
		}
	})
}

function deleteQuiz(id){
	$.ajax({
		type: 'POST',
		url: 'backend/quiz.php',
		data: {
			deleteQuiz: id
		},
		cache: false,
		beforeSend: function(){
			$("#delete-confirm").attr("disabled", "disabled");
		}
	})
	.done(function(res){
		$("#delete-confirm").removeAttr("disabled");
		let data = JSON.parse(res);
		if(data.status === "success"){	
			alert_success("Quiz has been deleted");
			getQuizes();
		}
		else{
			alert_failure("Error deleting quiz");
		}
	})
}