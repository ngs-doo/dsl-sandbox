$(function() {
  if (!document.location.hostname.match(/panel[^\.]*\.dsl-platform\.com/)) {
    $.ajax({
      type: 'GET',
      url: 'https://panel.dsl-platform.com/api/auth',
      dataType: 'jsonp',
      success: function(response) {
        if (response.length === 0) {
          $('#loggedout').show();
        } else {
          $('#loggedin .login-user-name').text(response);
          $('#loggedin').show();
        }
      }
    });
  }
});

msie = navigator.userAgent.match(/(MSIE)\s(\d\.0)/);

if (null !== msie) {
  $(".nav-list .active").closest(".accordion-body").addClass("in");
}
moveFooter = function() {
  /*
  var documentHeight, windowHeight;
  $("#footer").removeClass("footer-fixed");
  documentHeight = $(document).height();
  windowHeight = $(window).height();
if (documentHeight < windowHeight) {
    $("#footer").removeClass("footer-fixed");*/
    $("#footer").addClass("show-footer");
  /*
  } else {
    $("#footer").addClass("footer-fixed");
    $("#footer").addClass("show-footer");
  }
  */
};

$(document).ready(moveFooter);

$(window).on("resize", moveFooter);

$(function() {
  $(".login-user").click(function() {
    $(".login-user-list").slideToggle();
    $(this).toggleClass("active");
    $(this).find("i").toggleClass("icon-arrow-down-custom").toggleClass("icon-arrow-up-custom");
  });
  $("body").click(function(e) {
    if (!($(e.target).hasClass("login-user") || $(e.target).hasClass("login-icon") || $(e.target).hasClass("login-user-name") || $(e.target).hasClass("icon-arrow-up-custom"))) {
      $(".login-user-list").slideUp();
      $(".login-user").removeClass("active");
      $(".login-user").find("i").addClass("icon-arrow-down-custom").removeClass("icon-arrow-up-custom");
    }
  });
  $(".btn-navbar").click(function() {
    $(this).toggleClass("active");
  });

  $('a[data-toggle="tab"]').on("shown", function() {
    return moveFooter();
  });
  return moveFooter();
});