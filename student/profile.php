<?php
	session_start();
	$title = "Profile";
	require_once 'header.php';
	if (!isset($_SESSION['matric']))
	{
		header('location: logout.php');
	}
?>
<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb">
			<p><a href="index.php">Dashboard</a>  <i class="icon ion-arrow-right-c color-white"></i>  <a href="#">Profile</a></p>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-8">
<div class="card ">
<div class="card-header card-header-primary">
<h4 class="card-title">Update Profile</h4>
<!-- <p class="card-category">Complete your profile</p> -->
</div>
<div class="card-body">
<form id="profile-form">
<div class="row">
	<div class="col-md-5">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">Matric No.</label>
	<input type="text" class="form-control" id="matric" disabled="" readonly>
	</div>
	</div>

	<div class="col-md-3">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">First Name</label>
	<input type="text" class="form-control" name="fname" id="fname" disabled readonly>
	</div>
	</div>
	<div class="col-md-4">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">Last Name</label>
	<input type="text " class="form-control" name="lname" id="lname" disabled="" readonly>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">Email</label>
	<input type="text" class="form-control" placeholder="Email Address" id="email" name="email">
	</div>
	</div>

	<div class="col-md-6">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">School</label>
	<input type="text" class="form-control" name="faculty" id="faculty" disabled readonly>
	</div>
	</div>
 </div>
<div class="row">
	<div class="col-md-12">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">Department</label>
	<select class="form-control" name="dept" id="dept" disabled readonly>
		<option value="">Select Department</option>
	</select>
	</div>
	</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group bmd-form-group">
<label class="bmd-label-floating">Level</label>
<select class="form-control" name="level" id="level">
	<option value="">Select Level</option>
	<option value="ND_One">ND One</option>
	<option value="ND_Two">ND Two</option>
	<option value="HND_One">HND One</option>
	<option value="HND_Two">HND Two</option>
</select>
</div>
</div>
<div class="col-md-4">
<div class="form-group bmd-form-group">
<label class="bmd-label-floating">Nationality</label>
<select class="form-control" name="nationality" id="nationality">

</select>
</div>
</div>
<div class="col-md-4">
<div class="form-group bmd-form-group">
<label class="bmd-label-floating">Phone No.</label>
<input type="text" class="form-control" id="phone" name="phone">
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group bmd-form-group">
<label class="bmd-label-floating">About Me</label>
<label></label>
<textarea class="form-control" rows="1" name="about" id="about"></textarea>
</div>
</div>
</div>
<button type="button" class="btn green pull-right" id="update">Update Profile</button>
</form>
<br>
<br>
<br>
<h4 class="color-green">Change Password</h4>
<form id="password-form">
<div class="row">
	<div class="col-md-5">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">Old Password</label>
	<input type="password" class="form-control" name="oldPass" id="oldPass">
	</div>
	</div>

	<div class="col-md-5">
	<div class="form-group bmd-form-group">
	<label class="bmd-label-floating">New Password</label>
	<input type="password" class="form-control" name="newPass" id="newPass">
	</div>
	</div>
	<div class="form-group pl-2">
		<button class="green color-white btn" type="button" id="password-btn">Change</button>
	</div>

</div>
</form>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-profile">
<div class="card-avatar" >
<a href="#pablo">
<img class="img" id="profile-pic" src="">
</a>
</div>
<div class="card-body">
<h4 class="card-title"></h4>
<form class="form" action="" method="post" >
	<div class="containers">

    </div>

    <button class="file-upload">
      <input type="file" class="file-input">Change Picture
    </button>
    <button class="btn green" id="upload-pic" >Upload Picture</button>
  </div>
</div>
</form>

</div>
</div>
</div>
</div>
<?php
	require_once 'footer.php';
?>
