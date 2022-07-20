// create course
function createCourse(){
	var formdata = new FormData(document.getElementById('course-form'));
	$.ajax({
		type: 'POST',
		url: 'backend/courses.php',
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
		console.log(data);
		if(data.status === "success"){
			alert_success("Course created successfully");
		}
		else{
			alert_failure("Could not create course try again");
		}
	})
}

// get all courses
function getCourses(){
	$.ajax({
		type: 'GET',
		url: 'backend/courses.php',
		cache: false,
	})
	.done(function(res){
		var data = JSON.parse(res);

		if(data.status === "success"){
			showCourses(data.data);
		}
	})
}

// get a course details
function getCourseDetails(cid){
	$.ajax({
		type: 'POST',
		url: 'backend/courses.php',
		data: {
			getCourse: cid
		},
		cache: false,
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			showCourseDetails(data.data);
		}
		else{
			$("#course-edit").html(`<h2 style="color: red">An error has occured please contact the admin</h2>`);
		}
	})
}

// update a course
function updateCourse(){
	var formdata = new FormData(document.getElementById('course-edit'));

	$.ajax({
		type: 'POST',
		url: 'backend/courses.php',
		data: formdata,
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function(){
			$("#update-btn").attr("disabled", "disabled");
		}
	})
	.done(function(res){
			$("#update-btn").removeAttr("disabled");
			console.log(res)
			var data = JSON.parse(res);
			if(data.status === "success"){
				getCourses();
				$(".close").click();
				alert_success("Course Details Updated")
			}
			else{

			}
	})
}

// delete a course
function deleteCourse(cid){
		$.ajax({
			type: 'POST',
			url: 'backend/courses.php',
			data: {
				deleteCourse: cid
			},
			cache: false,
			beforeSend: function(){
				$("#delete-confirm").attr("disabled", "disabled");
			}
		})
		.done(function(res){
			$("#delete-confirm").removeAttr("disabled");
			var data = JSON.parse(res);
			if(data.status === "success"){
				getCourses();
				$(".close").click();
				alert_success("Course has been Deleted");
			}
		})
}
