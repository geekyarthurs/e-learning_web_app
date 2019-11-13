<?php

class Notes{


	function __construct($pdo){

		$this->pdo = $pdo;
	}


	function createHomework($homework,$date, $classes, $section, $college){

		$stmt = $this->pdo->prepare("INSERT INTO `homework` (`class`, `section`, `homework`, `date`, `college`) VALUES (:classes , :section , :homework , :date , :college) ");
		$stmt->bindParam(":date",$date,PDO::PARAM_STR);
		$stmt->bindParam(":classes",$classes,PDO::PARAM_STR);
		$stmt->bindParam(":section",$section,PDO::PARAM_STR);
		$stmt->bindParam(":homework",$homework,PDO::PARAM_STR);
		$stmt->bindParam(":college",$college,PDO::PARAM_STR);
		$stmt->execute();

	}

	function updateHomework($homework,$date, $classes, $section, $college){

		$stmt = $this->pdo->prepare("UPDATE `homework` SET `homework` = :homework WHERE ( `class` = :classes AND `section` = :section AND `date` = :date AND `college` = :college )");
		$stmt->bindParam(":date",$date,PDO::PARAM_STR);
		$stmt->bindParam(":classes",$classes,PDO::PARAM_STR);
		$stmt->bindParam(":section",$section,PDO::PARAM_STR);
		$stmt->bindParam(":homework",$homework,PDO::PARAM_STR);
		$stmt->bindParam(":college",$college,PDO::PARAM_STR);
		$stmt->execute();

	}

	function getHomeworks($date){


		if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

		$classes = $_SESSION['classes'];
		$section = $_SESSION['section'];
		$college = $_SESSION['collegeName'];


		$stmt = $this->pdo->prepare("SELECT `homework` FROM `homework` WHERE (`date` = :date AND `section`= :section AND `class` = :classes AND `college` = :college ) ");
		$stmt->bindParam(":date",$date,PDO::PARAM_STR);
		$stmt->bindParam(":classes",$classes,PDO::PARAM_STR);
		$stmt->bindParam(":college",$college,PDO::PARAM_STR);
		$stmt->bindParam(":section",$section,PDO::PARAM_STR);
		$stmt->execute();

		$homework = $stmt->fetch(PDO::FETCH_OBJ);

		$rowCount = $stmt->rowCount();

		if ($rowCount > 0) {
		return $homework;
	} else{
		return false;
	}



	}

	function assignment($subject,$image,$stream,$classes){

		if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


		

		

		$stmt = $this->pdo->prepare("INSERT INTO `assignment` (`stream`, `assignment`, `subject`, `class`) VALUES (:stream, :image, :subject, :classes)");


		$stmt->bindParam(":stream",$stream,PDO::PARAM_STR);
		$stmt->bindParam(":image",$image,PDO::PARAM_STR);
		$stmt->bindParam(":subject",$subject,PDO::PARAM_STR);
		$stmt->bindParam(":classes",$classes,PDO::PARAM_STR);


		$stmt->execute();


	}

	function getAssignmentNames($class){
		$stmt = $this->pdo->prepare("SELECT DISTINCT * FROM `assignment` WHERE `class` = :class GROUP BY `subject`");
		$stmt->bindParam(":class",$class,PDO::PARAM_STR);
		$stmt->execute();
		$assignments = $stmt->fetchAll();

		return $assignments;
	}

	function getAssignment($topic){
		$stmt = $this->pdo->prepare("SELECT * FROM `assignment` WHERE `subject` = :topic");
		$stmt->bindParam(":topic",$topic,PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount() > 0){	

		$assignment = $stmt->fetchAll();
			}
			else
			{
			$assignment = false;
		}
		return $assignment;
	}


}

?>