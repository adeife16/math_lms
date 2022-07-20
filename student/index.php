<?php
  session_start();
  $title = "Dashboard";
	require_once 'header.php';
  if (!isset($_SESSION['matric']))
	{
		header('location: logout.php');
	}
?>
      <div class="content">
        <div class="container-fluid">
          <h2>Courses Enrolled</h2>
          <div class="row" id="display_course">
<!--             <div class="col-xl-4 col-md-6 col-sm-4 col-lg-4">
              <a href="">
                <div class="card green">
                  <div class="card-body  color-white">
                    <h4>MTH 111</h4>
                    <p>Set and Surds</p>
                    <small>Progress</small>

                  </div>
                </div>
              </a>
            </div> -->

          </div>
          <div class="row">

          </div>
          <div class="row">
            
          </div>
        </div>
      </div>
<?php 
	require_once 'footer.php';
?>