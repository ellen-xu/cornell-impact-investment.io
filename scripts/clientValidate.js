$(document).ready(function () {

 $("#mainForm").on("submit", function() {
formValid = true;

nameIsValid = $("#name").prop("validity").valid;
if(nameIsValid) {
  $("#nameError").hide();
} else {
  $("#nameError").show();
  formValid = false;
}

emailIsValid = $("#mail").prop("validity").valid;
if(emailIsValid) {
  $("#mailError").hide();
}
else {
  $("#mailError").show();
  formValid = false;
}

netidIsValid = $("#netid").prop("validity").valid;
if(netidIsValid) {
  $("#netidError").hide();
}
else {
  $("#netidError").show();
  formValid = false;
}

majorIsValid = $("#major").prop("validity").valid;
if(majorIsValid) {
  $("#majorError").hide();
}
else {
  $("#majorError").show();
  formValid = false;
}

yearIsValid = $("#year").prop("validity").valid;
if(yearIsValid == "") {
  $("#yearError").show();
  formValid = false;
} else {
  $("#yearError").hide();
}

collegeIsValid = $("#college").prop("validity").valid;
if(collegeIsValid == "") {
  $("#collegeError").show();
  formValid = false;
} else {
  $("#collegeError").hide();
}

textarea1IsValid = $("#textarea1").prop("validity").valid;
if(textarea1IsValid == "") {
  $("#textarea1Error").show();
  formValid = false;
} else {
  $("#textarea1Error").hide();
}

textarea2IsValid = $("#textarea2").prop("validity").valid;
if(textarea2IsValid == "") {
  $("#textarea2Error").show();
  formValid = false;
} else {
  $("#textarea2Error").hide();
}

resumeIsValid = $("#resume").prop("validity").valid;
if($('#resume')[0].files.length === 0){
  $("#resumeError1").show();
  formValid = false;
} else {
  $("#resumeError1").hide();
}


headshotIsValid = $("#headshot").prop("validity").valid;
if($('#headshot')[0].files.length === 0){
  $("#headshotError1").show();
  formValid = false;
} else {
  $("#headshotError1").hide();
}

// if the form is valid, let the user submit it; otherwise, block submission
return formValid;
 });

});
