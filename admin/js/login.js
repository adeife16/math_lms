$(document).ready(function(){

	$("#login-btn").click(function(e){
		e.preventDefault();

		$('#login-form input').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            $(this).addClass("border-red");
        }
        else{
        	$(this).removeClass("border-red");
        	login();
        }
    });
	})
})