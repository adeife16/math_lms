var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
const topic_id = url[1];

$(document).ready(function(){
    getQuiz(topic_id);

});

function showQuiz(data){
    let questionNumber = data.length;
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
        console.log(j);
        if(data[j].type === "single"){
            single = `
                <form class=" q-form hide question-`+(j+1)+`" id="question-`+data[j].question_id+`">
                    <div class="quiz-box" id="question-`+(j+1)+`" style="font-size: 24px;">
                        <div class="question m-3 mb-5 p-3">
                            <p id="`+(j+1)+`-question">`+data[j].question+`</p>
                        </div>
                        <div class="option mt-3">
                            <p class="mt-3 p-3">
                                <input type="radio" name="`+(j+1)+`-option" id="A-`+(j+1)+`" value="A">
                                <span>`+data[j].option1+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="radio" name="`+(j+1)+`-option" id="B-`+(j+1)+`" value="B">
                                <span>`+data[j].option2+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="radio" name="`+(j+1)+`-option" id="C-`+(j+1)+`" value="C">
                                <span>`+data[j].option3+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="radio" name="`+(j+1)+`-option" id="D-`+(j+1)+`" value="D">
                                <span>`+data[j].option4+`</span>
                            </p>
                        </div>
                    </div>
                </form>`;
                $("#display").append(single);
            }
        else if(data[j].type === "multiple"){
            multiple = `
                <form class=" q-form hide question-`+(j+1)+`" id="question-`+data[j].question_id+`>
                    <div class="quiz-box question-`+(j+1)+`" id="question-`+(j+1)+`" style="font-size: 24px;">
                        <div class="question m-3 mb-5 p-3">
                            <p id="`+(j+1)+`-question">`+data[j].question+`</p>
                        </div>
                        <div class="option mt-3">
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="`+(j+1)+`-option" id="A-`+(j+1)+`" value="A">
                                <span>`+data[j].option1+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="`+(j+1)+`-option" id="B-`+(j+1)+`" value="B">
                                <span>`+data[j].option2+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="`+(j+1)+`-option" id="C-`+(j+1)+`" value="C">
                                <span>`+data[j].option3+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="`+(j+1)+`-option" id="D-`+(j+1)+`" value="D">
                                <span>`+data[j].option4+`</span>
                            </p>
                            <p class="mt-3 p-3">
                                <input type="checkbox" name="`+(j+1)+`-option" id="D-`+(j+1)+`" value="D">
                                <span>`+data[j].option5+`</span>
                            </p>
                        </div>
                    </div>
                </form>`;
                $("#display").append(multiple);
            }
        else if(data[j].type === "tf"){
            tf = `
            <form class=" q-form hide question-`+(j+1)+`" id="question-`+data[j].question_id+`>
                <div class="quiz-box question-`+(j+1)+`" id="question-`+(j+1)+`" style="font-size: 24px;">
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
$("#submit").click(function(e){
    
});

setTimeout(() => {
    $(".question-1").removeClass("hide");

}, 2000);