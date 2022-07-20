// get contents
function getContent(tid, index){
    $.ajax({
        type: 'GET',
        url: 'backend/class.php?topic_id='+tid+'&index='+index,
        cache: false,
        beforeSend: function(){
            $("#content").html("<h1>LOADING...</h1>")
        }
    })
    .done(function(res){
        var data = JSON.parse(res);
        console.log(data);
        if(data.status === "success"){
            let content = data.data;
            $("#title-link").html(content.course_title+'('+content.course_code+')');
            $("#content-link").html(content.topic_name)
            showContent(content);
                
        }

    })
}

// get next topic
function getNext(topic, course, index){
    $.ajax({
        type: 'GET',
        url: 'backend/class.php?getNext='+topic+'&course_id='+course+'&index='+index,
        cache: false,
        beforeSend: function(){
            $("#content").html("<h1>LOADING...</h1>")
        }
    })
    .done(function(res){
        var data = JSON.parse(res);
        console.log(data);
        if(data.status === "success"){
            let content = data.data;
          
            window.location.assign('class.php?topic_id='+content.topic_id+'&c_index='+content.c_index);

        }
        else if(data.status === "end"){ 
            window.location.assign('topic_end.php?topic_id='+topic+'&course_id='+course);

        }

    })
}

// get next topic
function getPrev(topic, course, index){
    $.ajax({
        type: 'GET',
        url: 'backend/class.php?getPrev='+topic+'&course_id='+course+'&index='+index,
        cache: false,
        beforeSend: function(){
            $("#content").html("<h1>LOADING...</h1>")
        }
    })
    .done(function(res){
        var data = JSON.parse(res);
        console.log(res);
        if(data.status === "success"){
            let content = data.data;
            window.location.assign('class.php?topic_id='+content.topic_id+'&c_index='+content.c_index);

        }
        else if(data.status === "end"){
            $("#prev").addClass("hide");

        }

    })
}

// save progress
function progress(topic, course){
    $.ajax({
        type: 'POST',
        url: 'backend/class.php',
        data: {
            saveProgress: course,
            topic: topic
        },
        cache: false
    })
    .done(function(res){
        console.log(res);
    })
}