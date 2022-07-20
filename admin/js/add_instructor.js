$(document).ready(function() {

});

// submit form
$("#submit").click(function(e){
  let error = 0;
  $(".required").each(function() {
     if($(this).val() === ""){
       $(this).addClass('border-red');
       error = 1;
     }
     else{
       $(this).removeClass('border-red');
       $(this).addClass('border-green');
       error = 0;
     }
  });
  if(error === 0){
    submit();
    $(this).removeAttr('disabled', 'disabled');
  }
  else{
    $(this).attr('disabled', 'disabled');
  }
})
$("#con-pass").keyup(function(){
  let pass = $("#pass").val();
  if($(this).val() != pass){
    $("#pass, #con-pass").addClass('border-red')
  }
  else{
    $("#pass, #con-pass").removeClass('border-red')
  }
})

$("#email").keyup(function() {
  if(validateEmail($(this).val()) === false){
    $("#email-msg").html("Invalid Email Address");
    $("#email-msg").removeClass('hide');
    $(this).addClass('border-red');
  }
  else{
    $("#email-msg").html("");
    $("#email-msg").addClass('hide');
    $(this).removeClass('border-red');
    checkEmail($(this).val());
  }
});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  // console.log(emailReg.test( $email ));
  return emailReg.test( $email );
}

function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['png','jpg','jpeg'];
      reader.onload = function(e) {

              if($.inArray(file_type, allowed_ext) != -1){
                  $('#preview').attr('src', e.target.result);
                  $('#preview').removeClass('hide');

                  $(".file-name").html(input.files[0].name);
                  $(".file-size").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                  // $('.file-upload-content').show();
                  // $("#bar-3").addClass("hide");
              }
              else{
                  alert_failure_("Invalid file type. Only jpg, jpeg, png and svg files are allowed");
                  $(".file-input").val("");
              }
          }
        }
    reader.readAsDataURL(input.files[0]);
}
