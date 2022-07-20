<?php
		session_start();
		$title = "Courses";
		require_once 'header.php';
		if (!isset($_SESSION['matric']))
		{
			header('location: logout.php');
		}
?>
	<div class="row">
		<div class="col-xl-12">
			<div class="breadcrumb">
				<p><a href="index.php">Dashboard</a>  <i class="icon ion-arrow-right-c color-white"></i>  <a href="#">Courses</a></p>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-4">
			<div class="search">
				<form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search Courses">
                <button type="submit" class="btn btn-success btn-round btn-just-icon">
                  <i class="icon ion-search"></i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Available Courses</h4>
<!--         <p class="card-category"> Here is a subtitle for this table</p> -->
      </div>
        <div class="card-body">
          <div class="">
            <table class="table">
              <thead class=" text-primary">
                <tr>
                	<th class="text-center">S/N</th>
                  <th class="text-center">Course Code</th>
                  <th class="text-center">Course Title</th>
                  <th class="text-center" colspan="2">Action</th>
                </tr>
              </thead>
              <tbody id="display">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	</div>
<?php
	require_once 'footer.php';
?>
