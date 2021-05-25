<?php

session_start();

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $_SESSION['email'] = $_GET['email']; // Set email variable
    $_SESSION['hash'] = $_GET['hash']; // Set hash variable
        
}

else {
    // Invalid approach
    header("Location: login");
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Include bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>


<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<h3 class="text-center mb-2">Forgot Password</h3>

				<?php 
				if (isset($_GET['pw'])) {	
					if ($_GET['pw'] == 'nomatch') {
						echo '<div class="alert alert-danger">Your passwords do not match</div>';
					} 

					if ($_GET['pw'] == 'invalid-pw') {
						echo '<div class="alert alert-danger">Your password needs to a minimum of 8 characters long and contain at least 1 letter and 1 number.</div>';
					} 
				}

				?>

				<form action="inc/resetpw.inc.php" method="POST">
				  <div class="form-group">
				    <br>
				    <input name="password" type="password" class="form-control mt-2"  placeholder="Password" required>
				    <input name="password_confirm" type="password" class="form-control mt-2"  placeholder="Confirm Password" required>
				    
				  </div>
				  
				  <button type="submit" class="btn-block" name="submit">Change Password</button>
				   
				</form>

			</div>
		</div>
	</div>
</body>

</html>


