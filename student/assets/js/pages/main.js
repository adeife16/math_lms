let matric = localStorage.getItem("matric");
let fname = localStorage.getItem("fname");
let lname = localStorage.getItem("lname");
let pic = localStorage.getItem("picture");

if(matric === "" || matric === null || matric === undefined){
	getSession();
}
else{

}

$(document).ready(function(){
	getEnrolled()
})

// display enrolled courses and progress
function enrolledMenu(data){
  $("#enrolled-list").html("")
  for(let i = 0; i < data.length; i++){
    $("#enrolled-list").append(`
      <li><h4><a href="#">`+data[i].course_code+`</a></h4></li>
    `);
  }
}
