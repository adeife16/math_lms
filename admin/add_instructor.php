<?php
session_start();
$title = "Add Instructors";
require_once 'header.php';
if(!isset($_SESSION['email']) || $_SESSION['email'] == "" || $_SESSION['role'] != "admin")
{
  header('location: dashboard.php');
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create a New Instructor Profile</h1>
</div>

  <div class="row justify-content-center">
  <div class="col-xl-6 col-md-6">
    <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Fill the form to create a new Instructor Profile
                  </h6>
              </div>
              <div class="card-body">
              <div id="course-form-div" class="p-3">
                <form class="form" id="instructor-form">
                  <div class="form-group">
                    <span for="fname">First Name</span>
                    <input class="form-control required" name="fname" id="fname" placeholder="First Name" >
                  </div>
                  <div class="form-group">
                    <span for="lname">Last Name</span>
                    <input type="text" name="lname" class="form-control required" id="lname" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                    <span for="email">Email Address</span>
                    <input class="form-control required" id="email" name="email" type="email" placeholder="Email Address" required>
                    <span> <small class="color-red hide" id="email-msg"></small> </span>
                  </div>
                  <div class="form-group">
                    <span for="pass">Password</span>
                    <input class="form-control required" id="pass" name="pass" type="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <span for="con-pass">Confirm Password</span>
                    <input class="form-control required" id="con-pass" name="con-pass" type="password" placeholder="Confiirm Password" required>
                  </div>
                  <div class="form-group">
                    <span for="about">About</span>
                    <textarea name="about" id="about" maxlength="150" class="form-control required" placeholder="Write a bit about yourself" rows="6" cols="80" required></textarea>
                  </div>
                  <hr>
                  <div class="form-group">
                    <span for="pic">Profile Picture</span>
                    <div class="row justify-content-between">
                      <div class="col-xl-6 lg-6">
                        <div class="containers">

                        </div>

                        <button class="file-upload">
                          <input type="file" class="file-input required" name="pic" id="pic" onchange="readURL(this);" accept=".jpg, .jpeg, .png, .svg" required>Upload Picture
                        </button>

                      </div>
                      <div class="col-xl-6 lg-6">
                        <div class="text-center">
                          <img src="" class="hide" id="preview" style="width: 200px; height: 200px; border-radius: 100px;" alt="">
                        </div>
                        <span class=".file-name"></span>
                        <span class=".file-size"></span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button type="button" class="btn btn-success" id="submit" name="submit">SUBMIT</button>
            </div>
          </form>
          </div>
  </div>
</div>

<?php
require_once 'footer.php';
?>
