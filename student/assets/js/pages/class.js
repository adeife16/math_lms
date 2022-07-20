var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
let topi = url[1];
topi = topi.split('&');
const topic_id = topi[0];
const index = url[2];

$(document).ready(function(){
    getContent(topic_id, index);
});

// display topic content
function showContent(data){
    sessionStorage.removeItem("topic_id");
    sessionStorage.removeItem("course_id");
    sessionStorage.removeItem("index");
    sessionStorage.setItem("topic_id", data.topic_id);
    sessionStorage.setItem("course_id", data.course_id);
    sessionStorage.setItem("index", data.c_index);
    $("#content").html(data.content);
    if(data.c_index == 0){
        $("#action").html(`
            <button class="btn green color-white float-right" id="next">NEXT</button>
        `);

    }
    else{
        $("#action").html(`
            <button class="btn green color-white float-left" id="prev">PREV</button>
            <button class="btn green color-white float-right" id="next">NEXT</button>
        `);
    }
}

// save user progress
function saveProgress(){
    let topic = sessionStorage.getItem("topic_id");
    let course = sessionStorage.getItem("course_id");
    progress(topic, course);
}

// on click next button
$(document).on('click','#next', function(e){
    e.preventDefault();
    let topic_id = sessionStorage.getItem("topic_id");
    let course_id = sessionStorage.getItem("course_id");
    let index = sessionStorage.getItem("index");


    getNext(topic_id, course_id, index);
})

// on click prev button
$(document).on('click','#prev', function(e){
    e.preventDefault();
    let topic_id = sessionStorage.getItem("topic_id");
    let course_id = sessionStorage.getItem("course_id");
    let index = sessionStorage.getItem("index");


    getPrev(topic_id, course_id, index);
})

// on take quiz click