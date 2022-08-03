var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
const matricNo = url[2];
const topic_id = url[1].split('&')[0];

$(document).ready(function(){
    getScore(matricNo, topic_id);
})

function showScore(score){
    if(score >= 75){
        $("#result").addClass("color-green")
    }
    else if(score >= 45){
        $("#result").addClass("color-yellow");
    }
    else{
        $("#result").addClass("color-red");
    }

    $("#result").html(score+'%');
    $("#retake").html(`<a href="quiz.php?topic_id=`+topic_id+`">Retake Quiz</a>`);
}