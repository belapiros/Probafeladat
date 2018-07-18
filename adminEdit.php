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
	<?php 

        if (isset($_GET["edit"]) && is_numeric($_GET["edit"])) {
            $id = $_GET["edit"];
            $myquery = $obj->readOne("products", $id);
            $row = mysqli_fetch_assoc($myquery);
    ?>
         <!-- form wrapper -->
    <div class="card-deck mt-5 ml-5 mr-5">
       <form method="post" action="formHandle.php?edit=1" enctype="multipart/form-data" class="jumbotron form-control mb-5 p-5" style="min-width: 25%">


            <!-- form label -->
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <div class="mb-3" style="display: flex; justify-content: center;">
                <h1 class="h3 font-weight-normal">Edit product</h1>
            </div>
            

            <!-- image form -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-dark text-white">Image:</span>
              </div>
              <div class="custom-file">
                <input type="hidden" name="oldImagePath" value="<?php echo $row["image_path"]; ?>">
                <input type="file" name="imageFile" class="custom-file-input" accept=".jpg, .jpeg, .png, .gif">
                <label class="custom-file-label" for="imageFile">Image file</label>
              </div>
            </div>


            <!-- name form -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-dark text-white" id="basic-addon1">Name:</span>
              </div>
              <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" required>
            </div>


            <!-- description form -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-dark text-white">Description:</span>
              </div>
              <textarea name="description" class="form-control" required><?php echo $row["description"]; ?></textarea>
            </div>

            <!-- error display -->
            <?php 

                if (isset($_GET["msgError"])) {

                  echo '<div class="alert alert-danger mt-3" role="alert">'
                          . $_GET["msgError"] .
                        '</div>';
                }
            ?>

            <!-- update button -->
            <div class="mt-5" style="display: flex; justify-content: center;">
                <button type="submit" name="save" class="btn btn-warning">Update</button>
            </div>
        </form> 
    </div> 


    <?php
    } else {
        //header("location:admin.php");
    }

    ?>
</section>
<!-- footer -->
<?php 
	require "footer.php";
?>