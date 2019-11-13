<?php


class Routine{


	function __construct($pdo){


		$this->pdo = $pdo;


	}


	function dayRoutine($day){

		

		
		$classes = $_SESSION['classes'];
		$section = $_SESSION['section'];
		$college = $_SESSION['collegeName'];

		$stmt = $this->pdo->prepare("SELECT * FROM `routine` WHERE (`day` = :day AND `class` = :classes AND `section` = :section AND `college` = :college)");
		$stmt->bindParam(":day",$day,PDO::PARAM_STR);
		$stmt->bindParam(":classes",$classes,PDO::PARAM_STR);
		$stmt->bindParam(":college",$college,PDO::PARAM_STR);
		$stmt->bindParam(":section",$section,PDO::PARAM_STR);

		$stmt->execute();


		$count = $stmt->rowCount();

		

	    $routine = $stmt->fetch(PDO::FETCH_OBJ);

	    

	    return $routine;






}

}

?> 