<?php 

include '../core/init.php';

session_start();

if (isset($_SESSION['username'])){

	if (isset($_GET['id']) && isset($_GET['answer'])){


		$answer = strip_tags($_GET['answer']);
		$id = $_GET['id'];
		$username = $_SESSION["username"];

		$question->submitAnswer($id,$answer,$username);


	}

}else{

	die;
}


?>