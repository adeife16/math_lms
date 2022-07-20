<?php
  session_start();
  $title = "Topic";
  require_once 'header.php';
	if (!isset($_SESSION['matric']))
	{
		header('location: logout.php');
	}
?>
   <style>
      .topic{
         display: flex;
         border-radius: 10px;
         background: rgba(255, 255, 255, 0.1);
         align-items: center;
      }
   </style>
	<div class="row">
		<div class="col-xl-12">
			<div class="breadcrumb">
				<p><a href="index.php">Dashboard</a>  <i class="icon ion-arrow-right-c color-white"></i> <a href="courses.php">Courses</a> <i class="icon ion-arrow-right-c color-white"></i> <a href="#"><span id="title-link" class="color-white">Topics</span> </a> <i class="icon ion-arrow-right-c color-white"></i> <span id="content-link" class="color-white">Contents</span>	</p>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
	<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div id="content">

            </div>
        </div>
      </div>
    </div>
	</div>
<?php
	require_once 'footer.php';
?>
