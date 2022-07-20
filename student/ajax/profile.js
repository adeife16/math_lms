// Get profile details
function getProfile(){
	$.ajax({
		type: 'GET',
		url: 'backend/profile.php',
		cache: false

	})
	.done(function(res){
		var data = JSON.parse(res);
		// console.log(data)
		
		if(data.status ==="success"){
			var studData = data.data[0];

			showProfile(studData);
		}

	})
}


// get all countries
function getCountries(){
	$.ajax({
		type: 'GET',
		url: 'backend/location.php',
		cache: false
	})
	.done(function(res){
		var data = JSON.parse(res);
		// console.log(data)
		if(data.status === "success"){
			showCountries(data.data)
		}
	})
}

// get all faculties and department
function getFaculties(){
		$.ajax({
		type: 'GET',
		url: 'backend/school.php',
		cache: false
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			showFaculty(data.data);
		}
	})
}

// get departments
function getDept(fId){
	$.ajax({
		type: 'POST',
		url: 'backend/school.php',
		data: {
			fId: fId
		},
		cache: false
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			showDept(data.data);
		}
	})
}
// *****************************

// update profile details
function updateProfile(){
	var formdata = new FormData(document.getElementById('profile-form'));
	$.ajax({
		type: 'POST',
		url: 'backend/profile.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$("#update").attr("disabled", "disabled");
		}
	})
	.done(function(res){
		$("#update").removeAttr("disabled");
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success("Profile Details has been updated!");
		}
	})
}

// update password
function updatePass(){
	var formData = new FormData(document.getElementById('password-form'));
	$.ajax({
		type: 'POST',
		url: 'backend/profile.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$("#update").attr("disabled", "disabled");
		}
	})
	.done(function(res){
		var data = JSON.parse(res);
		if(data.status === "success"){
			alert_success("Password has been updated!");
		}
	})
}