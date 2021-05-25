<?php

session_start();

 error_reporting(0);

require_once './Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '{app-id}', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}', // Replace {app-secret} with your app secret
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];


$redirectUrl = 'root/fb-callback.php'; // Change this to your fb-callback.php location 
$permissions = ['email']; // Optional permissions , 'user_hometown', 'user_birthday'
$loginUrl = $helper->getLoginUrl($redirectUrl, $permissions);

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Include bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>

<body>

<div class="container fill">
	<div class="row">
		<div class="col-md-4 mx-auto text-center">
			<h3 class="text-center mb-2">Login</h3>

			<?php 
			if (isset($_GET['signup'])) {
				if ($_GET['signup'] == 'success') {
					echo '<div class="alert alert-success" role="alert">An activation link has been sent to your email. Please click on the link to activate your account. Check your junk folder!</div>';
				} 
			}

			if (isset($_GET['email'])) {
				if ($_GET['email'] == 'verified') {
					echo '<div class="alert alert-success" role="alert">Your email has now been activated, you can login below.</div>';
				} 
			}

			if (isset($_GET['pw'])) {
				if ($_GET['pw'] == 'reset') {
					echo '<div class="alert alert-success" role="alert">Your password has been reset successfully. You can now login below.</div>';
				} 
			}
			
			if (isset($_GET['login'])) {	
				if ($_GET['login'] == 'error') {
					echo '<div class="alert alert-danger" role="alert">The details you entered were incorrect, please try again.</div>';
				} 
			}


			if (isset($_GET['login'])) {
				if ($_GET['login'] == 'empty') {
					echo '<div class="alert alert-danger" role="alert">Please fill in all the required fields.</div>';
				} 
			}

			?>

			<form action="inc/login.inc.php" method="POST">
			  <div class="form-group">
			    <br>
			    <input name="email" type="email" class="form-control mt-2" placeholder="Email" required>
			    
			  </div>
			  <div class="form-group">			    
			    <input name="password" type="password" class="form-control" placeholder="Password" required>
			    <a class="forgot-password-link pt-1" href="forgot-password">Forgot password?</a>
			  </div>
			   <button type="submit" class="btn-block py-2" name="submit">Login</button>
			   
			</form>
			
			<?php echo '<a href="' . htmlspecialchars($loginUrl) . '" class="btn-block fb-btn text-center mt-2 py-2" style="background-color: #3b5998; color: #FFFFFF;"><i class="fab fa-facebook-square fa-1x mr-2"></i>Login with Facebook</a>'; ?>

			<span class="signup-link">Don't have an account? Create one <a href="signup">here</a></span>
			
			
			


		</div>
	</div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>


