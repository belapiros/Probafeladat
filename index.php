<?php 
	session_start();
	$_SESSION["admin"] = false;

    require "dbOperations.php";
?>
<!-- header -->
<?php
    require "header.php";
?>
<!-- body --> 
<section>
    <!-- redirects to index.php if $_GET["page"] is set to less than or equal to 0 -->
    <?php if (isset($_GET["page"]) && $_GET["page"] <= 0) {
        header("location:index.php");
    } ?>

    <!-- products wrapper -->
	<div class="card-deck mt-5 ml-5 mr-5">

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
                $prevLink = "/index.php?page=" . ($_GET["page"] - 1);
                $nextLink = "/index.php?page=" . ($_GET["page"] + 1);
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