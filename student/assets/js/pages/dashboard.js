$(document).ready(function(){
	getEnrolled()
})

// display enrolled courses and progress
function showEnrolled(data){
	$("#display_course").html("");
	for(let i = 0; i < data.length; i++){
		let progress = (data[i].progress / data[i].total_topics) * 100;
		$("#display_course").append(`
            <div class="col-xl-4 col-md-6 col-sm-4 col-lg-4">
              <a href="view_course.php?course_id=`+data[i].course_id+`" target="_blank">
                <div class="card green">
                  <div class="card-body  color-white">
                    <h4>`+data[i].course_code+`</h4>
                    <p>`+data[i].course_title+`</p>
                    <small>Progress: `+data[i].progress+` out of `+data[i].total_topics+` topics completed</small>
                    <div class="progress">
  						<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: `+progress+`%" aria-valuenow="`+progress+`" aria-valuemin="0" aria-valuemax="100">`+progress+`%</div>
						</div>
                  </div>
                </div>
              </a>
            </div>
		`)
	}
  $("#enrolled-list").html("")
  for(let i = 0; i < data.length; i++){
    $("#enrolled-list").append(`
      <li><a href="#">`+data[i].course_code+`</a></li>
    `);
  }
}
