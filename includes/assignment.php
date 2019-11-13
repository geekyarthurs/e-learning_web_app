<?php include_once 'core/init.php' ?>

<script src = "js/simpleUpload.min.js">
	
</script>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Upload Assignments !
</button>





<div class="assignment-view p-3 text-light font-weight-bold"> 

<?php

$class = $_SESSION['classes'];


$assignments = $notes->getAssignmentNames($class);



foreach ($assignments as $singleAss) {

  echo "<a href = 'assignmentView.php?topic=" .urlencode($singleAss['subject'])."' ><button class = 'btn btn-block my-2 btn-dark'>".$singleAss['subject']."</button></a>";
  # code...
}


?>




</div>









<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Assignments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<input type="text" name="subject" placeholder="Topic..." id="subject" class = "form-control form-block d-block w-100">
	
<div id="uploads" class = "my-3"></div>


<input type="file" name="file" multiple class = "my-5">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="location.reload()">Save changes</button>
      </div>
    </div>
  </div>
</div>

