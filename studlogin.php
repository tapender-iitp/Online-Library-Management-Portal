<?php
	//session is started.
	session_start();
	if($_SESSION['logged-in']!= true) {
			header('Location:error.php');
			
	}
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once('include.php');
// Create connection
$con=mysqli_connect("localhost","username","password","databasename");
// Check connection
if (mysqli_connect_errno($con))

		echo "Failed to connect to MySql:" .mysqli_connect_error();
		
if(isset($_POST['loginid']))
{
$txt = $_POST['loginid'];
$pwd = $_POST['pwd'];
$result = mysqli_query($con,"SELECT * FROM users
WHERE Roll_number='$txt'");
$result1 = mysqli_query($con,"SELECT * FROM users
WHERE Password='$pwd'");
if($row = mysqli_fetch_array($result))
  {
  if($row1 = mysqli_fetch_array($result1))
  {
	  session_start();
	 $_SESSION['logged-in'] = true;
		 $_SESSION['stud']=$txt;
	header('Location: stud.php');
	  }
  else
 {
  echo "<div class= \"wrong\" > Invalid Username/Password </div>";
 }
  }
  else
  echo "<div class= \"wrong\" > Invalid Username/Password </div>";
}
?>
</body>
</html>
