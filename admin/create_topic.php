<?php
	session_start();
	$title = 'Create Topic';
	require_once 'header.php';
	if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
	{
		header('location: index.php');
	}
?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">Create a new Topic</h1>
	</div>

		<div class="row justify-content-center">
		<div class="col-xl-8 col-md-8">
			<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">	Fill the form to create a new Topic
                    </h6>
                </div>
                <div id="course-form-div" class="p-3">
                	<form class="form" id="topic-form">
                		<div class="form-group">
                			<span for="cCode">Course</span>
                			<select class="form-control" name="course" id="course">
                				<option value="">Select Course</option>
                			</select>
                		</div>
                		<div class="form-group">
                			<span for="tTitle">Topic Title</span>
                			<input type="text" name="tTitle" class="form-control" id="tTitle" placeholder="Topic Title">
                		</div>
                		<div class="form-group">
                			<input class="btn btn-primary" id="create-btn" type="button" value="SUBMIT">
                		</div>
                	</form>
                </div>
            </div>
		</div>
	</div>

<?php
	require_once 'footer.php';
?>
