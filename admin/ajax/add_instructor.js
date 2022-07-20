function submit(){
  let formdata = new FormData(document.getElementById('instructor-form'));
  $.ajax({
    url: 'backend/instructor.php',
    type: 'POST',
    data: formdata,
    contentType: false,
    processData: false,
    cache: false,
    beforeSend: function(){
      $("#submit").attr('disabled', 'disabled');
    }
  })
  .done(function(res) {
    console.log(res);
    $("#submit").removeAttr('disabled');
    let data = JSON.parse(res);
    if(data.status === "success"){
      $("#instructor-form").trigger("reset");
      alert_success("Success!");
    }
    else{
      alert_failure("An error has occured")
    }
  })
  .fail(function() {
    console.log("error");
  })

}

function checkEmail(mail){
  $.ajax({
    url: 'backend/misc.php?checkemail='+mail,
    type: 'GET',
    cache: false
  })
  .done(function(res) {
    let data = JSON.parse(res);
    if(data.exist === true){
        $("#submit").attr('disabled', 'disabled');
          $("#email-msg").html("Email Address already Exists");
          $("#email-msg").removeClass('hide');
          $("#email").addClass('border-red');
    }
    else {
          $("#email-msg").html("");
          $("#email-msg").addClass('hide');
          $("#email").removeClass('border-red');
          $("#email").addClass('border-green');
          $("#submit").removeAttr('disabled');

    }
  })
  .fail(function() {
    console.log("error");
  })

}
