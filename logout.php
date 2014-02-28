<?php
// Initialize the session.
session_start();
$_SESSION['logged-out'] = true;
if(isset($_SESSION['logged-in'])){
	unset($_SESSION['logged-in']);
}
header('Location:home.php');
?>
