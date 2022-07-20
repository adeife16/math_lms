<?php
	$title = "Login";
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
                        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                Login
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    Login To Your Account
                </h1>
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
                  <div class="user-dashboard-content w-100 login-form">
                      <div class="content-title-box">
                          <div class="title">Login</div>
                          <div class="subtitle">Provide Your Valid Login Credentials.</div>
                      </div>
                      <form action="" method="post" id="login-form">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="login-matric"><span class="input-field-icon"><i class="fas fa-user"></i></span> Matric No</label>
                                      <input type="text" class="form-control" name="matric" id="login-matric" placeholder="Matric No" value="" required="">
                                  </div>
                                  <div class="form-group">
                                      <label for="login-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                      <input type="password" class="form-control" name="password"  id="password" placeholder="Password" value="" required="">
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box">
                              <button type="button" id="login-btn" class="btn">Login</button>
                          </div>
                      </form>
                      <div class="forgot-pass text-center">
                          <span>or</span>
                          <a href="javascript::" onclick="toggoleForm('forgot_password')">Forgot Password</a>
                      </div>
                      <div class="account-have text-center">
                          Do Not Have An Account? <a href="signup.php">Sign Up</a>
                      </div>
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
<?php
	require_once 'footer.php';
?>