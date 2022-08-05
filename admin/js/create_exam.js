 // get current topic id, quiz and course
var url = window.location.href;
url = url.split('?');
url = url[1].split('&');
const exam  = url[0].split("=")[1];
var course = url[1].split("=")[1];

$(document).ready(function() {
	getExams(exam, course);
	// setTimeout(function(){
	// 	console.clear();
	// }, 3000);
})

let hash;

// on add button click

$("#create-quiz").click(function(){
	var type = $("#quiz-type").val();
	var time = new Date();
	time = time.getMilliseconds();
	hash = md5(time);
	
	if(type === "single"){
		$("#exam-div").append(`
			<div class="q-div-container justify-content-center">
				<div class="q-div p-2 mb-5 form-group" id="q-single-`+hash+`" style="width: 75%">
				<div class="delete-div float-right">
					<button class="btn btn-danger delete-quiz" value="`+hash+`">X</button>
				</div> 

					<form method="" action="" id="`+hash+`">
							<textarea class="form-control" id="question-`+hash+`" placeholder="Type your question here" rows="5" style="width: 75%;"></textarea>
						<div class="option">
							<div class="option1">
								<input type="text" class="option-text" id="option1-`+hash+`" placeholder="Option A">
							</div>
							<div class="option2">
								<input type="text" class="option-text" id="option2-`+hash+`" placeholder="Option B">
							</div>
							<div class="option3">
								<input type="text" class="option-text" id="option3-`+hash+`" placeholder="Option C">
							</div>
							<div class="option4">
								<input type="text" class="option-text" id="option4-`+hash+`" placeholder="Option D">
							</div>
							<div class="answer m-3 p-2" id="answer">
								Answer:
								<span class="ml-3">Option A</span>
								<input type="radio" class="" name="answer-`+hash+`" id="A-`+hash+`" value="A">
								<span class="ml-3">Option B</span>
								<input type="radio" class="" name="answer-`+hash+`" id="B-`+hash+`" value="B">
								<span class="ml-3">Option C</span>
								<input type="radio" class="" name="answer-`+hash+`" id="C-`+hash+`" value="C">
								<span class="ml-3">Option D</span>
								<input type="radio" class="" name="answer-`+hash+`" id="D-`+hash+`" value="D">
							</div>
						</div>
					</form>
				</div>
			</div>
		`);
	}
	else if(type === "multiple"){
		$("#exam-div").append(`
			<div class="q-div p-2 mb-5 form-group" id="q-multiple-`+hash+`" style="width: 75%">
				<div class="delete-div float-right">
					<button class="btn btn-danger delete-quiz" value="`+hash+`">X</button>
				</div> 
				<form method="" action="" id="`+hash+`">
						<textarea class="form-control" id="question-`+hash+`" placeholder="Type your question here" rows="5" style="width: 75%;"></textarea>
					<div class="option">
						<div class="option1">
							<input type="text" class="option-text" id="option1-`+hash+`" placeholder="Option A">
						</div>
						<div class="option2">
							<input type="text" class="option-text" id="option2-`+hash+`" placeholder="Option B">
						</div>
						<div class="option3">
							<input type="text" class="option-text" id="option3-`+hash+`" placeholder="Option C">
						</div>
						<div class="option4">
							<input type="text" class="option-text" id="option4-`+hash+`" placeholder="Option D">
						</div>
						<div class="option5">
							<input type="text" class="option-text" id="option5-`+hash+`" placeholder="Option E">
						</div>
						<div class="answer mt-3 t-2" id="answerdiv-`+hash+`">
							Answer:
							<span class="ml-3">Option A</span>
							<input type="checkbox" class="" name="answer-`+hash+`" id="A-`+hash+`" value="A">
							<span class="ml-3">Option B</span>
							<input type="checkbox" class="" name="answer-`+hash+`" id="B-`+hash+`" value="B">
							<span class="ml-3">Option C</span>
							<input type="checkbox" class="" name="answer-`+hash+`" id="C-`+hash+`" value="C">
							<span class="ml-3">Option D</span>
							<input type="checkbox" class="" name="answer-`+hash+`" id="D-`+hash+`" value="D">
							<span class="ml-3">Option E</span>
							<input type="checkbox" class="" name="answer-`+hash+`" id="E-`+hash+`" value="E">
						</div>
					</div>
				</form>
			</div>
		`);
	}
	else if(type === "tf"){
		$("#exam-div").append(`
			<div class="q-div p-2 mb-5 form-group" id="q-tf-`+hash+`" style="width: 75%">
				<div class="delete-div float-right">
					<button class="btn btn-danger delete-quiz" value="`+hash+`">X</button>
				</div> 
				<form method="" action="" id="`+hash+`">
						<textarea class="form-control" id="question-`+hash+`" placeholder="Type your question here" rows="5" style="width: 75%;"></textarea>
					<d iv class="option">
						<div class="option1">
							<input type="text" class="option-text" id="option1-`+hash+`" placeholder="True" readonly disabled>
						</div>
						<div class="option2">
							<input type="text" class="option-text" id="option2-`+hash+`" placeholder="False" readonly disabled>
						</div>
						<div class="answer m-3 p-2" id="answerdiv-`+hash+`">
							Answer:
							<span class="ml-3">True</span>
							<input type="radio" class="" name="answer-`+hash+`" id="True-`+hash+`" value="true">
							<span class="ml-3">False</span>
							<input type="radio" class="" name="answer-`+hash+`" id="False-`+hash+`" value="false">
						</div>
					</div>
				</form>
			</div>
		`);
	}
	else{

	}
})
// event listeners
$(document).on('click', '.q-div', function(e){
	let id = $(this).attr("id");
	sessionStorage.setItem("current-q", id);
	$(this).mouseleave(function(){
		setTimeout(autoSave(id), 3000);
		$(this).off("mouseleave");
	})

});


