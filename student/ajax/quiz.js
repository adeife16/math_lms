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