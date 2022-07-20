<?php
  	session_start();
  	$title = "Take Quiz";
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
                        <p><h2>Congratulations on the topic completion, click the button below to take a quiz</h2></p>
                        <p id="takeQuiz"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once 'footer.php';
?>   
