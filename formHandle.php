<?php 

	session_start();

	if ($_SESSION["admin"] != true) {
		header("location:adminLogin.php");
	}

	require "dbOperations.php";

?>

<?php

	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["imageFile"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


	$msgError = "";
	$msgSuccess = "";
	
	$id = test_input($_POST["id"]);

	// check for empty form
	if ($_FILES["imageFile"]["size"] == 0) {

		if (isset($_GET["create"])) {

			$msgError .= "Please select file to upload.<br>";
			$redirect = "location:adminCreate.php?msgError=" . $msgError;
			header($redirect);
		}

		if (isset($_GET["edit"])) {

			$target_file = $_POST["oldImagePath"];
		}

	}
	if (empty($_POST["name"])) {

		$msgError .= "Please enter name.<br>";

		if (isset($_GET["create"])) {

			$redirect = "location:adminCreate.php?msgError=" . $msgError;
		}
		if (isset($_GET["edit"])) {

			$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
		}

		header($redirect);
	}
	if (empty($_POST["description"])) {

		$msgError .= "Please enter description.";

		if (isset($_GET["create"])) {
			
			$redirect = "location:adminCreate.php?msgError=" . $msgError;
		}
		if (isset($_GET["edit"])) {
			
			$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
		}

		header($redirect);
	}

	// validate form
	if ($msgError == "") {

		// validate image input
		if (isset($_GET["create"]) || 
			(isset($_GET["edit"]) && $_FILES["imageFile"]["size"] != 0)) {
			
			if (getimagesize($_FILES["imageFile"]["tmp_name"]) == 0) {

				$msgError .= "File is not an image.";

				if (isset($_GET["create"])) {

					$redirect = "location:adminCreate.php?msgError=" . $msgError;
				}
				if (isset($_GET["edit"])) {

					$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
				}

				header($redirect);

			} elseif (file_exists($target_file)) {

				$msgError .= "Image already exists.";

				if (isset($_GET["create"])) {

					$redirect = "location:adminCreate.php?msgError=" . $msgError;
				}
				if (isset($_GET["edit"])) {

					$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
				}

				header($redirect);

			} elseif ($_FILES["imageFile"]["size"] > 500000) {

				$msgError .= "Image is too large.";

				if (isset($_GET["create"])) {

					$redirect = "location:adminCreate.php?msgError=" . $msgError;
				}
				if (isset($_GET["edit"])) {

					$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
				}

				header($redirect);

			} elseif ($imageFileType != "jpg"
					&& $imageFileType != "png"
					&& $imageFileType != "jpeg"
					&& $imageFileType != "gif") {

				$msgError .= "Only JPG, JPEG, PNG or GIF files are allowed.";

				if (isset($_GET["create"])) {

					$redirect = "location:adminCreate.php?msgError=" . $msgError;
				}
				if (isset($_GET["edit"])) {

					$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
				}

				header($redirect);
			}
		}
		

		// validate text input
		$name = test_input($_POST["name"]);
		$description = test_input($_POST["description"]);
		$image_path = test_input($target_file);

		// validate text length
		if (strlen($image_path) > 255) {
			
			$msgError .= "Image name is longer than 248 characters.";

			if (isset($_GET["create"])) {

				$redirect = "location:adminCreate.php?msgError=" . $msgError;
			}
			if (isset($_GET["edit"])) {

				$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
			}

			header($redirect);
		}
		if (strlen($name) > 32) {
			
			$msgError .= "Name is longer than 32 characters.";

			if (isset($_GET["create"])) {

				$redirect = "location:adminCreate.php?msgError=" . $msgError;
			}
			if (isset($_GET["edit"])) {

				$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
			}

			header($redirect);
		}
		if (strlen($description) > 255) {
			
			$msgError .= "Description is longer than 255 characters.";

			if (isset($_GET["create"])) {

				$redirect = "location:adminCreate.php?msgError=" . $msgError;
			}
			if (isset($_GET["edit"])) {

				$redirect = "location:adminEdit.php?edit=" . $id . "&msgError=" . $msgError;
			}

			header($redirect);
		}
	}

	// upload to database
	if ($msgError == ""){

		// upload image
		if (isset($_GET["create"]) || 
			(isset($_GET["edit"]) && $_FILES["imageFile"]["size"] != 0)) {

			if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {

				if (isset($_GET["create"])) {

					$msgSuccess .= "Image is uploaded successfully.<br>";
				}

				if (isset($_GET["edit"])) {

					// delete image from server
        			unlink($_POST["oldImagePath"]);
					$msgSuccess .= "Image is updated successfully.<br>"
					 				. "Old image is deleted successfully.<br>";
				}

			} else {

				if (isset($_GET["create"])) {

					$msgError .= "Error uploading image.";
				}
				if (isset($_GET["edit"])) {

					$msgError .= "Error updating image.";
				}
				
			}
		}

		// save record
		if (isset($_GET["create"])) {

			if ($obj->save("products", $name, $description, $image_path)) {

				$msgSuccess .= "Record is saved successfully.<br>";
			} else {

			$msgError .= "Error saving record.";
			}
		}
		if (isset($_GET["edit"])) {

			if ($obj->update("products", $id, $name, $description, $image_path)) {

				$msgSuccess .= "Record is updated successfully.<br>";
			} else {

			$msgError .= "Error updating record.";
			}
		}

		// redirect with error or success
		if ($msgError == "") {

			$redirect = "location:admin.php?msgSuccess=" . $msgSuccess;
			header($redirect);
		} else {

			$redirect = "location:admin.php?msgError=" . $msgError;
			header($redirect);
		}
	}

	// helper function
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
 ?>