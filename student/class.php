<?php
  session_start();
  $title = "Class";
  require_once 'header.php';
	if (!isset($_SESSION['matric']))
	{
		header('location: logout.php');
	}
?>

	<div class="row">
		<div class="col-xl-12">
			<div class="breadcrumb">
				<p><a href="index.php">Dashboard</a>  <i class="icon ion-arrow-right-c color-white"></i> <a href="courses.php">Courses</a> <i class="icon ion-arrow-right-c color-white"></i> <a href="#"><span id="title-link" class="color-white"></span> </a>  <i class="icon ion-arrow-right-c color-white"></i> <span id="content-link" class="color-white"></span>	</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="title">
				<div class="course" id="course_title"></div>
				
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
	<div class="col-md-8">
    <div class="">
        <div class="">
			<div class="content color-white" id="content">

			</div>
			<div class="action" id="action">
				
			</div>
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
