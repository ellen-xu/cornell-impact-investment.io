$(document).ready(function () {



var firstClicked = false;
var secondClicked = false;
var thirdClicked = false;
var fourthClicked = false;
var fifthClicked = false;


     $("#impact-border").hover( function() {
       $("#impact-h1").toggle();
       $("#impact-paragraph").toggle();



    });
    $("#calv-border").hover( function() {
      $("#calvert-h1").toggle();
      $("#calvert-paragraph").toggle();
  });

  // When the user clicks on the button, open the modal
  $(".first").click( function() {
      firstClicked = true;
      $(".first").removeClass('activeTeam');
      $("#first").toggle();

      $("#modalBack").show();
  });



  $(".second").click( function() {
    secondClicked = true;
    $(".second").removeClass('activeTeam');
    $("#second").toggle();
      $("#modalBack2").show();

  });
  $(".third").click( function() {
    thirdClicked = true;
    $(".third").removeClass('activeTeam');
    $("#third").toggle();
      $("#modalBack3").show();

  });
  $(".fourth").click( function() {
    fourthClicked = true;
    $(".fourth").removeClass('activeTeam');
    $("#fourth").toggle();
      $("#modalBack4").show();

  });
  $(".fifth").click( function() {
    fifthClicked = true;
    $(".fifth").removeClass('activeTeam');
    $("#fifth").toggle();
      $("#modalBack5").show();

  });

  $("#modalBack").click( function() {
    firstClicked = false;
      $("#modalBack").hide();

  });
  $("#modalBack2").click( function() {
    secondClicked = false;
      $("#modalBack2").hide();

  });

  $("#modalBack3").click( function() {
    thirdClicked = false;
      $("#modalBack3").hide();

  });
  $("#modalBack4").click( function() {
      fourthClicked = false;
      $("#modalBack4").hide();

  });
  $("#modalBack5").click( function() {
      fifthClicked = false;
      $("#modalBack5").hide();

  });

  $(".first").hover( function() {
    if (!firstClicked) {
    $(".first").toggleClass('activeTeam');
      $("#first").toggle();
    }
  });
$(".second").hover( function() {
  if (!secondClicked) {
  $(".second").toggleClass('activeTeam');
  $("#second").toggle();
}
});

$(".third").hover( function() {
  if (!thirdClicked) {
  $(".third").toggleClass('activeTeam');
  $("#third").toggle();
}
});

$(".fourth").hover( function() {
  if (!fourthClicked) {
  $(".fourth").toggleClass('activeTeam');
  $("#fourth").toggle();
}
});

$(".fifth").hover( function() {
  if (!fifthClicked) {
  $(".fifth").toggleClass('activeTeam');
  $("#fifth").toggle();
}
});






});
