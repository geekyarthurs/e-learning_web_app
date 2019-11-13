<?php 

session_start();

include '../core/init.php';



if ( isset($_SESSION['username'])){

$sender = $_SESSION['username'];


	if(isset($_POST['message']) && isset($_POST['receiver']) ){


		$message = strip_tags($_POST['message']);
		
		$receiver = strip_tags($_POST['receiver']);


		$chat->sendText($sender,$receiver, $message);




	}

	if(isset($_POST['id'])){

		$id = (int) $_POST['id'];


		$messageArray = $chat->getText()
	}


}

 ?>