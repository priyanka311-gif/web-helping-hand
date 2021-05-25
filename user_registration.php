<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registration-page</title>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "whh";

$conn = mysqli_connect ($servername,$username,$password,$dbname);

 error_reporting(0);
?>

</head>

<body>

<form action="" method="post">
	
	user-id <input type="text" name="user_id" value="" /><br /><br />
	user-name <input type="text" name="user_name" value="" /><br /><br />
	e-mail id <input type="text" name="user_email" value="" /><br /><br />
	mobile no <input type="text" name="user_mobile_no" value="" /><br /><br />
	address   <textarea name="user_address" value=""></textarea><br /><br />
	password  <input type="text" name="user_password" value="" /><br /><br />
	<input type="submit" name="submit" value="SingUp" />
	
</form>


<?php 

if($_POST['submit'])
{
	$u_id = $_POST['user_id'];
	$u_name = $_POST['user_name'];
	$u_email = $_POST['user_email'];
	$u_mobile_no = $_POST['user_mobile_no'];
	$u_address = $_POST['user_address'];
	$u_password = $_POST['user_password'];
	
	if($u_id != "" && $u_name != "" && $u_email != "" && $u_mobile_no != "" && $u_address != "" && $u_password != "" )
	{
		$query = "INSERT INTO USER_TABEL VALUES ('$u_id','$u_name','$u_email','$u_mobile_no','$u_address','$u_password')";
		$data = mysqli_query($conn, $query);
		
		if($data)
		{
			echo"You are registered now...!";
		}
	}
	else
	{
		echo"please fill the all fields...!";
	}
}

?>

</body>
</html>
