$(document).ready(function(){
	getCourses();
	getTopics();
})

// display course code dropdown
function showCourses(data){
	$("#course").html(`<option value="">Select Course</option>`);
	for(let i = 0; i < data.length; i++){

		$("#course").append(`
			<option value="`+data[i].id+`">`+data[i].course_code+` `+data[i].course_title+`</option>
		`)

	}
}
// display topics table
function showTopics(data){
	$("#topicTable").html("");
	for(let i=0; i<data.length; i++){
		$("#topicTable").append(`
				<tr>
					<td>`+(i+1)+`</td>
					<td>`+data[i].topic_name+`</td>
					<td>`+data[i].course_title+`(`+data[i].course_code+`)</td>
					<td>
					<a href="edit_topic.php?topic_id=`+data[i].topic_id+`"class="btn btn-warning edit-btn"><i class="fas fa-pen"></i></a>
					<button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal" value="`+data[i].topic_id+`"><i class="fas fa-trash"></i></button>
					</td>
				</tr>
			`);
	}
}
// event listeners
$("#create-btn").click(function(e){
	e.preventDefault();
	 var cid = $("#course").val();
	 var topic = $("tTitle").val();

	 if(cid === "" || topic === ""){
		 alert_failure("All form fields are required!")
	 }
	 else{
		 createTopic();
	 }
})
$(document).on('click', '.delete-btn', function(e){
	e.preventDefault();

	var tid = $(this).val();
	if(tid == ""){

	}
	else{

		$("#delete-confirm").val(tid);
	}
})
$("#delete-confirm").click(function(e){
	e.preventDefault();
	var tid = $(this).val();
	deleteTopic(tid);
})
