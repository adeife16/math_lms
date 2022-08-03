$(document).ready(function(){
	getExams();
	getCourses();
})
// create exam
$("#submit").click(function(e){
	e.preventDefault();

	let course = $("#course").val();
	let topic = $("#topic").val();
	if(course == "" || topic == "")
	{
		alert_failure("Fill all form fields");
	}
	else
	{
		createExam(course, topic);
	}
})

// display courses dropdown
function showCourses(data){
	$("#course").html("");
	$("#course").append(`<option value="">Select Course</option>`);
	for(let i = 0; i < data.length; i++){
		$("#course").append(`
			<option value="`+data[i].id+`">`+data[i].course_title+`(`+data[i].course_code+`)</option>
		`)
	}
}
// display courses dropdown
function showTopics(data){
	$("#topic").html("");
	for(let i = 0; i < data.length; i++){
		$("#topic").append(`
			<option value="`+data[i].topic_id+`">`+data[i].topic_name+`</option>
		`)
	}
}
// get topics
$("#course").change(function(){
	let cCode = $(this).val();

	if(cCode != ""){
		getTopics(cCode);
	}
})

// display quizes
function showQuizes(data){
	$("#quizTable").html("");
	for(let i=0; i<data.length; i++){
		$("#quizTable").append(`

			<tr>
				<td>`+(i+1)+`</td>
				<td>`+data[i].course_code+`</td>
				<td>`+data[i].course_title+`</td>
				<td>`+data[i].topic_name+`</td>
				<td>
					<a href="create_quiz.php?quiz=`+data[i].quiz_id+`&topic=`+data[i].topic_id+`&course=`+data[i].course_id+`" target="_blank" class="btn btn-warning"><i class="fas fa-pen fa-fw"></i></a>
					<button class="btn btn-danger delete" value="`+data[i].quiz_id+`" data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-trash fa-fw"></i></button> 
				</td>
			</tr>
		`)
	}
}

$(document).on('click', '.delete', function(e){
	e.preventDefault();
	$("#delete-confirm").val($(this).val());
});

$("#delete-confirm").click(function(e){
	e.preventDefault();
	if($(this).val() != ""){
		deleteQuiz($(this).val());
	}
})