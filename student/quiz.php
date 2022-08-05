<?php
    session_start();
    $title = "Quiz";
    require_once 'header.php';
    if (!isset($_SESSION['matric']))
    {
        header('location: logout.php');
    }
?>
    <div class="row">
        <div class="col-md-12">
            <button class="btn white-color green float-right" data-toggle="modal" data-target="#submitModal" id="checkSubmit">SUBMIT</button>
        </div>
    </div>
    <div class="row justify-content-center text-white">
        <div class="col-md-8 col-sm-12" id="display">

        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 col-lg-8 justify-content-center">
            <div class="navigate p-3" id="navigate">
                <!-- <button class="btn green color-white float-left">PREVIOUS</button>
                <button class="btn green color-white float-right">NEXT</button> -->
            </div>
        </div>
    </div>
	<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content dark color-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Quiz</h5>
                    <button class="close color-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="question-div">
                    Confirm Submit?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn green" id="submit"" value="">Confirm</a></button>
                </div>
            </div>
        </div>
    </div>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
<script type="text/javascript" async>
  setTimeout(function(){
	var script = document.createElement('script');
	script.src = "node_modules/mathjax/es5/tex-chtml.js";
	document.getElementsByTagName('head')[0].appendChild(script)
  },3000)
</script>

<?php
	require_once 'footer.php';
?>