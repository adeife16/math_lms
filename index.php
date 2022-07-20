<?php
    $title = "Home";
	require_once 'header.php';
?>

<section class="home-banner-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <div class="home-banner-wrap">
                    <h2>Learn on your schedule</h2>
                    <p>Study any topic, anytime. Explore thousands of courses and interact with fellow learners</p>
                    <form class="" action="http://localhost/cal/home/search" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="What Do You Want To Learn?">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-fact-area">
    <div class="container-lg">
        <div class="row">
                        <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fas fa-bullseye float-left"></i>
                    <div class="text-box">
                        <h4>0 Online Courses</h4>
                        <p>Explore A Variety Of Fresh Topics</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fa fa-check float-left"></i>
                    <div class="text-box">
                        <h4>Expert Instruction</h4>
                        <p>Find The Right Course For You</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fa fa-clock float-left"></i>
                    <div class="text-box">
                        <h4>Lifetime Access</h4>
                        <p>Learn On Your Schedule</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h2 class="course-carousel-title">Top Courses</h2>
                <div class="course-carousel slick-initialized slick-slider">
                        <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
</div>
</div>
</div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h2 class="course-carousel-title">Top 10 Latest Courses</h2>
                <div class="course-carousel slick-initialized slick-slider">
                            <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
    </div>
</div>
</div>
</section>
<?php 
	require_once 'footer.php';
?>

        <!-- PAYMENT MODAL -->
        <!-- Modal -->
                <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content payment-in-modal">
                    <div class="modal-header">
                        <h5 class="modal-title">Checkout!</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="http://localhost/cal/home/paypal_checkout" method="post">
                                    <input type="hidden" class="total_price_of_checking_out" name="total_price_of_checking_out" value="">
                                    <button type="submit" class="btn btn-default paypal">Paypal</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="http://localhost/cal/home/stripe_checkout" method="post">
                                    <input type="hidden" class="total_price_of_checking_out" name="total_price_of_checking_out" value="">
                                    <button type="submit" class="btn btn-primary stripe">Stripe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Modal -->

        <!-- Modal -->
        <div class="modal fade multi-step" id="EditRatingModal" tabindex="-1" role="dialog" aria-hidden="true" reset-on-close="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content edit-rating-modal">
                    <div class="modal-header">
                        <h5 class="modal-title step-1" data-step="1" style="">Step 1</h5>
                        <h5 class="modal-title step-2" data-step="2" style="display: none;">Step 2</h5>
                        <h5 class="m-progress-stats modal-title">
                            &nbsp;of&nbsp;<span class="m-progress-total">2</span>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="m-progress-bar-wrapper">
                        <div class="m-progress-bar" style="width: 50%;">
                        </div>
                    </div>
                    <div class="modal-body step step-1" style="">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="modal-rating-box">
                                        <h4 class="rating-title">How Would You Rate This Course Overall?</h4>
                                        <fieldset class="your-rating">

                                            <input type="radio" id="star5" name="rating" value="5">
                                            <label class="full" for="star5"></label>

                                        	<!-- <input type="radio" id="star4half" name="rating" value="4 and a half" />
                                            <label class="half" for="star4half"></label> -->

                                        	<input type="radio" id="star4" name="rating" value="4">
                                            <label class="full" for="star4"></label>

                                        	<!-- <input type="radio" id="star3half" name="rating" value="3 and a half" />
                                            <label class="half" for="star3half"></label> -->

                                        	<input type="radio" id="star3" name="rating" value="3">
                                            <label class="full" for="star3"></label>

                                        	<!-- <input type="radio" id="star2half" name="rating" value="2 and a half" />
                                            <label class="half" for="star2half"></label> -->

                                        	<input type="radio" id="star2" name="rating" value="2">
                                            <label class="full" for="star2"></label>

                                        	<!-- <input type="radio" id="star1half" name="rating" value="1 and a half" />
                                            <label class="half" for="star1half"></label> -->

                                        	<input type="radio" id="star1" name="rating" value="1">
                                            <label class="full" for="star1"></label>

                                        	<!-- <input type="radio" id="starhalf" name="rating" value="half" />
                                            <label class="half" for="starhalf"></label> -->

                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-course-preview-box">
                                        <div class="card">
                                            <img class="card-img-top img-fluid" id="course_thumbnail_1" alt="">
                                            <div class="card-body">
                                                <h5 class="card-title" id="course_title_1"></h5>
                                                <p class="card-text" id="instructor_details">

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-body step step-2" style="display: none;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="modal-rating-comment-box">
                                        <h4 class="rating-title">Write A Public Review</h4>
                                        <textarea id="review_of_a_course" name="review_of_a_course" placeholder="Describe Your Experience What You Got Out Of The Course And Other Helpful Highlights. What Did The Instructor Do Well And What Could Use Some Improvement?" maxlength="65000" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-course-preview-box">
                                        <div class="card">
                                            <img class="card-img-top img-fluid" id="course_thumbnail_2" alt="">
                                            <div class="card-body">
                                                <h5 class="card-title" id="course_title_2"></h5>
                                                <p class="card-text">
                                                    -
                                                    admin admin                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="course_id" id="course_id_for_rating" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary next step step-1" data-step="1" onclick="sendEvent(2)" style="">Next</button>
                        <button type="button" class="btn btn-primary previous step step-2 mr-auto" data-step="2" onclick="sendEvent(1)" style="display: none;">Previous</button>
                        <button type="button" class="btn btn-primary publish step step-2" onclick="publishRating($('#course_id_for_rating').val())" id="" style="display: none;">Publish</button>
                    </div>
                </div>
            </div>
        </div><!-- Modal -->


        <script type="text/javascript">
            function publishRating(course_id) {
                var review = $('#review_of_a_course').val();
                var starRating = 0;
                $('input:radio[name="rating"]:checked').each(function() {
                    starRating = $('input:radio[name="rating"]:checked').val();
                });

                $.ajax({
                    type : 'POST',
                    url  : 'http://localhost/cal/home/rate_course',
                    data : {course_id : course_id, review : review, starRating : starRating},
                    success : function(response) {
                        console.log(response);
                        $('#EditRatingModal').modal('hide');
                        location.reload();
                    }
                });
            }
        </script>
<script src="http://localhost/cal/assets/frontend/default/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/vendor/jquery-3.2.1.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/popper.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/bootstrap.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/slick.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/select2.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/tinymce.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/multi-step-modal.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/jquery.webui-popover.min.js"></script>
<script src="https://content.jwplatform.com/libraries/O7BMTay5.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/main.js"></script>
<script src="http://localhost/cal/assets/global/toastr/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script src="http://localhost/cal/assets/frontend/default/js/bootstrap-tagsinput.min.js"></script>
<script src="http://localhost/cal/assets/frontend/default/js/custom.js"></script>

<!-- SHOW TOASTR NOTIFIVATION -->

<script type="text/javascript">
function showAjaxModal(url)
{
// SHOWING AJAX PRELOADER IMAGE
jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');

// LOADING THE AJAX MODAL
jQuery('#modal_ajax').modal('show', {backdrop: 'true'});

// SHOW AJAX RESPONSE ON REQUEST SUCCESS
$.ajax({
  url: url,
  success: function(response)
  {
    jQuery('#modal_ajax .modal-body').html(response);
  }
});
}
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Modal</h4>
            </div>

            <div class="modal-body" style="height:500px; overflow:auto;">



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
function confirm_modal(delete_url)
{
jQuery('#modal-4').modal('show', {backdrop: 'static'});
document.getElementById('delete_link').setAttribute('href' , delete_url);
}
</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
            </div>


            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


</body></html>