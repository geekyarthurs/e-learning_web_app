<?php


include '../core/init.php';

session_start();

if(isset($_SESSION['classes'])){


	if(isset($_GET['day'])){



		$day = strtolower($_GET['day']);

		


		if($routineObj = $Routine->dayRoutine($day)){

		echo '<tr> <th scope = "row">' . strtoupper($routineObj->day) . '</td><td>' . $routineObj->first . '</td><td>' . $routineObj->second . '</td><td>' . $routineObj->third . '</td><td>' . $routineObj->fourth . '</td><td>' . $routineObj->fifth . '</td><td>' . $routineObj->sixth . '</td><td>' . $routineObj->seventh . '</td><td>' . $routineObj->eigth . '</td></tr>';

	}else{

		die;
	}




	}




}else{

	die;
}

?>