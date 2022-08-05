function getScore(matric, topic){
    $.ajax({
        type: 'GET',
        url: 'backend/quiz.php?getScore='+matric+'&topic_id='+topic,
        cache: false
    })
    .done(function(res){
        let data = JSON.parse(res);
        if(data.status === "success"){
            showScore(data.data);
        }
    })
}