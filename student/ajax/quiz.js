// get quiz questions
function getQuiz(topic){
    $.ajax({
        type: 'GET',
        url: 'backend/quiz.php?getQuiz='+topic,
        cache: false,
        beforeSend: function(){

        }
    })
    .done(function(res){
        let data = JSON.parse(res);
        console.log(data);
        if(data.status === "success"){
            showQuiz(data.data);
        }
    })
}

// submit quiz
function submit(answers, topic){
    $.ajax({
        type: 'POST',
        url: 'backend/quiz.php',
        data: {
            submit: answers,
            topic: topic
        },
        cache: false,
        beforeSend: function(){
            $("#submit").attr("disabled", "disabled");
        }
    })
    .done(function(res){
<<<<<<< HEAD
        let data = JSON.parse(res);
        console.log(data);
        if(data.status === "success"){
            showQuiz(data.data);
=======
        $("#submit").removeAttr("disabled");

        let data = JSON.parse(res);
        console.log(data);
        if(data.status === "success"){
            window.location.replace('quiz_end.php?topic='+data.topic+'&student='+data.student);
>>>>>>> 2ff717242918146820968b2f0e6dd1606f95c20d
        }
    })
}