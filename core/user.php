<?php


class User{


protected $pdo;

function __construct($pdo){

	$this->pdo = $pdo;


}






public function login($user, $password) {

	$encPassword = md5($password);
	$stmt = $this->pdo->prepare("SELECT * from users WHERE (`username` = :user AND `password` = :password)");
	
	$stmt->bindParam(":user",$user,PDO::PARAM_STR);
	$stmt->bindParam(":password",$encPassword,PDO::PARAM_STR);
	$stmt->execute();


   $user = $stmt->fetch(PDO::FETCH_OBJ);
   $count = $stmt->rowCount();


if($count > 0){



	if( $user->verified == "0" ){
		return "0";
	}


 
 session_start();
  $_SESSION['collegeName'] = $user->college;
  $_SESSION["username"] = $user->username;
  $_SESSION["classes"] = $user->class;
  $_SESSION["section"] = $user->section;
  $_SESSION["stream"] = $user->stream;
  

  header("Location: home.php");

}else{

	return false;
}
}

public function logout(){

session_start();
session_unset();
session_destroy();
header("Location: ../index.php");

}

public function signup($user,$pwd,$class,$section,$college,$email,$stream,$avatar,$name){


	$userStatus = $this->checkUser($user);

	$validatedPassword = md5($pwd);

	if ($userStatus === true){

		return false;
		die;
	}else{
		$stmt = $this->pdo->prepare("INSERT INTO users (username,password,college,class,section,email,stream,avatar, screenName) VALUES ( :user , :pwd , :college, :class , :section, :email, :stream, :avatar, :name )");
		$stmt->bindParam(":user",$user,PDO::PARAM_STR);
		$stmt->bindParam(":pwd",$validatedPassword,PDO::PARAM_STR);
		$stmt->bindParam(":class",$class,PDO::PARAM_STR);
		$stmt->bindParam(":section",$section,PDO::PARAM_STR);
		$stmt->bindParam(":college",$college,PDO::PARAM_STR);
		$stmt->bindParam(":email",$email,PDO::PARAM_STR);
		$stmt->bindParam(":stream",$stream,PDO::PARAM_STR);
		$stmt->bindParam(":avatar",$avatar,PDO::PARAM_STR);
		$stmt->bindParam(":name",$name,PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}




}

public function checkUser($user){

$stmt = $this->pdo->prepare("SELECT * from users WHERE `username` = :user ");
$stmt->bindParam(":user",$user,PDO::PARAM_STR);
$stmt->execute();
$counts = $stmt->rowCount();


if ( $counts > 0 ){
	return true;
	
}else{
	return false;
}

}

public function getUser($username){
	$stmt = $this->pdo->prepare("SELECT * from users WHERE `username` = :user ");
	$stmt->bindParam(":user",$username,PDO::PARAM_STR);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_OBJ);

	$counts = $stmt->rowCount();

	if ( $counts > 0 ){
		return $user;

	}
	else{
		return false;
	}

}

}



?>