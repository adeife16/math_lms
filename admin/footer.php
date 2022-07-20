<?php  ?>
 </div>
            <!-- End of Main Content -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <!-- Footer -->
            <footer class="sticky-footer fixed-bottom mt-5 bg-white" style="z-index: 0;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; FPICAL 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
          <div class="alert-box success"></div>
          <div class="alert-box failure"></div>
          <div class="alert-box warning"></div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>

    <!-- Session monitor script -->
    <script type="text/javascript" src="js/session.js"></script>


    <!-- Dashboard page script -->
    <?php if ($title == "Dashboard"): ?>
        <script src="vendor/chart.js/Chart.bundle.js"></script>
        <script type="text/javascript" src="js/dashboard.js"></script>
        <script type="text/javascript" src="ajax/dashboard.js"></script>
    <?php endif; ?>
    <!-- Create and edit course page script -->
    <?php if ($title == "Create Course" || $title == "View Courses"): ?>
        <script type="text/javascript" src="ajax/courses.js"></script>
        <script type="text/javascript" src="js/courses.js"></script>
    <?php endif; ?>
    <!-- create topic page script -->
    <?php if ($title == "Create Topic" || $title == "View Topics"): ?>
        <script type="text/javascript" src="ajax/topic.js"></script>
        <script type="text/javascript" src="js/topic.js"></script>
    <?php endif; ?>
    <?php if ($title == "Edit Topic"): ?>
        <script type="text/javascript" src="ajax/edit_topic.js"></script>
        <script type="text/javascript" src="js/edit_topic.js"></script>
    <?php endif ?>
    <?php if ($title == "Create Content"): ?>
        <script src="js/froala_editor.pkgd.min.js" charset="utf-8"></script>
        <script src="ajax/content.js" charset="utf-8"></script>
        <script src="js/content.js" charset="utf-8"></script>
    <?php endif; ?>
    <?php if ($title == "Content Preview"): ?>
        <script type="text/javascript">
        let content = sessionStorage.getItem("preview");
        $("#display").html(content)
        </script>
    <?php endif; ?>
    <?php if ($title == "Add Instructors"): ?>
        <script src="ajax/add_instructor.js" charset="utf-8"></script>
        <script src="js/add_instructor.js" charset="utf-8"></script>
    <?php endif; ?>
    <?php if ($title == "Quizes"): ?>
        <script type="text/javascript" src="ajax/quizes.js"></script>
        <script type="text/javascript" src="js/quizes.js"></script>
    <?php endif ?>
    <?php if ($title == "Create Quizes"): ?>
        <script type="text/javascript" src="js/md5.min.js"></script>
        <script type="text/javascript" src="ajax/create_quiz.js"></script>
        <script type="text/javascript" src="js/create_quiz.js"></script>
    <?php endif ?>
    <!-- Page level plugins -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>
