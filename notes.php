<?php include 'includes/header.php' ?>


<div class="div p-3  notes-container">
	
	

	<div class=" py-5 row">
		
		<div class="col-lg-6 col-md-6 py-3 border my-5 ">
			
			<div class = "text-center border p-3 my-3 font-weight-bold text-light mx-auto w-100 border-light border-rounded rounded">HOMEWORK  </div>

			<div class = "text-center border px-1 mb-2 font-weight-bold text-light w-25 float-right border-light edit-homework" data-toggle="modal" data-target="#homeworkEditor">EDIT</div>
	
	<div class="clearfix"></div>
			<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
 
    <button type="button" class="btn btn-dark mx-1 my-1 " id = "befYesterday">Before Yesterday</button>
    <button type="button" class="btn btn-dark mx-1 my-1  " id = "yesterday">Yesterday</button>
    <button type="button" class="btn btn-dark mx-1 my-1 " id = "today">Today</button>
    
  
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text bg-dark text-light" id="btnGroupAddon">Date</div>
    </div>
    <input type="date" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon" id = "date-picker">
  </div>
</div>
			
			<div class = "p-1 hw-container bg-dark text-white"></div>

			

		</div> <!-- Homework Close -->

		

		<div class="col-lg-6 col-md-6 my-5 py-3 border">
							
							<div class = "text-center border p-3 my-3 font-weight-bold text-light mx-auto w-100 border-light border-rounded rounded">ASSIGNMENTS </div>

											<?php include 'includes/assignment.php' ?>		
														
		</div>
		<div class="col-lg-6 col-md-6 my-5 py-3 border">
			<div class = "text-center border p-3 my-3 font-weight-bold text-light mx-auto w-100 border-light border-rounded rounded">NOTE SUBMISSION</div>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="homeworkEditor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">HomeWork Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        		
        		<div class=" homework-editor bg-light">
				<div id="toolbar-container"></div>

														<!-- This container will become the editable. -->
														<div id="editor">
														    <p>Loading Text...
														    </p>
														</div>
			
			
			
			</div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-dark text-light btn-block save-button">Save Homework</button>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php' ?>

<script>
	$( document ).ready(function() {
    
    $(document).attr("title", "NOTES | <?php echo $_SESSION['classes'] ?> ");

});
</script>