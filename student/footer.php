<?php  ?>
      </div>
      </div>
  <div class="alert-box success"></div>
  <div class="alert-box failure"></div>
  <div class="alert-box warning"></div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">

          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = 'Copyright &copy; FPICAL ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/notify.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <!-- <script src="https://unpkg.com/default-passive-events"></script> -->
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="assets/demo/demo.js"></script> -->
  <!-- get session details -->
  <script type="text/javascript" src="ajax/main.js"></script>
  <script type="text/javascript" src="assets/js/pages/main.js"></script>

  <!-- Dashboard page scripts -->
  <?php if ($title == "Dashboard"): ?>
    <script type="text/javascript" src="ajax/dashboard.js"></script>
    <script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
  <?php endif ?>

  <!-- Profile page scripts -->
  <?php if ($title == "Profile"): ?>
    <script type="text/javascript" src="ajax/profile.js"></script>
    <script type="text/javascript" src="assets/js/pages/profile.js"></script>
  <?php endif ?>

  <!-- Courses page script -->
  <?php if ($title == "Courses"): ?>
    <script type="text/javascript" src="ajax/courses.js"></script>
    <script type="text/javascript" src="assets/js/pages/courses.js"></script>
  <?php endif ?>

  <!-- View course content -->
  <?php if ($title == "View Course"): ?>
    <script type="text/javascript" src="ajax/view_course.js"></script>
    <script type="text/javascript" src="assets/js/pages/view_course.js"></script>  
  <?php endif; ?>
  <?php if($title == "Class"): ?>
    <script type="text/javascript" src="ajax/class.js"></script>
    <script type="text/javascript" src="assets/js/pages/class.js"></script>   
  <?php endif; ?>
  <?php if($title == "Topic"): ?>
    <script type="text/javascript" src="ajax/topic.js"></script>
    <script type="text/javascript" src="assets/js/pages/topic.js"></script>   
  <?php endif; ?>
  <?php if($title == "Take Quiz"): ?>
    <script>
        var url = window.location.href;
        url = url.split('?');
        url = url[1].split('=');
        let topi = url[1];
        topi = topi.split('&');
        const topic_id = topi[0];
        const index = url[2];
        $("#takeQuiz").html(`<button type="button" class="btn color-white green"><a href="quiz.php?topic_id=`+topic_id+`">Take Quiz</a></button>`)
    </script>
  <?php endif; ?>
  <?php if($title == "Quiz"): ?>
    <script src="ajax/quiz.js"></script>
    <script src="assets/js/pages/quiz.js"></script>
  <?php endif; ?>
  <?php if($title == "End Quiz"): ?>
    <script src="ajax/quiz_end.js"></script>
    <script src="assets/js/pages/quiz_end.js"></script>
  <?php endif; ?>
  
</body>

</html>
