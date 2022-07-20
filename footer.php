<?php  ?>

<!-- Global Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/pages/session.js"></script>
<!-- Login Page Scripts -->
<?php if ($title == "Login"): ?>
    <script type="text/javascript" src="assets/js/pages/login.js"></script>
    <script type="text/javascript" src="ajax/login.js"></script>
<?php endif ?>

<!-- Signup Page Scripts -->
<?php if ($title == "Signup"): ?>
    <script type="text/javascript" src="assets/js/pages/signup.js"></script>
    <script type="text/javascript" src="ajax/signup.js"></script>
<?php endif ?>

<footer class="footer-area">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-text">
                    <a href=""><img src="assets/images/fpical.png" alt="" class="d-inline-block" width="110"></a>
                    <a href="http://lms.com/" target="_blank"></a>
                </p>
            </div>
            <div class="col-md-6">
                <ul class="nav justify-content-md-end footer-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/cal/home/about_us">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/cal/home/privacy_policy">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/cal/home/terms_and_condition">Terms &amp; Condition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/cal/home/login">
                            Login                                </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>