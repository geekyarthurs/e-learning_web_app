<?php include 'includes/header.php' ?>



<div class="div container-fluid bg-light py-4 main-routine"> <h5 class = "text-center">Routine</h5>

<div class="routine-container">
	
	<table class="table table-responsive-lg table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Day</th>
      <th scope="col">First</th>
      <th scope="col">Second</th>
      <th scope="col">Third</th>
      <th scope="col">Fourth</th>
      <th scope="col">Fifth</th>
      <th scope="col">Sixth</th>
      <th scope="col">Seventh</th>
      <th scope="col">Eighth</th>
    </tr>
  </thead>
  <tbody id = "routineLoad" class = "routine-loading">
    
    
  </tbody>
</table>


</div>

</div>


<?php include 'includes/footer.php' ?>

<script>
	$( document ).ready(function() {
    
    $(document).attr("title", "ROUTINE | <?php echo $_SESSION['classes'] ?> ");

});
</script>