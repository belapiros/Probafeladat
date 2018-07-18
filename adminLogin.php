<?php 
	session_start();
	$_SESSION["admin"] = false;

	require "db.php";

	$db = new db;
?>
<!-- header -->
<?php
    require "header.php";
?>
<!-- body -->
<section style="display: flex; justify-content: center; align-items: center; height: 80vh">
	<!-- login wrapper -->
	<div class="jumbotron text-center col-8 form-control">
	    <form method="get" class="form-signin">
			<!-- login label -->
	        <h1 class="h3 mb-3 font-weight-normal">Please enter admin password</h1>
	        <!-- password input -->
	        <label for="password" class="sr-only">Password</label>
	        <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password" required>

			<!-- check password -->
			<?php 
				if (isset($_GET["submit"])) {

					$sql = "SELECT password FROM admin WHERE id=1";
					$query = mysqli_query($db->connection, $sql);
					$result = mysqli_fetch_assoc($query);

					$hash = $result["password"];

					if (password_verify($_GET["password"], $hash)) {

						$_SESSION["admin"] = true;
						header("location:admin.php");

					} else {

						echo '<div class="alert alert-danger" role="alert">
								  Password is incorrect, please try again!
								</div>';
					}
				}
			?>
			<!-- login button -->
	        <button class="btn btn-lg btn-dark btn-block" type="submit" name="submit">Login</button>
	        <p class="mt-5 mb-3 text-muted">&copy; 2018 MS Office Educational Materials</p>
	    </form>
	</div>
</section>
<!-- footer -->
<?php
    require "footer.php";
?>
