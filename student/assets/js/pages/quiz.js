var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
const topic_id = url[1];

$(document).ready(function(){
    getQuiz(topic_id);

});

function showQuiz(data){
    let questionNumber = data.length;
    sessionStorage.setItem("totalQuestions", questionNumber);
    for(let i=1; i <= questionNumber; i++){
        $("#navigate").append(`
            <button class="btn green color-white float-left ml-2 mr-2 question" id="btn-`+i+`" value="question-`+i+`">
                `+i+`
            </button>
        `)
    }
    $("#display").html("");
    let single;
    let multiple;
    let tf;
    for(let j=0; j<data.length; j++){
        if(data[j].type === "single"){
            single = `
                <form class=" q-form hide single question-`+(j+1)+`" id="`+data[j].question_id+`">
                    <div class="quiz-box" id="question-`+(j+1)+`" style="font-size: 24px;">
                        <div class="question m-3 mb-5 p-3">
                            <p id="`+(j+1)+`-question">`+data[j].question+`</p>
                        </div>
                        <div class="option mt-3">
                            <p class="mt-3 p-3">
                                <input type="radio" name="answer-`+(j+1)+`" id="A-`+(j+1)+`" value="A">
                                <span>`+data[j].option1+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="radio" name="answer-`+(j+1)+`" id="B-`+(j+1)+`" value="B">
                                <span>`+data[j].option2+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="radio" name="answer-`+(j+1)+`" id="C-`+(j+1)+`" value="C">
                                <span>`+data[j].option3+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="radio" name="answer-`+(j+1)+`" id="D-`+(j+1)+`" value="D">
                                <span>`+data[j].option4+`</span>
                            </p>
                        </div>
                    </div>
                </form>`;
                $("#display").append(single);
            }
        else if(data[j].type === "multiple"){
            multiple = `
                <form class=" q-form multiple hide question-`+(j+1)+`" id="`+data[j].question_id+`">
                    <div class="quiz-box" id="question-`+(j+1)+`" style="font-size: 24px;">
                        <div class="question m-3 mb-5 p-3">
                            <p id="`+(j+1)+`-question">`+data[j].question+`</p>
                        </div>
                        <div class="option mt-3">
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="answer-`+(j+1)+`-option" id="A-`+(j+1)+`" value="A">
                                <span>`+data[j].option1+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="answer-`+(j+1)+`-option" id="B-`+(j+1)+`" value="B">
                                <span>`+data[j].option2+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="answer-`+(j+1)+`-option" id="C-`+(j+1)+`" value="C">
                                <span>`+data[j].option3+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="answer-`+(j+1)+`-option" id="D-`+(j+1)+`" value="D">
                                <span>`+data[j].option4+`</span>
                            </p>
                            <p class="mt-3 p-3">
<<<<<<< HEAD
                                <input type="checkbox" name="answer-`+(j+1)+`-option" id="E-`+(j+1)+`" value="D">
=======
                                <input type="checkbox" name="answer-`+(j+1)+`-option" id="E-`+(j+1)+`" value="E">
>>>>>>> 2ff717242918146820968b2f0e6dd1606f95c20d
                                <span>`+data[j].option5+`</span>
                            </p>
                        </div>
                    </div>
                </form>`;
                $("#display").append(multiple);
            }
        else if(data[j].type === "tf"){
            tf = `
            <form class=" q-form tf hide question-`+(j+1)+`" id="`+data[j].question_id+`">
                <div class="quiz-box" id="question-`+(j+1)+`" style="font-size: 24px;">
                    <div class="question m-3 mb-5 p-3">
                        <p id="`+(j+1)+`-question">`+data[j].question+`</p>
                    </div>
                    <div class="option mt-3">
                        <p class="mt-3 p-3">
                            <input type="radio" class="" name="answer-`+(j+1)+`" id="True-`+(j+1)+`" value="true">
                            <span class="ml-3">True</span>
                        </p>
                        <p class="mt-3 p-3">
                            <input type="radio" class="" name="answer-`+(j+1)+`" id="False-`+(j+1)+`" value="false">
                            <span class="ml-3">False</span>
                        </p>
                    </div>
                </div>
            </form>`;
            $("#display").append(tf);
        }
    }
}
// navigation
$(document).on('click', '.question', function(e){
    let question = $(this).val();
    $(".q-form").addClass("hide");
    $("."+question).removeClass("hide");
})

// submit quiz
$("#checkSubmit").click(function(e){
let allAnswers = {};
let total = sessionStorage.getItem("totalQuestions");
let id = null;
let answer = null;
let multiAns;
for(let i=1; i<=total; i++){
    multiAns = [];
    id = $(".question-"+i).prop('id');
    if($(".question-"+i).hasClass("multiple") === true){
        $('.question-'+i+' input').each(function() {
            var $this = $(this);
            if($this.prop("checked")){
                multiAns.push($this.val());
            }
        });
        answer = multiAns;
    }
    else{
        answer = $('input[name=answer-'+i+']:checked').val();
    }
    
    if(answer === undefined || answer === null || answer.length === 0){
        $("#btn-"+i).removeClass("green")
        $("#btn-"+i).addClass("btn-danger")
<<<<<<< HEAD
=======
        answer = "";
>>>>>>> 2ff717242918146820968b2f0e6dd1606f95c20d
    }
    else{
        $("#btn-"+i).removeClass("btn-danger")        
        $("#btn-"+i).addClass("green")
    }
    allAnswers[id] = answer;

}
    $("#submit").click(function(){
        submit(allAnswers, topic_id);
    })
});

setTimeout(() => {
    $(".question-1").removeClass("hide");

}, 2000);

$(document).on('mouseenter', '.quiz-box', function(){
    let multiAns = [];
    let ans;
    let id = $(this).prop('id');
    id = id.split('-')[1];
    if($(".question-"+id).hasClass("multiple") === true){
        $('.question-'+id+' input').each(function() {
            var $this = $(this);
            if($this.prop("checked")){
                multiAns.push($this.val());
                ans = multiAns;
            }
        });
    }
    else{
        ans = $('input[name=answer-'+id+']:checked').val();
    }
    $(this).mouseleave(function(){
    if( ans === null || ans === undefined || ans.length === 0){
        $("#btn-"+id).removeClass("green")
        $("#btn-"+id).addClass("btn-danger")
    }
    else{
        $("#btn-"+id).removeClass("btn-danger")        
        $("#btn-"+id).addClass("green")
    }
    });

})