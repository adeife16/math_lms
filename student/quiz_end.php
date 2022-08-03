<?php
    session_start();
    $title = "End Quiz";
    require_once 'header.php';
    if (!isset($_SESSION['matric']))
    {
        header('location: logout.php');
    }
?>

    <div class="row justify_content_center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="checkpoint text-center">
                        <!-- <p class="text-center"><h2>CONGRATULATIONS</h2></p> -->
                        <img src="assets/img/party.png" alt="">
                        <p><h2>Congratulations! you have sucessfully completed the quiz. Your score is <span id="result" class=""></span>.</h2></p>
                        <p>
                            <button class="btn green color-white" id="retake"></button> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once 'footer.php';
?>