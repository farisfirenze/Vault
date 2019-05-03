<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = $_POST["username"];
	$password = $_POST["password"];
	$subject = $_POST["subject"];
	
	if($username == 'admin' && $password == 'pass' && $subject == 'CS302')
	{
		echo "<script> location.href='/docs/phptry/cs302.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'CS304')
	{
		echo "<script> location.href='/docs/phptry/cs304.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'CS306')
	{
		echo "<script> location.href='/docs/phptry/cs306.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'CS308')
	{
		echo "<script> location.href='/docs/phptry/cs308.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'HM302')
	{
		echo "<script> location.href='/docs/phptry/hm302.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'CS517')
	{
		echo "<script> location.href='/docs/phptry/cs517.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'HM104')
	{
		echo "<script> location.href='/docs/phptry/hm104.php'; </script>";
	}
	else if($username == 'admin' && $password == 'pass' && $subject == 'CS314')
	{
		echo "<script> location.href='/docs/phptry/cs314.php'; </script>";
	}
	
	else if($username == 'admin' && $password == 'pass' && $subject == 'CS316')
	{
		echo "<script> location.href='/docs/phptry/cs316.php'; </script>";
	}
	else if($username == 'admin' && $password == 'admin' && $subject == 'all')
	{
		echo "<script> location.href='/docs/phptry/admin.php'; </script>";
	}
	else
	{
		echo "inavlid Username or Password or Subject";
	}
}
?>