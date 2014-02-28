<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache">
 <meta http-equiv="Cache-Control" content="no-cache">
 <meta http-equiv="Expires" content="Sat, 01 Dec 2013 00:00:00 GMT">
<title>Welcome To User's Den</title>
<link rel="stylesheet" type="text/css" href="header.css"  />
<link rel="stylesheet" type="text/css" href="heading.css" />
<link rel="stylesheet" type="text/css" href="body.css"  />
<link rel="stylesheet" type="text/css" href="background.css" />
<link rel="stylesheet" type="text/css" href="navigation.css" />
<style type="text/css">
.sidebar1 {
	float: left;
	width: 20%;
	background-color:#172322;
	padding-bottom: 10px;
	margin-top:30px;
	margin-right:40px;
}
.middle {
	float: left;
	width: 50%;
	background-colo:#172322;
	padding-bottom: 10px;
	margin-left:100px;
	text-align:center;
	margin-top:5px;
	border: double;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
	border-top-left-radius:10px;
	margin-top:50px;
	
}
ul.nav {
	list-style: none; /* this removes the list marker */
	/*border-top: 1px solid #666; /* this creates the top border for the links - all others are placed using a bottom border on the LI */
	margin-bottom: 15px;
	 /* this creates the space between the navigation on the content below */
}
ul.nav li {
	border-bottom: 1px solid #666; /* this creates the button separation */
}
ul.nav a, ul.nav a:visited { /* grouping these selectors makes sure that your links retain their button look even after being visited */
	padding: 5px 5px 5px 15px;
	display: block; /* this gives the link block properties causing it to fill the whole LI containing it. This causes the entire area to react to a mouse click. */
	text-decoration: none;
	background-color: #172322;
	color: #FFF;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* this changes the background and text color for both mouse and keyboard navigators */
	background-color: #6F7D94;
	color: #FFF;
}

</style>
</head>
<?php
	//include 'x.php';
	//session is started.
	session_start();
	if($_SESSION['logged-in']!= true) {
			header('Location:error.php');
			
	}
	$user=$_SESSION['stud'];
	?>

<body class="body">
<div>
<div class="heading"><h1> INDIAN INSTITUTE OF TECHNOLOGY, PATNA</h1></div>
<h2 class="header" style="color:#00F; text-decoration:blink;">Central Library Portal</h2>
<h3 style="color:#00F; text-decoration:blink; margin-left:250px; margin-right:150px"><marquee><img src="ET10_Live_icon.png" /> 24x7 Online Library Portal</marquee></h3>
<br />
<hr />
<ul id="menu"> 
    <li><a href="index.php">Home</a></li>
<li><a href="E-Journals.html">E-Journals</a></li>
<li><a href="E-books.html">E-books</a></li> 
<li><a href="vendor.html">Vendors</a></li> 
<li><a href="List of E-Resources_Web Page.pdf" target="new">List of E-Resources</a></li> 
<li><a href="contact.html">Contact Us</a></li>  
  <li><a href="search.php">Search Books</a></li>  
  
</ul>
</div>
<div class="background">
<p style="color:#00F"> Welcome!!!<?php echo $user?></p><a href="logout.php" style="text-decoration: underline;">Logout</a>
<div class="sidebar1">
  <ul class="nav">
    <li style="color:#CCB647;" ><a href="order.php"><strong>Place order</a></strong>
    <li style="color:#CCB647;" ><a href="renew.php"><strong>Renew books</a></strong>
    				
                   </ul></li>
                  
</div>
<?php

$username="abc";
$password="abcd";
$database="database";

mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$result=mysql_query("SELECT Name,Roll_number,Group_number,Designation FROM users WHERE Roll_number='$user'");
if($result)
{$f1=mysql_result($result,0,"Name");
$f2=mysql_result($result,0,"Roll_number");
$f3=mysql_result($result,0,"Group_number");
$f4=mysql_result($result,0,"Designation");
}

$result1 = mysql_query("select Book_code from user1 where Roll_no = '$user'");
	$num=mysql_num_rows($result1);
	$i=0;
	while($i<$num)
	{
		$array[$i]=mysql_result($result1,$i,"Book_code");
		$i=$i+1;
	}
$i=0;
while($i<$num)
{
$result=mysql_query("SELECT ISBN_no,Date_of_issue,Date_of_return FROM book2 WHERE Accession_number='$array[$i]'");
$array1[$i]=mysql_result($result,0,"ISBN_no");
$array2[$i]=mysql_result($result,0,"Date_of_issue");
$array3[$i]=mysql_result($result,0,"Date_of_return");
$i++;
}

$i=0;
while($i<$num)
{
$result=mysql_query("SELECT Title,Publisher,Subject FROM book1 where ISBN_no='$array1[$i]'");
$array4[$i]=mysql_result($result,0,"Title");
$array5[$i]=mysql_result($result,0,"Publisher");
$array6[$i]=mysql_result($result,0,"Subject");
$i++;
}
$i=0;
while($i<$num)
{
		$result=mysql_query("SELECT Author FROM author where ISBN_number='$array1[$i]'");
		$num1=mysql_num_rows($result);
		$j=0;
		while($j < $num1)
		{
			$array7[$i][$j]=mysql_result($result,$j,"Author");
			$j++;
		}

	$i++;
}
$result=mysql_query("SELECT Roll_number FROM users WHERE Group_number='$f3'");
$num2=mysql_num_rows($result);
$i=0;
if($num2>0)
{
	while($i<$num2)
	{$array8[$i]=mysql_result($result,$i,"Roll_number");
	$i++;}
}
//echo $f3;
$result=mysql_query("SELECT Book_code FROM group1 WHERE Group_no='$f3'");
$num3= mysql_num_rows($result);
//echo $num3;
$i=0;
while($i<$num3)
{
	$array10[$i]=mysql_result($result1,$i,"Book_code");
	$i++;}
