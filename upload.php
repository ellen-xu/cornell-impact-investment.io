<?php

// PDF upload

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["resume"]["name"]);
$uploadOk = 1;
$pdfFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getpdfsize($_FILES["resume"]["tmp_name"]);
    if($check !== false) {
        echo "File is a pdf - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a pdf.";
    }
}

$validResumeSize = true;
if ($_FILES["resume"]["size"] > 1000000) {
    $validResumeSize = false;
}

//checks if the file is a PDF
$validResumeFormat = true;
if($pdfFileType != "pdf" ) {
    $validResumeFormat = false;
}

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["resume"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Image upload

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["headshot"]["name"]);
$uploadOk = 1;
$imgFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimgsize($_FILES["headshot"]["tmp_name"]);
    if($check !== false) {
        echo "File is a img - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a img.";
        $uploadOk = 0;
    }
}


$validImageSize = true;
if ($_FILES["headshot"]["size"] > 500000) {
    $validImageSize = false;
}

//checks if the file is a PDF
$validImageFormat = true;
if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" ) {
    $validImageFormat = false;
}

if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["headshot"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["headshot"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
