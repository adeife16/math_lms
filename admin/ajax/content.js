// get contents
function getContent(topic, content){
  $.ajax({
    type: 'POST',
    url: 'backend/content.php',
    data: {
      getContent: topic,
      content: content
    },
    cache: false
  })
  .done(function(res) {
    var data = JSON.parse(res);
    $("#topicName").html(data.topic);
    console.log(data);
    if(data.status === "success"){
      showContent(data.data);
    }
  })
  .fail(function() {
    console.log("error");
  })
}
// Save topic content
function saveContent(content, topic, index, title){
  
  $.ajax({
    type: 'POST',
    url: 'backend/content.php',
    data: {
      saveContent: content,
      topicId: topic,
      contentIndex: index,
      contentTitle: title
    },
    cache: false,
    beforeSend: function(){
      $("#save").attr("disabled", "disabled");
      
    }
  })
  .done(function(res){
    $("#save").removeAttr("disabled");
    console.log(res);
    var data = JSON.parse(res);
    if(data.status === "success"){
      alert_success("Content Saved");
    }
  })
}
