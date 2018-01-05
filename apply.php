<?php
$UserName = $_REQUEST["userName"];
$UserMail = $_REQUEST["mail"];
$HIDDEN_ERROR_CLASS = "hiddenError";

$major = $_REQUEST["major"];

  // Get information about the form
  $submit = $_REQUEST["submit"];

  if (isset($submit)) {

// Handle first name
    $name = $_REQUEST["userName"];
    // if the first name field is not empty:
    If ( !empty($name) ) {
      $nameValid = true;
    } else {
      $nameValid = false;
    }

    // Handle email
$email = $_REQUEST["mail"];
$isEmailEmpty = empty($email);
$isEmailAddress = filter_var($email, FILTER_VALIDATE_EMAIL);
  if ( !$isEmailEmpty && $isEmailAddress ) {
    $emailValid = true;
  } else {
    $emailValid = false;
}

   // Handle NetID
$netID = $_REQUEST["netid"];
  if ( !empty($netID) ) {
    $netidValid = true;
  } else {
    $netidValid = false;
  }

  // Handle Major
$major = $_REQUEST["major"];
// if the first name field is not empty:
 if ( !empty($major) ) {
   $majorValid = true;
 } else {
   $majorValid = false;
 }

 // Handle Dropdown 1
 $dropdown1 = $_REQUEST["year"];
 If ( $dropdown1 != '' ) {
   $dropdown1Valid = true;
 } else {
   $dropdown1Valid = false;
 }

 // Handle Dropdown 2
 $dropdown2 = $_REQUEST["college"];
 If ( $dropdown2 != '' ) {
   $dropdown2Valid = true;
 } else {
   $dropdown2Valid = false;
 }

 // Handle Textarea 1
 $textarea1 = $_REQUEST["textarea1"];
 If ( !empty($textarea1) ) {
   $textarea1Valid = true;
 } else {
   $textarea1Valid = false;
 }

 // Handle Textarea 2
 $textarea2 = $_REQUEST["textarea2"];
 If ( !empty($textarea2) ) {
   $textarea2Valid = true;
 } else {
   $textarea2Valid = false;
 }

//starting file validation

$target_dir = "./uploads/".preg_replace("/ +/", "", $netID)."-";
error_log("target_dir: ".$target_dir);

// if $_FILES exists... do all this stuff...
$target_file_resume = $target_dir . preg_replace("/ +/", "_", basename($_FILES["resume"]["name"]));
$resumeType = pathinfo($target_file_resume, PATHINFO_EXTENSION);
$target_file_headshot = $target_dir . preg_replace("/ +/", "_", basename($_FILES["headshot"]["name"]));
$imgType = pathinfo($target_file_headshot,PATHINFO_EXTENSION);

// Handle resume

//resume type
  $validResumeFile = true;
if (file_exists($target_file_resume)) {
    $validResumeFile = false;
    echo("Helllo");
}

$validResumeFormat = true;
if($resumeType != "pdf" && $resumeType != "PDF" ) {
    $validResumeFormat = false;
}
$validResumeUpload = true;
if($validResumeFormat && !move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file_resume)){
  $validResumeUpload = false;
}


$resumeValid = $validResumeFormat && $validResumeUpload && $validResumeFile;

// Handle image

//checks if the image file is valid

$validImageFile = true;
if (file_exists($target_file_headshot)) {
    $validImageFile = false;
    echo("Hi");
}

$validImageFormat = true;
if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "JPG" && $imgType != "PNG" && $imgType != "JPEG" ) {
   $validImageFormat = false;
}

