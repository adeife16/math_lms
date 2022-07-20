var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
const course_id = url[2];
let topi   = url[1].split('&');
const topic_id = topi[0];

$(document).ready(function(){
    getContents(topic_id, course_id);
});

function showContents(data){
    $("#content").html("");
    for(let i = 0; i < data.length; i++){
        $("#content").append(`
            <div class="topic m-2 p-3 justify-content-between">
                <div><h4>`+data[i].c_title+`</h4></div>
                <div><a href="class.php?topic_id=`+data[i].topic+`&c_index=`+data[i].c_index+`" class="btn green color-white"><i class="icon ion-eye color-white" style="font-size: 20px"></i></a></div>
            </div>
        `)
    }
}