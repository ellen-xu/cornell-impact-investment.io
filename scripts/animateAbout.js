$(document).ready(function () {

  $("#sidebarUL li:first-child").click(function() {
    $('html, body').animate({
        scrollTop: $("#who").offset().top
    }, 800);
      });
  $("#sidebarUL li:nth-child(2)").click(function() {
      $('html, body').animate({
          scrollTop: $("#what").offset().top
      }, 800);
  });
  $("#sidebarUL li:nth-child(3)").click(function() {
      $('html, body').animate({
          scrollTop: $("#why").offset().top
      }, 800);
  });
  $("#sidebarUL li:nth-child(4)").click(function() {
      $('html, body').animate({
          scrollTop: $("#adp").offset().top
      }, 800);
  });
  $("#sidebarUL li:last-child").click(function() {
      $('html, body').animate({
          scrollTop: $("#recruit").offset().top
      }, 800);
  });

});
