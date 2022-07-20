(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
    $(".sidebar-brand-icon").toggleClass("hide");
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict




// Notification
function alert_success(string){

    $("div.success").html(string);
    $( "div.success" ).fadeIn( 500 ).delay(4000).fadeOut( 1000 );
}
function alert_warning(string){

    $("div.warning").html(string);
    $( "div.warning" ).fadeIn( 500 ).delay(4000 ).fadeOut( 1000 );
}
function alert_failure(string){

    $("div.failure").html(string);
    $( "div.failure" ).fadeIn( 500 ).delay(4000 ).fadeOut( 1000 );
}
function alert_failure_long(string){

    $("div.failure").html(string);
    $( "div.failure" ).fadeIn( 500 ).delay(8000 ).fadeOut( 1000 );
}
function alert_success_long(string){

    $("div.success").html(string);
    $( "div.success" ).fadeIn( 500 ).delay(8000 ).fadeOut( 1000 );
}
function alert_warning_long(string){

    $("div.warning").html(string);
    $( "div.warning" ).fadeIn( 500 ).delay(8000 ).fadeOut( 1000 );
}

// cookies
function setCookie(cname, cvalue, min) {
  const d = new Date();
  d.setTime(d.getTime() + (min * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let state = false;
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return false;
}

function checkCookie() {
  let user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
    user = prompt("Please enter your name:", "");
    if (user != "" && user != null) {
      setCookie("username", user, 365);
    }
  }
}