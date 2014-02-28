<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
<link href="header.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
session_start();
// Create connection
$con=mysqli_connect("localhost","abc","abcd","database");
// Check connection
if(mysqli_connect_errno($con))

echo "Failed to connect to MySql:" .mysqli_connect_error();
		
else
{		
if(isset($_POST['username']))
{
$txt = $_POST['username'];
$pwd = $_POST['password'];
$result = mysqli_query($con,"SELECT * FROM admin WHERE Employee_code='$txt'");
$result1 = mysqli_query($con,"SELECT * FROM admin WHERE Password='$pwd' and Employee_code='$txt'");
if($row = mysqli_fetch_array($result))
  {
  if($row1 = mysqli_fetch_array($result1))
  {
	header('Location:admin.php');
	$_SESSION['admin']=$txt;
  }
  else
 {
  echo "<div class= \"contents\" > Invalid Username/Password </div>";
 }
  }
}
}
 ?>
</body>
</html>
