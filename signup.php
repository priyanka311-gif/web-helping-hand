
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Include bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Captcha --> 
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto text-center">
				<h3 class="text-center mb-2">Create an account</h3><br>
					<?php
					if (isset($_GET['signup'])) {	
						if ($_GET['signup'] == 'empty') {
							echo '<div class="alert alert-danger" role="alert">Please fill in all of the required fields</div>';
						} 

						if ($_GET['signup'] == 'captcha') {
							echo '<div class="alert alert-danger" role="alert">Please fill in the captcha.</div>';
						} 

						if ($_GET['signup'] == 'dob') {
							echo '<div class="alert alert-danger" role="alert">You must be over 18 to signup.</div>';
						} 

						if ($_GET['signup'] == 'invalid-email') {
							echo '<div class="alert alert-danger" role="alert">The email you entered is invalid.</div>';
						} 

						if ($_GET['signup'] == 'usertaken') {
							echo '<div class="alert alert-danger" role="alert">The email address you have selected is already in use.</div>';
						} 

						if ($_GET['signup'] == 'invalid') {
							echo '<div class="alert alert-danger" role="alert">Please use only letters for your name.</div>';
						} 

						if ($_GET['signup'] == 'invalid-pw') {
							echo '<div class="alert alert-danger" role="alert">Your password needs to a minimum of 8 characters long and contain at least 1 letter and 1 number.</div>';
						} 
					}
					?>

					<form action="inc/signup.inc.php" method="POST" onSubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">

						<div class="form-group">
							<input class="form-control" type="text" name="first" placeholder="First Name" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="last" placeholder="Last Name" required>	
						</div>
						<div class="form-group">						
							<select class="form-control" name="city">
								<option value="" disabled selected>Favourite City</option>
							    <option value="Birmingham">HIMMATNAGAR</option>
							    <option value="Bristol">MODASA</option>
							</select>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label class="mt-1 mb-2">Date of birth: </label><br><input class="form-control signup-dob" type="date" name="dob" required="required">
						</div>

						<div class="g-recaptcha mb-3" data-sitekey="6LcRGYUUAAAAAA70Yp4-1gTJ9ZuWc0yuFee0H5ym"></div>

							<input type="checkbox" name="checkbox" value="check" id="agree" /><span class="signup-link"> I have read and agree to the <a href="terms">Terms and Conditions</a> and <a href="privacy">Privacy Policy</a></span>
							<button class="info-btn btn-block mt-3" type="submit" name="submit">Sign Up</button>
						</div>
					</form>

			</div>
		</div>

	</div>

</body>


</html>