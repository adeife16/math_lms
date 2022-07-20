<?php 
	$title = "Signup";
    session_start();
  if (isset($_SESSION['matric']))
  {
    header('location: index.php');
    // echo "<script>alert('Database not connected!');</script>";
  }
	require_once 'header.php';
?>
<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="http://localhost/cal/home"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">Sign Up</a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    Register Yourself</h1>
            </div>
        </div>
    </div>
</section>

<section class="category-course-list-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="hidden" id="error_msg" style="background: #f01111; color: white; text-align: center; height: 70px; padding: 10px; margin: 0 auto;">
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="hidden" id="success_msg" style="background: green; color: white; text-align: center; height: 70px; padding: 10px; margin: 0 auto;">
          </div>
        </div>
      </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="user-dashboard-box mt-3">
                  <div class="user-dashboard-content w-100 register-form">
                      <div class="content-title-box">
                          <div class="title">Registration Form</div>
                          <div class="subtitle">Sign Up And Start Learning.</div>
                      </div>
                      <form action="" method="post" id="signup-form">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="first_name"><span class="input-field-icon"><i class="fas fa-user"></i></span> First Name:</label>
                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="" required="">
                                  </div>
                                  <div class="form-group">
                                      <label for="last_name"><span class="input-field-icon"><i class="fas fa-user"></i></span> Last Name:</label>
                                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="" required="">
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                      <input type="email" class="form-control" name="email" id="registration-email" placeholder="Email" value="" required="">
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-matric"><span class="input-field-icon"><i class="fas fa-user"></i></span> Matric No:</label>
                                      <input type="text" class="form-control" name="matric" id="registration-matric" placeholder="Matric No" value="" required="">
                                  </div>
                                  <div class="form-group">
                                      <label for="dob"><span class="input-field-icon"><i class="fas fa-table"></i></span>Date of Birth:</label>
                                      <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="" required="">
                                  </div>

                                  <div class="form-group">
                                      <label for="faculty"><span class="input-field-icon"><i class="fas fa-book"></i></span>Faculty:</label>
                                      <select class="form-control" name="faculty" id="faculty"  required="">
                                        <option value="">Select Faculty</option>
                                        <option value="1">Engineering</option>
                                        <option value="2">Pure and Applied Science</option>
                                        <option value="3">Environmental Studies</option>
                                        <option value="4">Management Studies</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="dept"><span class="input-field-icon"><i class="fas fa-book"></i></span>Department:</label>
                                      <select class="form-control" name="dept" id="dept" required="">
                                        <option value="">Select Department</option>
                                        <option value="1">Computer Engineering</option>
                                        <option value="2">Electrical Engineering</option>
                                        <option value="3">Civil Engineering</option>
                                        <option value="4">Computer Science</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="level"><span class="input-field-icon"><i class="fas fa-book"></i></span>Level:</label>
                                      <select class="form-control" name="level" id="level" required="">
                                        <option value="">Select Level</option>
                                        <option value="ND One">ND One</option>
                                        <option value="ND Two">ND Two</option>
                                        <option value="HND One">HND One</option>
                                        <option value="HND Two">HND Two</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                      <input type="password" class="form-control" name="password" id="registration-password" placeholder="Password" value="" required="">
                                  </div>
                                  <div class="form-group">
                                      <label for="confirm-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                      <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="Confirm Password" value="" required="">
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="button" class="btn" id="signup-btn">Sign Up</button>
                          </div>
                          <div class="account-have text-center">
                              Already Have An Account? <a href="login.php">Login</a>
                          </div>
                      </form>
                  </div>

                  <div class="user-dashboard-content w-100 forgot-password-form hidden">
                      <div class="content-title-box">
                          <div class="title">Forgot Password</div>
                          <div class="subtitle">Provide Your Email Address To Get Password.</div>
                      </div>
                      <form action="http://localhost/cal/login/forgot_password/frontend" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                      <input type="email" class="form-control" name="email" id="forgot-email" placeholder="Email" value="" required="">
                                      <small class="form-text text-muted">Provide Your Email Address To Get Password.</small>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn">Reset Password</button>
                          </div>
                          <div class="forgot-pass text-center">
                              Want To Go Back? <a href="javascript::" onclick="toggoleForm('login')">Login</a>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  function toggoleForm(form_type) {
    if (form_type === 'login') {
      $('.login-form').show();
      $('.forgot-password-form').hide();
      $('.register-form').hide();
    }else if (form_type === 'registration') {
      $('.login-form').hide();
      $('.forgot-password-form').hide();
      $('.register-form').show();
    }else if (form_type === 'forgot_password') {
      $('.login-form').hide();
      $('.forgot-password-form').show();
      $('.register-form').hide();
    }
  }
</script>
<?php 
	require_once 'footer.php';
?>