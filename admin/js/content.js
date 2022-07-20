// get current topic id
var url = window.location.href;
url = url.split('?');
url = url[1].split('&');
let topic = url[0].split('=');
topic = topic[1];
let content = url[1].split('=');
content = content[1];

let title = getCookie('contentTitle');
$("#contentTitle").html(title);

new FroalaEditor('#editor', {
// video upload settings

// Set the video upload parameter.
  videoUploadParam: 'video',

  // Set the video upload URL.
  videoUploadURL: 'backend/upload_videos.php',

  videoUploadParams: {
      topic_id: topic
  },

  // Set request type.
  videoUploadMethod: 'POST',

  // Set max video size to 200MB.
  videoMaxSize: 200 * 1024 * 1024,

  // Allow to upload MP4, WEBM and OGG
  videoAllowedTypes: ['mp4','webm', 'jpg', 'ogg'],

  videoDefaultWidth: 800,

// image upload settings

  imageUploadParam: 'image',

    // Set the image upload URL.
    imageUploadURL: 'backend/upload_images.php',
    // Additional upload params.
    imageUploadParams: {
      topic_id: topic
    },

    // Set request type.
    imageUploadMethod: 'POST',

    // Set max image size to 5MB.
    imageMaxSize: 7 * 1024 * 1024,

    // Allow to upload PNG and JPG.
    imageAllowedTypes: ['jpeg', 'jpg', 'png','svg'],


  events: {
     'video.uploaded': function (response) {
      // console.log(response);
  },
  }



});


// get topic contents
$(document).ready(function() {
  getContent(topic, content);
});
// display content
function showContent(data){
  setTimeout(function(){
    $(".fr-element").append(data);
  },1000);
}

$("#mf").change(function(){
    $("#conv").val($(this).val());
})

$("#insert").click(function(e){
  e.preventDefault();

  let latex = $("#conv").val();
  // latex = "$$"+latex+"$$";
  latex = "\\("+latex+"\\)";
  $(".fr-element").append(latex);
})

$("#clear").click(function(e){
  e.preventDefault();

  $("#mf, #conv").val("");
})

$("#copy").click(function(e){
  e.preventDefault();
  let text = $("#conv").val();
  // text = "$$"+text+"$$";
  latex = "\\("+text+"\\)";
  latex = latex.toString();
  navigator.clipboard.writeText(latex).then(function(){
    alert_success("Copied to clipboard");
  },function(){
    alert_failure("Cannot copy to clipboard");
  })
});


// save content
$("#save").click(function(e){
  e.preventDefault();
  let editor = $("#editor").val();
  if(editor != ""){
    let title = getCookie('contentTitle');
    saveContent(editor, topic, content, title);
  }
});


// preview content
$("#preview").click(function(e){
  e.preventDefault();
  let editor = $("#editor").val();
  sessionStorage.setItem("preview", editor);
  window.open("content_preview.php?topic_id="+topic, "_blank");
})