$i=0;
while($i<$num3)
{
$result=mysql_query("SELECT ISBN_no,Date_of_issue,Date_of_return FROM book2 WHERE Accession_number='$array10[$i]'");
$array11[$i]=mysql_result($result,0,"ISBN_no");
$array12[$i]=mysql_result($result,0,"Date_of_issue");
$array13[$i]=mysql_result($result,0,"Date_of_return");
$i++;
}

$i=0;
while($i<$num3)
{
$result=mysql_query("SELECT Title,Publisher,Subject FROM book1 where ISBN_no='$array11[$i]'");
$array14[$i]=mysql_result($result,0,"Title");
$array15[$i]=mysql_result($result,0,"Publisher");
$array16[$i]=mysql_result($result,0,"Subject");
$i++;
}
$i=0;
while($i<$num3)
{
		$result=mysql_query("SELECT Author FROM author where ISBN_number='$array11[$i]'");
		$num4=mysql_num_rows($result);
		$j=0;
		while($j < $num4)
		{
			$array17[$i][$j]=mysql_result($result,$j,"Author");
			$j++;
		}

	$i++;
}
mysql_close();
?>
<div class="middle" id="frm6" style="color:#600;">
<br />
<h4>Personal Card</h4>
<br />
<p>Roll Number/Emp Number:&nbsp;<?php echo $f2 ?>&nbsp;&nbsp;&nbsp;&nbsp;Name:&nbsp;<?php echo $f1 ?></p>
<br />
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td><font face="Arial, Helvetica, sans-serif" >Book Code</font></td>
<td><font face="Arial, Helvetica, sans-serif">Book Name</font></td>
<td><font face="Arial, Helvetica, sans-serif">Publisher</font></td>
<td><font face="Arial, Helvetica, sans-serif">Subject</font></td>
<td><font face="Arial, Helvetica, sans-serif">Author</font></td>
<td><font face="Arial, Helvetica, sans-serif">Date of Issue</font></td>
<td><font face="Arial, Helvetica, sans-serif">Date of Return</font></td>
</tr>
<?php
$k=0;
while($k<$num)
{echo "<tr>
<td><font >$array[$k]</font></td>
<td><font >$array4[$k]</font></td>
<td><font >$array5[$k]</font></td>
<td><font >$array6[$k]</font></td>";
echo "<td><font >";
$i=0;
while($i < $num1)
{
	echo $array7[$k][$i];
	echo "<br />";
	$i++;
} 
echo "</font></td>";
echo "<td><font >$array2[$k]</font></td>
<td><font >$array3[$k]</font></td>
</tr>";
$k++;}
echo "</table>";
if(($f4!="Faculty")&&($f4!="Office_staff"))
{
?>
<br />
<h4>Group Card</h4>
<br />
<p>Group Number:&nbsp;<?php echo $f3 ?>&nbsp;&nbsp;&nbsp;&nbsp;Name:&nbsp;<?php $i=0;
while($i < $num2)
{
	echo $array8[$i];
	echo ";";
	$i++;
}  ?></p>
<br />
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td><font face="Arial, Helvetica, sans-serif" >Book Code</font></td>
<td><font face="Arial, Helvetica, sans-serif">Book Name</font></td>
<td><font face="Arial, Helvetica, sans-serif">Publisher</font></td>
<td><font face="Arial, Helvetica, sans-serif">Subject</font></td>
<td><font face="Arial, Helvetica, sans-serif">Author</font></td>
<td><font face="Arial, Helvetica, sans-serif">Date of Issue</font></td>
<td><font face="Arial, Helvetica, sans-serif">Date of Return</font></td>
</tr>
<?php
$k=0;
//echo $num3;
while($k<$num3)
{echo "<tr>
<td><font >$array10[$k]</font></td>
<td><font >$array14[$k]</font></td>
<td><font >$array15[$k]</font></td>
<td><font >$array16[$k]</font></td>";
echo "<td><font >";
$i=0;
while($i < $num4)
{
	echo $array17[$k][$i];
	echo ";";
	$i++;
} 
echo "</font></td>";
echo "<td><font >$array12[$k]</font></td>
<td><font >$array13[$k]</font></td>
</tr>";
$k++;}
echo "</table>";
}
?>

</div>

<!--
<div class="middle" id="frm3" style="color:#600;display:none;">
Select the card on which you want to renew the book(s)<br /><br />
<form name="frm2" id="ak1" action="stud.php">
<input type="radio" name="first" value="group">Group Card<br>
&nbsp;&nbsp;&nbsp;<input type="radio" name="first" value="group">Personal Card<br>
</form>
</div>
<div class="middle" id="frm7" style="color:#600;display:none;">
<form name="frm7" id="ak3" action="stud.php">
<br /><br />
Book1: <input align="middle" type="text" name="public"><input align="right" type="submit" value="Renew"><br><br><br>
Book2: <input align="middle" type="text" name="public"><input align="right" type="submit" value="Renew"><br><br><br>
Book3: <input align="middle" type="text" name="public"><input align="middle" type="submit" value="Renew"><br><br><br>
Book4: <input align="middle" type="text" name="public"><input align="middle" type="submit" value="Renew"><br><br><br>
Book5: <input align="middle" type="text" name="public"><input align="middle" type="submit" value="Renew"><br><br><br>
Book6: <input align="middle" type="text" name="public"><input align="middle" type="submit" value="Renew"><br><br><br>
</form>
</div>

<!--<div class="contents" id="demo" width="57" height="35"/>
</div>-->

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div id="footer">
<footer> Copyright &copy; Indian Institute of Technology Patna<br>Website designed by Library Management Team</footer>
</div>

</body>
</html>
