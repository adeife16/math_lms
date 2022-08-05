function getExams(exam, course){
	$.ajax({
		type: 'GET',
		url: 'backend/create_quiz.php?exam='+exam+'&course='+course,
		cache: false,
		beforeSend: function() {

		}
	})
	.done(function(res){
		// console.log(res);
		var data = JSON.parse(res);
		console.log(data)
		if(data.status === "success"){
			showQuizes(data.data);
		}
		else{
			$("#quiz-div").html("")
		}
	})
}

function save(exam){
	$.ajax({
		type: 'POST',
		url: 'backend/create_exam.php',
		data: {
			saveExam: exam
		},
		cache: false
	})
	.done(function(res){
		let data = JSON.parse(res);
		if(data.status === "success"){	
			alert_success("question autosaved");
		}
		else{
			alert_failure("error saving question");
		}
	})
}

function del(quiz){
	$.ajax({
		type: 'POST',
		url: 'backend/create_quiz.php',
		data: {
			deleteQuiz: quiz
		},
		cache: false
	})
	.done(function(res){
		let data = JSON.parse(res);
		if(data.status === "success"){
			alert_success("question deleted")
			var url = window.location.href;
			url = url.split('?');
			url = url[1].split('&');
			var quiz = url[0].split("=");
			quiz = quiz[1];
			var topic = url[1].split("=");
			topic = topic[1];
			getQuizes(quiz, topic);
		}
		else{
			alert_failure("error deleting question")
		}
	})
}