$(document).ready(function(){
	getCourses();
})

$("#create-btn").click(function(e){
	e.preventDefault();

	var code = $("#cCode").val();
	var title = $("#ctitle").val();
	if(code == "" || title == ""){
		alert_failure("Fill all form fields")
	}
	else{
     	createCourse();
	}
	// $('#course-form input').each(function(){
	// 	var $this = $(this);

 //        if(!$this.val()) {
 //            $(this).addClass("border-red");
 //        }
 //        else{
 //        	$(this).removeClass("border-red");
 //        	createCourse();
 //        }
	// })

})

function showCourses(data){
	$("#courseTable").html("");
	for(let i = 0; i < data.length; i++){
		$("#courseTable").append(`
			<tr>
				<td>`+i+`</td>
				<td>`+data[i].course_code+`</td>
				<td>`+data[i].course_title+`</td>
				<td>
					<button type="button" class="btn btn-warning edit-btn" data-toggle="modal" data-target="#editModal" value="`+data[i].id+`"><i class="fas fa-pen"></i></button>
					<button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal" value="`+data[i].id+`"><i class="fas fa-trash"></i></button>
				</td>
			</tr>
		`);

	}
}

// display course details
function showCourseDetails(data){

	data = data[0];
	$("#course-edit").html(`

		<div class="form-group">
			<span for="cCode-update">Course Code</span>
			<input type="text" class="form-control" id="cCode-update" name="cCode-update" placeholder="Course Code" value="`+data.course_code+`">
		</div>
		<div class="form-group">
			<span for="cTitle">Course Title</span>
			<input type="text" class="form-control" id="cTitle-update" name="cTitle-update" placeholder="Course Title" value="`+data.course_title+`">
		</div>
	`)
	$("#edit-form-action").html(`
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" id="update-btn" value="">Update</a>
	`)
}

// event listeners
$(document).on('click', '.delete-btn', function(e){
	e.preventDefault();

	var cid = $(this).val();
	if(cid == ""){

	}
	else{
		$("#delete-confirm").val(cid);
	}
})

$("#delete-confirm").click(function(e){
	e.preventDefault();
	var cid = $(this).val();
	deleteCourse(cid);
})

$(document).on('click', '.edit-btn', function(e){
	e.preventDefault();

	var cid = $(this).val();
	getCourseDetails(cid);
})

$(document).on('click', '#update-btn', function(e){
	e.preventDefault();
	var cCode = $("#cCode").val();
	var cTitle = $("#ctitle").val();
	if(cCode == "" && cTitle == ""){
		alert_failure("All form fields are required");
	}
	else{
		updateCourse();
	}
})
