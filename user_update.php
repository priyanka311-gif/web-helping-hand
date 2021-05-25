<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User_edit_profile</title>

<?php

	include('connection.php');
	error_reporting(0);
	$_POST['u_id'];	
	$_POST['u_name'];
	$_POST['u_email'];
	$_POST['u_mobile_no'];
	$_POST['u_address'];
	$_POST['u_password'];
?>


</head>

<body>


<form action="" method="post">

	<?php /*?>-user-id <input type="text" name="user_id" value="<?php echo $_POST['u_id']; ?>" /><br /><br />	--<?php */?>
	user-name <input type="text" name="user_name" value="<?php echo $_POST['u_name']; ?>" /><br /><br />
	e-mail id <input type="text" name="user_email" value="<?php echo $_POST['u_email']; ?>" /><br /><br />
	mobile no <input type="text" name="user_mobile_no" value="<?php echo $_POST['u_mobile_no']; ?>" /><br /><br />
	address   <textarea name="user_address" value="<?php echo $_POST['u_address']; ?>"></textarea><br /><br />
	password  <input type="text" name="user_password" value="<?php echo $_POST['u_password']; ?>" /><br /><br />
	<input type="submit" name="submit" value="Update" />
	
</form>


<?php 

if($_POST['submit'])
{
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_mobile_no = $_POST['user_mobile_no'];
	$user_address = $_POST['user_address'];
	$user_password = $_POST['user_password'];
	
	$query = "UPDATE USER_TABEL SET USER_NAME='$user_name',USER_EMAIL='$user_email',USER_MOBILE_NO='$user_mobile_no',USER_ADDRESS='$user_address',USER_PASSWORD='$user_password' WHERE USER_ID='$user_id'";
	$data = mysqli_query($conn, $query);
	
	if($data)
	{
		echo"<font color='green'> Record updated successfully...! <a href='user_details.php'>Check updated list here...!</a>";
	}
	else
	{
		echo"<font color='red'> Record not updated...!";
	}
}
else
{
	echo"<font color='blue'> click update button to save changes...";
}

?>


</body>
</html>
