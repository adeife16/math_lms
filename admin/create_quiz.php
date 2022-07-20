<?php 
	session_start();
	$title = "Create Quizes";
	require_once 'header.php';
	if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
	{
	  header('location: index.php');
	}
?>
	<script type="text/x-mathjax-config">
		MathJax.Hub.Config({
		  tex2jax: {inlineMath: [['$$','$$'], ['\\(','\\)']]}
		});
	</script>
	<script type="text/javascript" async
	  src="node_modules/mathjax/es5/tex-chtml.js">
	</script>
	<script src="js/mathlive.min.js" charset="utf-8"></script>
	<style type="text/css">
		.option-text{
		    
		    width: 75%;
		    height: calc(1.5em + 0.75rem + 2px);
		    padding: 0.375rem 0.75rem;
		    margin:  7px;
		    font-size: 1rem;
		    font-weight: 400;
		    line-height: 1.5;
		    color: #6e707e;
		    background-color: #fff;
		    background-clip: padding-box;
		    border: 1px solid #d1d3e2;
		    border-radius: 0.35rem;
		    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}
	</style>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800"> Create Quiz <span id="topicName"></span></h1>
	</div>

	<d iv class="row justify-content-center">
		<div class="col-md-6">
			<div class="quiz-div" id="quiz-div">
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="converter" style="position: fixed;">
				<div class="mathlib" style="border: 1px solid black; border-radius: 7px; margin-bottom: 10px;">
					<div class="math-div">
	              		<math-field id="mf" virtual-keyboard-mode="manual" placeholder="Use the virtual keyboard">
	              		</math-field>
	            	</div>
				</div>
	        	<div class="latex">
	          		<textarea name="conv" rows="6" cols="80" class="form-control" id="conv" placeholder="Click on the virtual keyboard above to insert math characters"></textarea>
	        	</div>
	        	<div class="p-3">
	          		<!-- <button type="button" class="btn btn-primary" name="insert" id="insert">INSERT</button> -->
	          		<button type="button" class="btn btn-warning" name="copy" id="copy">COPY</button>
	          		<button type="button" class="btn btn-danger" name="clear" id="clear">CLEAR</button>
	        	</div>
        	</div>
	</div>
	</div>
	<div class="row ml-2">
		<div class="col-md-8">
			<span>Quiz type</span>
			<div class="col-md-4">
				<div class="form-group">
					<select class="form-control" id="quiz-type">
						<option value="single">Multiple Option</option>
						<option value="multiple">Multiple Choice</option>
						<option value="tf">True or False</option>
					</select>
				</div>
				<button class="btn btn-success" id="create-quiz">Add</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body" id="question-div"><</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button class="btn btn-danger" id="delete-confirm" value="">Delete</a></button>
              </div>
          </div>
      </div>
  </div>
<?php 
	require_once 'footer.php';
?>