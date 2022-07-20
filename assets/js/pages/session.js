// let matric = localStorage.getItem("matric");
// let fname = localStorage.getItem("fname");
// let lname = localStorage.getItem("lname");
// let pic = localStorage.getItem("picture");

$(document).ready(function(){
	getSession();
})

// if(matric === "" || matric === null || matric === undefined){
// 	getSession();
// }
function getSession(){
	$.ajax({
		type: 'GET',
		url: 'backend/session.php',
		cache: false
	})
	.done(function(res){
		var data = JSON.parse(res);
		console.log(data);
		if(data.status === "success"){
			data = data.data;
			for (var index in  data) {
				sessionStorage.setItem(index, data[index]);
			}
			$("#access").html(`
				<a class="nav-link dropdown-toggle color-green" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
					Welcome `+data.fname+`
				</a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item color-green" href="student/index.php">Dashboard</a>
		          <a class="dropdown-item color-green" href="student/profile.php">Profile</a>
		          <a class="dropdown-item color-green" href="logout.php">Logout</a>
        		</div>
			`)

		}
		else if(data.status === "error"){
			$("#access").html(`
				 <a href="login.php" class="btn green color-white btn-sign-in">Log In</a>

            	<a href="signup.php" class="btn white border-green color-green btn-sign-up">Sign Up</a>
			`)
		}
	})
}