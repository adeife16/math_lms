// get course outline
function getCourse(id){
  $.ajax({
    url: 'backend/view_course.php?course_id='+id,
    type: 'GET',
    cache: false
  })
  .done(function(res){
    var data = JSON.parse(res);
    console.log(data);
    if(data.status === "success"){
      $("#page").html(data.data[0].course_title+" ("+data.data[0].course_code+")")
      showTopics(data.data);
    }
  })
  .fail(function() {
    console.log("error");
  })

}
