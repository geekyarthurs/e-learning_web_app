<?php


include '../core/init.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_FILES["file"]["name"])){

	$target_dir = "../../student/images/uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
       
        $image = $target_file;
        $success = true;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}



/*
 * All of your application logic with $_FILES["file"] goes here.
 * It is important that nothing is outputted yet.
 */



// $output will be converted into JSON







if ($success) {
    $subject = strip_tags($_POST['subject']);
$file = $target_file;
$stream = $_SESSION['stream'];
$classes = $_SESSION['classes'];

$notes->assignment($subject,$file,$stream,$classes);
	$output = array("success" => true, "message" => "Success!");
} else {
	$output = array("success" => false, "error" => "Failure!");
}



 //new browser...

	header("Content-Type: application/json; charset=utf-8");
	echo json_encode($output);



?>
