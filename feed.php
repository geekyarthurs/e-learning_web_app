<?php include 'includes/header.php' ?>



<div class="container-fluid  align-items-center p-4 row q-container">
	
	

	 



	<?php include 'includes/questions.php' ?>

</div>

<?php include 'includes/footer.php' ?>

<script>
	$( document ).ready(function() {
    
    $(document).attr("title", "FEED | <?php echo $_SESSION['classes'] ?> ");

});
</script>

