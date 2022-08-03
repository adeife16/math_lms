// get all exam
function getExams(){
	$.ajax({
		type: 'GET',
		url: 'backend/exam.php?exam=all',
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
		url: 'backend/exam.php?course=all',
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
// create Exam
function createExam(course, time){
	$.ajax({
		type: 'POST',
		url: 'backend/exam.php',
		data: {
			createExam: course,
			time: time
			
		},
		cache: false,
		beforeSend: function(){
			$("#submit").attr("disabled", "disabled");
		}
	})
	.done(function(res){
		$("#submit").removeAttr("disabled");
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success(`Exam has been created`);
			data = data.data;
					setTimeout(function(){
					window.location.replace("create_exam.php?exam="+data.exam+"&course="+data.course);
			}, 2000);
		}
	})
}