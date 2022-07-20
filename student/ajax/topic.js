// get all contents 
function getContents(topic, course){
    $.ajax({
        type: 'POST',
        url: 'backend/topic.php',
        data: {
            getContents: topic,
            course: course
        }
    })
    .done(function(res){
        var data = JSON.parse(res);
        console.log(data)
        if(data.status === "success"){
            showContents(data.data);
        }
    })
}