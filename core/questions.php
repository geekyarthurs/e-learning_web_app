<?php


class Questions{



	function __construct($pdo){

		$this->pdo = $pdo;
	}


	function submitQuestion($question,$class,$section,$image,$username,$stream){



				 $stmt = $this->pdo->prepare("INSERT INTO questions (class,section,question,image,username,stream) VALUES (:classes, :section, :question, :image, :username, :stream)");
				$stmt->bindParam(":classes",$class,PDO::PARAM_STR);
				$stmt->bindParam(":section",$section,PDO::PARAM_STR);
				$stmt->bindParam(":question",$question,PDO::PARAM_STR);
				$stmt->bindParam(":image",$image,PDO::PARAM_STR);
				$stmt->bindParam(":username",$username,PDO::PARAM_STR);
				$stmt->bindParam(":stream",$stream,PDO::PARAM_STR);

				$t = $stmt->execute();

				if($t){

					return true;
				}






	}


	function getQuestion($class,$stream,$page){

		
	
	$stmt = $this->pdo->prepare("SELECT * FROM `questions` WHERE (`class` = :classes AND `stream` = :stream) ORDER BY `id` DESC LIMIT 10 OFFSET :page");
	$stmt->bindParam(":classes",$class,PDO::PARAM_STR);
	$stmt->bindParam(":stream",$stream,PDO::PARAM_STR);
	
	$stmt->bindParam(":page",$page,PDO::PARAM_INT);
	$stmt->execute();

	$count = $stmt->rowCount();
	if ($count < 0 ){

		return false;
		die;
		
	}

	$questions = $stmt->fetchAll();


	return $questions;

	}

	function delQuestion($id,$username){

		$stmt = $this->pdo->prepare("DELETE FROM `questions` WHERE (`id` = :id AND `username` = :username)");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->bindParam(":username",$username,PDO::PARAM_STR);
		$stmt->execute();


		$count = $stmt->rowCount();


		if ( $count > 0 ){

		$stmt = $this->pdo->prepare("DELETE FROM `answers` WHERE `questionID` = :id");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		
		$stmt->execute();

			}


	}


	function submitAnswer($id,$answer,$username){


		$stmt = $this->pdo->prepare("INSERT INTO answers (questionID,answer,username) VALUES (:id , :answer, :username)");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->bindParam(":answer",$answer,PDO::PARAM_STR);
		$stmt->bindParam(":username",$username,PDO::PARAM_STR);
		$t = $stmt->execute();

		if($t){

					return true;
				}

		else{
			return false;
			die;
		}


	}

	function getAnswers($id){

		$stmt = $this->pdo->prepare("SELECT * FROM `answers` WHERE `questionID` = :id");
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$count = $stmt->rowCount();
		if ($count < 0 ){

		return false;
		die;
		
		}

		$answerArray = $stmt->fetchAll();

		return $answerArray;




	}


}


?>