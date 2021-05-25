<?php 

session_start();

include 'inc/db.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Include bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
	<div class="container mb-3">
	  <div class="row px-3">
	    <div class="white-container p-3 col-12">

	    <?php 
		
		error_reporting(0);
		
	    if (isset($_SESSION['user_id'])) {
	    	echo $_SESSION['user_id'] . '<br>';
	    	echo $_SESSION['email'] . '<br>';
	    	echo $_SESSION['first'] . '<br>';
	    	echo $_SESSION['last'] . '<br>';
	    	echo $_SESSION['admin'] . '<br>';
	    	echo $_SESSION['city'] . '<br>';
	    }

	    if ($_GET['signup'] == 'pw-error') {
	    	echo '<div class="alert alert-danger" role="alert">Password error</div>';
	    } 

	    if ($_GET['login'] == 'success') {
	    	echo '<div class="alert alert-success" role="alert">Login successful</div>';
	    } 

	    echo '<a href="inc/logout.inc.php">Logout</a>';

	    ?>
	        <h3>Change Password</h3>

	        <?php 

	        if (isset($_GET['pw'])) {
	          if ($_GET['pw'] == 'success') {
	            echo '<div class="alert alert-success">Your password has been successfully changed.</div>';
	          } 
	        }

	        if (isset($_GET['pw'])) { 
	          if ($_GET['pw'] == 'invalid') {
	            echo '<div class="alert alert-danger">The details you entered were incorrect, please try again.</div>';
	          } 
	        }


	        if (isset($_GET['pw'])) {
	          if ($_GET['pw'] == 'empty') {
	            echo '<div class="alert alert-danger">Please fill in all the required fields.</div>';
	          } 
	        }

	        ?>

	        <div class="profile-form">
	            <form action="inc/changepw.inc.php" method="POST">
	              <div class="form-group">
	              <label>Old Password:</label>
	                <input class="form-control" type="password" name="old-password" required>
	              </div>
	              <div class="form-group">
	              <label>New Password:</label>
	                <input class="form-control" type="password" name="new-password" required>
	              </div>
	              <input type="submit" class="info-btn" name="submit" value="Submit">
	          </form>
	          </div>  
	      </div> <!-- end of white container -->
	  </div> <!-- end of row -->
	</div>
</body>
</html>
