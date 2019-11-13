<?php include 'includes/header.php' ?>


<?php 



if(isset($_GET['username'])){

	$username = strip_tags($_GET['username']);

}else{
	$username = $_SESSION['username'];
}


	$user = $User->getUser($username);

	if ( !$user ){

		echo "<script>alert('Invalid Username')</script>";
		die;
	}


	



 ?>

<div class="profile-container container-fluid  text-light">



	<div class="profile-highlight d-flex  w-100 flex-wrap   justify-content-center">
		<img src="<?php echo $user->avatar ?>" alt="" class="responsive rounded p-3 mx-auto">
			
		
	</div>

	<div class="container  w-100 mt-4">
		<div class="profile-name h2 font-weight-bold text-light mx-auto  text-center"><?php echo $user->screenName ?> </div>
		

		<div class="bio my-5 w-100 border text-center">
			<h4 class = "mt-2">Bio</h4>
			<p class="text-light text-center mx-2">
				<?php echo $user->bio ?>
			</p> 
		</div>

		<div class="information my-5 w-100 border text-center">
			<h4 class = "my-3">Other Information</h4>

			<table class="table table-hover w-25 mx-auto">
  
  <tbody>
    <tr>
      <th scope="row">College</th>
      <td><?php echo $user->college ?></td>
    </tr>

    <tr>
      <th scope="row">Class</th>
      <td><?php echo $user->class ?></td>
    </tr>

    <tr>
      <th scope="row">Email</th>
      <td><?php echo $user->email ?></td>
    </tr>

    <tr>
      <th scope="row">Stream</th>
      <td><?php echo $user->stream ?></td>
    </tr>

    
   
  </tbody>
</table>
			
		</div>



	</div>


	



</div>


<?php include 'includes/footer.php' ?>