
<div class = "col-sm-12" style="background:inherit;"> <button type="button" class = "btn btn-success align-right m-1 question-button">Ask A Question</button> 

</div>
<?php

if(!isset($_SESSION['token'])){
$_SESSION['token'] = bin2hex(random_bytes(32));
} 


 ?>
<div class="input-group ask-question w-100 col-md-8" style = "display: none;">

	<form action="includes/q-submitter.php" method="POST" enctype="multipart/form-data" class = "w-100">
<input type = "hidden" value = "<?php echo $_SESSION['token']; ?>" name = "token">

  
  <textarea class="form-control q-box w-100" aria-label="With textarea" name = "question"></textarea>
  <input type="file"  name = "fileToUpload" error = "fileToUpload" accept="image/*" title = "Add Images ?">
  <input type = "submit" name = "submit" class = "btn btn-block btn-dark q-submit">
  	</form>
</div>


<?php include_once 'core/init.php';








if(isset($_SESSION['classes'])){

	$classes = $_SESSION['classes'];
	$section = $_SESSION['section'];

	if (isset($_GET['page'])){



		$page = 10 * (int) $_GET['page'];
	}

	if(!isset($page)){
		$page = 0;
	}
	
		$user = $User->getUser($_SESSION['username']);

		$stream = $user->stream;

		$qArray = $question->getQuestion($classes,$stream,$page);

	

	foreach ($qArray as $questionobj){

		


		if($_SESSION["username"] == $questionobj["username"]){
			

		$deleteButton = "<span class = 'btn btn-sm btn-info float-right delete-question' id = \"". $questionobj['id']  . "\" >Delete</span>";
		}else{
			$deleteButton = "";
		}

	if (!empty($questionobj['image'])){

		$image = "<a href = " . $questionobj['image'] ." ><img src=" . $questionobj['image'] . " class='img-fluid' alt='Question Image'></a>";
	}else{
		$image =  "";
	}


		


		echo "<div class = 'qa-container bg-light border border-3 border-dark pl-1 col-sm-12 col-md-12 col-lg-8 my-2 py-2'>
	
	<div class = 'p-3 text-danger font-weight-bold'>
	@<a href = 'profile.php?username=".$questionobj['username']." ' >" . $questionobj['username'] . $deleteButton . "</a>
	</div><div class = ' question text-secondary question px-3'>". $questionobj['question'] . "</div> 

	" . $image . "


	
	

	<div class = 'answer p-3'> <button class = 'float-left btn btn-sm btn-primary   answer'  id = \"". $questionobj['id']  . "\" >Answer</button>
	<button class = ' btn btn-sm ml-3 btn-danger   v-answer'  id = \"". $questionobj['id']  . "\" >View Answers</button>
		<div style = 'display: none;'  class = 'answer-box' id = \"". $questionobj['id']  . "\" ><textarea type = 'text' class = 'form-control d-block answer-input'  
		id = \"". $questionobj['id']  . "\" ></textarea><button class = 'm-1 float-right btn btn-danger p-1 btn-block submit-ans' id = \"". $questionobj['id']  . "\" onclick = 
		'submitQuestion(this)'>Submit</button>
		</div> 
	</div> <div class = 'answer-container col-sm-12 ans' style = 'display:none;'  id = \"". $questionobj['id']  . "\" >";
			


			$answerArray = $question->getAnswers($questionobj['id']);
			foreach ( $answerArray as $ans ){

			echo "<div class=' mt-3 px-2 border-bottom '><span class = 'mr-2 text-danger text-small'>@<a href = 'profile.php?username=".$questionobj['username']." ' >" . $ans['username'] . "</a></span> " . $ans['answer'] .  "</div>";
			}




			echo "</div></div>";



	

}
	
}





 ?>

	<div class = "col-sm-12">
		<p class = "my-4">
	<a class="btn btn-secondary" href =  "?page=0">Recents</a>
    <a class="btn btn-secondary next-link" href =  "?page=1">Next</a>
    </p>
    <a class="btn btn-secondary" href =  "?page=2">Page 3</a>
    <a  class="btn btn-secondary" href =  "?page=3">Page 4</a>
    <a  class="btn btn-secondary" href =  "?page=4">Page 5</a>
	</div>









