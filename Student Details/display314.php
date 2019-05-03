<html>
<head>
<title>DISPLAY CS314</title>
<style>
 body
	{
		background-image : url('http://www.gotechnologix.com/wp-content/uploads/2016/05/dark-background-wallpaper.jpg');
		font-family: Verdana, Geneva, sans-serif;
		color: #b3bab2;
		font-weight: bold;
	}
	.box
	{
		border-style: none;
		border-color: white;
		position: absolute;
		top: 	250px;
		left: 	40px;
		height: 1700px;
		width: 1260px;
	}
	.usernameStyle
	{
		position: relative;
		top: 10px;
		left: 40px;
		
	}
	.submitButton
	{
		position: relative;
		border-style: none;
		width: 70px;
		height: 30px;
		top: -90px;
		left: 250px;
		background-color: black;
		color: #b3bab2;
		font-family: Verdana, Geneva, sans-serif;
	}
	.submitButton:hover
	{
		border-style: solid;
		border-color: #b3bab2;
		cursor: hand;
	}
	.titl
	{
		position: absolute;
		top: 60px;
		left: 200px;
		font-size: 30px;
	}
	.update
	{
		border-style : none;
		width: 100px;
		height: 100px;
		position: relative;
		top: 50px;
		left: 70px;
		background-color: black;
		color: #b3bab2;	
			
	}
	.update:hover
	{
		border-style: solid;
		border-color: #b3bab2;
		cursor: hand;
	}
 </style>
</head>
<body>

<h3 class="titl">NATIONAL INSTITUTE OF TECHNOLOGY, PUDUCHERRY</h3>
<h2 class="titl" style="top: 150px;left: 500px;">DISPLAY CS314, CGPA</h2>
<div class="box">
<form name = "form1" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table style="border-style: solid;position: relative;left: 370px;" width="500">
<thead>
  <th>ROLLNO</th><th>CGPA</th>
  </thead>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GRADE_STUD";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$query0 = "create table cgpa1 as select cs302.rollno,((cs302.total+ cs304.total+cs306.total+cs308.total+cs314.total+cs316.total+cs517.total+hm104.total+hm302.total) / 900)*10 as CGPA from cs302, cs304, cs306,cs308,cs314,cs316,cs517,hm104,hm302 where cs302.rollno = cs304.rollno and cs304.rollno = cs306.rollno and cs306.rollno = cs308.rollno and cs308.rollno = cs314.rollno and cs316.rollno = cs517.rollno and hm104.rollno = hm302.rollno and cs302.rollno = cs306.rollno and cs302.rollno = cs308.rollno and cs302.rollno = cs314.rollno and cs302.rollno = cs316.rollno and cs302.rollno = cs517.rollno and cs302.rollno = hm104.rollno and cs302.rollno = hm302.rollno;";
$result = mysqli_query($conn,$query0);
$query01 = "select ROLLNO, CGPA from cgpa1;";
$result0 = mysqli_query($conn,$query01);
if(mysqli_num_rows($result0) > 0)
{
	echo "<tbody>";
	while($row = mysqli_fetch_assoc($result0))
	{
		echo "<tr><td>".$row['ROLLNO'];
		echo "</td><td>".$row['CGPA'];
		echo "</td></tr>";
	}
	echo "</tbody>";
}
else
{
	echo "0 results";
}
$querydel = "drop table cgpa1";
mysqli_query($conn,$querydel);

$sql = "SELECT ROLLNO, NAME, CT1_CT2, INTERNAL, SEMESTER, TOTAL, GRADE FROM CS314";
$result = mysqli_query($conn, $sql);
$i=0;
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table width =\"900\" style=\"border-style: solid;position: relative;left: 170px;top: 50px;\"><thead><th>ROLLNO</th><th>NAME</th><th>CT1_CT2</th><th>INTERNAL</th><th>SEMESTER</th><th>TOTAL</th><th>GRADE</th></thead>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		
				echo "<tbody><tr><td>".$row['ROLLNO'];
				echo "</td><td>".$row['NAME'];
				echo "</td><td> ".$row['CT1_CT2'];	
				echo "</td><td>".$row['INTERNAL'];
				echo "</td><td>".$row['SEMESTER'];
				echo "</td><td> ".$row['TOTAL'];
				echo "</td><td>".$row['GRADE'];
				echo "</td></tr></tbody>";
				
				/*sqli_query($conn,$query6) or die(mysqli_error($conn));
				}
				if(isset($_POST['grade'][$i])){
					$query7 = "UPDATE CS302 SET GRADE = '".$_POST['grade'][$i]."' WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					mysqli_query($conn,$query7) or die(mysqli_error($conn));
				}*/
				
				//echo $query3;
    }
	
				
} else 
{
    echo "0 results";
}


mysqli_close($conn);
?>
</table>
  <!--input class="submitButton" style="top:100px;left:800px;"type="submit" value="Submit"-->
</form> 
</body>
</html>
