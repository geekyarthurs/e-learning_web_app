<?php


include '../core/init.php';

session_start();
if (isset($_SESSION['username'])){
	


	if(isset($_GET['date'])){



	$homework = $notes->getHomeworks($_GET['date']);
	if ($homework){
		$realHomework = $homework->homework;

		echo "<div class = " .$_GET['date']." id  = 'date' type = 'created'></div>";
		echo $realHomework;
	}else{

		echo "<div class = " .$_GET['date']." id  = 'date' type = 'new'></div>";
		echo "Unavailable for " . $_GET['date'];
	}
	

	}else if(isset($_POST['homework'])){


		$homework = $_POST['homework'];
		$date = $_POST['dateSubmit'];
		$type = $_POST['type']; // new or created
		$classes = $_SESSION['classes'];
		$section = $_SESSION['section'];
		$college = $_SESSION['collegeName'];



		if ( $type === "new" ){

			$notes->createHomework($homework,$date,$classes,$section,$college);
		}else{
			$notes->updateHomework($homework,$date,$classes,$section,$college);
		}





	}

	else{
		die;
	}
	



}
else{

	die;
}
?>