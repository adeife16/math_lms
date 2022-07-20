$(document).ready(function(){
	let sessionPic = localStorage.getItem("picture");
	let sessionMatric = localStorage.getItem("matric");

	getCountries();
	// getFaculties();
	getProfile();

})


// profile upload
$('.file-input').change(function(){
    
    // console.log(curElement);
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        $('#profile-pic').attr('src', e.target.result);
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});

// Show Student Data
function showProfile(data){

	// console.log(data)
	$("#profile-pic").attr("src", "assets/img/student/"+data.picture);
	getDept(data.faculty);

	// set profile values into form
	$("#matric").val(data.matric);
	$("#fname").val(data.fname);
	$("#lname").val(data.lname);
	$("#faculty").val(data.facultyName);
	$("#email").val(data.email);
	$("#phone").val(data.phone);
	$("#about").val(data.about);

	$("#nationality option[value="+data.nationality+"]").prop("selected", true);
	$("#faculty option[value="+data.faculty+"]").prop("selected", true);

	localStorage.setItem("dept", data.department);

	$("#level option[value="+data.level+"]").prop("selected", true);
}


// display country dropdown
function showCountries(data){
	$("#nationality").html("");
	$("#nationality").append(`<option value="">Select Nationality<option>`);
	for(let i=0; i < data.length; i++){
		$("#nationality").append(`
			<option value="`+data[i].id+`">`+data[i].name+`</option>
		`);

	}
}


// Display faculty dopdown
// function showFaculty(data){
// 	$("#faculty").html("");
// 	$("#faculty").append(`<option value="">Select School</option>`);
// 	for(let i = 0; i < data.length; i++){
// 		$("#faculty").append(`
// 			<option value="`+data[i].id+`">`+data[i].name+`</option>
// 		`);
// 	}

// }

// show departments for a faculty
function showDept(data){
	var dept = localStorage.getItem("dept");
	$("#dept").html("");
	$("#dept").append(`<option value="">Select Department</option>`);
	for( let i = 0; i < data.length; i++){
		$("#dept").append(`

			<option value="`+data[i].id+`">`+data[i].dept_name+`</option>
		`)
	}
	$("#dept option[value="+dept+"]").prop("selected", true);
}

// ********************************************
// Profile update

$("#update").click(function(e){
	e.preventDefault();
	    $('#profile-form input, #profile-form select, #profile-form textarea').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            $(this).addClass("borderbottom-red");
        }
        else{
        	$(this).removeClass("border-red");
        	updateProfile();
        }
    });

});


// password update
$("#password-btn").click(function(e){
	e.preventDefault();
	$("#password-form input").each(function(){
		var $this = $(this);

		if(!$this.val()){
			$(this).addClass("borderbottom-red");
		}
		else{
			$(this).removeClass("borderbottom-red");
			updatePass();
		}
	})
})