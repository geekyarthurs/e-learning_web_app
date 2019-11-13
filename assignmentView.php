<?php


include 'includes/header.php';

include_once 'core/init.php';


?>



<?php 

echo '<script> 

if(window.innerHeight > window.innerWidth){
    alert("Please use Landscape for better view ^_^");
}

</script>';

if (!isset($_GET['topic'])){
		die;
}else{

	$topic = $_GET['topic'];


	$assnmt = $notes->getAssignment($topic);

	if(!$assnmt){
		die;
	}
}


?>
<div class="slider" style = "margin: auto;">


	<?php 


		foreach ($assnmt as $question) {
			echo " <div>
    	<img src='".$question['assignment']."' class = 'responsive mx-auto' >
   				 </div>";
		}


	?>
    
    
  </div>



<?php

include 'includes/footer.php';

?>