$validImageUpload = true;
if($validImageFormat && !move_uploaded_file($_FILES["headshot"]["tmp_name"], $target_file_headshot)){
   $validImageUpload = false;
}



 $imgValid = $validImageUpload && $validImageFormat && $validImageFile;


    $formValid = $nameValid && $emailValid && $netidValid && $majorValid && $dropdown1Valid && $dropdown2Valid && $textarea1Valid && $textarea2Valid && $resumeValid && $imgValid;
    // if valid, allow submission
    if ($formValid) {
     session_start();
     $_SESSION["UserName1"] = $UserName;
     session_start();
     $_SESSION["Email1"] = $UserMail;
      // redirect to submit.php
      header("Location: submit.php");
      return;
    }
}
else {
    // no form submitted
    $nameValid = true;
    $emailValid = true;
    $netidValid = true;
    $majorValid = true;
    $dropdown1Valid = true;
    $dropdown2Valid = true;
    $textarea1Valid = true;
    $textarea2Valid = true;
    $validImageFormat = true;
    $validImageUpload = true;
    $imgValid = true;
    $validResumeFormat = true;
    $validResumeUpload = true;
    $resumeValid = true;
    $validResumeFile = true;
    $validImageFile = true;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>CII Form</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <!-- Load jQuery -->
  <script src="scripts/jquery-3.2.1.js" type="text/javascript"></script>
  <!-- Load validation -->
  <script src="scripts/clientValidate.js" type="text/javascript"></script>


</head>

<body>

<?php include "includes/navigation.php"; ?>



  <div id="questions">

  <!-- Other Content -->

  <h2><b>Why should I apply for Cornell Impact Investing?</b></h2>
  <p>CII accepts people from all different backgrounds and interests, and does not require applicants to come with prior finance knowledge, which is rarely seen amongst the difference finance clubs on campus. </p>
  <br>

  <h2><b>What kind of applicants are you looking for?</b></h2>
  <p>CII is looking for applicants who have demonstrated a love of learning through past experiences, regardless of the field of study those experiences include.</p>
<br>

  <h2><b>What kind commitment is expected of incoming applicants?</b></h2>
  <p>Entry-level analysts are expected to commit at least 2-3 hours a week (not including weekly meetings or bi-weekly workshops).</p>
<br>

  <h2><b>What kinds of positions are available to apply for?</b></h2>
  <p>The entry-level analyst position is the only one available to apply for, though there are promotional opportunities available beyond that point. </p>
<br>

  <h2><b>Will there be other recruitment cycles?</b></h2>
  <p>The next recruitment cycle will be taking place spring 2018. Following that, recruitment cycles will be taking place annually.</p>
<br>

  <h2><b>When Will Info Sessions Occur?</b></h2>
<p>If you are interested in learning more about impact investing and may want to apply, we will be holding info sessions February 5-10 2:00-3:00 pm in Kennedy Hall Room 213.</p>

  </div>

<div id="form">
<form id="mainForm" action="apply.php" method="post" enctype="multipart/form-data" novalidate>
  <div id="join"><p> CII Fall 2017 Application</p></div>
<p>Deadline to Apply:</b> 9/26/17 at 11:59 PM</p><image src="images/clock.png" alt="clock"/>
<p id="red">*All fields are required.</p>

<div id="inputs">
<!-- Name input -->

         <label for="name">Name</label>
          <input value="<?php echo(htmlspecialchars($name));?>" type="text" id="name" name="userName" placeholder="First and last" required>
          <!--Error message-->
         <span class="error2 <?php if ($nameValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="nameError">First name is required.</span><br>

<!-- Email input -->
         <label for="mail">E-mail</label>
          <input value="<?php echo(htmlspecialchars($email));?>" type="email" id="mail" name="mail" placeholder="abc123@cornell.edu" required>
          <!--Error message-->
         <span class="error2 <?php if ($emailValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="mailError"> E-mail is required.</span><br>

<!-- NetID input -->
         <label for="netid">NetID</label>
         <input value="<?php echo(htmlspecialchars($netID));?>" type="text" id="netid" name="netid" placeholder="________(@cornell.edu)" required>
         <!--Error message-->
         <span class="error2 <?php if ($netidValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="netidError">NetID is required.</span><br>

<!-- Major input -->
         <label for="major">Major</label>
          <input value="<?php echo(htmlspecialchars($major));?>" type="text" id="major" name="major" placeholder="Write major here" required>
          <!--Error message-->
          <span class="error2 <?php if ($majorValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="majorError">Major is required.</span><br>
</div>


<!--Year selector -->
<div id="selectors">
<div>
  <p>Select your year:</p>
      <select value="<?php echo($dropdown1);?>" id="year" name="year" required>
        <option selected value="">Please pick one</option>

        <option value="2019"<?php echo($_POST['year']=='2019'?' selected="selected"':'');?>>2019</option>
        <option value="2020"<?php echo($_POST['year']=='2020'?' selected="selected"':'');?>>2020</option>
        <option value="2021"<?php echo($_POST['year']=='2021'?' selected="selected"':'');?>>2021</option>
        <option value="2022"<?php echo($_POST['year']=='2022'?' selected="selected"':'');?>>2022</option>

      </select>
      <span class="error2 <?php if ($dropdown1Valid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="yearError"> Please select a year.</span>
</div>
<!--College selector -->
<div>
<p>Select your college:</p>
    <select value="<?php echo($dropdown2);?>" id="college" name="college" required>
      <option selected value="">Please pick one</option>
      <option value="HEC"<?php echo($_POST['college']=='HEC'?' selected="selected"':'');?>>Human Ecology</option>
      <option value="AG"<?php echo($_POST['college']=='AG'?' selected="selected"':'');?>>Agriculture and Life Science</option>
      <option value="AS"<?php echo($_POST['college']=='AS'?' selected="selected"':'');?>>Arts and Sciences</option>
      <option value="AAP"<?php echo($_POST['college']=='AAP'?' selected="selected"':'');?>>Architecture, Art, and Planning</option>
      <option value="ENG"<?php echo($_POST['college']=='ENG'?' selected="selected"':'');?>>Engineering</option>
      <option value="HA"<?php echo($_POST['college']=='HA'?' selected="selected"':'');?>>Hotel Administration</option>
      <option value="ILR"<?php echo($_POST['college']=='ILR'?' selected="selected"':'');?>>Industrial and Labor Relations</option>
    </select>
    <span class="error2 <?php if ($dropdown2Valid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="collegeError"> Please select a college.</span>

</div>
</div>

<!-- Text areas -->
<div id="textareas">
<p>What sparked your interest in impact investing? (400 words or fewer)</p>
<textarea class="textarea" name="textarea1" id="textarea1" required><?php echo(htmlspecialchars($textarea1));?></textarea><br>
<span class="error <?php if ($textarea1Valid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="textarea1Error">Please enter text above (400 words or fewer).</span><br>

<p>Tell us about a potential impact investment opportunity that would guarantee a decent return. (400 words or fewer)</p>
<textarea class="textarea" name="textarea2" id="textarea2" required>
<?php echo(htmlspecialchars($textarea2));?>
</textarea><br>
<span class="error <?php if ($textarea2Valid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="textarea2Error">Please enter text above (400 words or fewer).</span><br>
</div>

<!--File uploads -->

<div id="uploads">

<label for="resume"> Upload your resume as a PDF (include GPA):</label>
<input type="file" name="resume" value="resume" id="resume" required>
<span class="error <?php if ($validResumeFormat) { echo($HIDDEN_ERROR_CLASS);} ?>" id="resumeError1">Please upload a PDF file.</span><br>
<span class="error <?php if ($validResumeUpload) { echo($HIDDEN_ERROR_CLASS);} ?>" id="resumeError2">Error: Cannot upload your file.</span>
<span class="error <?php if ($validResumeFile) { echo($HIDDEN_ERROR_CLASS);} ?>" id="resumeError3">This file has already been uploaded.</span>


<label for="headshot"> Upload your professional headshot as a JPG/JPEG/PNG:</label>
<input type="file" name="headshot" value="headshot" id="headshot" required>
<span class="error <?php if ($validImageFormat) { echo($HIDDEN_ERROR_CLASS);} ?>" id="headshotError1">Please upload a JPG/JPEG/PNG file.</span><br>
<span class="error <?php if ($validImageUpload) { echo($HIDDEN_ERROR_CLASS);} ?>" id="headshotError2">Error: Cannot upload your file.</span>
<span class="error <?php if ($validImageFile) { echo($HIDDEN_ERROR_CLASS);} ?>" id="headshotError3">This file has already been uploaded.</span>

</div>

  <!--Submit button -->
  <div class="button">
  <input type="submit" value="Submit" name="submit">
</div>

  </form>

</div>
</div>

</body>
</html>
