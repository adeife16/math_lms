$(document).ready(function(){
	getCourses();
})

// display all courses
function showCourses(data){
	console.log(data);
	for(let i = 0; i < data.length; i++){
		$("#display").append(`
			<tr>
				<td class="text-center">`+(parseInt(i) + 1)+`</td>
				<td class="text-center">`+data[i].course_code+`</td>
				<td class="text-center">`+data[i].course_title+`</td>
				<td class="text-center"><button class="btn green color-white enroll" id="enroll-`+(parseInt(i)+1)+`" value="`+data[i].id+`">Enroll</button></td>
				<td class="text-center"><button class="btn btn-danger color-white unenroll" id="unenroll-`+(parseInt(i)+1)+`" value="`+data[i].id+`">Unenroll</button></td>
			</tr>
		`);
	}
}


// on enroll button click
$(document).on('click', '.enroll',function(e){
	e.preventDefault();

	let courseId = $(this).val();
	if(courseId != "" || courseId != null || courseId != undefined){
		enroll(courseId);
		// alert(courseId)
	}

})

// on unenroll button click
$(document).on('click', '.unenroll', function(e){
	e.preventDefault();
	let courseId = $(this).val();
	if(courseId != "" || courseId != null || courseId != undefined){
		unEnroll(courseId);
		// alert(courseId)
	}


})