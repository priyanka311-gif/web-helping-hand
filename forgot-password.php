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
			<h3 class="text-center mb-2">Reset Your Password</h3>

			<?php 
			if (isset($_GET['email'])) {
				if ($_GET['email'] == 'empty') {
					echo '<div class="alert alert-danger" role="alert">Please enter a valid email.</div>';
				} 
			}

			if (isset($_GET['email'])) {
				if ($_GET['email'] == 'invalid') {
					echo '<div class="alert alert-danger" role="alert">Please enter a valid email.</div>';
				} 
			}

			if (isset($_GET['email'])) {
				if ($_GET['email'] == 'success') {
					echo '<div class="activate-message">A reset password link has been sent to your email. Please check your junk folder.</div>';
				} 
			}
			
			if (isset($_GET['email'])) {	
				if ($_GET['email'] == 'none') {
					echo '<div class="alert alert-danger" role="alert">No account is associated with that email.</div>';
				} 
			}

			?>

			<form action="inc/forgotpw.inc.php" method="POST">
			  <div class="form-group">
			    <br>
			    <input name="email" type="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
			    
			  </div>
			  
			   <button type="submit" class="btn-block" name="submit">Send Reset Link</button>
			   
			</form>

		</div>
	</div>
</div>
</body>

</html>


