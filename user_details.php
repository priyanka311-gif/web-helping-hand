<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registered Users</title>

<style>
td{ padding:10px;}

th {
    padding: 20px;
    text-align: center;
    background-color: aliceblue;
    font-size: 20px;
    color: violet;
}

</style>

</head>

<body>

<?php 

	include("connection.php");
	error_reporting(0);
		$query = "SELECT * FROM USER_TABEL";
		$data = mysqli_query($conn, $query);
		$total = mysqli_num_rows($data);
		
	if($total != 0)
	{
		?>
		
		<table class="table-bordered">
			<tr>
				<th>user_id</th>
				<th>user_name</th>
				<th>user_email</th>
				<th>user_mobile_no</th>
				<th>user_address</th>
				<th>user_password</th>
				<th colspan="2">Operations</th>
			</tr>
		
		<?php
		
		while($result = mysqli_fetch_assoc($data))
		{
			echo"<tr>
					<td>".$result['user_id']."</td>
					<td>".$result['user_name']."</td>
					<td>".$result['user_email']."</td>
					<td>".$result['user_mobile_no']."</td>
					<td>".$result['user_address']."</td>
					<td>".$result['user_password']."</td>
					<td>
					<a href='user_update.php?u_name=$result[user_name]&u_email=$result[user_email]&u_mobile_no=$result[user_mobile_no]&u_address=$result[user_address]&u_password=$result[user_password]'>Edit
					</a>
					</td>
					<td>Delete</td>
				</tr>";			
		}
	}
	else
	{
		echo"no records found....!";
	}
			
?>
</table>
</body>
</html>