$("#mf").change(function(){
    $("#conv").val($(this).val());
})

$("#insert").click(function(e){
  e.preventDefault();

  let latex = $("#conv").val();
  // latex = "$$"+latex+"$$";
  latex = "\\("+text+"\\)";
  $(".fr-element").append(latex);
})

$("#clear").click(function(e){
  e.preventDefault();

  $("#mf, #conv").val("");
})

$("#copy").click(function(e){
  e.preventDefault();
  let text = $("#conv").val();
  // text = "$$"+text+"$$";
  text = "\\("+text+"\\)";
  navigator.clipboard.writeText(text).then(function(){
    alert_success("Copied to clipboard");
  },function(){
    alert_failure("Cannot copy to clipboard");
  })
});

// question autosave feature
function autoSave(itemId){
	id = itemId.split("-");
	let type = id[1];
	id = id[2];


	
	if(type === "single"){
		let question = $("#question-"+id).val();
		let opt1 = $("#option1-"+id).val();
		let opt2 = $("#option2-"+id).val();
		let opt3 = $("#option3-"+id).val();
		let opt4 = $("#option4-"+id).val();
		let ans = $('input[name=answer-'+id+']:checked').val();

		let quizArr = {
			'question_id': id,
			'question' : question,
			'option1' : opt1,
			'option2' : opt2,
			'option3' : opt3,
			'option4' : opt4,
			'answer' : ans,
			'type' : 'single',
			'exam_id': exam,
			'course' : course
		}
		save(quizArr);
	}
	else if(type === "multiple"){
		let question = $("#question-"+id).val();
		let opt1 = $("#option1-"+id).val();
		let opt2 = $("#option2-"+id).val();
		let opt3 = $("#option3-"+id).val();
		let opt4 = $("#option4-"+id).val();
		let opt5 = $("#option5-"+id).val();
		let ans = [];

	    $('#answerdiv-'+id+' input').each(function() {
        	var $this = $(this);
	        if($this.prop("checked")){
	            ans.push($this.val());
	        }
   		 });

		let quizArr = {
			'question_id': id,
			'question' : question,
			'option1' : opt1,
			'option2' : opt2,
			'option3' : opt3,
			'option4' : opt4,
			'option5' : opt5,
			'answer' : ans,
			'type' : 'multiple',
			'exam_id': exam,
			'course' : course
		}
		save(quizArr);
	}
	else if(type === "tf"){
		let question = $("#question-"+id).val();
		let opt1 = $("#option1-"+id).val();
		let opt2 = $("#option2-"+id).val();
		let ans = $('input[name=answer-'+id+']:checked').val();

		let quizArr = {
			'question_id': id,
			'question' : question,
			'answer' : ans,
			'type' : 'tf',
			'exam_id': exam,
			'course' : course
		}
		save(quizArr);
	}
}

