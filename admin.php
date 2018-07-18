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
<section>
    <!-- redirects to admin.php if $_GET["page"] is set to less than or equal to 0 -->
    <?php

        if (isset($_GET["page"]) && $_GET["page"] <= 0) {

            header("location:admin.php");
        }
    ?>
    
    <!-- success and error display -->
    <?php if (isset($_GET["msgSuccess"]) || isset($_GET["msgError"])): ?>

        <div class="" style="display: flex; justify-content: center;">

           <?php 

                if (isset($_GET["msgSuccess"])) {
                    echo '<div class="alert alert-success" role="alert">'
                              . $_GET["msgSuccess"] .
                            '</div>';
                }

                if (isset($_GET["msgError"])) {
                    echo '<div class="alert alert-warning" role="alert">'
                              . $_GET["msgError"] .
                            '</div>';
                }
             ?> 

        </div>
        
    <?php endif ?>

    <!-- add product button -->
    <div class="mt-1" style="display: flex; justify-content: center;">
        <a href="adminCreate.php" class="btn btn-lg btn-warning">Add new product</a>
    </div>
    
    <!-- products wrapper -->
	<div class="card-deck mt-4 ml-5 mr-5">

        <!-- shows products from database -->
        <?php

            $myquery = $obj->read("products");
            while($row = mysqli_fetch_assoc($myquery)){
        ?>
           <div class="card mb-5" style="min-width: 25%">
                <img class="card-img-top" src="<?php echo $row["image_path"]; ?>" alt="Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                    <p class="card-text"><?php echo $row["description"]; ?></p>
                </div>
                <div class="card-footer" style="display: flex; justify-content: space-between;">
                    <a href="adminEdit.php?edit=<?php echo $row["id"] ?>" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this entry?');" href="adminDelete.php?delete=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a>
                </div>
            </div> 
        <?php 
            }
         ?>
    </div>

    <!-- page pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <!-- sets $_GET["page"] to 1 if variable in not set to hide error message -->
            <?php
                if (!isset($_GET["page"])) {
                    $_GET["page"] = 1;
                }
                // sets links for pagination
                $prevLink = "/admin.php?page=" . ($_GET["page"] - 1);
                $nextLink = "/admin.php?page=" . ($_GET["page"] + 1);
            ?>
            <!-- previous button -->
            <!-- disable previous button if $_GET["page"] is less than or equal to 1 -->
            <?php 
                if ($_GET["page"] <= 1) {
                    echo '<li class="page-item disabled">';
                } else {
                    echo '<li class="page-item">';
                }
            ?>
                <?php echo '<a class="page-link badge-dark" href="' . $prevLink . '">Previous</a>'; ?>
            </li>
            <!-- next button -->
            <li class="page-item">
                <?php echo '<a class="page-link badge-dark" href="' . $nextLink . '">Next</a>'; ?>
            </li>
        </ul>
    </nav>
</section>

<!-- footer -->
<?php 
	require "footer.php";
 ?>