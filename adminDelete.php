<?php
	session_start();

	if ($_SESSION["admin"] != true) {
		header("location:adminLogin.php");
	}

	require "dbOperations.php";

  if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {

      $id = $_GET["delete"];
      
      $myqueryImage = $obj->getImagePath("products", $id);
      $rowImage = mysqli_fetch_assoc($myqueryImage);

      if ($rowImage["image_path"]) {
        // delete image from server
        unlink($rowImage["image_path"]);

        // delete record from database
        $myquery = $obj->delete("products", $id);

        // redirect with success
        header("location:admin.php?msgSuccess=Record is deleted successfully.");
      } else {

        // redirect with error
        header("location:admin.php?msgError=Error deleting record.");
      }

  } else {

    // redirect if $_GET["delete"] is not set or not a number
    header("location:admin.php");
  }
?>
