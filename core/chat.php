
<?php 




class Chat{

	function __construct($pdo){


		$this->pdo = $pdo;

	}

	function getText($id,$sender,$receiver){



		$stmt = $this->pdo->prepare(" SELECT * FROM `message` WHERE  `sender` = :sender AND `reciever` = :reciever AND id >= :id  ");
		$stmt->bindParam(":sender",$sender,PDO::PARAM_STR);
		$stmt->bindParam(":receiver",$receiver,PDO::PARAM_STR);
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$messageArray = $stmt->fetchAll();

		$count = $stmt->rowCount();

		if($count > 0 ){

		return $messageArray;

	}else{
		return false;
	}
		
	}


	function sendText($sender,$receiver , $message){


		$stmt = $this->pdo->prepare("INSERT INTO `message` (sender, receiver, message) VALUES (:sender, :receiver , :message ) ");
		$stmt->bindParam(":sender",$sender,PDO::PARAM_STR);
		$stmt->bindParam(":receiver",$receiver,PDO::PARAM_STR);
		$stmt->bindParam(":message",$message,PDO::PARAM_STR);
		$stmt->execute();




	}
}















 ?>