// display quizes
function showExams(data){
	$("#exam-div").html("");
	let answer;
	for(let i=0; i<data.length; i++){
		if(data[i].type === "single"){
			$("#exam-div").append(`
				<div class="q-div p-2 mb-5 form-group" id="q-single-`+data[i].question_id+`" style="width: 75%">
					<div class="delete-div float-right" style="z-index: 999">
						<button class="btn btn-danger delete-quiz " value="`+data[i].question_id+`">X</button>
					</div> 
					<form method="" action="" id="`+data[i].question_id+`">
							<textarea class="form-control" id="question-`+data[i].question_id+`"  placeholder="Type your question here" rows="5" style="width: 75%;">`+data[i].question+`</textarea>
						<div class="option">
							<div class="option1">
								<input type="text" class="option-text" id="option1-`+data[i].question_id+`" placeholder="Option A" value="`+data[i].option1+`">
							</div>
							<div class="option2">
								<input type="text" class="option-text" id="option2-`+data[i].question_id+`" placeholder="Option B" value="`+data[i].option2+`">
							</div>
							<div class="option3">
								<input type="text" class="option-text" id="option3-`+data[i].question_id+`" placeholder="Option C" value="`+data[i].option3+`">
							</div>
							<div class="option4">
								<input type="text" class="option-text" id="option4-`+data[i].question_id+`" placeholder="Option D" value="`+data[i].option4+`">
							</div>
							<div class="answer m-3 p-2" id="answer">
								Answer:
								<span class="ml-3">Option A</span>
								<input type="radio" class="" name="answer-`+data[i].question_id+`" id="A-`+data[i].question_id+`" value="A">
								<span class="ml-3">Option B</span>
								<input type="radio" class="" name="answer-`+data[i].question_id+`" id="B-`+data[i].question_id+`" value="B">
								<span class="ml-3">Option C</span>
								<input type="radio" class="" name="answer-`+data[i].question_id+`" id="C-`+data[i].question_id+`" value="C">
								<span class="ml-3">Option D</span>
								<input type="radio" class="" name="answer-`+data[i].question_id+`" id="D-`+data[i].question_id+`" value="D">
							</div>
						</div>
					</form>
				</div>
			`);	
		$("input[name='answer-"+data[i].question_id+"'][value='"+data[i].answer+"']").prop("checked",true);
		}
		else if(data[i].type === "multiple"){
			answer = data[i].answer.split(',');
			$("#exam-div").append(`
				<div class="q-div p-2 mb-5 form-group" id="q-multiple-`+data[i].question_id+`" style="width: 75%">
					<div class="delete-div float-right" style="z-index: 999">
						<button class="btn btn-danger delete-quiz" value="`+data[i].question_id+`">X</button>
					</div> 
					<form method="" action="" id="`+data[i].question_id+`">
							<textarea class="form-control" id="question-`+data[i].question_id+`" placeholder="Type your question here" rows="5" style="width: 75%;">`+data[i].question+`</textarea>
						<div class="option">
							<div class="option1">
								<input type="text" class="option-text" id="option1-`+data[i].question_id+`" placeholder="Option A" value="`+data[i].option1+`">
							</div>
							<div class="option2">
								<input type="text" class="option-text" id="option2-`+data[i].question_id+`" placeholder="Option B" value="`+data[i].option2+`">
							</div>
							<div class="option3">
								<input type="text" class="option-text" id="option3-`+data[i].question_id+`" placeholder="Option C" value="`+data[i].option3+`">
							</div>
							<div class="option4">
								<input type="text" class="option-text" id="option4-`+data[i].question_id+`" placeholder="Option D" value="`+data[i].option4+`">
							</div>
							<div class="option4">
								<input type="text" class="option-text" id="option5-`+data[i].question_id+`" placeholder="Option E" value="`+data[i].option5+`">
							</div>
							<div class="answer mt-3 pt-2" id="answerdiv-`+data[i].question_id+`">
								Answer:
								<span class="ml-3">Option A</span>
								<input type="checkbox" class="" name="answer-`+data[i].question_id+`" id="A-`+data[i].question_id+`" value="A">
								<span class="ml-3">Option B</span>
								<input type="checkbox" class="" name="answer-`+data[i].question_id+`" id="B-`+data[i].question_id+`" value="B">
								<span class="ml-3">Option C</span>
								<input type="checkbox" class="" name="answer-`+data[i].question_id+`" id="C-`+data[i].question_id+`" value="C">
								<span class="ml-3">Option D</span>
								<input type="checkbox" class="" name="answer-`+data[i].question_id+`" id="D-`+data[i].question_id+`" value="D">
								<span class="ml-3">Option E</span>
								<input type="checkbox" class="" name="answer-`+data[i].question_id+`" id="E-`+data[i].question_id+`" value="E">
							</div>
						</div>
					</form>
				</div>
			`);
		    $('#answerdiv-'+data[i].question_id+' input').each(function() {
	        	var $this = $(this);

	        	for(let i=0; i<answer.length; i++){
	        		if($this.val() === answer[i]){
	        			$this.prop("checked", true);
	        		}
	        	}
	   		 });
		}
		else if(data[i].type === "tf"){
			$("#exam-div").append(`

				<div class="q-div p-2 mb-5 form-group" id="q-tf-`+data[i].question_id+`" style="width: 75%">
					<div class="delete-div float-right" style="z-index: 999">
						<button class="btn btn-danger delete-quiz" value="`+data[i].question_id+`">X</button>
					</div> 
					<form method="" action="" id="`+data[i].question_id+`">
							<textarea class="form-control" id="question-`+data[i].question_id+`" placeholder="Type your question here" rows="5" style="width: 75%;">`+data[i].question+`</textarea>
						<d iv class="option">
							<div class="option1">
								<input type="text" class="option-text" id="option1-`+data[i].question_id+`" placeholder="True" readonly disabled>
							</div>
							<div class="option2">
								<input type="text" class="option-text" id="option2-`+data[i].question_id+`" placeholder="False" readonly disabled>
							</div>
							<div class="answer m-3 p-2" id="answerdiv-`+data[i].question_id+`">
								Answer:
								<span class="ml-3">True</span>
								<input type="radio" class="" name="answer-`+data[i].question_id+`" id="True-`+data[i].question_id+`" value="true">
								<span class="ml-3">False</span>
								<input type="radio" class="" name="answer-`+data[i].question_id+`" id="False-`+data[i].question_id+`" value="false">
							</div>
						</div>
					</form>
				</div>
			`);
			$("input[name='answer-"+data[i].question_id+"'][value='"+data[i].answer+"']").prop("checked",true);
		}
	}
}
// delete a question
$(document).on('click', '.delete-quiz', function(){
	$this = $(this);

	if($this.val() != "")
		del($this.val());
	});