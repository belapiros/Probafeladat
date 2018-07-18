<?php
	session_start();

	if ($_SESSION["admin"] != true) {
		header("location:adminLogin.php");
	}

	require "dbOperations.php";
?>
<!-- header -->
<?php
	require "header.php";
?>
<!-- body -->
<section style="display: flex; justify-content: center; align-items: center; height: 80vh">
  <!-- form wrapper -->
  <div class="card-deck mt-5 ml-5 mr-5">

    <form method="post" action="formHandle.php?create=1" enctype="multipart/form-data" class="jumbotron form-control mb-5 p-5" style="min-width: 25%">


      <!-- form label -->
      <div class="mb-3" style="display: flex; justify-content: center;">

          <h1 class="h3 font-weight-normal">Add new product</h1>

      </div>


      <!-- image form -->
      <div class="input-group mb-3">

        <div class="input-group-prepend">

          <span class="input-group-text bg-dark text-white">Image:</span>

        </div>

        <div class="custom-file">

          <input type="file" name="imageFile" class="custom-file-input" accept=".jpg, .jpeg, .png, .gif" required>

          <label class="custom-file-label" for="imageFile">Image file</label>

        </div>

      </div>


      <!-- name form -->
      <div class="input-group mb-3">

        <div class="input-group-prepend">

          <span class="input-group-text bg-dark text-white" id="basic-addon1">Name:</span>

        </div>

        <input type="text" name="name" class="form-control" placeholder="Name" required>
        
      </div>


      <!-- description form -->
      <div class="input-group">

        <div class="input-group-prepend">

          <span class="input-group-text bg-dark text-white">Description:</span>

        </div>

        <textarea name="description" class="form-control" placeholder="Description" required></textarea>

      </div>


      <!-- error display -->
      <?php 

        if (isset($_GET["msgError"])) {

          echo '<div class="alert alert-danger mt-3" role="alert">'
                  . $_GET["msgError"] .
                '</div>';
        }
      ?>

      <!-- save button -->
      <div class="mt-5" style="display: flex; justify-content: center;">

        <button type="submit" name="save" class="btn btn-warning">Save</button>

      </div>
    </form> 
  </div> 
</section>
<!-- footer -->
<?php 
	require "footer.php";
?>