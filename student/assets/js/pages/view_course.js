 var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
const course_id = url[1];

$(document).ready(function() {
  getCourse(course_id);
});

// display course Outline
function showTopics(data){
  $("#outline").html("");
  for(let i = 0; i < data.length; i++){
    $("#outline").append(`
       <div class="topic m-2 p-3 justify-content-between">

            <div><h4>`+data[i].topic_name+`</h4></div>
            <div><a href="topic.php?topic_id=`+data[i].topic_id+`&course_id=`+course_id+`" class="btn green color-white"><i class="icon ion-eye color-white" style="font-size: 20px"></i></a></div>


       </div>
    `)
  }
}
