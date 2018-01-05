<?php
session_start();
$username = $_SESSION["UserName1"];
?>

<?php
session_start();
$username = $_SESSION["UserName1"];
?>
<?php
session_start();
$useremail = $_SESSION["Email1"]
?>

<!DOCTYPE html>
<html>

<head>
  <title> Impact Investing Club </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>
</head>

<body>
<?php include "includes/navigation.php"; ?>

<p class="text">Application submitted. Thank you <?php echo(htmlspecialchars($username)); ?> for applying to Cornell Impact Investing!</p>
<p class="text">We will contact you shortly at <?php echo(htmlspecialchars($useremail)); ?>.</p>

</body>

</html>

</html>
