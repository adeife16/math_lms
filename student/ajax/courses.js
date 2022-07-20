// function to get all courses
function getCourses(){
	$.ajax({
		type: 'GET',
		url: 'backend/courses.php',
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			if(data.data != "empty"){
				showCourses(data.data);
			}
			else{

			}
		}
	})
}

// function to enroll for a course
function enroll(id){
	$.ajax({
		type: 'POST',
		url: 'backend/courses.php',
		data: {
			enroll: id
		},
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success("You have enrolled for this course");
		}
		else if(data.status === "already enrolled"){
			alert_success("You have already enrolled for this course");
		}
		else{
			alert_failure("An error has occurred. Contact the Admin");
		}
		console.log(data);
	})
}

// function to unenroll from a course
function unEnroll(id){
		$.ajax({
		type: 'POST',
		url: 'backend/courses.php',
		data: {
			unEnroll: id
		},
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success("You have unenrolled for this course");
		}
		else if(data.status === "not enrolled"){
			alert_success("You have not enrolled for this course");
		}
		else{
			alert_failure("An error has occurred. Contact the Admin");
		}
		console.log(data);
	})	
}